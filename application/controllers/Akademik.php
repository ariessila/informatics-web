<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Akademik extends Public_Controller {

    private $table = 'akademik';
    private $search = 'blogs';
    private $pk = 'id_akademik';
    public $lang = '';

    public function __construct()
    {
        parent::__construct();
        $this->lang = get_cookie('lang');
        $this->load->library('counter');
        $this->counter->add_visitor($this->input->ip_address());
    }

    public function index($slug = '')
    {
        $akademik = $this->crud->gd($this->table,array('slug_'.$this->lang => $slug));
        $akademik_en = $this->crud->gd('akademik_en',array('id_akademik_en' => $akademik->id_akademik));
        
        if($akademik == null) return view_error("Error 404", 404, 'homepage');

        $latest = $this->crud->gwlo($this->search, array('publikasi' => 'Publish'), 5, 0, 'iat DESC');
        $data = array(  'title'     => $akademik->{'nama_'.$this->lang},
                        'latest'   => $latest,
                        'data'  => $akademik,
                        'data_en' => $akademik_en,
                        'isi'       => 'homepage/akademik/view_#'.$this->lang);
        $this->load->view('homepage/_layout/wrapper', $data);
    }

}
