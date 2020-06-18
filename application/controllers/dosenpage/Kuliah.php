<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kuliah extends Dosen_Controller {

    private $table = 'kuliah';
    private $pk = 'id_kuliah';

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
        $kuliah = $this->model_join->get_kuliah($bio->nip, $_load);
        $data = array(  'title'         => 'Daftar Mata Kuliah '.$bio->nama_dosen,
                        'data'          => $kuliah,
                        'isi'           => 'dosenpage/kuliah/list');
        $this->load->view('dosenpage/_layout/wrapper', $data);
    }

    // Tambah
    public function tambah()
    {
        if ($this->session->akses_level == 'Blocked') view_error('Error 404', 404, 'dosenpage');

        $bio = $this->crud_fakultas->gd('dosen',array('nip' => $this->session->username));
        $dosen = $this->crud_fakultas->ga("dosen");
        $data = array(  'title'         => 'Tambah Mata Kuliah',
                        'ketua'         => $bio,
                        'dosen'			=> $dosen,
                        'isi'           => 'dosenpage/kuliah/tambah');

        $valid = $this->form_validation;
        $valid->set_error_delimiters('<i style="color: red;">', '</i>');
        $valid->set_rules('judul_id', 'Mata Kuliah (Indonesia)', 'required|trim|strip_tags|htmlspecialchars');
        $valid->set_rules('judul_en', 'Mata Kuliah (Inggris)', 'required|trim|strip_tags|htmlspecialchars');
        $valid->set_rules('kode', 'Kode', 'trim|strip_tags|htmlspecialchars');
        $valid->set_rules('program', 'Program', 'trim|strip_tags|htmlspecialchars');
        $valid->set_rules('semester', 'Semester', 'trim|strip_tags|htmlspecialchars');
        $valid->set_rules('sks', 'SKS', 'trim|strip_tags|htmlspecialchars');
        
        if ($valid->run() === FALSE) $this->load->view('dosenpage/_layout/wrapper', $data);
        else
        {
            $data_id = acak_elektro('kuliah', 'id_kuliah');
        	$input = $this->input->post(NULL, TRUE);

            $data = array(  'id_kuliah'                => $data_id['id'],
                            'mata_kuliah'       => $input['judul_id'],
                            'mata_kuliah_en'    => $input['judul_en'],
                            'kode'              => $input['kode'],
                            'program'           => $input['program'],
                            'nip'               => $bio->nip,
                            'nama_dosen'        => $bio->nama_dosen,
                            'semester'          => $input['semester'],
                            'sks'               => $input['sks']);
            $this->crud_fakultas->i('kuliah', $data);

            $this->session->set_flashdata('sukses', 'Halaman berhasil ditambah.');
            redirect(dosen_url('kuliah'));
        }
    }

    // Update
    public function edit($id_kuliah = NULL)
    {
        if ($this->session->akses_level == 'Blocked') view_error('Error 404', 404, 'dosenpage');

        $dosen = $this->crud_fakultas->ga("dosen");
        $kuliah = $this->crud_fakultas->gd($this->table, array($this->pk => $id_kuliah));
        // Mengecek jika ID tidak valid
        if (empty($kuliah)) view_error('Error 404', 404, 'dosenpage');
        
        $data = array(  'title'         => 'Edit Mata Kuliah',
                        'data'          => $kuliah,
                        'dosen'			=> $dosen,
                        'isi'           => 'dosenpage/kuliah/edit');
        
        $valid = $this->form_validation;
        $valid->set_error_delimiters('<i style="color: red;">', '</i>');
        $valid->set_rules('judul_id', 'Mata Kuliah (Indonesia)', 'required|trim|strip_tags|htmlspecialchars');
        $valid->set_rules('judul_en', 'Mata Kuliah (Inggris)', 'required|trim|strip_tags|htmlspecialchars');
        $valid->set_rules('kode', 'Kode', 'trim|strip_tags|htmlspecialchars');
        $valid->set_rules('program', 'Program', 'trim|strip_tags|htmlspecialchars');
        $valid->set_rules('semester', 'Semester', 'trim|strip_tags|htmlspecialchars');
        $valid->set_rules('sks', 'SKS', 'trim|strip_tags|htmlspecialchars');
        
        if ($valid->run() === FALSE) $this->load->view('dosenpage/_layout/wrapper', $data);
        else
        {
        	$input = $this->input->post(NULL, TRUE);

            $data = array(  'mata_kuliah'       => $input['judul_id'],
                            'mata_kuliah_en'    => $input['judul_en'],
                            'kode'              => $input['kode'],
                            'program'           => $input['program'],
                            'semester'          => $input['semester'],
                            'sks'               => $input['sks']);
            $this->crud_fakultas->u('kuliah', $data, array($this->pk => $id_kuliah));

            $this->session->set_flashdata('sukses', 'Halaman berhasil ditambah.');
            redirect(dosen_url('kuliah'));
        }
    }

    // Hapus
    public function hapus($id_kuliah = NULL)
    {
        if ($this->session->akses_level == 'Blocked') view_error('Error 404', 404, 'dosenpage');

        $cek = $this->crud_fakultas->gd($this->table, array($this->pk => $id_kuliah));
        if ($this->input->get('act', TRUE) == $id_kuliah && ! empty($cek))
        {
            $this->crud_fakultas->d($this->table, array($this->pk => $id_kuliah));
            $this->session->set_flashdata('sukses', 'Data berhasil dihapus.');
            redirect(dosen_url('kuliah'));
        }
        else
        {
            $this->session->set_flashdata('gagal', 'Data gagal dihapus.');
            redirect(dosen_url('kuliah'));
        }
    }
}
