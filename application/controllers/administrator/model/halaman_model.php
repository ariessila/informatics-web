<?php

class halaman_model{
	private $db;
	public function __construct($database){
		$this->db = $database;
	}
	
	public function getParentHalaman(){
		
		$query = $this->db->prepare("select `id_halaman`,`judul_halaman_id`,`judul_halaman_en`,`link_halaman_id`,`link_halaman_en`,`publish` from halaman WHERE `posisi` != 0 and `parent_halaman` = 0 order by `posisi` asc");
		
		$query->bindParam(':a',$a,PDO::PARAM_INT);
		$query->bindParam(':b',$b,PDO::PARAM_INT);
		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
		return $query->fetchAll(PDO::FETCH_ASSOC);
		
	}
	
	public function getHalamanChild($id){
		
		$query = $this->db->prepare("SELECT `id_halaman`,`judul_halaman_id`,`judul_halaman_en`,`link_halaman_id`,`link_halaman_en`,`publish` from halaman WHERE `posisi` != 0 and `parent_halaman` != 0 and parent_halaman = :id order by `posisi` asc ");
		
		$query->bindParam(':id',$id,PDO::PARAM_INT);
		
		try{
			$query->execute();
		}catch(PDOException $e){
				
			die($e->getMessage());
			
		}
			
		return $query->fetchAll(PDO::FETCH_ASSOC);
		
	}
	
	public function getHalamanChildActive($id,$hal){
		
		$query = $this->db->prepare("SELECT `id_halaman`,`judul_halaman_id`,`judul_halaman_en`,`link_halaman_id`,`link_halaman_en`,`publish` from halaman WHERE `posisi` != 0 and `parent_halaman` != 0 and parent_halaman = :id and id_halaman = :hal order by `posisi` asc ");
		
		$query->bindParam(':id',$id,PDO::PARAM_INT);
		$query->bindParam(':hal',$hal,PDO::PARAM_INT);
		
		try{
			$query->execute();
		}catch(PDOException $e){
				
			die($e->getMessage());
			
		}
			
		$query->fetch(PDO::FETCH_ASSOC);
		return $query->rowCount();
	}
	
	
	public function getManajemenHalaman(){

		$query = $this->db->prepare("select * from manajemen_halaman ");
	
		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
		return $query->fetch(PDO::FETCH_ASSOC);
		}

		
	public function getHalamanDosenByNip($id){
		if(is_numeric($id)){
			$query = $this->db->prepare("select * from halaman_dosen where posisi= :a order by urutan ASC ");
			$query->bindParam(':a',$id);
			try{
				$query->execute();
			}catch(PDOException $e){
				die($e->getMessage());
			}
			return $query->fetchAll(PDO::FETCH_ASSOC);
			}
	}
		
	public function getHalamanBefore(){

		$query = $this->db->prepare("select * from halaman where parrent_halaman = 0 order by id_halaman desc");
		$query->bindParam(':a',$a,PDO::PARAM_INT);
		$query->bindParam(':b',$b,PDO::PARAM_INT);
		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
		return $query->fetchAll(PDO::FETCH_ASSOC);
	}

	public function getHalaman($a,$b){

		$query = $this->db->prepare("select * from halaman order by id_halaman desc limit :a , :b");
		$query->bindParam(':a',$a,PDO::PARAM_INT);
		$query->bindParam(':b',$b,PDO::PARAM_INT);
		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
		return $query->fetchAll(PDO::FETCH_ASSOC);
		}

	public function getHalamanForMiniNav(){

		$query = $this->db->prepare("select `id_halaman`,`judul_halaman_id`,`judul_halaman_en`,`link_halaman_id`,`link_halaman_en`,`publish`  from halaman where publish = 'Y' and posisi != 0 order by id_halaman desc");
		$query->bindParam(':a',$a,PDO::PARAM_INT);
		$query->bindParam(':b',$b,PDO::PARAM_INT);
		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
		return $query->fetchAll(PDO::FETCH_ASSOC);
		}

	public function countHalaman(){

		$query = $this->db->prepare("select * from halaman order by id_halaman desc");
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

		$query = $this->db->prepare("select * from halaman where id_halaman = :id");
		$query->bindParam(':id',$id,PDO::PARAM_INT);
		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
		return $query->fetch(PDO::FETCH_ASSOC);
	}
	
	public function getHalamanByIdForNav($id){

		$query = $this->db->prepare("select `id_halaman`,`judul_halaman_id`,`judul_halaman_en`,`link_halaman_id`,`link_halaman_en`,`publish` from halaman where id_halaman = :id");
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
	
	public function insertHalaman($judul,$link,$isi,$gambar,$id){
		
		$query = $this->db->prepare("INSERT INTO `halaman` SET 	id_halaman = :id,
																judul_halaman = :judul,
																konten_halaman = :konten, 
																link_halaman = :link_halaman,
																gambar_halaman = :gambar
		");
		$query->bindParam(':id',$id,PDO::PARAM_INT);
		$query->bindParam(':judul',$judul,PDO::PARAM_STR);
		$query->bindParam(':konten',$isi,PDO::PARAM_STR);
		$query->bindParam(':link_halaman',$link,PDO::PARAM_STR);
		$query->bindParam(':gambar',$gambar);
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
	
	
	public function updateHalaman($judul,$link,$isi,$gambar , $id){
		
		$query = $this->db->prepare("UPDATE `halaman` SET 		judul_halaman = :judul,
																konten_halaman = :konten, 
																link_halaman = :link_halaman,
																gambar_halaman = :gambar
																where id_halaman = :id
		");
		$query->bindParam(':id',$id,PDO::PARAM_INT);
		$query->bindParam(':judul',$judul,PDO::PARAM_STR);
		$query->bindParam(':konten',$isi,PDO::PARAM_STR);
		$query->bindParam(':link_halaman',$link,PDO::PARAM_STR);
		$query->bindParam(':gambar',$gambar);
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
			
			$sql="DELETE FROM `halaman` WHERE `id_halaman` = ?";
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