<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penelitian extends Dosen_Controller {

    private $table = 'penelitian';
    private $pk = 'id_penelitian';

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
        $penelitian = $this->model_join->get_penelitian($bio->nama_dosen, $_load);
        $data = array(  'title'         =>'Daftar Penelitian '.$bio->nama_dosen,
                        'data'       => $penelitian,
                        'isi'           => 'dosenpage/penelitian/list');
        $this->load->view('dosenpage/_layout/wrapper', $data);
    }

    // Tambah
    public function tambah()
    {
        if ($this->session->akses_level == 'Blocked') view_error('Error 404', 404, 'dosenpage');

        $bio = $this->crud_fakultas->gd('dosen',array('nip' => $this->session->username));
        $lab = $this->crud->ga("lab");
        $dosen = $this->crud_fakultas->ga("dosen");
        $this->load->library('image_dosen');
        $load_manager = $this->image_dosen->load_manager('img', upload_url('imagemanager').'article/small/no_image.png');
        $data = array(  'title'         => 'Tambah Penelitian',
                        'lab'           => $lab,
                        'ketua'         => $bio,
                        'dosen'			=> $dosen,
                        'load_manager'  => $load_manager['config'],
                        'isi'           => 'dosenpage/penelitian/tambah');

        $valid = $this->form_validation;
        $valid->set_error_delimiters('<i style="color: red;">', '</i>');
        $valid->set_rules('judul_id', 'Judul Penelitian (Indonesia)', 'required|trim|strip_tags|htmlspecialchars');
        $valid->set_rules('judul_en', 'Judul Penelitian (Inggris)', 'required|trim|strip_tags|htmlspecialchars');
        $valid->set_rules('nama_lab', 'Nama Laboratorium', 'trim|strip_tags|htmlspecialchars');
        $valid->set_rules('tahun', 'Tahun Penelitian', 'required|trim|strip_tags|htmlspecialchars');
        $valid->set_rules('ketua', 'Peniliti 1', 'required|trim|strip_tags|htmlspecialchars');
        $valid->set_rules('anggota1', 'Peneliti 2', 'trim|strip_tags|htmlspecialchars');
        $valid->set_rules('anggota2', 'Peneliti 3', 'trim|strip_tags|htmlspecialchars');
        $valid->set_rules('anggota3', 'Peneliti 4', 'trim|strip_tags|htmlspecialchars');
        $valid->set_rules('anggota4', 'Peneliti 5', 'trim|strip_tags|htmlspecialchars');
        $valid->set_rules('abstrak_id', 'Abstrak (Indonesia)', 'trim|strip_tags|htmlspecialchars');
        $valid->set_rules('abstrak_en', 'Abstrak (Inggris)', 'trim|strip_tags|htmlspecialchars');
        $valid->set_rules('tujuan_id', 'Tujuan (Indonesia)', 'trim|strip_tags|htmlspecialchars');
        $valid->set_rules('tujuan_en', 'Tujuan (Inggris)', 'trim|strip_tags|htmlspecialchars');
        $valid->set_rules('manfaat_id', 'Manfaat (Indonesia)', 'trim|strip_tags|htmlspecialchars');
        $valid->set_rules('manfaat_en', 'Manfaat (Inggris)', 'trim|strip_tags|htmlspecialchars');
        $valid->set_rules('hasil_id', 'Hasil (Indonesia)', 'trim|strip_tags|htmlspecialchars');
        $valid->set_rules('hasil_en', 'Hasil (Inggris)', 'trim|strip_tags|htmlspecialchars');
        $valid->set_rules('grant', 'Grant', 'trim|strip_tags|htmlspecialchars');
        $valid->set_rules('sumber_dana', 'Sumber Dana', 'trim|strip_tags|htmlspecialchars');
        $valid->set_rules('kata_kunci', 'Kata Kunci', 'trim|strip_tags|htmlspecialchars');
        $valid->set_rules('durasi', 'Durasi', 'trim|strip_tags|htmlspecialchars');

        if ($valid->run() === FALSE) $this->load->view('dosenpage/_layout/wrapper', $data);
        else
        {
            // Mekanisme upload gambar
            // $gambar = upload_image('gambar', 'tambah', 'blogs', '', $data);
            
            $file = upload_image('nama_file', 'tambah', 'file', '', $data);
            
            // Masuk ke database
            if ($file !== FALSE)
            {
                $data_id = acak_elektro('penelitian', 'id_penelitian');
            	$input = $this->input->post(NULL, TRUE);
                $anggota[0] = $input['anggota1'];
                $anggota[1] = $input['anggota2'];
                $anggota[2] = $input['anggota3'];
                $anggota[3] = $input['anggota4'];
                
                $data = array(  'id_penelitian'             => $data_id['id'],
                                'judul_penelitian'          => $input['judul_id'],
                                'judul_en'                  => $input['judul_en'],
                                'ketua_penelitian'          => $input['ketua'],
                                'nip'                       => $bio->nip,
                                'tahun_penelitian'          => $input['tahun'],
                                'sumber_dana'               => $input['sumber_dana'],
                                'abstrak'                   => $input['abstrak_id'],
                                'abstrak_en'                => $input['abstrak_en'],
                                'abstrak_img'               => $file,
                                'durasi_penelitian'         => $input['durasi'],
                                'nama_lab'                  => $input['nama_lab'],
                                'grant_abstrak'             => $input['grant'],
                                'tujuan_penilitian'         => $input['tujuan_id'],
                                'tujuan_penelitian_en'      => $input['tujuan_en'],
                                'hasil_penilitian'          => $input['hasil_id'],
                                'hasil_penelitian_en'       => $input['hasil_en'],
                                'manfaat_penilitian'        => $input['manfaat_id'],
                                'manfaat_penelitian_en'     => $input['manfaat_en'],
                                'kata_kunci'                => $input['kata_kunci']);
                $this->crud_fakultas->i('penelitian', $data);

                foreach($anggota as $dosen){
                    if(!empty($dosen)){
                        $data1 = array( 'id_penelitian' => $data_id['id'],
                                        'nama_dosen'  => $dosen);
                        $this->crud_fakultas->i('penelitian_anggota', $data1);
                    }
                }

                $this->session->set_flashdata('sukses', 'Halaman berhasil ditambah.');
                redirect(dosen_url('penelitian'));
            }
        }
    }

    // Update
    public function edit($id_penelitian = NULL)
    {
        if ($this->session->akses_level == 'Blocked') view_error('Error 404', 404, 'dosenpage');

        $penelitian = $this->crud_fakultas->gd($this->table, array($this->pk => $id_penelitian));
        // Mengecek jika ID tidak valid
        if (empty($penelitian)) view_error('Error 404', 404, 'dosenpage');
        
        $dosen = $this->crud_fakultas->ga('dosen');
        $lab = $this->crud->ga("lab");

        $this->load->library('image_dosen');
        $load_manager = $this->image_dosen->load_manager('img', upload_url('imagemanager').'article/small/no_image.png');

        $data = array(  'title' => 'Edit Penelitian',
                        'data'  => $penelitian,
                        'lab'   => $lab,
                        'dosen' => $dosen,
                        'load_manager'  => $load_manager['config'],
                        'isi'   => 'dosenpage/penelitian/edit');

        $valid = $this->form_validation;
        $valid->set_error_delimiters('<i style="color: red;">', '</i>');
        $valid->set_rules('judul_id', 'Judul Penelitian (Indonesia)', 'required|trim|strip_tags|htmlspecialchars');
        $valid->set_rules('judul_en', 'Judul Penelitian (Inggris)', 'required|trim|strip_tags|htmlspecialchars');
        $valid->set_rules('nama_lab', 'Nama Laboratorium', 'trim|strip_tags|htmlspecialchars');
        $valid->set_rules('tahun', 'Tahun Penelitian', 'required|trim|strip_tags|htmlspecialchars');
        $valid->set_rules('ketua', 'Peniliti 1', 'required|trim|strip_tags|htmlspecialchars');
        $valid->set_rules('anggota1', 'Peneliti 2', 'trim|strip_tags|htmlspecialchars');
        $valid->set_rules('anggota2', 'Peneliti 3', 'trim|strip_tags|htmlspecialchars');
        $valid->set_rules('anggota3', 'Peneliti 4', 'trim|strip_tags|htmlspecialchars');
        $valid->set_rules('anggota4', 'Peneliti 5', 'trim|strip_tags|htmlspecialchars');
        $valid->set_rules('abstrak_id', 'Abstrak (Indonesia)', 'trim|strip_tags|htmlspecialchars');
        $valid->set_rules('abstrak_en', 'Abstrak (Inggris)', 'trim|strip_tags|htmlspecialchars');
        $valid->set_rules('tujuan_id', 'Tujuan (Indonesia)', 'trim|strip_tags|htmlspecialchars');
        $valid->set_rules('tujuan_en', 'Tujuan (Inggris)', 'trim|strip_tags|htmlspecialchars');
        $valid->set_rules('manfaat_id', 'Manfaat (Indonesia)', 'trim|strip_tags|htmlspecialchars');
        $valid->set_rules('manfaat_en', 'Manfaat (Inggris)', 'trim|strip_tags|htmlspecialchars');
        $valid->set_rules('hasil_id', 'Hasil (Indonesia)', 'trim|strip_tags|htmlspecialchars');
        $valid->set_rules('hasil_en', 'Hasil (Inggris)', 'trim|strip_tags|htmlspecialchars');
        $valid->set_rules('grant', 'Grant', 'trim|strip_tags|htmlspecialchars');
        $valid->set_rules('sumber_dana', 'Sumber Dana', 'trim|strip_tags|htmlspecialchars');
        $valid->set_rules('kata_kunci', 'Kata Kunci', 'trim|strip_tags|htmlspecialchars');
        $valid->set_rules('durasi', 'Durasi', 'trim|strip_tags|htmlspecialchars');

        if ($valid->run() === FALSE) $this->load->view('dosenpage/_layout/wrapper', $data);
        else
        {
            // Mekanisme upload gambar
            // $gambar = upload_image('gambar', 'tambah', 'blogs', '', $data);
            
            $file = upload_image('nama_file', 'edit', 'file', '', $data);

            // Masuk ke database
            if ($file !== FALSE)
            {
            	$input = $this->input->post(NULL, TRUE);
                $anggota[0] = $input['anggota1'];
                $anggota[1] = $input['anggota2'];
                $anggota[2] = $input['anggota3'];
                $anggota[3] = $input['anggota4'];

                $data = array(  'judul_penelitian'          => $input['judul_id'],
                                'judul_en'                  => $input['judul_en'],
                                'ketua_penelitian'          => $input['ketua'],
                                'nip'                       => $bio->nip,
                                'tahun_penelitian'          => $input['tahun'],
                                'sumber_dana'               => $input['sumber_dana'],
                                'abstrak'                   => $input['abstrak_id'],
                                'abstrak_en'                => $input['abstrak_en'],
                                'abstrak_img'               => $file,
                                'durasi_penelitian'         => $input['durasi'],
                                'nama_lab'                  => $input['nama_lab'],
                                'grant_abstrak'             => $input['grant'],
                                'tujuan_penilitian'         => $input['tujuan_id'],
                                'tujuan_penelitian_en'      => $input['tujuan_en'],
                                'hasil_penilitian'          => $input['hasil_id'],
                                'hasil_penelitian_en'       => $input['hasil_en'],
                                'manfaat_penilitian'        => $input['manfaat_id'],
                                'manfaat_penelitian_en'     => $input['manfaat_en'],
                                'kata_kunci'                => $input['kata_kunci']);
                $this->crud_fakultas->u('penelitian', $data, array($this->pk => $id_penelitian));
                
                $row = $this->crud_fakultas->cw('penelitian_anggota', array($this->pk => $id_penelitian));
                if($row>0){
                    $this->crud_fakultas->d('penelitian_anggota', array($this->pk => $id_penelitian));
                }
                
                foreach($anggota as $dosen){
                    if(!empty($dosen)){
                        $data1 = array( 'id_penelitian' =>  $id_penelitian,
                                        'nama_dosen'  => $dosen);
                        $this->crud_fakultas->i('penelitian_anggota', $data1);
                    }
                }

                $this->session->set_flashdata('sukses', 'Halaman berhasil ditambah.');
                redirect(dosen_url('penelitian'));
            }
        }
    }

    // Hapus
    public function hapus($id_penelitian = NULL)
    {
        if ($this->session->akses_level == 'Blocked') view_error('Error 404', 404, 'dosenpage');

        $cek = $this->crud_fakultas->gd($this->table, array($this->pk => $id_penelitian));
        if ($this->input->get('act', TRUE) == $id_penelitian && ! empty($cek))
        {
            $this->crud_fakultas->d($this->table, array($this->pk => $id_penelitian));
            $this->crud_fakultas->d('penelitian_anggota', array($this->pk => $id_penelitian));
            $this->session->set_flashdata('sukses', 'Data berhasil dihapus.');
            redirect(dosen_url('penelitian'));
        }
        else
        {
            $this->session->set_flashdata('gagal', 'Data gagal dihapus.');
            redirect(dosen_url('penelitian'));
        }
    }
}
