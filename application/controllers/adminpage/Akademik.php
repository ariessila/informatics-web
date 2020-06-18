<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Akademik extends Admin_Controller {

    private $table = 'akademik';
    private $pk = 'id_akademik';

    // Load database
    public function __construct()
    {
        parent::__construct();
    }

    // Index
    public function index()
    {
        
        // $cari_query = 'atribut = \'added\' AND ('.cari_query($q, array('nama_id', 'nama_en', 'deskripsi_id', 'deskripsi_en', 'atribut')).')';

        $halaman = $this->crud->ga($this->table);
        $data = array(  'title'         => 'Daftar Halaman Akademik',
                        'halaman'       => $halaman,
                        'jml'           => jml_nav(),
                        'isi'           => 'adminpage/akademik/list');
        $this->load->view('adminpage/_layout/wrapper', $data);
    }

    // Tambah
    public function tambah()
    {
        if ($this->session->akses_level == 'Blocked') view_error('Error 404');


        $this->load->library('image_manager');
        $load_manager = $this->image_manager->load_manager('img', upload_url('imagemanager').'article/small/no_image.png');
        $data = array(  'title'         => 'Tambah Akademik',
                        'jml'           => jml_nav(),
                        'load_manager'  => $load_manager['config'],
                        'isi'           => 'adminpage/akademik/tambah');

        $valid = $this->form_validation;
        $valid->set_error_delimiters('<i style="color: red;">', '</i>');
        $valid->set_rules('nama_id', 'Nama Laboratorium (Indonesia)', 'required|trim|strip_tags|htmlspecialchars');
        $valid->set_rules('nama_en', 'Nama Laboratorium (English)', 'required|trim|strip_tags|htmlspecialchars');
        $valid->set_rules('menu1', 'Menu', 'required|trim|strip_tags|htmlspecialchars');
        $valid->set_rules('deskripsi_id1', 'Deskripsi', 'required|trim|strip_tags|htmlspecialchars');
        $valid->set_rules('menu2', 'Menu', 'required|trim|strip_tags|htmlspecialchars');
        $valid->set_rules('deskripsi_id2', 'Deskripsi', 'required|trim|strip_tags|htmlspecialchars');
        $valid->set_rules('menu_en1', 'Menu', 'required|trim|strip_tags|htmlspecialchars');
        $valid->set_rules('deskripsi_en1', 'Deskripsi', 'required|trim|strip_tags|htmlspecialchars');
        $valid->set_rules('menu_en2', 'Menu', 'required|trim|strip_tags|htmlspecialchars');
        $valid->set_rules('deskripsi_en2', 'Deskripsi', 'required|trim|strip_tags|htmlspecialchars');

        if ($valid->run() === FALSE) $this->load->view('adminpage/_layout/wrapper', $data);
        else
        {
                $input = $this->input->post(NULL,'', FALSE);

                $link_id = url_title($input['nama_id'], 'dash', TRUE);
                $link_en = url_title($input['nama_en'], 'dash', TRUE);
                $data = array(  'id_akademik'    => $data_id['id'],
                                'nama_id'       => $input['nama_id'],
                                'nama_en'       => $input['nama_en'],
                                'slug_id'       => $link_id,
                                'slug_en'       => $link_en,
                                'titel1_id' => $input['menu1'],
                                'titel2_id' => $input['menu2'],
                                'titel3_id' => $input['menu3'],
                                'titel4_id' => $input['menu4'],
                                'titel5_id' => $input['menu5'],
                                'titel1_en' => $input['menu_en1'],
                                'titel2_en' => $input['menu_en2'],
                                'titel3_en' => $input['menu_en3'],
                                'titel4_en' => $input['menu_en4'],
                                'titel5_en' => $input['menu_en5'],
                                'isi1_id' => $input['deskripsi_id1'],
                                'isi2_id' => $input['deskripsi_id2'],
                                'isi3_id' => $input['deskripsi_id3'],
                                'isi4_id' => $input['deskripsi_id4'],
                                'isi5_id' => $input['deskripsi_id5'],
                                'isi1_en' => $input['deskripsi_en1'],
                                'isi2_en' => $input['deskripsi_en2'],
                                'isi3_en' => $input['deskripsi_en3'],
                                'isi4_en' => $input['deskripsi_en4'],
                                'isi5_en' => $input['deskripsi_en5'],
                                'iat'           => date('Y-m-d H:i:s'));
                $this->crud->i('akademik', $data);
                $this->session->set_flashdata('sukses', 'Halaman berhasil ditambah.');
                redirect(admin_url('akademik'));
        }
    }

    // Update
    public function edit($id_akademik = NULL)
    {
        if ($this->session->akses_level == 'Blocked') view_error('Error 404');

        $halaman = $this->crud->gd($this->table, array($this->pk => $id_akademik));
        $halaman_en = $this->crud->gd('akademik_en',array('id_akademik_en' => $id_akademik));

        // Mengecek jika ID tidak valid
        if (empty($halaman)) view_error('Error 404');

        $data = array(  'title' => 'Edit Halaman Akademik',
                        'data'  => $halaman,
                        'data_en' => $halaman_en,
                        'jml'   => jml_nav(),
                        'isi'   => 'adminpage/akademik/edit');

        $valid = $this->form_validation;
        $valid->set_error_delimiters('<i style="color: red;">', '</i>');
        $valid->set_rules('nama_id', 'Nama Laboratorium (Indonesia)', 'required|trim|strip_tags|htmlspecialchars');
        $valid->set_rules('nama_en', 'Nama Laboratorium (English)', 'required|trim|strip_tags|htmlspecialchars');
        $valid->set_rules('menu1', 'Menu', 'required|trim|strip_tags|htmlspecialchars');
        $valid->set_rules('deskripsi_id1', 'Deskripsi', 'required');
        $valid->set_rules('menu2', 'Menu', 'trim|strip_tags|htmlspecialchars');
        $valid->set_rules('deskripsi_id2', 'Deskripsi', '');
        $valid->set_rules('menu3', 'Menu', 'trim|strip_tags|htmlspecialchars');
        $valid->set_rules('deskripsi_id3', 'Deskripsi', '');
        $valid->set_rules('menu4', 'Menu', 'trim|strip_tags|htmlspecialchars');
        $valid->set_rules('deskripsi_id4', 'Deskripsi', '');
        $valid->set_rules('menu5', 'Menu', 'trim|strip_tags|htmlspecialchars');
        $valid->set_rules('deskripsi_id5', 'Deskripsi', '');
        $valid->set_rules('menu_en1', 'Menu', 'required|trim|strip_tags|htmlspecialchars');
        $valid->set_rules('deskripsi_en1', 'Deskripsi', '');
        $valid->set_rules('menu_en2', 'Menu', 'trim|strip_tags|htmlspecialchars');
        $valid->set_rules('deskripsi_en2', 'Deskripsi', '');
        $valid->set_rules('menu_en3', 'Menu', 'trim|strip_tags|htmlspecialchars');
        $valid->set_rules('deskripsi_en3', 'Deskripsi', '');
        $valid->set_rules('menu_en4', 'Menu', 'trim|strip_tags|htmlspecialchars');
        $valid->set_rules('deskripsi_en4', 'Deskripsi', '');
        $valid->set_rules('menu_en5', 'Menu', 'trim|strip_tags|htmlspecialchars');
        $valid->set_rules('deskripsi_en5', 'Deskripsi', '');

        if ($valid->run() === FALSE) $this->load->view('adminpage/_layout/wrapper', $data);
        else
        {
            $input = $this->input->post(NULL, TRUE);

                $link_id = url_title($input['nama_id'], 'dash', TRUE);
                $link_en = url_title($input['nama_en'], 'dash', TRUE);
                $data = array(  'nama_id'       => $input['nama_id'],
                                'nama_en'       => $input['nama_en'],
                                'slug_id'       => $link_id,
                                'slug_en'       => $link_en,
                                'titel1_id' => $input['menu1'],
                                'titel2_id' => $input['menu2'],
                                'titel3_id' => $input['menu3'],
                                'titel4_id' => $input['menu4'],
                                'titel5_id' => $input['menu5'],
                                'titel1_en' => $input['menu_en1'],
                                'titel2_en' => $input['menu_en2'],
                                'titel3_en' => $input['menu_en3'],
                                'titel4_en' => $input['menu_en4'],
                                'titel5_en' => $input['menu_en5'],
                                'isi1_id' => $this->input->post('deskripsi_id1', FALSE),
                                'isi2_id' => $this->input->post('deskripsi_id2', FALSE),
                                'isi3_id' => $this->input->post('deskripsi_id3', FALSE),
                                'isi4_id' => $this->input->post('deskripsi_id4', FALSE),
                                'isi5_id' => $this->input->post('deskripsi_id5', FALSE),
                                'iat'           => date('Y-m-d H:i:s'));
                $this->crud->u($this->table, $data, array($this->pk => $id_akademik));
                
                $data2 = array( 'isi1_en' => $this->input->post('deskripsi_en1', FALSE),
                                'isi2_en' => $this->input->post('deskripsi_en2', FALSE),
                                'isi3_en' => $this->input->post('deskripsi_en3', FALSE),
                                'isi4_en' => $this->input->post('deskripsi_en4', FALSE),
                                'isi5_en' => $this->input->post('deskripsi_en5', FALSE) );
                $this->crud->u('akademik_en', $data2, array('id_akademik_en' => $id_akademik));

                $data3 = array( 'nama_id'       => $input['nama_id'],
                                'nama_en'       => $input['nama_en'],
                                'link_id'       => $link_id,
                                'link_en'       => $link_en,
                                'iat'           => date('Y-m-d H:i:s'));
                $this->crud->u('halaman', $data3, array('id_halaman' => $id_akademik));
                
                $this->session->set_flashdata('sukses', 'halaman berhasil diperbarui.');
                redirect(admin_url('akademik'));
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
            $this->session->set_flashdata('sukses', 'Data berhasil dihapus.');
            redirect(admin_url('akademik'));
        }
        else
        {
            $this->session->set_flashdata('gagal', 'Data gagal dihapus.');
            redirect(admin_url('akademik'));
        }
    }
}
