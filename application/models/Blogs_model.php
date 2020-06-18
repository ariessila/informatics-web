<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blogs_model extends CI_Model {

	// Ambil semua data
	public function listing($limit, $offset, $cari_query = 1, $publish = 1)
	{
		
		$this->db->from('blogs');
		$this->db->where($publish);
		// Relasi dengan table `kategori_blogs`
		$this->db->join('users', 'users.id_user = blogs.id_user', 'LEFT');
		$this->db->where($cari_query);
		$this->db->limit($limit, $offset);
		$this->db->order_by('blogs.iat', 'DESC');
		$query = $this->db->get();
		return $query->result();
	}

	// Hitung semua data
	public function count($cari_query = 1)
	{
		$this->db->from('blogs');
		// Relasi dengan table `kategori_blogs`
		$this->db->join('users', 'users.id_user = blogs.id_user', 'LEFT');
		$this->db->where($cari_query);
		return $this->db->count_all_results();
	}

	// Hitung semua data publish
	public function countPublish($cari_query = 1)
	{
		$this->db->from('blogs');
		$this->db->where('publikasi', 'Publish');
		// Relasi dengan table `kategori_blogs`
		$this->db->join('users', 'users.id_user = blogs.id_user', 'LEFT');
		$this->db->where($cari_query);
		return $this->db->count_all_results();
	}

	// Ambil semua data yang berstatus "Publish"
	public function get_published_id()
	{
		$this->db->join('blogs', 'users.id_user = blogs.id_user', 'LEFT');
		$this->db->where('blogs.publikasi', 'Publish');
		// $this->db->where('blogs.judul_en != ""');
		$this->db->where('blogs.publikasi', 'Publish');
		// Relasi dengan table `kategori_blogs`
		$this->db->limit(4,0);
		$this->db->order_by('blogs.iat', 'DESC');
		$query = $this->db->get('users');
		return $query->result();
	}

	public function get_published_en()
	{
		$this->db->join('blogs', 'users.id_user = blogs.id_user', 'LEFT');
		$this->db->where('blogs.publikasi', 'Publish');
		$this->db->where('blogs.judul_en != ""');
		$this->db->where('blogs.isi_en != ""');
		$this->db->where('blogs.publikasi', 'Publish');
		// Relasi dengan table `kategori_blogs`
		$this->db->limit(4,0);
		$this->db->order_by('blogs.iat', 'DESC');
		$query = $this->db->get('users');
		return $query->result();
	}

	public function get_published_nasional()
	{
		// $this->db->from('blogs');
		// Relasi dengan table `kategori_blogs`
		$this->db->join('blogs', 'users.id_user = blogs.id_user', 'LEFT');
		$this->db->where('blogs.publikasi', 'Publish');
		$this->db->like('blogs.kategori', 'nasional');
		$this->db->limit(3,0);
		$this->db->order_by('blogs.iat', 'DESC');
		return $this->db->get('users')->result();
	}


	public function get_published_internasional()
	{
		// $this->db->from('blogs');
		// Relasi dengan table `kategori_blogs`
		$this->db->join('blogs', 'users.id_user = blogs.id_user', 'LEFT');
		$this->db->where('blogs.publikasi', 'Publish');
		$this->db->like('blogs.kategori', 'international');
		$this->db->limit(3,0);
		$this->db->order_by('blogs.iat', 'DESC');
		return $this->db->get('users')->result();
	}
	// Ambil data berdasarkan id_blog
	public function detail($id_blog)
	{
		$query = $this->db->get_where('blogs', array('id_blog'	=> $id_blog));
		return $query->row();
	}

	// Ambil data berdasarkan slug_blogs
	public function show($slug)
	{
		$query = $this->db->get_where('blogs', array('slug'	=> $slug));
		return $query->row();
	}

	// Tambah data
	public function tambah($data)
	{
		$this->db->insert('blogs', $data);
	}

	// Update data
	public function edit($data)
	{
		$this->db->where('id_blog', $data['id_blog']);
		$this->db->update('blogs', $data);
	}

	// Hapus data
	public function hapus($data)
	{
		$this->db->where('id_blog', $data['id_blog']);
		$this->db->delete('blogs', $data);
	}
}
