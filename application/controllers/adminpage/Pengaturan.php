<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengaturan extends Admin_Controller {

    private $table = 'pengaturan';
    private $pk = 'id_pengaturan';

    private $tableAkademik = 'p_akademik';
    private $tableKemahasiswaan = 'p_kemahasiswaan';
    private $pk1 = 'id';

    // Load database
    public function __construct()
    {
        parent::__construct();
    }

    // Index
    public function index()
    {

        $pengaturan = $this->crud->gd($this->table, array($this->pk => 1));

        $data = array(  'title'     => 'Pengaturan Situs',
                        'pengaturan' => $pengaturan,
                        'jml'       => jml_nav(),
                        'isi'       => 'adminpage/pengaturan/situs');

        $this->load->helper('security');
        $valid = $this->form_validation;
        $valid->set_error_delimiters('<i style="color: red;">', '</i>');
        $valid->set_rules('sitemap_link', 'Site Map Link', 'trim|strip_tags|htmlspecialchars|xss_clean');
        $valid->set_rules('alamat_id', 'Alamat (Bahasa Indonesia)', 'trim|strip_tags|htmlspecialchars|xss_clean');
        $valid->set_rules('alamat_en', 'Isi Pengantar (English)', 'trim|strip_tags|htmlspecialchars|xss_clean');
        $valid->set_rules('deskripsi_situs_id', 'Deskripsi Situs (Bahasa Indonesia)', '');
        $valid->set_rules('deskripsi_situs_en', 'Deskripsi Situs (English)', '');
        $valid->set_rules('no_telp', 'No Telp', 'trim|strip_tags|htmlspecialchars|xss_clean');
        $valid->set_rules('fb', 'Facebook Page', 'trim|strip_tags|htmlspecialchars|xss_clean');
        $valid->set_rules('twitter', 'Twitter Page', 'trim|strip_tags|htmlspecialchars|xss_clean');

        if ($valid->run() === FALSE) $this->load->view('adminpage/_layout/wrapper', $data);
        else
        {
           // Mekanisme upload logo
            $cfoto = json_decode($this->input->post('cfoto'));
            if ($cfoto) $cfoto->default_width = 325;

            $gambar = upload_image(array('foto', $cfoto), 'edit', 'pengaturan', $pengaturan->logo, $data);

            // Masuk ke database
            if ($gambar !== FALSE)
            {
                $input = $this->input->post(NULL, '', FALSE);
                $data1 = array( 'sitemap_link'  => $input['sitemap_link'],
                                'alamat_id'  => $input['alamat_id'],
                                'alamat_en'    => $input['alamat_en'],
                                'deskripsi_situs_id'    => $input['deskripsi_situs_id'],
                                'deskripsi_situs_en'    => $input['deskripsi_situs_en'],
                                'no_telp'    => $input['no_telp'],
                                'fb'    => $input['fb'],
                                'twitter'    => $input['twitter'],
                                'twitter'    => $input['twitter'],
                                'logo'    => $gambar,
                                'uat'       => date('Y-m-d H:i:s'));

                $this->crud->u($this->table, $data1, array($this->pk => 1));
                $this->session->set_flashdata('sukses', 'Data berhasil diperbarui.');
                redirect(admin_url('pengaturan'));
            }
        }
    }

    public function dekan(){
        $pengaturan = $this->crud->gd($this->table, array($this->pk => 1));

        $data = array(  'title'     => 'Pengaturan Informasi Dekan',
                        'pengaturan' => $pengaturan,
                        'jml'       => jml_nav(),
                        'isi'       => 'adminpage/pengaturan/dekan');

        $this->load->helper('security');
        $valid = $this->form_validation;
        $valid->set_error_delimiters('<i style="color: red;">', '</i>');
        $valid->set_rules('dekan_nama', 'Nama Dekan', 'required|trim|strip_tags|htmlspecialchars|xss_clean');
        $valid->set_rules('dekan_sambutan_en', 'Sambutan Dekan (English)', '');
        $valid->set_rules('dekan_sambutan_id', 'Sambutan Dekan (Bahasa Indonesia)', 'required');

        if ($valid->run() === FALSE) $this->load->view('adminpage/_layout/wrapper', $data);
        else
        {
            // Mekanisme upload logo
            $cfoto = json_decode($this->input->post('cfoto'));
            if ($cfoto) $cfoto->default_width = 325;

            $gambar = upload_image(array('foto', $cfoto), 'edit', 'pengaturan', $pengaturan->dekan_foto, $data);

            // Masuk ke database
            if ($gambar !== FALSE)
            {
                $input = $this->input->post(NULL, '', FALSE);
                $data1 = array( 
                                'dekan_nama'    => $input['dekan_nama'],
                                'dekan_sambutan_en'    => $input['dekan_sambutan_en'],
                                'dekan_sambutan_id'    => $input['dekan_sambutan_id'],
                                'dekan_foto'    => $gambar,
                                'uat'       => date('Y-m-d H:i:s'));

                $this->crud->u($this->table, $data1, array($this->pk => 1));
                $this->session->set_flashdata('sukses', 'Data berhasil diperbarui.');
                redirect(admin_url('pengaturan/dekan'));
            }
        }
    }

    public function organisasi(){
        $pengaturan = $this->crud->gd($this->table, array($this->pk => 1));

        $data = array(  'title'     => 'Pengaturan Struktur Organisasi',
                        'pengaturan' => $pengaturan,
                        'jml'       => jml_nav(),
                        'isi'       => 'adminpage/pengaturan/organisasi');

        $this->load->helper('security');
        $valid = $this->form_validation;
        $valid->set_error_delimiters('<i style="color: red;">', '</i>');
        $valid->set_rules('nama_organisasi', 'Nama Gambar', 'required|trim|strip_tags|htmlspecialchars|xss_clean');

        if ($valid->run() === FALSE) $this->load->view('adminpage/_layout/wrapper', $data);
        else
        {
            // Mekanisme upload logo
            $cfoto = json_decode($this->input->post('cfoto'));
            if ($cfoto) $cfoto->default_width = 550;

            $gambar = upload_image(array('foto', $cfoto), 'edit', 'pengaturan', $pengaturan->organisasi, $data);

            // Masuk ke database
            if ($gambar !== FALSE)
            {
                $input = $this->input->post(NULL, '', FALSE);
                $data1 = array( 
                                'nama_organisasi'    => $input['nama_organisasi'],
                                'organisasi'    => $gambar,
                                'uat'       => date('Y-m-d H:i:s'));

                $this->crud->u($this->table, $data1, array($this->pk => 1));
                $this->session->set_flashdata('sukses', 'Data berhasil diperbarui.');
                redirect(admin_url('pengaturan/organisasi'));
            }
        }
    }

    public function akademik(){
        $pengaturan = $this->crud->gd($this->tableAkademik, array($this->pk1 => 1));

        $data = array(  'title'     => 'Pengaturan Akademik',
                        'pengaturan' => $pengaturan,
                        'jml'       => jml_nav(),
                        'isi'       => 'adminpage/pengaturan/akademik');

        $this->load->helper('security');
        $valid = $this->form_validation;
        $valid->set_error_delimiters('<i style="color: red;">', '</i>');
        $valid->set_rules('judul_sar', 'Nama Gambar', 'required|trim|strip_tags|htmlspecialchars|xss_clean');
        //$valid->set_rules('judul_mag', 'Nama Gambar', 'required|trim|strip_tags|htmlspecialchars|xss_clean');

        if ($valid->run() === FALSE) $this->load->view('adminpage/_layout/wrapper', $data);
        else
        {
            // Mekanisme upload logo
            $cfoto = json_decode($this->input->post('cfoto'));
            if ($cfoto) $cfoto->default_width = 550;

            $gambarSar = upload_image(array('gambar_sar', $cfoto), 'edit', 'pengaturan', $pengaturan->gambar_sar, $data);
            $gambarMag = upload_image(array('gambar_mag', $cfoto), 'edit', 'pengaturan', $pengaturan->gambar_mag, $data);

            // Masuk ke database
            if ($gambarSar !== FALSE && $gambarMag !== FALSE)
            {
                $input = $this->input->post(NULL, '', FALSE);
                $data1 = array( 
                                'judul_sar'    => $input['judul_sar'],
                                'gambar_sar'    => $gambarSar,
                                'judul_mag'    => $input['judul_mag'],
                                'gambar_mag'    => $gambarMag,
                                'uat'       => date('Y-m-d H:i:s'));

                $this->crud->u($this->tableAkademik, $data1, array($this->pk1 => 1));
                $this->session->set_flashdata('sukses', 'Data berhasil diperbarui.');
                redirect(admin_url('pengaturan/akademik'));
            }
        }
    }

    public function kemahasiswaan(){
        $pengaturan = $this->crud->gd($this->tableKemahasiswaan, array($this->pk1 => 1));

        $data = array(  'title'     => 'Pengaturan Kemahasiswaan',
                        'pengaturan' => $pengaturan,
                        'jml'       => jml_nav(),
                        'isi'       => 'adminpage/pengaturan/kemahasiswaan');

        $this->load->helper('security');
        $valid = $this->form_validation;
        $valid->set_error_delimiters('<i style="color: red;">', '</i>');
        $valid->set_rules('judul_mahasiswa', 'Nama Gambar', 'required|trim|strip_tags|htmlspecialchars|xss_clean');
        //$valid->set_rules('judul_alumni', 'Nama Gambar', 'required|trim|strip_tags|htmlspecialchars|xss_clean');

        if ($valid->run() === FALSE) $this->load->view('adminpage/_layout/wrapper', $data);
        else
        {
            // Mekanisme upload logo
            $cfoto = json_decode($this->input->post('cfoto'));
            if ($cfoto) $cfoto->default_width = 550;

            $gambarMahasiswa = upload_image(array('gambar_mahasiswa', $cfoto), 'edit', 'pengaturan', $pengaturan->gambar_mahasiswa, $data);
            $gambarAlumni = upload_image(array('gambar_alumni', $cfoto), 'edit', 'pengaturan', $pengaturan->gambar_alumni, $data);

            // Masuk ke database
            if ($gambarMahasiswa !== FALSE && $gambarAlumni !== FALSE)
            {
                $input = $this->input->post(NULL, '', FALSE);
                $data1 = array( 
                                'judul_mahasiswa'    => $input['judul_mahasiswa'],
                                'gambar_mahasiswa'    => $gambarMahasiswa,
                                'judul_alumni'    => $input['judul_alumni'],
                                'gambar_alumni'    => $gambarAlumni,
                                'uat'       => date('Y-m-d H:i:s'));

                $this->crud->u($this->tableKemahasiswaan, $data1, array($this->pk1 => 1));
                $this->session->set_flashdata('sukses', 'Data berhasil diperbarui.');
                redirect(admin_url('pengaturan/kemahasiswaan'));
            }
        }
    }

    public function color(){

        $pengaturan = $this->crud->gd('website_setting', array('id_website_setting' => 2));

        $data = array(  'title'     => 'Pengaturan Tampilan Website',
                        'pengaturan' => $pengaturan,
                        'jml'       => jml_nav(),
                        'isi'       => 'adminpage/pengaturan/background');

        $this->load->helper('security');
        $valid = $this->form_validation;
        $valid->set_error_delimiters('<i style="color: red;">', '</i>');
        $valid->set_rules('warna', 'Warna', 'trim|strip_tags|htmlspecialchars|xss_clean');
        $valid->set_rules('nama', 'Nama', 'trim|strip_tags|htmlspecialchars|xss_clean');

        if ($valid->run() === FALSE) $this->load->view('adminpage/_layout/wrapper', $data);
        else
        {
            // Masuk ke database
            $warna = $this->input->post('warna');
            $warna = explode('#',$warna);
            $input = $this->input->post(NULL, '', FALSE);
            $data1 = array( 
                            'nama'    => $input['nama_departemen'],
                            'warna'     => $warna[1], 
                            'uat'       => date('Y-m-d H:i:s'));

            $this->crud->u("website_setting", $data1, array('id_website_setting' => 2));
            $this->session->set_flashdata('sukses', 'Data berhasil diperbarui.');
            redirect(admin_url('pengaturan/color'));
        }
    }
}
