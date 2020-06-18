<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Admin_Controller {
    
    public function index()
    {
        //Staff can access
        $this->uauth->authorization('admin');

        $data = array(  'title'     => 'Halaman Dasbor',
                        'subtitle'  => 'Selamat datang, '.$this->session->fullname.'.',
                        'isi'       => 'adminpage/home/beranda');
        $this->load->view('adminpage/_layout/wrapper', $data);
    }
}
