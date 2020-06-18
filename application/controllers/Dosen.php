
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dosen extends Public_Controller
{

    private $table = 'halaman';
    private $search = 'blogs';
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
        $config['per_page'] = 10;
        $config['cur_tag_open'] = "<li><a href='#' class='active'>";

        $data = $this->crud->gw($this->table, array('id_halaman' => 13))[0];
        $pengaturan = $this->crud->gw('pengaturan', array('id_pengaturan' => 1))[0];

        $q = $this->input->get('q', true) ? $this->input->get('q', true) : null;
        $cari_query = cari_query($q, array('nip', 'nama_dosen', 'jabatan_dosen', 'email_dosen', 'bidang_penelitian'));

        $config['total_rows'] = $this->crud_fakultas->cw('dosen', $cari_query);

        $offset = (($this->input->get('p', true) ? $this->input->get('p', true) : 1) - 1) * $config['per_page'];
        if ($this->lang == 'en') {
            $config = pagination_en($config);
        }

        $this->pagination->initialize($config);
        $halaman = $this->crud_fakultas->gwlo('dosen', $cari_query, $config['per_page'], $offset, 'nip ASC');

        $data = array('title' => $data->{'nama_' . $this->lang},
            'data' => $data,
            'pengaturan' => $pengaturan,
            'halaman' => $halaman,
            'offset' => $offset,
            'pagination' => $this->pagination->create_links(),
            'isi' => 'homepage/dosen/view_#' . $this->lang);
        $this->load->view('homepage/_layout/wrapper', $data);
    }

    public function detail($slug = '')
    {
        $this->load->model('informasi_model');
        $dosen = $this->crud_fakultas->gd('dosen', array('nip' => $slug));
        $_load = $this->load->database('fakultas', true);
        // debug($_load);
        $publikasi = $this->model_join->get_publikasi($dosen->nama_dosen, $_load);
        $penelitian = $this->model_join->get_penelitian($dosen->nama_dosen, $_load);
        $pengabdian = $this->model_join->get_pengabdian($dosen->nama_dosen, $_load);
        // debug($dosen);
        $kuliah = $this->model_join->get_kuliah($dosen->nip, $_load);
        $informasi = $this->informasi_model->get_published_top();
        if ($dosen == null) {
            return view_error("Error 404", 404, 'homepage');
        }
        $latest = empty_blog_en($this->lang);

        $data = array('title' => ($dosen->gelar_depan != '' ? $dosen->gelar_depan . '. ' : '') . $dosen->nama_dosen . ($dosen->gelar_belakang != '' ? ', ' . $dosen->gelar_belakang : ''),
            'latest' => $latest,
            'dosen' => $dosen,
            'publikasi' => $publikasi,
            'informasi' => $informasi,
            'kuliah' => $kuliah,
            'penelitian' => $penelitian,
            'pengabdian' => $pengabdian,
            'isi' => 'homepage/dosen/detail_#' . $this->lang);
        $this->load->view('homepage/_layout/wrapper', $data);
    }

    public function pages($link)
    {
        $page = $this->db->where('link_en', $link)->or_where('link_id', $link)->get($this->table)->row();
        if (!$page) {
            if ($this->lang == 'en') {
                $data = array('title' => 'Error 404',
                    'page' => '<h2 class="title-page">Page Not Found!</h2><p>The page you are looking for is not found.</p><br/><br/>',
                    'isi' => 'homepage/_error/404');
            } else {
                $data = array('title' => 'Error 404',
                    'page' => '<h2 class="title-page">Halaman tidak ditemukan!</h2><p>Sepertinya halaman yang Anda cari tidak ditemukan.</p><br/><br/>',
                    'isi' => 'homepage/_error/404');
            }
            $this->load->view('homepage/_layout/wrapper', $data);
            return;
        }
        $data = array('title' => $page->nama_id,
            'page' => $page,
            'isi' => 'homepage/home/view_#' . $this->lang);
        $this->load->view('homepage/_layout/wrapper', $data);
    }

    public function switch_lang($lang)
    {
        set_lang($lang);
        header('Content-Type: text/plain');
        echo 'oke';
    }
}
