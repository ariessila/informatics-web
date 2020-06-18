<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Dosen_Controller {
    
    public function index()
    {
        //Staff can access
        $this->uauth->authorization('dosen');

        $bio = $this->crud_fakultas->gd('dosen',array('nip' => $this->session->username));
        $publikasi = $this->crud_fakultas->cw('publikasi_dosen',array('oleh' => $bio->nama_dosen));
        $penelitian = $this->crud_fakultas->cw('penelitian',array('ketua_penelitian' => $bio->nama_dosen));
        $pengabdian = $this->crud_fakultas->cw('pengabdian',array('ketua' => $bio->nama_dosen));

        $data = array(  'title'     => 'Halaman Dasbor',
                        'subtitle'  => 'Selamat datang, '.$this->session->fullname.'.',
                        'data'      => $bio,
                        'penelitian' => $penelitian,
                        'publikasi' => $publikasi,
                        'pengabdian' => $pengabdian,
                        'isi'       => 'dosenpage/home/beranda');
        $this->load->view('dosenpage/_layout/wrapper', $data);
    }
}
