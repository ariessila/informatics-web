<?php

class halaman_model{
	private $db;
	public function __construct($database){
		$this->db = $database;
	}

	public function getManajemenHalaman(){

		$query = $this->db->prepare("select * from manajemen_halaman_dosen ");
	
		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
		return $query->fetch(PDO::FETCH_ASSOC);
		}

	public function getHalamanBefore($nip){

		$query = $this->db->prepare("select * from halaman_dosen where parent_halaman = 0 and posisi = '$nip' order by id_halaman desc");
	
		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
		return $query->fetchAll(PDO::FETCH_ASSOC);
		}

	public function getHalaman($a,$b,$nip){

		$query = $this->db->prepare("select * from halaman_dosen where posisi = :nip order by urutan asc limit :a , :b");
		$query->bindParam(':a',$a,PDO::PARAM_INT);
		$query->bindParam(':b',$b,PDO::PARAM_INT);
		$query->bindParam(':nip',$nip,PDO::PARAM_STR);
		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
		return $query->fetchAll(PDO::FETCH_ASSOC);
		}

	public function countHalaman($nip){

		$query = $this->db->prepare("select * from halaman_dosen where posisi = '$nip' order by id_halaman desc");
			try{
				$query->execute();

				return $query->rowCount();
			}catch(PDOException $e){
				die($e->getMessage());
			}
		}
		
		
	public function getUraian($id){
		if(is_numeric($id)){
			$query = $this->db->prepare("select * from uraian where id_halaman= :a order by id_halaman ASC ");
			$query->bindParam(':a',$id,PDO::PARAM_INT);
			try{
				$query->execute();
			}catch(PDOException $e){
				die($e->getMessage());
			}
			return $query->fetchAll(PDO::FETCH_ASSOC);
			}
	}
		
	public function getFile($id){
		if(is_numeric($id)){
			$query = $this->db->prepare("select * from download where id_halaman= :a order by id ASC ");
			$query->bindParam(':a',$id,PDO::PARAM_INT);
			try{
				$query->execute();
			}catch(PDOException $e){
				die($e->getMessage());
			}
			return $query->fetchAll(PDO::FETCH_ASSOC);
			}
	}
	
	public function getHalamanById($id){

		$query = $this->db->prepare("select * from halaman_dosen where id_halaman = :id");
		$query->bindParam(':id',$id,PDO::PARAM_INT);
		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
		return $query->fetch(PDO::FETCH_ASSOC);
	}
	
	public function getFileById($id){

		$query = $this->db->prepare("select * from download where id = :id");
		$query->bindParam('id',$id,PDO::PARAM_INT);
		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
		return $query->fetch(PDO::FETCH_ASSOC);
	}
	
