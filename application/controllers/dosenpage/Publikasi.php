<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Publikasi extends Dosen_Controller {

    private $table = 'publikasi_dosen';
    private $pk = 'id';

    // Load database
    public function __construct()
    {
        parent::__construct();
    }

    // Index
    public function index()
    {
        $bio = $this->crud_fakultas->gd('dosen',array('nip' => $this->session->username));
        $_load = $this->load->database('fakultas', TRUE);
        $publikasi = $this->model_join->get_publikasi($bio->nama_dosen, $_load);
               
        $data = array(  'title'         => 'Daftar Publikasi '.$bio->nama_dosen,
                        'data'          => $publikasi,
                        'isi'           => 'dosenpage/publikasi/list');
        $this->load->view('dosenpage/_layout/wrapper', $data);
    }

    // Tambah
    public function tambah()
    {
        if ($this->session->akses_level == 'Blocked') view_error('Error 404', 404, 'dosenpage');

        $bio = $this->crud_fakultas->gd('dosen',array('nip' => $this->session->username));
        $dosen = $this->crud_fakultas->ga("dosen");
        $data = array(  'title'         => 'Tambah Publikasi',
                        'ketua'         => $bio,
                        'dosen'			=> $dosen,
                        'isi'           => 'dosenpage/publikasi/tambah');

        $valid = $this->form_validation;
        $valid->set_error_delimiters('<i style="color: red;">', '</i>');
        $valid->set_rules('judul_id', 'Judul Publikasi (Indonesia)', 'required|trim|strip_tags|htmlspecialchars');
        $valid->set_rules('judul_en', 'Judul Publikasi (Inggris)', 'required|trim|strip_tags|htmlspecialchars');
        $valid->set_rules('deskripsi_id', 'Deskripsi (Indonesia)', 'trim|strip_tags|htmlspecialchars');
        $valid->set_rules('deskripsi_en', 'Deskripsi (Inggris)', 'trim|strip_tags|htmlspecialchars');
        $valid->set_rules('tahun', 'Tahun publikasi', 'required|trim|strip_tags|htmlspecialchars');
        $valid->set_rules('ketua', 'Ketua', 'required|trim|strip_tags|htmlspecialchars');
        $valid->set_rules('anggota1', 'Anggota 2', 'trim|strip_tags|htmlspecialchars');
        $valid->set_rules('anggota2', 'Anggota 3', 'trim|strip_tags|htmlspecialchars');
        $valid->set_rules('anggota3', 'Anggota 4', 'trim|strip_tags|htmlspecialchars');
        $valid->set_rules('anggota4', 'Anggota 5', 'trim|strip_tags|htmlspecialchars');

        if ($valid->run() === FALSE) $this->load->view('dosenpage/_layout/wrapper', $data);
        else
        {
            $file = dosen_document('nama_file', 'tambah', 'file', '', $data);

            // Masuk ke database
            if ($file !== FALSE)
            {

                $data_id = acak_elektro('publikasi_dosen', 'id');
                $input = $this->input->post(NULL, TRUE);
                $anggota[0] = $input['anggota1'];
                $anggota[1] = $input['anggota2'];
                $anggota[2] = $input['anggota3'];
                $anggota[3] = $input['anggota4'];

                $data = array(  'id'                    => $data_id['id'],
                                'judul'                 => $input['judul_id'],
                                'judul_en'              => $input['judul_en'],
                                'oleh'                  => $input['ketua'],
                                'nip'                   => $bio->nip,
                                'tahun'       => $input['tahun'],
                                'deskripsi'             => $input['deskripsi_id'],
                                'deskripsi_en'          => $input['deskripsi_en'],
                                'nama_file'             => $input['judul_id'],
                                'link'                  => $file );
                $this->crud_fakultas->i('publikasi_dosen', $data);

                //publikasi ke halaman utama
                // $data2 = array(  'id_download'     => $data_id['id'],
                //                 'nama_file'       => $input['nama_file'],
                //                 'file'            => $file,
                //                 'iat'             => date('Y-m-d H:i:s'));
                // $this->crud->i('download', $data2);

                foreach($anggota as $dosen){
                    if(!empty($dosen)){
                        $data1 = array( 'id_publikasi_dosen' => $data_id['id'],
                                        'nama_dosen'  => $dosen);
                        $this->crud_fakultas->i('publikasi_dosen_anggota', $data1);
                    }
                }
                $this->session->set_flashdata('sukses', 'Halaman berhasil ditambah.');
                redirect(dosen_url('publikasi'));
            }
        }
    }

    // Update
    public function edit($id_publikasi = NULL)
    {
        if ($this->session->akses_level == 'Blocked') view_error('Error 404', 404, 'dosenpage');

        $publikasi = $this->crud_fakultas->gd($this->table, array($this->pk => $id_publikasi));
        
        // Mengecek jika ID tidak valid
        if (empty($publikasi)) view_error('Error 404', 404, 'dosenpage');
        $dosen = $this->crud_fakultas->ga("dosen");

        $data = array(  'title'         => 'Edit publikasi',
                        'data'          => $publikasi,
                        'dosen'			=> $dosen,
                        'isi'           => 'dosenpage/publikasi/edit');

        $valid = $this->form_validation;
        $valid->set_error_delimiters('<i style="color: red;">', '</i>');
        $valid->set_rules('judul_id', 'Judul Publikasi (Indonesia)', 'required|trim|strip_tags|htmlspecialchars');
        $valid->set_rules('judul_en', 'Judul Publikasi (Inggris)', 'required|trim|strip_tags|htmlspecialchars');
        $valid->set_rules('deskripsi_id', 'Deskripsi (Indonesia)', 'trim|strip_tags|htmlspecialchars');
        $valid->set_rules('deskripsi_en', 'Deskripsi (Inggris)', 'trim|strip_tags|htmlspecialchars');
        $valid->set_rules('tahun', 'Tahun publikasi', 'required|trim|strip_tags|htmlspecialchars');
        $valid->set_rules('ketua', 'Ketua', 'required|trim|strip_tags|htmlspecialchars');
        $valid->set_rules('anggota1', 'Anggota 2', 'trim|strip_tags|htmlspecialchars');
        $valid->set_rules('anggota2', 'Anggota 3', 'trim|strip_tags|htmlspecialchars');
        $valid->set_rules('anggota3', 'Anggota 4', 'trim|strip_tags|htmlspecialchars');
        $valid->set_rules('anggota4', 'Anggota 5', 'trim|strip_tags|htmlspecialchars');

        if ($valid->run() === FALSE) $this->load->view('dosenpage/_layout/wrapper', $data);
        else
        {
            $file = dosen_document('nama_file', 'edit', 'file', '', $data);

            // Masuk ke database
            if ($file !== FALSE)
            {
                $input = $this->input->post(NULL, TRUE);
                $anggota[0] = $input['anggota1'];
                $anggota[1] = $input['anggota2'];
                $anggota[2] = $input['anggota3'];
                $anggota[3] = $input['anggota4'];

                $data = array(  'judul'                 => $input['judul_id'],
                                'judul_en'              => $input['judul_en'],
                                'oleh'                  => $input['ketua'],
                                'nip'                   => $bio->nip,
                                'tahun'                 => $input['tahun'],
                                'deskripsi'             => $input['deskripsi_id'],
                                'deskripsi_en'          => $input['deskripsi_en'],
                                'nama_file'             => $input['judul_id'],
                                'link'                  => $file );
                $this->crud_fakultas->u('publikasi_dosen', $data, array($this->pk => $id_publikasi));

                //publikasi ke halaman utama
                // $data2 = array( 'nama_file'       => $input['nama_file'],
                //                 'file'            => $file,
                //                 'iat'             => date('Y-m-d H:i:s'));
                // $this->crud->u('download', $data2, array('id_download' => $id_publikasi));

                $row = $this->crud_fakultas->cw('publikasi_dosen_anggota', array($this->pk => $id_publikasi));
                if($row>0){
                    $this->crud_fakultas->d('publikasi_dosen_anggota', array($this->pk => $id_publikasi));
                }

                foreach($anggota as $dosen){
                    if(!empty($dosen)){
                        $data1 = array( 'id_publikasi_dosen' => $id_publikasi,
                                        'nama_dosen'  => $dosen);
                        $this->crud_fakultas->i('publikasi_dosen_anggota', $data1);
                    }
                }
                $this->session->set_flashdata('sukses', 'Halaman berhasil ditambah.');
                redirect(dosen_url('publikasi'));
            }
        }
    }

    // Hapus
    public function hapus($id_publikasi = NULL)
    {
        if ($this->session->akses_level == 'Blocked') view_error('Error 404', 404, 'dosenpage');

        $cek = $this->crud_fakultas->gd($this->table, array($this->pk => $id_publikasi));
        if ($this->input->get('act', TRUE) == $id_publikasi && ! empty($cek))
        {
            $this->crud_fakultas->d($this->table, array($this->pk => $id_publikasi));
            //delete data dari halaman utama
            // $this->crud->d('download', array('id_download' => $id_publikasi));
            $this->session->set_flashdata('sukses', 'Data berhasil dihapus.');
            redirect(dosen_url('publikasi'));
        }
        else
        {
            $this->session->set_flashdata('gagal', 'Data gagal dihapus.');
            redirect(dosen_url('publikasi'));
        }
    }
}
