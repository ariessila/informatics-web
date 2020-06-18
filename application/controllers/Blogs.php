<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blogs extends Public_Controller {

    private $table = 'blogs';
    private $pk = 'id_blogs';
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

        $kategori = ( $this->input->get('kategori', TRUE) ? $this->input->get('kategori', TRUE) : ($this->input->get('category', TRUE) ? $this->input->get('category', TRUE) : "Semua"));

        if($kategori == "Semua")
            $config['total_rows'] = $this->crud->cw($this->table, array('publikasi' => 'Publish'));
        else
            $config['total_rows'] = $this->crud->cwlike($this->table, array('publikasi' => 'Publish'), array('kategori' => $kategori));
        
        $q = $this->input->get('q', TRUE) ? $this->input->get('q', TRUE) : NULL;
        $cari_query = cari_query($q, array('judul_'.$this->lang, 'isi_'.$this->lang, 'users.fullname'));

        if($q != NULL)
            $config['total_rows'] = $this->blogs_model->countPublish($cari_query);
        

        $offset = (($this->input->get('p', TRUE) ? $this->input->get('p', TRUE) : 1) - 1) * $config['per_page'];

        if ($this->lang == 'en')
        {
            $config = pagination_en($config);
        }
        $this->pagination->initialize($config);

        if($kategori == "Semua")
            $blogs = $this->crud->gjwlo('users',$this->table, 'id_user' ,array($this->table.'.publikasi' => 'Publish'), $config['per_page'], $offset, $this->table.'.iat DESC');
        else
            $blogs = $this->crud->gjwlikelo('users', $this->table, 'id_user' ,array($this->table.'.publikasi' => 'Publish'), array('kategori' => $kategori), $config['per_page'], $offset, $this->table.'.iat DESC');
        
        if($q != NULL)
            // $blogs = $this->blogs_model->listing($config['per_page'], $offset, $cari_query, array('publikasi', 'Publish'));
            $blogs = $this->crud->gjwlo('users', $this->table, 'id_user' ,$cari_query. " AND Publikasi = 'Publish'", $config['per_page'], $offset, $this->table.'.iat DESC');

        //     var_dump($blogs);
        // die();
        $latest = empty_blog_en($this->lang);
        $data = array(  'title'         => $kategori,
                        'title_en'      => 'All News', 
                        'blogs'        =>  $blogs,
                        'latest'        => $latest,
                        'news'          => $latest,
                        'pagination'    => $this->pagination->create_links(),
                        'isi'           => 'homepage/blogs/list_#'.$this->lang);
        $this->load->view('homepage/_layout/wrapper', $data);
    }

    public function detail($slug = '')
    {
        $blogs = $this->crud->gjd('users',$this->table,'id_user',array('slug_'.$this->lang => $slug));
        if($blogs == null) return view_error("Error 404", 404, 'homepage');
        $latest = $this->crud->gwlo($this->table, array('publikasi' => 'Publish'), 5, 0, 'iat DESC');

        $data = array(  'title'     => $blogs->{'judul_'.$this->lang},
                        'blogs'    => $blogs,
                        'latest'        => $latest,
                        'isi'       => 'homepage/blogs/detail_#'.$this->lang);
        $this->load->view('homepage/_layout/wrapper', $data);
    }

    public function switch_lang($lang)
    {
        set_lang($lang);
        header('Content-Type: text/plain');
        echo 'oke';;
    }

}
