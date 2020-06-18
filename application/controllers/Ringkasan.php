<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ringkasan extends Public_Controller {

    private $table = 'halaman';
    private $search = 'blogs';
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
        // list berita & pencarian
        $config['per_page'] = 4;
        $config['cur_tag_open'] = "<li><a href='#' class='active'>";

        $kategori = ( $this->input->get('kategori', TRUE) ? $this->input->get('kategori', TRUE) : ($this->input->get('category', TRUE) ? $this->input->get('category', TRUE) : "Semua"));

        if($kategori == "Semua")
            $config['total_rows'] = $this->crud->cw($this->search, array('publikasi' => 'Publish'));
        else
            $config['total_rows'] = $this->crud->cwlike($this->search, array('publikasi' => 'Publish'), array('kategori' => $kategori));
        
        $q = $this->input->get('q', TRUE) ? $this->input->get('q', TRUE) : NULL;
        $cari_query = cari_query($q, array('judul_'.$this->lang, 'isi_'.$this->lang, 'users.fullname'));

        if($q != NULL)
            $config['total_rows'] = $this->blogs_model->countPublish($cari_query);
        

        $offset = (($this->input->get('p', TRUE) ? $this->input->get('p', TRUE) : 1) - 1) * $config['per_page'];

        $this->pagination->initialize($config);

        if($kategori == "Semua")
            $blogs = $this->crud->gjwlo('users',$this->search, 'id_user' ,array($this->search.'.publikasi' => 'Publish'), $config['per_page'], $offset, $this->search.'.iat DESC');
        else
            $blogs = $this->crud->gjwlikelo('users', $this->search, 'id_user' ,array($this->search.'.publikasi' => 'Publish'), array('kategori' => $kategori), $config['per_page'], $offset, $this->search.'.iat DESC');
        
        if($q != NULL)
            // $blogs = $this->blogs_model->listing($config['per_page'], $offset, $cari_query, array('publikasi', 'Publish'));
            $blogs = $this->crud->gjwlo('users', $this->search, 'id_user' ,$cari_query. " AND Publikasi = 'Publish'", $config['per_page'], $offset, $this->search.'.iat DESC');

        //     var_dump($blogs);
        // die();
        $latest = $this->crud->gwlo($this->search, array('publikasi' => 'Publish'), 5, 0, 'iat DESC');
        // akreditasi
        $data = $this->crud->gw($this->table, array('id_halaman' => 8))[0];
        $pengaturan = $this->crud->gw('pengaturan', array('id_pengaturan' => 1))[0];
        
        $data = array(  'title'     => $data->{'nama_'.$this->lang},
                        'data'    => $data,
                        'blogs'     => $blogs,
                        'latest'    => $latest,
                        'news'      => $latest,
                        'pengaturan'    => $pengaturan,
                        'isi'       => 'homepage/ringkasan/view_#'.$this->lang);
        $this->load->view('homepage/_layout/wrapper', $data);
    }

    public function pages($link)
    {
        $page = $this->db->where('link_en', $link)->or_where('link_id', $link)->get($this->table)->row();
        if (!$page) {
            if ($this->lang == 'en') {
                $data = array(  'title'     => 'Error 404',
                                'page'      => '<h2 class="title-page">Page Not Found!</h2><p>The page you are looking for is not found.</p><br/><br/>',
                                'isi'       => 'homepage/_error/404');
            } else {
                $data = array(  'title'     => 'Error 404',
                                'page'      => '<h2 class="title-page">Halaman tidak ditemukan!</h2><p>Sepertinya halaman yang Anda cari tidak ditemukan.</p><br/><br/>',
                                'isi'       => 'homepage/_error/404');
            }
            $this->load->view('homepage/_layout/wrapper', $data);
            return;
        }
        $data = array(  'title'     => $page->nama_id,
                        'page'      => $page,
                        'isi'       => 'homepage/home/view_#'.$this->lang);
        $this->load->view('homepage/_layout/wrapper', $data);
    }

    public function switch_lang($lang)
    {
        set_lang($lang);
        header('Content-Type: text/plain');
        echo 'oke';;
    }
}
