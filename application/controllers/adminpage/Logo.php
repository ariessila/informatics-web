<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logo extends Admin_Controller {

    private $table = 'logo';
    private $pk = 'id_logo';

    // Load database
    public function __construct()
    {
        parent::__construct();
    }

    // Index
    public function index()
    {
        $logo = $this->crud->gao($this->table, 'urutan ASC');
        $data = array(  'title'         => 'Logo Partner',
                        'logo'          => $logo,
                        'jml'           => jml_nav(),
                        'isi'           => 'adminpage/logo/list');
        $this->load->view('adminpage/_layout/wrapper', $data);
    }

    // Tukar urutan logo
    public function tukar_posisi()
    {
        $input = $this->input->post(NULL, TRUE);
        $id = $input['id'];
        $urutan = $input['urutan'];
        if (isset($_POST['naik'])) {
            if ($urutan == 1) { redirect(admin_url('logo?stuck')); return; }
            $atas = $this->crud->gd($this->table, array('urutan' => ($urutan - 1)));
            $this->crud->u($this->table, array('urutan' => $urutan), array($this->pk => $atas->id_logo));
            $this->crud->u($this->table, array('urutan' => ($urutan - 1)), array($this->pk => $id));
            redirect(admin_url('logo?naik'));
        } else if (isset($_POST['turun'])) {
            $bawah = $this->crud->gd($this->table, array('urutan' => ($urutan + 1)));
            if (!$bawah) { redirect(admin_url('logo?stuck')); return; }
            $this->crud->u($this->table, array('urutan' => $urutan), array($this->pk => $bawah->id_logo));
            $this->crud->u($this->table, array('urutan' => ($urutan + 1)), array($this->pk => $id));
            redirect(admin_url('logo?turun'));
        } else redirect(admin_url('logo'));
    }

    // Tambah
    public function tambah()
    {
        if ($this->session->akses_level == 'Blocked') view_error('Error 404');

        $data = array(  'title' => 'Tambah Logo',
                        'jml'   => jml_nav(),
                        'isi'   => 'adminpage/logo/tambah');

        $valid = $this->form_validation;
        $valid->set_error_delimiters('<i style="color: red;">', '</i>');
        $valid->set_rules('judul', 'Judul', 'trim|strip_tags|htmlspecialchars');
        $valid->set_rules('url', 'url', 'trim|strip_tags|htmlspecialchars');

        if ($valid->run() === FALSE) $this->load->view('adminpage/_layout/wrapper', $data);
        else
        {
            // Mekanisme upload gambar
            $gambar = upload_image('gambar', 'tambah', 'logo', '', $data, TRUE);

            // Masuk ke database
            if ($gambar !== FALSE)
            {
                $data_id = acak_id($this->table, $this->pk);
                $input = $this->input->post(NULL, TRUE);
                $urutan = 1;
                do { // menentukan urutan: mengisi urutan jika kosong
                    $ada = $this->crud->gd($this->table, array('urutan' => $urutan));
                    $urutan++;
                } while ($ada);
                $data = array(  'id_logo'       => $data_id['id'],
                                'title'         => $input['judul'],
                                'url'         => $input['url'],
                                'photo'         => $gambar,
                                'urutan'        => $urutan-1,
                                'iat'           => date('Y-m-d H:i:s'));
                $this->crud->i($this->table, $data);
                $this->session->set_flashdata('sukses', 'logo berhasil ditambah.');
                redirect(admin_url('logo'));
            }
        }
    }

    // Update
    public function edit($id_logo = NULL)
    {
        if ($this->session->akses_level == 'Blocked') view_error('Error 404');

        $logo = $this->crud->gd($this->table, array($this->pk => $id_logo));

        // Mengecek jika ID tidak valid
        if (empty($logo)) view_error('Error 404');

        $data = array(  'title' => 'Edit Logo',
                        'data'  => $logo,
                        'jml'   => jml_nav(),
                        'isi'   => 'adminpage/logo/edit');

        $valid = $this->form_validation;
        $valid->set_error_delimiters('<i style="color: red;">', '</i>');
        $valid->set_rules('judul', 'Judul', 'trim|strip_tags|htmlspecialchars');
        $valid->set_rules('url', 'url', 'trim|strip_tags|htmlspecialchars');

        if ($valid->run() === FALSE) $this->load->view('adminpage/_layout/wrapper', $data);
        else
        {
            // Mekanisme upload gambar
            $gambar = upload_image('gambar', 'edit', 'logo', $logo->photo, $data);

            // Masuk ke database
            if ($gambar !== FALSE)
            {
                $input = $this->input->post(NULL, TRUE);
                $data = array(  'id_logo'   => $id_logo,
                                'title'     => $input['judul'],
                                'url'     => $input['url'],
                                'photo'     => $gambar,
                                'uat'        => date('Y-m-d H:i:s'));
                $this->crud->u($this->table, $data, array($this->pk => $id_logo));
                $this->session->set_flashdata('sukses', 'logo berhasil diperbarui.');
                redirect(admin_url('logo'));
            }
        }
    }

    // Hapus
    public function hapus($id_logo = NULL)
    {
        if ($this->session->akses_level == 'Blocked') view_error('Error 404');

        $cek = $this->crud->gd($this->table, array($this->pk => $id_logo));
        if ($this->input->get('act', TRUE) == $id_logo && ! empty($cek))
        {
            if ($cek->photo != '')
            {
                unlink('./'.upload_path('logo').$cek->photo);
                unlink('./'.upload_path('logo').'thumbs/'.$cek->photo);
            }
            $this->crud->d($this->table, array($this->pk => $id_logo));
            $this->db->cache_delete('adminpage', 'logo');
            $this->db->cache_delete('logo', 'index');
            $this->session->set_flashdata('sukses', 'Data berhasil dihapus.');
            redirect(admin_url('logo'));
        }
        else
        {
            $this->session->set_flashdata('gagal', 'Data gagal dihapus.');
            redirect(admin_url('logo'));
        }
    }
}
