<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends Public_Controller {

    private $table = 'halaman';
    private $pk = 'id_halaman';
    public $lang = '';

    public function __construct()
    {
        parent::__construct();
        $this->lang = get_cookie('lang');
        $this->load->library('counter');
        $this->counter->add_visitor($this->input->ip_address());
    }

    public function index()
    {
        redirect(site_url());
    }

    public function view($link)
    {
        if ($this->lang == 'en') {
            // $halaman = $this->crud->gd($this->table, array('link_en' => $link));
            $halaman = $this->db->where('link_en', $link)->or_where('link_id', $link)->get($this->table)->row();
            $data = array(  'title'     => $halaman->nama_en,
                            'halaman'   => $halaman,
                            'isi'       => 'homepage/pages/view_#'.$this->lang);
        } else {
            // $halaman = $this->crud->gd($this->table, array('link_id' => $link));
            $halaman = $this->db->where('link_id', $link)->or_where('link_en', $link)->get($this->table)->row();
            $data = array(  'title'     => $halaman->nama_id,
                            'halaman'   => $halaman,
                            'isi'       => 'homepage/pages/view_#'.$this->lang);
        }

        $this->load->view('homepage/_layout/wrapper', $data);
    }
}
