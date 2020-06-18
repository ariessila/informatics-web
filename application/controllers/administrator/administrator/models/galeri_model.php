<?php

class galeri_model{
	private $db;
	public function __construct($database){
		$this->db = $database;
	}

	public function getGaleri($a,$b){

		$query = $this->db->prepare("select * from album order by id asc limit :a , :b");
		$query->bindParam(':a',$a,PDO::PARAM_INT);
		$query->bindParam(':b',$b,PDO::PARAM_INT);
		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
		return $query->fetchAll(PDO::FETCH_ASSOC);
		}

	public function countGaleri(){

		$query = $this->db->prepare("select * from album ");
			try{
				$query->execute();

				return $query->rowCount();
			}catch(PDOException $e){
				die($e->getMessage());
			}
		}
		
	public function getDetail($id){
		if(is_numeric($id)){
			$query = $this->db->prepare("select * from album_detail where id_album= :a order by id DESC ");
			$query->bindParam(':a',$id,PDO::PARAM_INT);
			try{
				$query->execute();
			}catch(PDOException $e){
				die($e->getMessage());
			}
			return $query->fetchAll(PDO::FETCH_ASSOC);
			}
	}

	public function getGaleriById($id){

		$query = $this->db->prepare("select * from album where id = :id");
		$query->bindParam('id',$id,PDO::PARAM_INT);
		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
		return $query->fetch(PDO::FETCH_ASSOC);
	}
	
	public function getGaleriDetilById($id){

		$query = $this->db->prepare("select * from album_detail where id = :id");
		$query->bindParam('id',$id,PDO::PARAM_INT);
		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
		return $query->fetch(PDO::FETCH_ASSOC);
	}
	
	public function getGaleriDetilByIdGaleriAll($id){

		$query = $this->db->prepare("select * from album_detail where id_album = :id");
		$query->bindParam('id',$id,PDO::PARAM_INT);
		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
		return $query->fetchAll(PDO::FETCH_ASSOC);
	}
	
	public function getGaleriDetilByIdGaleri($id){

		$query = $this->db->prepare("select * from album_detail where id_album = :id");
		$query->bindParam('id',$id,PDO::PARAM_INT);
		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
		return $query->fetch(PDO::FETCH_ASSOC);
	}
	
	public function insertGaleri($nama,$link){
		
		$query = $this->db->prepare("INSERT INTO `album` SET 	nama = :nama,
																tanggal = NOW(), 
																link = :link 
		");
		$query->bindParam(':nama',$nama,PDO::PARAM_STR);
		$query->bindParam(':link',$link,PDO::PARAM_STR);
		try{
			$query->execute();
			return true;
		}
		catch(PDOException $e){
		return	die($e->getMessage());
		
		}		
	}
	
	public function updateGaleri($nama,$link,$id){
		
		$query = $this->db->prepare("UPDATE `album` SET 		nama = :nama,
																link = :link 
									where 						id = :id
		");
		$query->bindParam(':nama',$nama,PDO::PARAM_STR);
		$query->bindParam(':link',$link,PDO::PARAM_STR);
		$query->bindParam(':id',$id,PDO::PARAM_INT);
		try{
			$query->execute();
			return true;
		}
		catch(PDOException $e){
		return	die($e->getMessage());
		
		}		
	}
	
	public function insetDetailGaleri($id_album,$keterangan,$nama_file,$link){
		
		$query = $this->db->prepare("INSERT INTO `album_detail` SET 	id_album = :id_album,
																		keterangan = :keterangan,
																		link = :link,
																		nama_file = :nama_file
		");
		$query->bindParam(':id_album',$id_album,PDO::PARAM_INT);
		$query->bindParam(':keterangan',$keterangan,PDO::PARAM_STR);
		$query->bindParam(':nama_file',$nama_file,PDO::PARAM_STR);
		$query->bindParam(':link',$link,PDO::PARAM_STR);
		try{
			$query->execute();
			return true;
		}
		catch(PDOException $e){
		return	die($e->getMessage());
		
		}		
	}
	
	
	
	public function deleteGaleri($id){
		if(is_numeric($id)){
			
			$sql="DELETE FROM `album` WHERE `id` = ?";
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
	
	public function deleteGaleriDetail($id){
		if(is_numeric($id)){
			
			$sql="DELETE FROM `album_detail` WHERE `id` = ?";
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