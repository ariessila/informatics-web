<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laboratorium extends Admin_Controller {

    private $table = 'lab';
    private $pk = 'id_lab';

    // Load database
    public function __construct()
    {
        parent::__construct();
    }

    // Index
    public function index()
    {
        
        $halaman = $this->db->query("SELECT * FROM lab")->result();
        $data = array(  'title'         => 'Daftar Laboratorium',
                        'halaman'       => $halaman,
                        'jml'           => jml_nav(),
                        'isi'           => 'adminpage/laboratorium/list');
        $this->load->view('adminpage/_layout/wrapper', $data);
    }

    // Tambah
    public function tambah()
    {
        $elektro = $this->load->database('fakultas', TRUE);
        if ($this->session->akses_level == 'Blocked') view_error('Error 404');

        $kategori = $elektro->query("SELECT * FROM dosen")->result();

        $this->load->library('image_manager');
        $load_manager = $this->image_manager->load_manager('img', upload_url('imagemanager').'article/small/no_image.png');
        $data = array(  'title'         => 'Tambah Laboratorium',
                        'jml'           => jml_nav(),
                        'load_manager'  => $load_manager['config'],
                        'kategori'      => $kategori,
                        'isi'           => 'adminpage/laboratorium/tambah');

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
            $gambar = upload_image(array('foto', $cfoto), 'tambah', 'lab', '', $data);

            // Masuk ke database
            if ($gambar !== FALSE)
            {
                $data_id = acak_id('lab', 'id_lab');
                $input = $this->input->post(NULL,'', FALSE);
                $dosen = $input['dosen'];
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
                                'foto_lab'        => $gambar,
                                'iat'           => date('Y-m-d H:i:s'));
                $this->crud->i('lab', $data);
                foreach($dosen as $anggota){
                    if(!empty($anggota)){
                        $data1 = array( 'id_lab' =>  $data_id['id'],
                                        'dosen'  => $anggota);
                        $this->crud->i('anggota_lab', $data1);
                    }
                }
                $data2 = array( 'id_halaman'        => $data_id['id'],
                                'nama_id'       => $input['nama_id'],
                                'nama_en'       => $input['nama_en'],
                                'link_id'       => $link_id,
                                'link_en'       => $link_en,
                                'atribut'       => 'added',
                                'tipe'          => 'Lab',
                                'iat'           => date('Y-m-d H:i:s'));
                $this->crud->i('halaman', $data2);
                $this->serialize_new_menu($data_id['id']);
                $this->session->set_flashdata('sukses', 'Halaman berhasil ditambah.');
                redirect(admin_url('laboratorium'));
            }
        }
    }

    public function serialize_new_menu($id_halaman)
    {
        $json1 = $this->crud->gda('manajemen_menu', array('id' => 11))['serialization'];
        $new1 = rtrim($json1, ']');
        $new1 .= ($new1 != '[' ? ',' : '');
        $new1 .= '{"id":'.$id_halaman.'}]';
        $this->crud->u('manajemen_menu', array('serialization' => $new1), array('id' => 11));

        // Backup-nya
        $json2 = $this->crud->gda('manajemen_menu', array('id' => 1))['serialization'];
        $new2 = rtrim($json2, ']');
        $new2 .= ($new2 != '[' ? ',' : '');
        $new2 .= '{"id":'.$id_halaman.'}]';
        $this->crud->u('manajemen_menu', array('serialization' => $new2), array('id' => 1));
    }

    // Update
    public function edit($id_lab = NULL)
    {
        $elektro = $this->load->database('fakultas', TRUE);
        if ($this->session->akses_level == 'Blocked') view_error('Error 404');

        
        $halaman = $this->crud->gd($this->table, array($this->pk => $id_lab));

        $this->load->library('image_manager');
        // Mengecek jika ID tidak valid
        if (empty($halaman)) view_error('Error 404');
        $kategori = $elektro->query("SELECT * FROM dosen")->result();
        $ketua = $this->crud_fakultas->gd('dosen',array('nip' => $halaman->ketua_lab));
        $anggota = $this->model_join->anggotalab($halaman->id_lab);
        $data = array(  'title' => 'Edit Laboratorium',
                        'data'  => $halaman,
                        'jml'   => jml_nav(),
                        'kategori'  => $kategori,
                        'ketua' => $ketua,
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

            $gambar = upload_image(array('foto', $cfoto), 'edit', 'lab', $halaman->foto_lab, $data);

            // Masuk ke database
            if ($gambar !== FALSE)
            {
                $input = $this->input->post(NULL, FALSE);
                $input = $this->input->post(NULL,'', FALSE);
                $dosen = $input['dosen'];
                $link_id = url_title($input['nama_id'], 'dash', TRUE);
                $link_en = url_title($input['nama_en'], 'dash', TRUE);
                $data = array(  
                                'lab_id'       => $input['nama_id'],
                                'lab_en'       => $input['nama_en'],
                                'isi_id'  => $input['deskripsi_id'],
                                'isi_en'  => $input['deskripsi_en'],
                                'slug_id'       => $link_id,
                                'slug_en'       => $link_en,
                                'ketua_lab'       => $input['ketua'],
                                'foto_lab'        => $gambar);
                $this->crud->u($this->table, $data, array($this->pk => $id_lab));
                $row = $this->crud->cw('anggota_lab', array($this->pk => $id_lab));
                if($row>0){
                    $this->crud->d('anggota_lab', array($this->pk => $id_lab));
                }
                foreach($dosen as $anggota){
                    if(!empty($anggota)){
                        $data1 = array( 'id_lab' => $id_lab,
                                        'dosen'  => $anggota);
                        $this->crud->i('anggota_lab', $data1);
                    }
                }
                $data2 = array( 'nama_id'       => $input['nama_id'],
                                'nama_en'       => $input['nama_en'],
                                'link_id'       => $link_id,
                                'link_en'       => $link_en,
                                'tipe'          => 'Lab');
                $this->crud->u('halaman', $data2, array('id_halaman' => $id_lab));
                $this->session->set_flashdata('sukses', 'halaman berhasil diperbarui.');
                redirect(admin_url('laboratorium'));
            }
        }
    }

    // Hapus
    public function hapus($id_lab = NULL)
    {
        if ($this->session->akses_level == 'Blocked') view_error('Error 404');

        $cek = $this->crud->gd($this->table, array($this->pk => $id_lab));
        if ($this->input->get('act', TRUE) == $id_lab && ! empty($cek))
        {
            $this->crud->d($this->table, array($this->pk => $id_lab));
            $this->crud->d('anggota_lab', array($this->pk => $id_lab));
            serialize_delete_menu($id_lab);
            $this->session->set_flashdata('sukses', 'Data berhasil dihapus.');
            redirect(admin_url('Laboratorium'));
        }
        else
        {
            $this->session->set_flashdata('gagal', 'Data gagal dihapus.');
            redirect(admin_url('Laboratorium'));
        }
    }
}
