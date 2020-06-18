<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Akreditasi extends Public_Controller {

    private $table = 'halaman';
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
        $data = $this->crud->gw($this->table, array('id_halaman' => 88541697))[0];
        $pengaturan = $this->crud->gw('pengaturan', array('id_pengaturan' => 1))[0];
        
        $data = array(  'title'     => $data->{'nama_'.$this->lang},
                        'data'    => $data,
                        'pengaturan'    => $pengaturan,
                        'isi'       => 'homepage/akreditasi/view_#'.$this->lang);
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
    
    function PindahDataLogin(){
        $all_dosen = $this->crud_fakultas->ga('dosen');
        $total_data = $this->crud_fakultas->ca('dosen');

        //hash
        $pass = '123456';
        $hash_pass = do_hash($pass);

        //checlk
        $check = TRUE;
        var_dump('total data : '.$total_data);
        $i = 1;
        foreach ($all_dosen as $dosen ) {
            var_dump('data ke-'.$i);
            $i++;
            $data_id = acak_id('users', 'id_user')['id'];
            $params = array(
                        'id_user' => $data_id,
                        'username' => $dosen->nip,
                        'password' => $hash_pass,
                        'roles' => 'dosen',
                        'email' => $dosen->email_dosen,
                        );
            if ($this->crud->gd('users', array("username"=>$dosen->nip)))
                continue;
            else
            {
                $result = $this->crud->i('users', $params);
                if($this->db->affected_rows() == 0){
                $check = FALSE;
                var_dump($params, 'Data dosen dengan nip: '. $dosen->nip . ' Gagal Dipindahkan. Proses dihentikan');
                die();
                }
            }
        
        }

        return die('Proses selesai! semua data dosen berhasil dipindahkan');
        }
}
