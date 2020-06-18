<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blogs extends Admin_Controller {

    private $table = 'blogs';
    private $pk = 'id_blog';

    // Load database
    public function __construct()
    {
        parent::__construct();
        $this->load->model('blogs_model');
        $this->uauth->authorization('admin');
    }

    // Index
    public function index()
    {
        $q = $this->input->get('q', TRUE) ? $this->input->get('q', TRUE) : NULL;
        $cari_query = cari_query($q, array('judul_id', 'isi_id','judul_en', 'isi_en', 'users.fullname', 'publikasi'));

        $config['total_rows'] = $this->blogs_model->count($cari_query);
        $config['per_page'] = 10;
        $offset = (($this->input->get('p', TRUE) ? $this->input->get('p', TRUE) : 1) - 1) * $config['per_page'];
        $this->pagination->initialize($config);

        $blogs = $this->blogs_model->listing($config['per_page'], $offset, $cari_query);
        $data = array(  'title'         => 'Daftar Blog',
                        'blogs'         => $blogs,
                        'offset'        => $offset,
                        'pagination'    => $this->pagination->create_links(),
                        'isi'           => 'adminpage/blogs/list');
        $this->load->view('adminpage/_layout/wrapper', $data);
    }

    // Tambah
    public function tambah()
    {
        if ($this->session->akses_level == 'Blocked') view_error('Error 404');

        $list_judul_id = $this->crud->qa("SELECT slug_id FROM blogs");
        $list_judul_en = $this->crud->qa("SELECT slug_en FROM blogs");
        $listJudul_id = array();
        foreach ($list_judul_id as $list_judul_id) {
            $listJudul_id[] = $list_judul_id->slug_id;
        }
        $listJudul_en = array();
        foreach ($list_judul_en as $list_judul_en) {
            $listJudul_en[] = $list_judul_en->slug_en;
        }
        
        $data = array(  'title' => 'Tambah Blog',
                        'isi'   => 'adminpage/blogs/tambah',
                        'listJudul_en' => $listJudul_en,
                        'listJudul_id' => $listJudul_id,
                        'kategori'  => $this->config->item("kategori"));

        $this->load->helper('security');
        $valid = $this->form_validation;
        $valid->set_error_delimiters('<i style="color: red;">', '</i>');
        $valid->set_rules('judul_id', 'Judul Blog (Bahasa Indonesia)', 'required|trim|strip_tags|htmlspecialchars|xss_clean');
        $valid->set_rules('judul_en', 'Judul Blog (English)', 'trim|strip_tags|htmlspecialchars|xss_clean');
        $valid->set_rules('isi_id', 'Isi Blog (Bahasa Indonesia)', 'required');
        $valid->set_rules('isi_en', 'Isi Blog (English)', '');
        $valid->set_rules('kategori[]', 'Kategori', 'required|trim|strip_tags|htmlspecialchars');


        if ($valid->run() === FALSE) $this->load->view('adminpage/_layout/wrapper', $data);
        else
        {

            // Mekanisme upload gambar
            // $gambar = upload_image('gambar', 'tambah', 'blogs', '', $data);
            $cfoto = json_decode($this->input->post('cfoto'));
            if ($cfoto) $cfoto->default_width = 720;

            $gambar = upload_image(array('foto', $cfoto), 'tambah', 'blogs', '', $data, TRUE);

            // Masuk ke database
            if ($gambar !== FALSE)
            {
                $data_id = acak_id($this->table, $this->pk);
                $input = $this->input->post(NULL, TRUE);
                
                foreach ($input as $key => $value) {
                    if(is_arraY($value))
                        $input[$key] = multiselect_tostring($value);
                }

                $slug_id = url_title($input['judul_id'], 'dash', TRUE);
                $slug_en = url_title($input['judul_en'], 'dash', TRUE);

		        $id_user = $this->crud->gd('users', array('username' => $this->session->username));
                
                $data = array(  'id_blog'   => $data_id['id'],
                                'id_user'   => $id_user->id_user,
                                'judul_id'     => $input['judul_id'],
                                'judul_en'     => $input['judul_en'],
                                'isi_id'       => $this->input->post('isi_id'),
                                'isi_en'       => $this->input->post('isi_en'),
                                'slug_id'      => $slug_id,
                                'slug_en'      => $slug_en,
                                'publikasi' => $input['publikasi'],
                                'kategori' => $input['kategori'],
                                'gambar'    => $gambar,
                                'iat'       => date('Y-m-d H:i:s'));
                $this->crud->i($this->table, $data);
                $this->session->set_flashdata('sukses', 'Blog berhasil ditambah.');
                redirect(admin_url('blogs'));
            }
        }
    }

    // Update
    public function edit($id_blog = NULL)
    {
        if ($this->session->akses_level == 'Blocked') view_error('Error 404');

        $blogs = $this->crud->gd($this->table, array($this->pk => $id_blog));

        foreach ($blogs as $key => $value) {
            if($key == 'kategori' && strpos($value, ','))
                $blogs->$key = explode(',', $value);
        }
        


        // Mengecek jika ID tidak valid
        if (empty($blogs)) view_error('Error 404', 'admin');

        $data = array(  'title' => 'Edit Blog',
                        'data'  => $blogs,
                        'kategori'  => $this->config->item("kategori"),
                        'isi'   => 'adminpage/blogs/edit');

        $this->load->helper('security');
        $valid = $this->form_validation;
        $valid->set_error_delimiters('<i style="color: red;">', '</i>');
        $valid->set_rules('judul_id', 'Judul Blog (Bahasa Indonesia)', 'required|trim|strip_tags|htmlspecialchars|xss_clean');
        $valid->set_rules('judul_en', 'Judul Blog (English)', 'trim|strip_tags|htmlspecialchars|xss_clean');
        $valid->set_rules('isi_id', 'Isi Blog (Bahasa Indonesia)', 'required');
        $valid->set_rules('isi_en', 'Isi Blog (English)', '');
        $valid->set_rules('kategori[]', 'Kategori', 'required|trim|strip_tags|htmlspecialchars');

        if ($valid->run() === FALSE) $this->load->view('adminpage/_layout/wrapper', $data);
        else
        {
            // Mekanisme upload gambar
            // $gambar = upload_image('gambar', 'edit', 'blogs', $blogs->gambar, $data);
            $cfoto = json_decode($this->input->post('cfoto'));
            if ($cfoto) $cfoto->default_width = 720;
            $gambar = upload_image(array('foto', $cfoto), 'edit', 'blogs', $blogs->gambar, $data);

            // Masuk ke database
            if ($gambar !== FALSE)
            {
                $data_id = acak_id($this->table, $this->pk);
                $input = $this->input->post(NULL, TRUE);
                foreach ($input as $key => $value) {
                    if(is_arraY($value))
                        $input[$key] = multiselect_tostring($value);
                }
                $slug_id = substr($blogs->id_blog, 4, 3).'-'.url_title($input['judul_id'], 'dash', TRUE);
                $slug_en = substr($blogs->id_blog, 4, 3).'-'.url_title($input['judul_en'], 'dash', TRUE);
                $data = array(  
                                'judul_id'     => $input['judul_id'],
                                'judul_en'     => $input['judul_en'],
                                'isi_id'       => $this->input->post('isi_id'),
                                'isi_en'       => $this->input->post('isi_en'),
                                'slug_id'      => $slug_id,
                                'slug_en'      => $slug_en,
                                'publikasi' => $input['publikasi'],
                                'kategori' => $input['kategori'],
                                'gambar'    => $gambar,
                                'uat'       => date('Y-m-d H:i:s'));
                $this->crud->u($this->table, $data, array($this->pk => $id_blog));
                $this->session->set_flashdata('sukses', 'Blog berhasil diperbarui.');
                redirect(admin_url('blogs'));
            }
        }
    }

    // Hapus
    public function hapus($id_blog = NULL)
    {
        if ($this->session->akses_level == 'Blocked') view_error('Error 404');

        $cek = $this->crud->gd($this->table, array($this->pk => $id_blog));
        if ($this->input->get('act', TRUE) == $id_blog && ! empty($cek))
        {
            if ($cek->gambar != '')
            {
                unlink('./'.upload_path('blogs').$cek->gambar);
                unlink('./'.upload_path('blogs').'thumbs/'.$cek->gambar);
            }
            $this->crud->d($this->table, array($this->pk => $id_blog));
            $this->session->set_flashdata('sukses', 'Blog berhasil dihapus.');
            redirect(admin_url('blogs'));
        }
        else
        {
            $this->session->set_flashdata('gagal', 'Blog gagal dihapus.');
            redirect(admin_url('blogs'));
        }
    }
}
