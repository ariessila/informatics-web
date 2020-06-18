<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Biodata extends Dosen_Controller {

    private $table = 'lab';
    private $pk = 'nip';

    // Load database
    public function __construct()
    {
        parent::__construct();
        $this->uauth->authorization('dosen');
    }

    // Index
    public function index()
    {
        $bio = $this->crud_fakultas->gd('dosen',array('nip' => $this->session->username));
        $this->load->library('image_dosen');
        $load_manager = $this->image_dosen->load_manager('img', upload_url('imagemanager').'article/small/no_image.png');

        $data = array(  'title'         => 'Bioadata Dosen',
                        'data'          => $bio,
                        'load_manager'  => $load_manager['config'],
                        'jabatan'  => $this->config->item("jabatan"),
                        'isi'           => 'dosenpage/biodata/biodata');
        $this->load->view('dosenpage/_layout/wrapper', $data);
    }

    // Update
    public function edit($nip = NULL)
    {
        if ($this->session->akses_level == 'Blocked') view_error('Error 404', 404, 'dosenpage');

        $bio = $this->crud_fakultas->gd('dosen',array('nip' => $this->session->username));
        
        // Mengecek jika ID tidak valid

        $data = array(  'title'         => 'Bioadata Dosen',
                        'data'          => $bio,
                        'jabatan'  => $this->config->item("jabatan"),
                        'isi'           => 'dosenpage/biodata/biodata');

        $valid = $this->form_validation;
        $valid->set_error_delimiters('<i style="color: red;">', '</i>');
        $valid->set_rules('nama', 'Nama Lengkap Tanpa Gelar', 'required|trim|strip_tags|htmlspecialchars');
        $valid->set_rules('gelar_depan', 'Gelar Depan', 'trim|strip_tags|htmlspecialchars');
        $valid->set_rules('gelar_belakang', 'Gelar Belakang', 'trim|strip_tags|htmlspecialchars');
        $valid->set_rules('nidn', 'NIDN', 'trim|strip_tags|htmlspecialchars');
        $valid->set_rules('nip', 'NIP', 'required|trim|strip_tags|htmlspecialchars');
        $valid->set_rules('jabatan', 'Jabatan Akademik', 'trim|strip_tags|htmlspecialchars');
        $valid->set_rules('email', 'Email', 'required|trim|strip_tags|htmlspecialchars');
        $valid->set_rules('keahlian', 'Bidang Keahlian', 'trim|strip_tags|htmlspecialchars');
        $valid->set_rules('s1', 'Universitas(S1)', 'trim|strip_tags|htmlspecialchars');
        $valid->set_rules('s2', 'Universitas(S2)', 'trim|strip_tags|htmlspecialchars');
        $valid->set_rules('s3', 'Universitas(S3)', 'trim|strip_tags|htmlspecialchars');

        if ($valid->run() === FALSE) $this->load->view('dosenpage/_layout/wrapper', $data);
        else
        {
            // Mekanisme upload gambar
            //$gambar = upload_image('gambar', 'tambah', 'blogs', '', $data);
            $file = upload_image('nama_file', 'tambah', 'dosen', '', $data);
            
            // // Masuk ke database
            if ($gambar !== FALSE)
            {
                $input = $this->input->post(NULL, TRUE);
                $data = array(  'nip'               => $input['nip'],
                                'nidn'              => $input['nidn'],
                                'nama_dosen'        => $input['nama'],
                                'gelar_depan'       => $input['gelar_depan'],
                                'gelar_belakang'    => $input['gelar_belakang'],
                                'jabatan_dosen'     => $input['jabatan'],
                                'email_dosen'       => $input['email'],
                                'bidang_penelitian' => $input['keahlian'],
                                'foto_dosen'        => $file,
                                's1'                => $input['s1'],
                                's2'                => $input['s2'],
                                's3'                => $input['s3']);
                $this->crud_fakultas->u('dosen', $data, array($this->pk => $nip));
                $this->session->set_flashdata('sukses', 'halaman berhasil diperbarui.');
                redirect(dosen_url('biodata'));
            }
        }
    }

    // Hapus
    public function edit_pass($nip = NULL)
    {
        if ($this->session->akses_level == 'Blocked') view_error('Error 404', 404, 'dosenpage');
        
        
        $input = $this->input->post(NULL, TRUE);
        $data = array(  'password'  => do_hash($input['password']));
        $this->crud->u('users', $data, array('username' => $nip));
        $this->session->set_flashdata('sukses', 'halaman berhasil diperbarui.');
        redirect(dosen_url('biodata'));
    }
}
