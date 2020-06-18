<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Download extends Public_Controller {

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

    public function index($slug = '')
    {
        $config['per_page'] = 6;
        $config['cur_tag_open'] = "<li><a href='#' class='active'>";
        
        $data = $this->crud->gw($this->table, array('id_halaman' => 23))[0];
        $pengaturan = $this->crud->gw('pengaturan', array('id_pengaturan' => 1))[0];
        
        $q = $this->input->get('q', TRUE) ? $this->input->get('q', TRUE) : NULL;
        $cari_query = cari_query($q, array('nama_file'));
        
        $config['total_rows'] = $this->crud->cw('download', $cari_query);

        $offset = (($this->input->get('p', TRUE) ? $this->input->get('p', TRUE) : 1) - 1) * $config['per_page'];

        if ($this->lang == 'en')
        {
            $config = pagination_en($config);
        }
        $this->pagination->initialize($config);

        $halaman = $this->crud->gwlo('download' ,$cari_query, $config['per_page'], $offset, 'nama_file ASC');
        
        $data = array(  'title'     => $data->{'nama_'.$this->lang},
                        'data'    => $data,
                        'pengaturan'    => $pengaturan,
                        'halaman'   => $halaman,
                        'offset'        => $offset,
                        'pagination'    => $this->pagination->create_links(),
                        'isi'       => 'homepage/download/view_#'.$this->lang);
        $this->load->view('homepage/_layout/wrapper', $data);
    }

    public function detail($slug = '')
    {
        $lab = $this->crud->gd($this->table,array('slug_'.$this->lang => $slug));
        if ($lab != NULL){
            $staf = explode(",",$lab->staf);
        }
        if($lab == null) return view_error("Error 404", 404, 'homepage');

        $latest = $this->crud->gwlo($this->search, array('publikasi' => 'Publish'), 5, 0, 'iat DESC');
        $data = array(  'title'     => $lab->lab_id,
                        'latest'   => $latest,
                        'staf'      => $staf,
                        'lab'    => $lab,
                        'isi'       => 'homepage/download/view_#'.$this->lang);
        $this->load->view('homepage/_layout/wrapper', $data);
    }

    public function unduh()
    {
        $this->load->helper('download');
        $data=$this->uri->segment(3);
		$get_db=$this->crud->gd('download',array('id_download'=>$data));
        $file=$get_db->file;
        $folder ='file';
		$path='./'.upload_path($folder).$file;
		$data =  file_get_contents($path);
		$name = $file;

		force_download($name, $data); 
		redirect('admin/index');
    }

}
