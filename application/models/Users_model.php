<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_model extends CI_Model {

	// Ambil semua data
	public function listing($limit, $offset, $cari_query = 1)
	{
		$this->db->from('users');
		$this->db->where($cari_query);
		$this->db->limit($limit, $offset);
		$this->db->order_by('uat', 'DESC');
		$query = $this->db->get();
		return $query->result();
	}

	// Hitung semua data
	public function count($cari_query = 1)
	{
		$this->db->from('users');
		$this->db->where($cari_query);
		return $this->db->count_all_results();
	}

	// Ambil data berdasarkan id_user
	public function detail($id_user)
	{
		$query = $this->db->get_where('users', array('id_user'	=> $id_user));
		return $query->row();
	}

	// Tambah data
	public function tambah($data)
	{
		$this->db->insert('users', $data);
	}

	// Update data
	public function edit($data)
	{
		$this->db->where('id_user', $data['id_user']);
		$this->db->update('users', $data);
	}

	// Hapus data
	public function hapus($data)
	{
		$this->db->where('id_user', $data['id_user']);
		$this->db->delete('users', $data);
	}
}
