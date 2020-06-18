<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Informasi extends Public_Controller {

    private $table = 'informasi';
    private $pk = 'id_informasi';
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
        $config['per_page'] = 4;
        $config['cur_tag_open'] = "<li><a href='#' class='active'>";
        $q = $this->input->get('q', TRUE) ? $this->input->get('q', TRUE) : NULL;
        $cari_query = cari_query($q, array('judul', 'isi', 'users.fullname'));

        if($q != NULL)
            $config['total_rows'] = $this->informasi_model->countPublish($cari_query);


        $offset = (($this->input->get('p', TRUE) ? $this->input->get('p', TRUE) : 1) - 1) * $config['per_page'];
        if ($this->lang == 'en')
        {
            $config = pagination_en($config);
        }

        $this->pagination->initialize($config);

        $informasi = $this->crud->gjwlo('users', $this->table, 'id_user' ,$cari_query. " AND Publikasi = 'Publish'", $config['per_page'], $offset, $this->table.'.iat DESC');
        $latest = $this->crud->gwlo($this->table, array('publikasi' => 'Publish'), 5, 0, 'iat DESC');
        $data = array(  'title'         => 'Semua Informasi',
                        'informasi'        =>  $informasi,
                        'pagination'    => $this->pagination->create_links(),
                        'latest'        => $latest,
                        'isi'           => 'homepage/informasi/list_#'.$this->lang);
        $this->load->view('homepage/_layout/wrapper', $data);
    }

    public function detail($slug = '')
    {
        $informasi = $this->crud->gjd('users', $this->table, 'id_user',array('slug_'.$this->lang => $slug));

        if($informasi == null) return view_error("Error 404", 404, 'homepage');
        $latest = $this->crud->gwlo($this->table, array('publikasi' => 'Publish'), 5, 0, 'iat DESC');

        $data = array(  'title'     => $informasi->judul,
                        'informasi'    => $informasi,
                        'latest'        => $latest,
                        'isi'       => 'homepage/informasi/detail_#'.$this->lang);
        $this->load->view('homepage/_layout/wrapper', $data);
    }
}
