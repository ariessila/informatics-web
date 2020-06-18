<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Informasi_model extends CI_Model {
    public function __construct()
    {
        parent::__construct();
        
    }

	// Ambil semua data
	public function listing($limit, $offset, $cari_query = 1, $publish = 1)
	{
		$this->db->from('informasi');
		$this->db->where($publish);
		// Relasi dengan table `kategori_informasi`
		$this->db->join('users', 'users.id_user = informasi.id_user', 'LEFT');
		$this->db->where($cari_query);
		$this->db->limit($limit, $offset);
		$this->db->order_by('informasi.iat', 'DESC');
		$query = $this->db->get();
		return $query->result();
	}

	// Hitung semua data
	public function count($cari_query = 1)
	{
		$this->db->from('informasi');
		// Relasi dengan table `kategori_informasi`
		$this->db->join('users', 'users.id_user = informasi.id_user', 'LEFT');
		$this->db->where($cari_query);
		return $this->db->count_all_results();
	}

	// Hitung semua data publish
	public function countPublish($cari_query = 1)
	{
		$this->db->from('informasi');
		$this->db->where('publikasi', 'Publish');
		// Relasi dengan table `kategori_informasi`
		$this->db->join('users', 'users.id_user = informasi.id_user', 'LEFT');
		$this->db->where($cari_query);
		return $this->db->count_all_results();
	}

	// Ambil semua data yang berstatus "Publish"
	public function get_published_top()
	{
		// $this->db->from('informasi');
		// Relasi dengan table `kategori_informasi`
		$this->db->join('informasi', 'users.id_user = informasi.id_user', 'LEFT');
		$this->db->where('informasi.publikasi', 'Publish');
		$this->db->limit(3,0);
		$this->db->order_by('informasi.iat', 'DESC');
		return $this->db->get('users')->result();
	}

	public function get_published_id()
	{
		$this->db->join('informasi', 'users.id_user = informasi.id_user', 'LEFT');
		$this->db->where('informasi.publikasi', 'Publish');
		// $this->db->where('informasi.judul_en != ""');
		$this->db->where('informasi.publikasi', 'Publish');
		// Relasi dengan table `kategori_informasi`
		$this->db->limit(4,0);
		$this->db->order_by('informasi.iat', 'DESC');
		$query = $this->db->get('users');
		return $query->result();
	}

	public function get_published_en($f)
	{
		$this->db->join('informasi', 'users.id_user = informasi.id_user', 'LEFT');
		$this->db->where('informasi.publikasi', 'Publish');
		$this->db->where('informasi.judul_en != ""');
		$this->db->where('informasi.isi_en != ""');
		$this->db->where('informasi.publikasi', 'Publish');
		//$this->db->like($cari_query. " AND Publikasi = 'Publish'");
		// Relasi dengan table `kategori_informasi`
		$this->db->limit(4,$f);
		$this->db->order_by('informasi.iat', 'DESC');
		$query = $this->db->get('users');
		return $query->result();
	}

	// Ambil semua data yang berstatus "Publish"
	public function get_published()
	{
		$this->db->from('informasi');
		$this->db->where('publikasi', 'Publish');
		// Relasi dengan table `kategori_informasi`
		$this->db->join('users', 'users.id_user = informasi.id_user', 'LEFT');
		$this->db->order_by('iat', 'DESC');
		$query = $this->db->get();
		return $query->result();
	}

	// Ambil data berdasarkan id_blog
	public function detail($id_blog)
	{
		$query = $this->db->get_where('informasi', array('id_blog'	=> $id_blog));
		return $query->row();
	}

	// Ambil data berdasarkan slug_informasi
	public function show($slug)
	{
		$query = $this->db->get_where('informasi', array('slug'	=> $slug));
		return $query->row();
	}

	// Tambah data
	public function tambah($data)
	{
		$this->db->insert('informasi', $data);
	}

	// Update data
	public function edit($data)
	{
		$this->db->where('id_blog', $data['id_blog']);
		$this->db->update('informasi', $data);
	}

	// Hapus data
	public function hapus($data)
	{
		$this->db->where('id_blog', $data['id_blog']);
		$this->db->delete('informasi', $data);
	}
}
