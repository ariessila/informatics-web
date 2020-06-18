<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Staff extends Admin_Controller {

    private $table = 'pengelola';
    private $pk = 'nip';

    // Load database
    public function __construct()
    {
        parent::__construct();
    }

    // Index
    public function index()
    {
        
        $staff = $this->crud_fakultas->ga('pengelola');
        $data = array(  'title'         => 'Daftar Staff',
                        'data'          => $staff,
                        'isi'           => 'adminpage/staff/list');
        $this->load->view('adminpage/_layout/wrapper', $data);
    }

    // Tambah
    public function tambah()
    {
        if ($this->session->akses_level == 'Blocked') view_error('Error 404', 404, 'adminpage');

        $this->load->library('image_manager');
        $load_manager = $this->image_manager->load_manager('img', upload_url('imagemanager').'article/small/no_image.png');
        $data = array(  'title'         => 'Tambah Staff',
                        'load_manager'  => $load_manager['config'],
                        'isi'           => 'adminpage/staff/tambah');

        $valid = $this->form_validation;
        $valid->set_error_delimiters('<i style="color: red;">', '</i>');
        $valid->set_rules('nip', 'NIP', 'required|trim|strip_tags|htmlspecialchars');
        $valid->set_rules('nama', 'Nama Staff', 'required|trim|strip_tags|htmlspecialchars');
        $valid->set_rules('jabatan', 'Jabatan', 'trim|strip_tags|htmlspecialchars');
        
        if ($valid->run() === FALSE) $this->load->view('adminpage/_layout/wrapper', $data);
        else
        {
            // Mekanisme upload gambar
            // $gambar = upload_image('gambar', 'tambah', 'blogs', '', $data);
            
            $file = upload_image('nama_file', 'tambah', 'staff', '', $data);
            
            // Masuk ke database
            if ($file !== FALSE)
            {
                $input = $this->input->post(NULL, TRUE);                
                $data = array(  'nip'                     => $input['nip'],
                                'nama_pengelola'          => $input['nama'],
                                'jabatan_pengelola'       => $input['jabatan'],
                                'foto_pengelola'          => $file);
                $this->crud_fakultas->i('pengelola', $data);

                $this->session->set_flashdata('sukses', 'Halaman berhasil ditambah.');
                redirect(admin_url('staff'));
            }
        }
    }

    // Update
    public function edit($id_staff = NULL)
    {
        if ($this->session->akses_level == 'Blocked') view_error('Error 404', 404, 'adminpage');

        $staff = $this->crud_fakultas->gd($this->table, array($this->pk => $id_staff));
        // Mengecek jika ID tidak valid
        if (empty($staff)) view_error('Error 404', 404, 'adminpage');

        $this->load->library('image_manager');
        $load_manager = $this->image_manager->load_manager('img', upload_url('imagemanager').'article/small/no_image.png');
        
        $data = array(  'title'         => 'Edit Data staff',
                        'data'          => $staff,
                        'load_manager'  => $load_manager['config'],
                        'isi'           => 'adminpage/staff/edit');
        
        $valid = $this->form_validation;
        $valid->set_error_delimiters('<i style="color: red;">', '</i>');
        $valid->set_rules('nip', 'NIP', 'required|trim|strip_tags|htmlspecialchars');
        $valid->set_rules('nama', 'Nama Staff', 'required|trim|strip_tags|htmlspecialchars');
        $valid->set_rules('jabatan', 'Jabatan', 'trim|strip_tags|htmlspecialchars');
        
        if ($valid->run() === FALSE) $this->load->view('adminpage/_layout/wrapper', $data);
        else
        {
        	// Mekanisme upload gambar
            // $gambar = upload_image('gambar', 'tambah', 'blogs', '', $data);
            
            $file = upload_image('nama_file', 'edit', 'staff', '', $data);
            
            // Masuk ke database
            if ($file !== FALSE)
            {
                $input = $this->input->post(NULL, TRUE);                
                $data = array(  'nip'                     => $input['nip'],
                                'nama_pengelola'          => $input['nama'],
                                'jabatan_pengelola'       => $input['jabatan'],
                                'foto_pengelola'          => $file);
                $this->crud_fakultas->u('pengelola', $data, array($this->pk => $id_staff));

                $this->session->set_flashdata('sukses', 'Halaman berhasil diupdate.');
                redirect(admin_url('staff'));
            }
        }
    }

    // Hapus
    public function hapus($id_staff = NULL)
    {
        if ($this->session->akses_level == 'Blocked') view_error('Error 404', 404, 'adminpage');

        $cek = $this->crud_fakultas->gd($this->table, array($this->pk => $id_staff));
        if ($this->input->get('act', TRUE) == $id_staff && ! empty($cek))
        {
            $this->crud_fakultas->d($this->table, array($this->pk => $id_staff));
            $this->session->set_flashdata('sukses', 'Data berhasil dihapus.');
            redirect(admin_url('staff'));
        }
        else
        {
            $this->session->set_flashdata('gagal', 'Data gagal dihapus.');
            redirect(admin_url('staff'));
        }
    }
}
