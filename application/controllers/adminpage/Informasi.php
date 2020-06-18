<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Informasi extends Admin_Controller {

    private $table = 'informasi';
    private $pk = 'id_informasi';

    // Load database
    public function __construct()
    {
        parent::__construct();
        $this->load->model('informasi_model');
        $this->uauth->authorization('admin');
    }

    // Index
    public function index()
    {
        $q = $this->input->get('q', TRUE) ? $this->input->get('q', TRUE) : NULL;
        $cari_query = cari_query($q, array('judul', 'isi', 'users.fullname', 'publikasi'));

        $config['total_rows'] = $this->informasi_model->count($cari_query);
        $config['per_page'] = 10;
        $offset = (($this->input->get('p', TRUE) ? $this->input->get('p', TRUE) : 1) - 1) * $config['per_page'];
        $this->pagination->initialize($config);

        $informasi = $this->informasi_model->listing($config['per_page'], $offset, $cari_query);
        $data = array(  'title'         => 'Daftar Informasi',
                        'informasi'         => $informasi,
                        'offset'        => $offset,
                        'pagination'    => $this->pagination->create_links(),
                        'isi'           => 'adminpage/informasi/list');
        $this->load->view('adminpage/_layout/wrapper', $data);
    }

    // Tambah
    public function tambah()
    {
        if ($this->session->akses_level == 'Blocked') view_error('Error 404');

        $list_judul = $this->crud->qa("SELECT slug FROM informasi");
        $listJudul = array();
        foreach ($list_judul as $list_judul) {
            $listJudul[] = $list_judul->slug;
        }
        
        $data = array(  'title' => 'Tambah Informasi',
                        'isi'   => 'adminpage/informasi/tambah',
                        'listJudul' => $listJudul,
                        'kategori'  => $this->config->item("kategori"));

        $this->load->helper('security');
        $valid = $this->form_validation;
        $valid->set_error_delimiters('<i style="color: red;">', '</i>');
        $valid->set_rules('judul', 'Judul Informasi', 'required|trim|strip_tags|htmlspecialchars|xss_clean');
        $valid->set_rules('isi', 'Isi Informasi', 'required');
        $valid->set_rules('judul_en', 'Judul Informasi (Inggris)', 'trim|strip_tags|htmlspecialchars|xss_clean');
        $valid->set_rules('isi_en', 'Isi Informasi (Inggris)');


        if ($valid->run() === FALSE) $this->load->view('adminpage/_layout/wrapper', $data);
        else
        {

            // Mekanisme upload gambar
            // $gambar = upload_image('gambar', 'tambah', 'informasi', '', $data);
            $cfoto = json_decode($this->input->post('cfoto'));
            if ($cfoto) $cfoto->default_width = 720;

            $gambar = upload_image(array('foto', $cfoto), 'tambah', 'informasi', '', $data, TRUE);

            // Masuk ke database
            if ($gambar !== FALSE)
            {
                $data_id = acak_id($this->table, $this->pk);
                $input = $this->input->post(NULL, TRUE);

                $slug = url_title($input['judul'], 'dash', TRUE);
                $slug_en = url_title($input['judul_en'], 'dash', TRUE);

                $id_user = $this->crud->gd('users', array('username' => $this->session->username));
                
                $data = array(  'id_informasi'   => $data_id['id'],
                                'id_user'   => $id_user->id_user,
                                'judul'     => $input['judul'],
                                'judul_en'  => $input['judul_en'],
                                'isi'       => $this->input->post('isi'),
                                'isi_en'    => $this->input->post('isi_en'),
                                'slug'      => $slug,
                                'slug_en'   => $slug_en,
                                'publikasi' => $input['publikasi'],
                                'gambar'    => $gambar,
                                'iat'       => date('Y-m-d H:i:s'));

                $this->crud->i($this->table, $data);
                $this->session->set_flashdata('sukses', 'Informasi berhasil ditambah.');
                redirect(admin_url('informasi'));
            }
        }
    }

    // Update
    public function edit($id_informasi = NULL)
    {
        if ($this->session->akses_level == 'Blocked') view_error('Error 404');

        $informasi = $this->crud->gd($this->table, array($this->pk => $id_informasi));

        // Mengecek jika ID tidak valid
        if (empty($informasi)) view_error('Error 404', 'admin');

        $data = array(  'title' => 'Edit Informasi',
                        'data'  => $informasi,
                        'kategori'  => $this->config->item("kategori"),
                        'isi'   => 'adminpage/informasi/edit');

        $this->load->helper('security');
        $valid = $this->form_validation;
        $valid->set_error_delimiters('<i style="color: red;">', '</i>');
        $valid->set_rules('judul', 'Judul Informasi', 'required|trim|strip_tags|htmlspecialchars|xss_clean');
        $valid->set_rules('isi', 'Isi Informasi', 'required');
        $valid->set_rules('judul_en', 'Judul Informasi (Inggris)', 'trim|strip_tags|htmlspecialchars|xss_clean');
        $valid->set_rules('isi_en', 'Isi Informasi (Inggris)');

        if ($valid->run() === FALSE) $this->load->view('adminpage/_layout/wrapper', $data);
        else
        {
            // Mekanisme upload gambar
            // $gambar = upload_image('gambar', 'edit', 'informasi', $informasi->gambar, $data);
            $cfoto = json_decode($this->input->post('cfoto'));
            if ($cfoto) $cfoto->default_width = 720;
            $gambar = upload_image(array('foto', $cfoto), 'edit', 'informasi', $informasi->gambar, $data);

            // Masuk ke database
            if ($gambar !== FALSE)
            {
                $data_id = acak_id($this->table, $this->pk);
                $input = $this->input->post(NULL, TRUE);
                $slug = substr($informasi->id_informasi, 4, 3).'-'.url_title($input['judul'], 'dash', TRUE);
                $slug_en = substr($informasi->id_informasi, 4, 3).'-'.url_title($input['judul_en'], 'dash', TRUE);
                $data = array(  'judul'     => $input['judul'],
                                'judul_en'  => $input['judul_en'],
                                'isi'       => $this->input->post('isi'),
                                'isi_en'    => $this->input->post('isi_en'),
                                'slug'      => $slug,
                                'slug_en'   => $slug_en,
                                'publikasi' => $input['publikasi'],
                                'gambar'    => $gambar,
                                'uat'       => date('Y-m-d H:i:s'));
                $this->crud->u($this->table, $data, array($this->pk => $id_informasi));
                $this->session->set_flashdata('sukses', 'Informasi berhasil diperbarui.');
                redirect(admin_url('informasi'));
            }
        }
    }

    // Hapus
    public function hapus($id_informasi = NULL)
    {
        if ($this->session->akses_level == 'Blocked') view_error('Error 404');

        $cek = $this->crud->gd($this->table, array($this->pk => $id_informasi));
        if ($this->input->get('act', TRUE) == $id_informasi && ! empty($cek))
        {
            if ($cek->gambar != '')
            {
                unlink('./'.upload_path('informasi').$cek->gambar);
                unlink('./'.upload_path('informasi').'thumbs/'.$cek->gambar);
            }
            $this->crud->d($this->table, array($this->pk => $id_informasi));
            $this->session->set_flashdata('sukses', 'Informasi berhasil dihapus.');
            redirect(admin_url('informasi'));
        }
        else
        {
            $this->session->set_flashdata('gagal', 'Informasi gagal dihapus.');
            redirect(admin_url('informasi'));
        }
    }
}
