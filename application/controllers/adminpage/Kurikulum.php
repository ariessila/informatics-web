<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kurikulum extends Admin_Controller {
    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
        $kurikulum = $this->db->query("SELECT * FROM kurikulum")->result();
        $data = array(
            'title' => 'Kurikulum',
            'kurikulum' => $kurikulum,
            'isi'       => 'adminpage/akademik/kurikulum'
        );
        $this->load->view('adminpage/_layout/wrapper', $data);
    }

    public function addKurikulum(){
        $input = $this->input->post(NULL, TRUE);
        $data = array(
            'matkul'    => $input['matkul'],
            'deskripsi' => $input['deskripsi'],
            'en_matkul' => $input['en_matkul'],
            'en_deskripsi'  => $input['en_deskripsi']
        );
        $this->db->insert('kurikulum',$data);
        $this->session->set_flashdata('Info','Data Sukses ditambahkan');
        redirect('adminpage/Kurikulum');
    }

    public function editKurikulum($id){
        $where = array('id' => $id);
        $load = $this->input->post(NULL,TRUE);
        $data = array(
            'matkul'    => $load['matkul'],
            'deskripsi' => $load['deskripsi'],
            'en_matkul' => $load['en_matkul'],
            'en_deskripsi'  => $load['en_deskripsi']
        );
        $this->crud->u('kurikulum',$data,$where);
        $this->session->set_flashdata('Info','Data Sukses diubah');
        redirect('adminpage/Kurikulum');
    }

    public function deleteKurikulum($id){
        $where = array(
            'id'    => $id
        );
        $this->crud->d('kurikulum',$where);
        $this->session->set_flashdata('Info','Data Sukses dihapus');
        redirect('adminpage/Kurikulum');
    }
}