<?php

class jurusan_model{
	private $db;
	public function __construct($database){
		$this->db = $database;
	}

	
	public function countJurusan(){

		$query = $this->db->prepare("select * from jurusan order by jurusan asc "); 
		
		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
		$query->fetchAll(PDO::FETCH_ASSOC);
		return $query->rowCount();
	}
	
	public function getJurusan(){

		$query = $this->db->prepare("select * from jurusan order by jurusan asc "); 
		
		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
		return $query->fetchAll(PDO::FETCH_ASSOC);
	}
	
	public function getJurusanById($id){

		$query = $this->db->prepare("select * from jurusan where id = :id "); 
		$query->bindValue(':id',$id);

		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
		return $query->fetch(PDO::FETCH_ASSOC);
	}
	
	public function getMasterJurusan(){

		$query = $this->db->prepare("select * from master_jurusan "); 
		
		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
		return $query->fetchAll(PDO::FETCH_ASSOC);
	}

	public function countMasterJurusan(){

		$query = $this->db->prepare("select * from master_jurusan "); 
		
		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
		 $query->fetchAll(PDO::FETCH_ASSOC);
		
			return $query->rowCount();
	}

	
	public function insertJurusan($subdomain,$jurusan){
		
		$query = $this->db->prepare("INSERT INTO `jurusan` SET 	`subdomain`= :subdomain,
																	`jurusan`=:jurusan
									");
		$query->bindValue(':subdomain',$subdomain);
		$query->bindValue(':jurusan',$jurusan);
		try{
			$query->execute();
			return true;
		}
		catch(PDOException $e){
		return	die($e->getMessage());
		
		}		
	}
	
	public function updateJurusan($subdomain,$jurusan,$id){
		
		$query = $this->db->prepare("INSERT INTO `jurusan` SET 	`subdomain`= :subdomain,
																	`jurusan`=:jurusan where id = :id
									");
		$query->bindValue(':id',$id);
		$query->bindValue(':subdomain',$subdomain);
		$query->bindValue(':jurusan',$jurusan);
		try{
			$query->execute();
			return true;
		}
		catch(PDOException $e){
		return	die($e->getMessage());
		
		}		
	}
	
	
	public function deleteJurusan($id){
		
			
			$sql="DELETE FROM `jurusan` WHERE `id` = ?";
			$query = $this->db->prepare($sql);
			$query->bindParam(1, $id,PDO::PARAM_INT);
			
			try{
				$query->execute();
			}
			catch(PDOException $e){
				die($e->getMessage());
			}
		
	}
	
	##################################################
	
		
	public function cariKalender($katacari,$a,$b){

		$query = $this->db->prepare("select * from kalender where IFNULL(judul, '') LIKE CONCAT('%', :katacari, '%') OR IFNULL(konten, '') LIKE CONCAT('%', :katacari2, '%')  order by id desc LIMIT :a,:b");
		$query->bindParam(':katacari',$katacari,PDO::PARAM_STR);
		$query->bindParam(':katacari2',$katacari,PDO::PARAM_STR);
		$query->bindParam(':a',$a,PDO::PARAM_INT);
		$query->bindParam(':b',$b,PDO::PARAM_INT);
		try{
		
			$query->execute();
			
			return $query->fetchAll(PDO::FETCH_ASSOC);
		
		}catch(PDOException $e){
			die($e->getMessage());
		}
	}

	public function getKalender($a,$b){

		$query = $this->db->prepare("select * from kalender order by tanggal_mulai DESC"); 
		
		$query->bindParam(':a',$a,PDO::PARAM_INT);
		$query->bindParam(':b',$b,PDO::PARAM_INT);
		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
		return $query->fetchAll(PDO::FETCH_ASSOC);
	}

	public function countKalender(){

		$query = $this->db->prepare("select * from kalender ");
			try{
				$query->execute();

				return $query->rowCount();
			}catch(PDOException $e){
				die($e->getMessage());
			}
		}
	
	public function getKalenderById($id){

		$query = $this->db->prepare("select * from kalender where id = :id");
		$query->bindParam('id',$id,PDO::PARAM_INT);
		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
		return $query->fetch(PDO::FETCH_ASSOC);
		}

	public function insertKalender($judul_id,$link,$konten_id,$gambar,$tanggal_mulai,$tanggal_selesai,$tempat,$konten_en,$judul_en,$penulis){
		
		$query = $this->db->prepare("INSERT INTO `kalender` SET 			`judul_id`= :judul_id,
																		`konten_id`=:konten_id,
																		`tanggal_mulai`=:tanggal_mulai,
																		`tanggal_selesai`=:tanggal_selesai,
																		`tempat`=:tempat,
																		`konten_en`=:konten_en,
																		`judul_en`=:judul_en,
																		`gambar`=:gambar,
																		`penulis`=:penulis,
																		`link`=:link
																");
		$query->bindValue(':judul_id',$judul_id,PDO::PARAM_STR);
		$query->bindValue(':konten_id',$konten_id,PDO::PARAM_STR);
		$query->bindValue(':gambar',$gambar);
		$query->bindValue(':tanggal_mulai',$tanggal_mulai);
		$query->bindValue(':tanggal_selesai',$tanggal_selesai);
		$query->bindValue(':tempat',$tempat);
		$query->bindValue(':konten_en',$konten_en);
		$query->bindValue(':judul_en',$judul_en);
		$query->bindValue(':penulis',$penulis);
		$query->bindValue(':link',$link);
		try{
			$query->execute();
			return true;
		}
		catch(PDOException $e){
		return	die($e->getMessage());
		
		}		
	}
	
	
	public function updateKalender($judul_id,$link,$konten_id,$gambar,$tanggal_mulai,$tanggal_selesai,$tempat,$konten_en,$judul_en,$penulis,$id){
	
		$query = $this->db->prepare("UPDATE `kalender` SET 	`judul_id`= :judul_id,
															`konten_id`=:konten_id,
															`tanggal_mulai`=:tanggal_mulai,
															`tanggal_selesai`=:tanggal_selesai,
															`tempat`=:tempat,
															`konten_en`=:konten_en,
															`judul_en`=:judul_en,
															`gambar`=:gambar,
															`penulis`=:penulis,
															`link`=:link
															where id = :id
		");
		$query->bindParam(':id',$id,PDO::PARAM_INT);
		$query->bindValue(':judul_id',$judul_id,PDO::PARAM_STR);
		$query->bindValue(':konten_id',$konten_id,PDO::PARAM_STR);
		$query->bindValue(':gambar',$gambar);
		$query->bindValue(':tanggal_mulai',$tanggal_mulai);
		$query->bindValue(':tanggal_selesai',$tanggal_selesai);
		$query->bindValue(':tempat',$tempat);
		$query->bindValue(':konten_en',$konten_en);
		$query->bindValue(':judul_en',$judul_en);
		$query->bindValue(':penulis',$penulis);
		$query->bindValue(':link',$link);
		try{
			$query->execute();
			return true;
		}
		catch(PDOException $e){
		return	die($e->getMessage());
		
		}		
	}
	
		

}
?>