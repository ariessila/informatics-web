<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Halaman extends Admin_Controller {

    private $table = 'halaman';
    private $pk = 'id_halaman';

    // Load database
    public function __construct()
    {
        parent::__construct();
    }

    // Index
    public function index()
    {
        $q = $this->input->get('q', TRUE) ? $this->input->get('q', TRUE) : NULL;
        $cari_query = cari_query($q, array('nama_id', 'nama_en', 'deskripsi_id', 'deskripsi_en', 'atribut'));
        // $cari_query = 'atribut = \'added\' AND ('.cari_query($q, array('nama_id', 'nama_en', 'deskripsi_id', 'deskripsi_en', 'atribut')).')';

        $halaman = $this->crud->gwo($this->table, $cari_query, 'atribut DESC, iat DESC');
        $data = array(  'title'         => 'Daftar Halaman',
                        'halaman'       => $halaman,
                        'jml'           => jml_nav(),
                        'isi'           => 'adminpage/halaman/list');
        $this->load->view('adminpage/_layout/wrapper', $data);
    }

    // Manajemen Menu Halaman Depan
    public function manajemen_menu()
    {
        $json1 = $this->crud->gda('manajemen_menu', array('id' => 11))['serialization'];
        $json2 = $this->crud->gda('manajemen_menu', array('id' => 12))['serialization'];
        $data = array(  'title'     => 'Manajemen Menu',
                        'json1'     => $json1,
                        'json2'     => $json2,
                        'jml'       => jml_nav(),
                        'isi'       => 'adminpage/halaman/manajemen');
        $this->load->view('adminpage/_layout/wrapper', $data);
    }

    // Simpan pengaturan susunan menu
    public function save_nestable()
    {
        $serialization = $this->input->post('serialization');
        $serialization2 = $this->input->post('serialization2');
        $new = $this->align_inactive_menu($serialization);
        $this->crud->u('manajemen_menu', array('serialization' => $new), array('id' => 11));
        $this->crud->u('manajemen_menu', array('serialization' => $serialization2), array('id' => 12));
        $this->sync_active_menu();
        $this->session->set_flashdata('sukses', 'Pengaturan menu berhasil diperbarui.');
        redirect(admin_url('halaman/manajemen-menu'));
    }

    // atur ulang susunan menu
    public function reset_menu()
    {
        $json1 = $this->crud->gda('manajemen_menu', array('id' => 1))['serialization'];
        $json2 = $this->crud->gda('manajemen_menu', array('id' => 2))['serialization'];
        $this->crud->u('manajemen_menu', array('serialization' => $json1), array('id' => 11));
        $this->crud->u('manajemen_menu', array('serialization' => $json2), array('id' => 12));
        $this->session->set_flashdata('sukses', 'Menu berhasil di-reset.');
        redirect(admin_url('halaman/manajemen-menu'));
    }

    // menambahkan halaman baru ke menu item
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

    // menghapus halaman dari menu item
    public function serialize_delete_menu($id_halaman)
    {
        $json1 = $this->crud->gda('manajemen_menu', array('id' => 11))['serialization'];
        $new1 = str_replace(',{"id":'.$id_halaman.'}]', ']', $json1); //ujung
        $new1 = str_replace('[{"id":'.$id_halaman.'},', '[', $new1); //pangkal
        $new1 = str_replace(',{"id":'.$id_halaman.'},', ',', $new1); //tengah
        $new1 = str_replace('[{"id":'.$id_halaman.'}]', '[]', $new1); //sendiri
        $this->crud->u('manajemen_menu', array('serialization' => $new1), array('id' => 11));

        // Backup-nya
        $json2 = $this->crud->gda('manajemen_menu', array('id' => 1))['serialization'];
        $new2 = str_replace(',{"id":'.$id_halaman.'}]', ']', $json2); //ujung
        $new2 = str_replace('[{"id":'.$id_halaman.'},', '[', $new2); //pangkal
        $new2 = str_replace(',{"id":'.$id_halaman.'},', ',', $new2); //tengah
        $new2 = str_replace('[{"id":'.$id_halaman.'}]', '[]', $new2); //sendiri
        $this->crud->u('manajemen_menu', array('serialization' => $new2), array('id' => 1));
    }

    // mengembalikan semua menu tidak aktif ke level 1
    public function align_inactive_menu($json)
    {
        $new = str_replace(',"children":[', '},', $json);
        $new = str_replace(']}', '', $new);
        return $new;
    }

    // Mengupdate status aktif pada halaman
    public function sync_active_menu()
    {
        $json = $this->crud->gda('manajemen_menu', array('id' => 12))['serialization'];
        $data = $this->crud->ga($this->table);
        foreach ($data as $data) {
            if ((strpos($json, ':'.$data->id_halaman.',') !== FALSE) OR (strpos($json, ':'.$data->id_halaman.'}') !== FALSE)) {
                if (!$data->aktif) $this->crud->u($this->table, array('aktif' => '1'), array($this->pk => $data->id_halaman));
            } else {
                if ($data->aktif) $this->crud->u($this->table, array('aktif' => '0'), array($this->pk => $data->id_halaman));
            }
        }
    }

    // Tambah
    public function tambah()
    {
        if ($this->session->akses_level == 'Blocked') view_error('Error 404');

        $this->load->library('image_manager');
        $load_manager = $this->image_manager->load_manager('img', upload_url('imagemanager').'article/small/no_image.png');
        $data = array(  'title'         => 'Tambah Halaman',
                        'jml'           => jml_nav(),
                        'load_manager'  => $load_manager['config'],
                        'isi'           => 'adminpage/halaman/tambah');

        $valid = $this->form_validation;
        $valid->set_error_delimiters('<i style="color: red;">', '</i>');
        $valid->set_rules('nama_id', 'Judul Halaman (Indonesia)', 'required|trim|strip_tags|htmlspecialchars');
        $valid->set_rules('nama_en', 'Judul Halaman (English)', 'required|trim|strip_tags|htmlspecialchars');

        if ($valid->run() === FALSE) $this->load->view('adminpage/_layout/wrapper', $data);
        else
        {
            $data_id = acak_id($this->table, $this->pk);
            $input = $this->input->post(NULL,'', FALSE);
            $link_id = url_title($input['nama_id'], 'dash', TRUE);
            $link_en = url_title($input['nama_en'], 'dash', TRUE);
            $data = array(  'id_halaman'    => $data_id['id'],
                            'nama_id'       => $input['nama_id'],
                            'nama_en'       => $input['nama_en'],
                            'deskripsi_id'  => $input['deskripsi_id'],
                            'deskripsi_en'  => $input['deskripsi_en'],
                            'link_id'       => $link_id,
                            'link_en'       => $link_en,
                            'atribut'       => 'added',
                            'iat'           => date('Y-m-d H:i:s'));
            $this->crud->i($this->table, $data);
            $this->serialize_new_menu($data_id['id']);
            $this->session->set_flashdata('sukses', 'Halaman berhasil ditambah.');
            redirect(admin_url('halaman'));
        }
    }

    // Update
    public function edit($id_halaman = NULL)
    {
        if ($this->session->akses_level == 'Blocked') view_error('Error 404');

        $halaman = $this->crud->gd($this->table, array($this->pk => $id_halaman));

        // Mengecek jika ID tidak valid
        if (empty($halaman)) view_error('Error 404');

        $data = array(  'title' => 'Edit Halaman',
                        'data'  => $halaman,
                        'jml'   => jml_nav(),
                        'isi'   => 'adminpage/halaman/edit');

        $valid = $this->form_validation;
        $valid->set_error_delimiters('<i style="color: red;">', '</i>');
        $valid->set_rules('nama_id', 'Judul Halaman (Indonesia)', 'required|trim|strip_tags|htmlspecialchars');
        $valid->set_rules('nama_en', 'Judul Halaman (English)', 'required|trim|strip_tags|htmlspecialchars');

        if ($valid->run() === FALSE) $this->load->view('adminpage/_layout/wrapper', $data);
        else
        {
            $input = $this->input->post(NULL, FALSE);
            $link_id = url_title($input['nama_id'], 'dash', TRUE);
            $link_en = url_title($input['nama_en'], 'dash', TRUE);
            $data = array(  'nama_id'       => $input['nama_id'],
                            'nama_en'       => $input['nama_en'],
                            'deskripsi_id'  => $input['deskripsi_id'],
                            'deskripsi_en'  => $input['deskripsi_en'],
                            'link_id'       => $link_id,
                            'link_en'       => $link_en);
            $this->crud->u($this->table, $data, array($this->pk => $id_halaman));
            $this->session->set_flashdata('sukses', 'halaman berhasil diperbarui.');
            redirect(admin_url('halaman'));
        }
    }

    // Hapus
    public function hapus($id_halaman = NULL)
    {
        if ($this->session->akses_level == 'Blocked') view_error('Error 404');

        $cek = $this->crud->gd($this->table, array($this->pk => $id_halaman));
        if ($this->input->get('act', TRUE) == $id_halaman && ! empty($cek))
        {
            $this->crud->d($this->table, array($this->pk => $id_halaman));
            $this->serialize_delete_menu($id_halaman);
            $this->session->set_flashdata('sukses', 'Data berhasil dihapus.');
            redirect(admin_url('halaman'));
        }
        else
        {
            $this->session->set_flashdata('gagal', 'Data gagal dihapus.');
            redirect(admin_url('halaman'));
        }
    }
}
