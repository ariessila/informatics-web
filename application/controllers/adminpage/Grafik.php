<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Grafik extends Admin_Controller {

    private $table = 'grafik';
    private $pk = 'id_grafik';

    // Load database
    public function __construct()
    {
        parent::__construct();
    }

    // Index
    public function index()
    {
        $grafik = $this->crud->gao($this->table, 'urutan ASC');
        $data = array(  'title'         => 'Indikator Kinerja',
                        'grafik'          => $grafik,
                        'jml'           => jml_nav(),
                        'isi'           => 'adminpage/grafik/list');
        $this->load->view('adminpage/_layout/wrapper', $data);
    }

    // Tukar urutan grafik
    public function tukar_posisi()
    {
        $input = $this->input->post(NULL, TRUE);
        $id = $input['id'];
        $urutan = $input['urutan'];
        if (isset($_POST['naik'])) {
            if ($urutan == 1) { redirect(admin_url('grafik?stuck')); return; }
            $atas = $this->crud->gd($this->table, array('urutan' => ($urutan - 1)));
            $this->crud->u($this->table, array('urutan' => $urutan), array($this->pk => $atas->id_grafik));
            $this->crud->u($this->table, array('urutan' => ($urutan - 1)), array($this->pk => $id));
            redirect(admin_url('grafik?naik'));
        } else if (isset($_POST['turun'])) {
            $bawah = $this->crud->gd($this->table, array('urutan' => ($urutan + 1)));
            if (!$bawah) { redirect(admin_url('grafik?stuck')); return; }
            $this->crud->u($this->table, array('urutan' => $urutan), array($this->pk => $bawah->id_grafik));
            $this->crud->u($this->table, array('urutan' => ($urutan + 1)), array($this->pk => $id));
            redirect(admin_url('grafik?turun'));
        } else redirect(admin_url('grafik'));
    }

    // Tambah
    public function tambah()
    {
        if ($this->session->akses_level == 'Blocked') view_error('Error 404');

        $data = array(  'title' => 'Tambah Indikator Kinerja',
                        'jml'   => jml_nav(),
                        'isi'   => 'adminpage/grafik/tambah');

        $valid = $this->form_validation;
        $valid->set_error_delimiters('<i style="color: red;">', '</i>');
        $valid->set_rules('judul', 'Judul', 'trim|strip_tags|htmlspecialchars');
        $valid->set_rules('url', 'url', 'trim|strip_tags|htmlspecialchars');

        if ($valid->run() === FALSE) $this->load->view('adminpage/_layout/wrapper', $data);
        else
        {
            // Mekanisme upload gambar
            $gambar = upload_image('gambar', 'tambah', 'grafik', '', $data, TRUE);

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
                $data = array(  'id_grafik'       => $data_id['id'],
                                'title'         => $input['judul'],
                                'url'         => $input['url'],
                                'photo'         => $gambar,
                                'urutan'        => $urutan-1,
                                'iat'           => date('Y-m-d H:i:s'));
                $this->crud->i($this->table, $data);
                $this->session->set_flashdata('sukses', 'grafik berhasil ditambah.');
                redirect(admin_url('grafik'));
            }
        }
    }

    // Update
    public function edit($id_grafik = NULL)
    {
        if ($this->session->akses_level == 'Blocked') view_error('Error 404');

        $grafik = $this->crud->gd($this->table, array($this->pk => $id_grafik));

        // Mengecek jika ID tidak valid
        if (empty($grafik)) view_error('Error 404');

        $data = array(  'title' => 'Edit Indikator Kinerja',
                        'data'  => $grafik,
                        'jml'   => jml_nav(),
                        'isi'   => 'adminpage/grafik/edit');

        $valid = $this->form_validation;
        $valid->set_error_delimiters('<i style="color: red;">', '</i>');
        $valid->set_rules('judul', 'Judul', 'trim|strip_tags|htmlspecialchars');
        $valid->set_rules('url', 'url', 'trim|strip_tags|htmlspecialchars');

        if ($valid->run() === FALSE) $this->load->view('adminpage/_layout/wrapper', $data);
        else
        {
            // Mekanisme upload gambar
            $gambar = upload_image('gambar', 'edit', 'grafik', $grafik->photo, $data);

            // Masuk ke database
            if ($gambar !== FALSE)
            {
                $input = $this->input->post(NULL, TRUE);
                $data = array(  'id_grafik'   => $id_grafik,
                                'title'     => $input['judul'],
                                'url'     => $input['url'],
                                'photo'     => $gambar,
                                'uat'        => date('Y-m-d H:i:s'));
                $this->crud->u($this->table, $data, array($this->pk => $id_grafik));
                $this->session->set_flashdata('sukses', 'grafik berhasil diperbarui.');
                redirect(admin_url('grafik'));
            }
        }
    }

    // Hapus
    public function hapus($id_grafik = NULL)
    {
        if ($this->session->akses_level == 'Blocked') view_error('Error 404');

        $cek = $this->crud->gd($this->table, array($this->pk => $id_grafik));
        if ($this->input->get('act', TRUE) == $id_grafik && ! empty($cek))
        {
            if ($cek->photo != '')
            {
                unlink('./'.upload_path('grafik').$cek->photo);
                unlink('./'.upload_path('grafik').'thumbs/'.$cek->photo);
            }
            $this->crud->d($this->table, array($this->pk => $id_grafik));
            $this->db->cache_delete('adminpage', 'grafik');
            $this->db->cache_delete('grafik', 'index');
            $this->session->set_flashdata('sukses', 'Data berhasil dihapus.');
            redirect(admin_url('grafik'));
        }
        else
        {
            $this->session->set_flashdata('gagal', 'Data gagal dihapus.');
            redirect(admin_url('grafik'));
        }
    }
}
