<?php

class event_model{
	private $db;
	public function __construct($database){
		$this->db = $database;
	}

	public function countCariEvent($katacari){
		$katacari = htmlentities(strip_tags($katacari),ENT_QUOTES,'utf-8'); // sanitasi filter
		$katacari = filter_var($katacari, FILTER_SANITIZE_MAGIC_QUOTES);
		
		$query = $this->db->prepare("select * from event where IFNULL(judul, '') LIKE CONCAT('%', :katacari, '%') OR IFNULL(konten, '') LIKE CONCAT('%', :katacari2, '%')  order by id desc ");
		try{
		$query->bindParam(':katacari',$katacari,PDO::PARAM_STR);
		$query->bindParam(':katacari2',$katacari,PDO::PARAM_STR);
		$query->execute();
		return $query->rowCount();
		}catch(PDOException $e){
			die($e->getMessage());
		}
	}
		
	public function cariEvent($katacari,$a,$b){

		$query = $this->db->prepare("select * from event where IFNULL(judul, '') LIKE CONCAT('%', :katacari, '%') OR IFNULL(konten, '') LIKE CONCAT('%', :katacari2, '%')  order by id desc LIMIT :a,:b");
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

	public function getEvent($a,$b){

		$query = $this->db->prepare("select * from event order by tanggal_mulai DESC"); 
		
		$query->bindParam(':a',$a,PDO::PARAM_INT);
		$query->bindParam(':b',$b,PDO::PARAM_INT);
		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
		return $query->fetchAll(PDO::FETCH_ASSOC);
	}

	public function countEvent(){

		$query = $this->db->prepare("select * from event ");
			try{
				$query->execute();

				return $query->rowCount();
			}catch(PDOException $e){
				die($e->getMessage());
			}
		}
	
	public function getEventById($id){

		$query = $this->db->prepare("select * from event where id = :id");
		$query->bindParam('id',$id,PDO::PARAM_INT);
		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
		return $query->fetch(PDO::FETCH_ASSOC);
		}

	public function insertEvent($judul_id,$link,$konten_id,$gambar,$tanggal_mulai,$tanggal_selesai,$tempat,$konten_en,$judul_en,$penulis){
		
		$query = $this->db->prepare("INSERT INTO `event` SET 			`judul_id`= :judul_id,
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
	
	
	public function updateEvent($judul_id,$link,$konten_id,$gambar,$tanggal_mulai,$tanggal_selesai,$tempat,$konten_en,$judul_en,$penulis,$id){
	
		$query = $this->db->prepare("UPDATE `event` SET 	`judul_id`= :judul_id,
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
	
	
	public function deleteEvent($id){
		if(is_numeric($id)){
			
			$sql="DELETE FROM `event` WHERE `id` = ?";
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