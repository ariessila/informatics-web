<?php defined('BASEPATH') or exit('No direct script access allowed');
class Model_join extends CI_Model
{

    public function get_publikasi($id, $dosen)
    {

        $dosen->select('*');
        $dosen->from('dosen');
        $dosen->join('publikasi_dosen', 'publikasi_dosen.oleh = dosen.nama_dosen', 'LEFT');
        $dosen->where('publikasi_dosen.oleh', $id);
        // Relasi dengan table `kategori_blogs`
        $query = $dosen->get();
        return $query->result();
    }

    public function get_penelitian($id, $dosen)
    {

        $dosen->select('*');
        $dosen->from('dosen');
        $dosen->join('penelitian', 'penelitian.ketua_penelitian = dosen.nama_dosen', 'LEFT');
        $dosen->where('penelitian.ketua_penelitian', $id);
        // Relasi dengan table `kategori_blogs`
        $query = $dosen->get();
        return $query->result();
    }

    public function get_kuliah($id, $dosen)
    {

        $dosen->select('*');
        $dosen->from('dosen');
        $dosen->join('kuliah', 'kuliah.nip = dosen.nip', 'LEFT');
        $dosen->where('kuliah.nip', $id);
        // Relasi dengan table `kategori_blogs`
        $query = $dosen->get();
        return $query->result();
    }

    public function anggotalab($id)
    {
        $this->db->select('dosen');
        $this->db->from('lab');
        $this->db->join('anggota_lab', 'anggota_lab.id_lab = lab.id_lab', 'LEFT');
        $this->db->where('anggota_lab.id_lab', $id);
        // Relasi dengan table `kategori_blogs`
        $query = $this->db->get();
        return $query->result();
    }

    public function get_pengabdian($id, $dosen)
    {

        $dosen->select('*');
        $dosen->from('dosen');
        $dosen->join('pengabdian', 'pengabdian.ketua = dosen.nama_dosen', 'LEFT');
        $dosen->where('pengabdian.ketua', $id);
        // Relasi dengan table `kategori_blogs`
        $query = $dosen->get();
        return $query->result();
    }
}