	public function insertHalaman($judul_id,$judul_en,$konten_en,$konten_id,$link_halaman_id,$link_halaman_en,$gambar,$publish,$id,$posisi){
		
		$query = $this->db->prepare("INSERT INTO `halaman_dosen` SET 	id_halaman = :id,
																judul_halaman_id = :judul_id,
																judul_halaman_en = :judul_en,
																konten_en = :konten_en, 
																konten_id = :konten_id, 
																link_halaman_id = :link_halaman_id,
																link_halaman_en = :link_halaman_en,
																gambar = :gambar,
																posisi = :posisi,
																publish = :publish											
		");
		$query->bindParam(':id',$id,PDO::PARAM_INT);
		$query->bindParam(':judul_id',$judul_id,PDO::PARAM_STR);
		$query->bindParam(':judul_en',$judul_en,PDO::PARAM_STR);
		$query->bindParam(':konten_en',$konten_en,PDO::PARAM_STR);
		$query->bindParam(':konten_id',$konten_id,PDO::PARAM_STR);
		$query->bindParam(':link_halaman_id',$link_halaman_id,PDO::PARAM_STR);
		$query->bindParam(':link_halaman_en',$link_halaman_en,PDO::PARAM_STR);
		$query->bindParam(':gambar',$gambar);
		$query->bindParam(':posisi',$posisi);
		$query->bindParam(':publish',$publish);
		try{
			$query->execute();
			return true;
		}
		catch(PDOException $e){
		return	die($e->getMessage());
		
		}		
	}
	
	public function insetFileHalaman($id_halaman,$judul,$nama_file){
		
		$query = $this->db->prepare("INSERT INTO `download` SET 	id_halaman = :id,
																	judul = :judul,
																	nama_file = :nama_file
		");
		$query->bindParam(':id',$id_halaman,PDO::PARAM_INT);
		$query->bindParam(':judul',$judul,PDO::PARAM_STR);
		$query->bindParam(':nama_file',$nama_file,PDO::PARAM_STR);
		try{
			$query->execute();
			return true;
		}
		catch(PDOException $e){
		return	die($e->getMessage());
		
		}		
	}
	
	
	public function insertUraian($nama,$id){
		
		$query = $this->db->prepare("INSERT INTO `uraian` SET 	id_halaman = :id,
																uraian = :nama
		");
		$query->bindParam(':id',$id,PDO::PARAM_INT);
		$query->bindParam(':nama',$nama,PDO::PARAM_STR);
		try{
			$query->execute();
			return true;
		}
		catch(PDOException $e){
		return	die($e->getMessage());
		
		}		
	}
	
	
	public function updateHalaman($judul_halaman_id,$judul_halaman_en,$konten_en,$konten_id,$link_halaman_id,$link_halaman_en,$gambar,$publish,$id,$posisi){
		
		$query = $this->db->prepare("UPDATE `halaman_dosen` SET 		judul_halaman_id = :judul_halaman_id,
																judul_halaman_en = :judul_halaman_en,
																konten_en = :konten_en, 
																konten_id = :konten_id, 
																link_halaman_id = :link_halaman_id,
																link_halaman_en = :link_halaman_en,
																gambar = :gambar,
																posisi = :posisi,
																publish = :publish
																where id_halaman = :id
		");
		$query->bindParam(':id',$id,PDO::PARAM_INT);
		$query->bindParam(':judul_halaman_id',$judul_halaman_id,PDO::PARAM_STR);
		$query->bindParam(':judul_halaman_en',$judul_halaman_en,PDO::PARAM_STR);
		$query->bindParam(':konten_en',$konten_en,PDO::PARAM_STR);
		$query->bindParam(':konten_id',$konten_id,PDO::PARAM_STR);
		$query->bindParam(':link_halaman_id',$link_halaman_id,PDO::PARAM_STR);
		$query->bindParam(':link_halaman_en',$link_halaman_en,PDO::PARAM_STR);
		$query->bindParam(':gambar',$gambar);
		$query->bindParam(':posisi',$posisi);
		$query->bindParam(':publish',$publish);
		try{
			$query->execute();
			return true;
		}
		catch(PDOException $e){
		return	die($e->getMessage());
		
		}		
	}
	
	
	public function deleteHalaman($id){
		if(is_numeric($id)){
			
			$sql="DELETE FROM `halaman_dosen` WHERE `id_halaman` = ?";
			$query = $this->db->prepare($sql);
			$query->bindParam(1, $id,PDO::PARAM_INT);
			
			try{
				$query->execute();
			}
			catch(PDOException $e){
				die($e->getMessage());
			}
		}
	}
	
	public function deleteUraian($id){
		if(is_numeric($id)){
			
			$sql="DELETE FROM `uraian` WHERE `id` = ?";
			$query = $this->db->prepare($sql);
			$query->bindParam(1, $id,PDO::PARAM_INT);
			
			try{
				$query->execute();
			}
			catch(PDOException $e){
				die($e->getMessage());
			}
		}
	}	
	
	public function deleteFile($id){
		if(is_numeric($id)){
			
			$sql="DELETE FROM `download` WHERE `id` = ?";
			$query = $this->db->prepare($sql);
			$query->bindParam(1, $id,PDO::PARAM_INT);
			
			try{
				$query->execute();
			}
			catch(PDOException $e){
				die($e->getMessage());
			}
		}
	}	

}
?>