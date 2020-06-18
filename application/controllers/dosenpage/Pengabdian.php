<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengabdian extends Dosen_Controller {

    private $table = 'pengabdian';
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
        $pengabdian = $this->model_join->get_pengabdian($bio->nama_dosen, $_load);
        $data = array(  'title'         => 'Daftar Pengabdian '.$bio->nama_dosen,
                        'data'          => $pengabdian,
                        'isi'           => 'dosenpage/pengabdian/list');
        $this->load->view('dosenpage/_layout/wrapper', $data);
    }

    // Tambah
    public function tambah()
    {
        if ($this->session->akses_level == 'Blocked') view_error('Error 404', 404, 'dosenpage');

        $bio = $this->crud_fakultas->gd('dosen',array('nip' => $this->session->username));
        $dosen = $this->crud_fakultas->ga("dosen");
        $data = array(  'title'         => 'Tambah Pengabdian',
                        'ketua'         => $bio,
                        'dosen'			=> $dosen,
                        'isi'           => 'dosenpage/pengabdian/tambah');

        $valid = $this->form_validation;
        $valid->set_error_delimiters('<i style="color: red;">', '</i>');
        $valid->set_rules('judul_id', 'Judul Pengabdian (Indonesia)', 'required|trim|strip_tags|htmlspecialchars');
        $valid->set_rules('judul_en', 'Judul Pengabdian (Inggris)', 'required|trim|strip_tags|htmlspecialchars');
        $valid->set_rules('sumber_dana', 'Sumber Dana', 'trim|strip_tags|htmlspecialchars');
        $valid->set_rules('tahun', 'Tahun Pengabdian', 'required|trim|strip_tags|htmlspecialchars');
        $valid->set_rules('ketua', 'Ketua', 'required|trim|strip_tags|htmlspecialchars');
        $valid->set_rules('anggota1', 'Anggota 2', 'trim|strip_tags|htmlspecialchars');
        $valid->set_rules('anggota2', 'Anggota 3', 'trim|strip_tags|htmlspecialchars');
        $valid->set_rules('anggota3', 'Anggota 4', 'trim|strip_tags|htmlspecialchars');
        $valid->set_rules('anggota4', 'Anggota 5', 'trim|strip_tags|htmlspecialchars');
        
        if ($valid->run() === FALSE) $this->load->view('dosenpage/_layout/wrapper', $data);
        else
        {
            $data_id = acak_elektro('pengabdian', 'id');
        	$input = $this->input->post(NULL, TRUE);
            $anggota[0] = $input['anggota1'];
            $anggota[1] = $input['anggota2'];
            $anggota[2] = $input['anggota3'];
            $anggota[3] = $input['anggota4'];
            $nip = $bio->nip;

            $data = array(  'id'                => $data_id['id'],
                            'judul_pengabdian'  => $input['judul_id'],
                            'judul_en'          => $input['judul_en'],
                            'ketua'             => $input['ketua'],
                            'nip'               => $bio->nip,
                            'tahun'             => $input['tahun'],
                            'sumber_dana'       => $input['sumber_dana']);
            $this->crud_fakultas->i('pengabdian', $data);

            foreach($anggota as $dosen){
                if(!empty($dosen)){
                    $data1 = array( 'id_pengabdian' => $data_id['id'],
                                    'nama_dosen'  => $dosen);
                    $this->crud_fakultas->i('pengabdian_anggota', $data1);
                }
            }
            $this->session->set_flashdata('sukses', 'Halaman berhasil ditambah.');
            redirect(dosen_url('pengabdian'));
        }
    }

    // Update
    public function edit($id_pengabdian = NULL)
    {
        if ($this->session->akses_level == 'Blocked') view_error('Error 404', 404, 'dosenpage');

        $dosen = $this->crud_fakultas->ga("dosen");
        $pengabdian = $this->crud_fakultas->gd($this->table, array($this->pk => $id_pengabdian));
        // Mengecek jika ID tidak valid
        if (empty($pengabdian)) view_error('Error 404', 404, 'dosenpage');
        
        $data = array(  'title'         => 'Edit Pengabdian',
                        'data'          => $pengabdian,
                        'dosen'			=> $dosen,
                        'isi'           => 'dosenpage/pengabdian/edit');
        
        $valid = $this->form_validation;
        $valid->set_error_delimiters('<i style="color: red;">', '</i>');
        $valid->set_rules('judul_id', 'Judul Pengabdian (Indonesia)', 'required|trim|strip_tags|htmlspecialchars');
        $valid->set_rules('judul_en', 'Judul Pengabdian (Inggris)', 'required|trim|strip_tags|htmlspecialchars');
        $valid->set_rules('sumber_dana', 'Sumber Dana', 'trim|strip_tags|htmlspecialchars');
        $valid->set_rules('tahun', 'Tahun Pengabdian', 'required|trim|strip_tags|htmlspecialchars');
        $valid->set_rules('ketua', 'Ketua', 'required|trim|strip_tags|htmlspecialchars');
        $valid->set_rules('anggota1', 'Anggota 2', 'trim|strip_tags|htmlspecialchars');
        $valid->set_rules('anggota2', 'Anggota 3', 'trim|strip_tags|htmlspecialchars');
        $valid->set_rules('anggota3', 'Anggota 4', 'trim|strip_tags|htmlspecialchars');
        $valid->set_rules('anggota4', 'Anggota 5', 'trim|strip_tags|htmlspecialchars');
        
        if ($valid->run() === FALSE) $this->load->view('dosenpage/_layout/wrapper', $data);
        else
        {
        	$input = $this->input->post(NULL, TRUE);
            $anggota[0] = $input['anggota1'];
            $anggota[1] = $input['anggota2'];
            $anggota[2] = $input['anggota3'];
            $anggota[3] = $input['anggota4'];

            $data = array(  'judul_pengabdian'  => $input['judul_id'],
                            'judul_en'          => $input['judul_en'],
                            'ketua'             => $input['ketua'],
                            'tahun'             => $input['tahun'],
                            'sumber_dana'       => $input['sumber_dana']);
            $this->crud_fakultas->u('pengabdian', $data, array($this->pk => $id_pengabdian));

            $row = $this->crud_fakultas->cw('pengabdian_anggota', array($this->pk => $id_pengabdian));
                if($row>0){
                    $this->crud_fakultas->d('pengabdian_anggota', array($this->pk => $id_pengabdian));
            }

            foreach($anggota as $dosen){
                if(!empty($dosen)){
                    $data1 = array( 'id_pengabdian' => $id_pengabdian,
                                    'nama_dosen'  => $dosen);
                    $this->crud_fakultas->i('pengabdian_anggota', $data1);
                }
            }
            $this->session->set_flashdata('sukses', 'Halaman berhasil ditambah.');
            redirect(dosen_url('pengabdian'));
        }
    }

    // Hapus
    public function hapus($id_pengabdian = NULL)
    {
        if ($this->session->akses_level == 'Blocked') view_error('Error 404', 404, 'dosenpage');

        $cek = $this->crud_fakultas->gd($this->table, array($this->pk => $id_pengabdian));
        if ($this->input->get('act', TRUE) == $id_pengabdian && ! empty($cek))
        {
            $this->crud_fakultas->d($this->table, array($this->pk => $id_pengabdian));
            $this->crud_fakultas->d('pengabdian_anggota', array($this->pk => $id_pengabdian));
            $this->session->set_flashdata('sukses', 'Data berhasil dihapus.');
            redirect(dosen_url('pengabdian'));
        }
        else
        {
            $this->session->set_flashdata('gagal', 'Data gagal dihapus.');
            redirect(dosen_url('pengabdian'));
        }
    }
}
