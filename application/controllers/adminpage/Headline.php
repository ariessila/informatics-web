<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Headline extends Admin_Controller {

    private $table = 'headline';
    private $pk = 'id_headline';

    // Load database
    public function __construct()
    {
        parent::__construct();
        $this->uauth->authorization('admin');
    }

    // Index
    public function index()
    {
        $headline = $this->crud->gao($this->table, 'urutan ASC');
        $data = array(  'title'         => 'Headline',
                        'headline'      => $headline,
                        'jml'           => jml_nav(),
                        'isi'           => 'adminpage/headline/list');
        $this->load->view('adminpage/_layout/wrapper', $data);
    }

    // Tukar urutan headline
    public function tukar_posisi()
    {
        $input = $this->input->post(NULL, TRUE);
        $id = $input['id'];
        $urutan = $input['urutan'];
        if (isset($_POST['naik'])) {
            if ($urutan == 1) { redirect(admin_url('headline?stuck')); return; }
            $atas = $this->crud->gd($this->table, array('urutan' => ($urutan - 1)));
            $this->crud->u($this->table, array('urutan' => $urutan), array($this->pk => $atas->id_headline));
            $this->crud->u($this->table, array('urutan' => ($urutan - 1)), array($this->pk => $id));
            redirect(admin_url('headline?naik'));
        } else if (isset($_POST['turun'])) {
            $bawah = $this->crud->gd($this->table, array('urutan' => ($urutan + 1)));
            if (!$bawah) { redirect(admin_url('headline?stuck')); return; }
            $this->crud->u($this->table, array('urutan' => $urutan), array($this->pk => $bawah->id_headline));
            $this->crud->u($this->table, array('urutan' => ($urutan + 1)), array($this->pk => $id));
            redirect(admin_url('headline?turun'));
        } else redirect(admin_url('headline'));
    }

    // Ganti status publikasi
    public function switch_publish($id_headline)
    {
        $this->crud->u($this->table, array('status' => $this->input->post('value', TRUE)), array($this->pk => $id_headline));
    }

    // Tambah
    public function tambah()
    {
        $data_blogs = $this->crud->gao('blogs', 'uat DESC');
        $blogs = array('' => '');
        foreach ($data_blogs as $item) {
            $blogs[$item->id_blog] = $item->judul_id;
        }
        $data = array(  'title' => 'Tambah Headline',
                        'jml'   => jml_nav(),
                        'blogs' => $blogs,
                        'isi'   => 'adminpage/headline/tambah');

        $valid = $this->form_validation;
        $valid->set_error_delimiters('<i style="color: red;">', '</i>');
        $valid->set_rules('judul', 'judul', 'required|trim|strip_tags|htmlspecialchars');
        $valid->set_rules('judul_en', 'judul (Inggris)', 'required|trim|strip_tags|htmlspecialchars');
        $valid->set_rules('deskripsi', 'Deskripsi', 'trim|strip_tags|htmlspecialchars');
        $valid->set_rules('deskripsi_en', 'Deskripsi (Inggris)', 'trim|strip_tags|htmlspecialchars');
        $valid->set_rules('id_blog', 'Blog', 'trim|strip_tags|htmlspecialchars');
        $valid->set_rules('external', 'External', 'trim|strip_tags|htmlspecialchars');

        if ($valid->run() === FALSE) $this->load->view('adminpage/_layout/wrapper', $data);
        else
        {
            // Mekanisme upload gambar
            $gambar = upload_image('gambar', 'tambah', 'headline', '', $data);

            // Masuk ke database
            if ($gambar !== FALSE)
            {
                $data_id = acak_id($this->table, $this->pk);
                $input = $this->input->post(NULL, TRUE);
                $urutan = 1;
                do { // menentukan urutan: mengisi urutan jika kosong
                    $ada = $this->crud->gd($this->table, array('urutan' => $urutan));
                    $urutan++;
                } while ($ada);
                $data = array(  'id_headline'     => $data_id['id'],
                                'judul'         => $input['judul'],
                                'judul_en'         => $input['judul_en'],
                                'deskripsi'     => $input['deskripsi'],
                                'deskripsi_en'     => $input['deskripsi_en'],
                                'id_blog'       => $input['id_blog'],
                                'external'       => $input['external'],
                                'status'        => $input['status'],
                                'gambar'        => $gambar,
                                'urutan'        => $urutan-1,
                                'iat'           => date('Y-m-d H:i:s'));
                $this->crud->i($this->table, $data);
                $this->session->set_flashdata('sukses', 'Headline berhasil ditambah.');
                redirect(admin_url('headline'));
            }
        }
    }

    // Update
    public function edit($id_headline = NULL)
    {

        $headline = $this->crud->gd($this->table, array($this->pk => $id_headline));

        $data_blogs = $this->crud->gao('blogs', 'uat DESC');
        $blogs = array('' => '');
        foreach ($data_blogs as $item) {
            $blogs[$item->id_blog] = $item->judul_id;
        }

        // Mengecek jika ID tidak valid
        if (empty($headline)) view_error('Error 404');

        $data = array(  'title' => 'Edit Headline',
                        'data'  => $headline,
                        'blogs'  => $blogs,
                        'jml'   => jml_nav(),
                        'isi'   => 'adminpage/headline/edit');

        $valid = $this->form_validation;
        $valid->set_error_delimiters('<i style="color: red;">', '</i>');
        $valid->set_rules('judul', 'judul', 'required|trim|strip_tags|htmlspecialchars');
        $valid->set_rules('judul_en', 'judul (Inggris)', 'required|trim|strip_tags|htmlspecialchars');
        $valid->set_rules('deskripsi', 'Deskripsi', 'trim|strip_tags|htmlspecialchars');
        $valid->set_rules('deskripsi_en', 'Deskripsi (Inggris)', 'trim|strip_tags|htmlspecialchars');
        $valid->set_rules('id_blog', 'Blog', 'trim|strip_tags|htmlspecialchars');
        $valid->set_rules('external', 'External', 'trim|strip_tags|htmlspecialchars');

        if ($valid->run() === FALSE) $this->load->view('adminpage/_layout/wrapper', $data);
        else
        {
            // Mekanisme upload gambar
            $gambar = upload_image('gambar', 'edit', 'headline', $headline->gambar, $data);

            // Masuk ke database
            if ($gambar !== FALSE)
            {
                $input = $this->input->post(NULL, TRUE);
                $data = array(  'id_headline'   => $id_headline,
                                'judul'         => $input['judul'],
                                'judul_en'         => $input['judul_en'],
                                'deskripsi'     => $input['deskripsi'],
                                'deskripsi_en'     => $input['deskripsi_en'],
                                'id_blog'       => $input['id_blog'],
                                'external'       => $input['external'],
                                'status'        => $input['status'],
                                'gambar'        => $gambar,
                                'uat'           => date('Y-m-d H:i:s'));
                $this->crud->u($this->table, $data, array($this->pk => $id_headline));
                $this->session->set_flashdata('sukses', 'Headline berhasil diperbarui.');
                redirect(admin_url('headline'));
            }
        }
    }

    // Hapus
    public function hapus($id_headline = NULL)
    {
        if ($this->session->akses_level == 'Blocked') view_error('Error 404');

        $cek = $this->crud->gd($this->table, array($this->pk => $id_headline));
        if ($this->input->get('act', TRUE) == $id_headline && ! empty($cek))
        {
            if ($cek->gambar != '')
            {
                unlink('./'.upload_path('headline').$cek->gambar);
                unlink('./'.upload_path('headline').'thumbs/'.$cek->gambar);
            }
            $this->crud->d($this->table, array($this->pk => $id_headline));
            $this->session->set_flashdata('sukses', 'Data berhasil dihapus.');
            redirect(admin_url('headline'));
        }
        else
        {
            $this->session->set_flashdata('gagal', 'Data gagal dihapus.');
            redirect(admin_url('headline'));
        }
    }
}
