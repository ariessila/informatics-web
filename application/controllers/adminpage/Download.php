<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Download extends Admin_Controller {

    private $table = 'download';
    private $pk = 'id_download';

    // Load database
    public function __construct()
    {
        parent::__construct();
        $this->uauth->authorization('admin');
    }

    // Index
    public function index()
    {
        
        $halaman = $this->crud->ga('download');
        $data = array(  'title'         => 'Daftar Unggahan',
                        'halaman'       => $halaman,
                        'jml'           => jml_nav(),
                        'isi'           => 'adminpage/download/list');
        $this->load->view('adminpage/_layout/wrapper', $data);
    }

    // Tambah
    public function tambah()
    {
        if ($this->session->akses_level == 'Blocked') view_error('Error 404');

        $this->load->library('image_manager');
        $load_manager = $this->image_manager->load_manager('img', upload_url('imagemanager').'article/small/no_image.png');
        $data = array(  'title'         => 'Tambah File',
                        'jml'           => jml_nav(),
                        'load_manager'  => $load_manager['config'],
                        'isi'           => 'adminpage/download/tambah');

        $valid = $this->form_validation;
        $valid->set_error_delimiters('<i style="color: red;">', '</i>');
        $valid->set_rules('nama_file', 'Nama Laboratorium (Indonesia)', 'required|trim|strip_tags|htmlspecialchars');
        $valid->set_rules('nama_file_en', 'Nama Laboratorium (Inggris)', 'required|trim|strip_tags|htmlspecialchars');

        if ($valid->run() === FALSE) $this->load->view('adminpage/_layout/wrapper', $data);
        else
        {
            // Mekanisme upload gambar
            // $gambar = upload_image('gambar', 'tambah', 'blogs', '', $data);
            
            $file = upload_document('foto', 'tambah', 'file', '', $data, TRUE);

            // Masuk ke database
            if ($file !== FALSE)
            {
                $input = $this->input->post(NULL,'', FALSE);
                $data = array(  'nama_file'       => $input['nama_file'],
                                'nama_file_en'       => $input['nama_file_en'],
                                'file'        => $file,
                                'iat'           => date('Y-m-d H:i:s'));
                $this->crud->i('download', $data);
                $this->session->set_flashdata('sukses', 'Halaman berhasil ditambah.');
                redirect(admin_url('Download'));
            }
        }
    }

    // Update
    public function edit($id_download = NULL)
    {
        $elektro = $this->load->database('fakultas', TRUE);
        if ($this->session->akses_level == 'Blocked') view_error('Error 404');

        $halaman = $this->crud->gd($this->table, array($this->pk => $id_download));
        $kategori = $elektro->query("SELECT * FROM dosen")->result();

        $this->load->library('image_manager');
        // Mengecek jika ID tidak valid
        if (empty($halaman)) view_error('Error 404');

        $data = array(  'title' => 'Edit Laboratorium',
                        'data'  => $halaman,
                        'jml'   => jml_nav(),
                        'kategori'  => $kategori,
                        'isi'   => 'adminpage/laboratorium/edit');

         $valid = $this->form_validation;
        $valid->set_error_delimiters('<i style="color: red;">', '</i>');
        $valid->set_rules('nama_id', 'Nama Laboratorium (Indonesia)', 'required|trim|strip_tags|htmlspecialchars');
        $valid->set_rules('nama_en', 'Nama Laboratorium (English)', 'required|trim|strip_tags|htmlspecialchars');
        $valid->set_rules('ketua', 'Ketua Laboratorium', 'required|trim|strip_tags|htmlspecialchars');
        $valid->set_rules('dosen[]', 'Staf Pengajar', 'required|trim|strip_tags|htmlspecialchars');

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
                $input = $this->input->post(NULL, FALSE);
                $input = $this->input->post(NULL,'', FALSE);
                $dosen = implode(',',$input['dosen']);
                $link_id = url_title($input['nama_id'], 'dash', TRUE);
                $link_en = url_title($input['nama_en'], 'dash', TRUE);
                $data = array(  'id_lab'    => $data_id['id'],
                                'lab_id'       => $input['nama_id'],
                                'lab_en'       => $input['nama_en'],
                                'isi_id'  => $input['deskripsi_id'],
                                'isi_en'  => $input['deskripsi_en'],
                                'slug_id'       => $link_id,
                                'slug_en'       => $link_en,
                                'ketua_lab'       => $input['ketua'],
                                'staf'         => $dosen);
                $this->crud->u($this->table, $data, array($this->pk => $id_download));
                $this->session->set_flashdata('sukses', 'halaman berhasil diperbarui.');
                redirect(admin_url('laboratorium'));
            }
        }
    }

    // Hapus
    public function hapus($id_download = NULL)
    {
        if ($this->session->akses_level == 'Blocked') view_error('Error 404');

        $cek = $this->crud->gd($this->table, array($this->pk => $id_download));
        if ($this->input->get('act', TRUE) == $id_download && ! empty($cek))
        {
            $this->crud->d($this->table, array($this->pk => $id_download));
            $this->session->set_flashdata('sukses', 'Data berhasil dihapus.');
            redirect(admin_url('Download'));
        }
        else
        {
            $this->session->set_flashdata('gagal', 'Data gagal dihapus.');
            redirect(admin_url('Download'));
        }
    }
}
