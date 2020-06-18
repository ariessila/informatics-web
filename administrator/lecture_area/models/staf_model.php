<?php

class staf_model{
	private $db;
	public function __construct($database){
		$this->db = $database;
	}

	public function getPengelola(){

		$query = $this->db->prepare("select * from pengelola order by nip ");
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
			$query = $this->db->prepare("select * from album_detail where id_album= :a order by id ASC ");
			$query->bindParam(':a',$id,PDO::PARAM_INT);
			try{
				$query->execute();
			}catch(PDOException $e){
				die($e->getMessage());
			}
			return $query->fetchAll(PDO::FETCH_ASSOC);
			}
	}

	public function getPengelolaById($id){

		$query = $this->db->prepare("select * from pengelola where nip = :nip");
		$query->bindParam(':nip',$id,PDO::PARAM_INT);
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
	
	public function insertPengelola($nip,$nama_pengelola,$jabatan_pengelola,$foto_pengelola){
		
		$query = $this->db->prepare("INSERT INTO `pengelola` SET 	`nip`=:nip,
																`nama_pengelola`=:nama_pengelola,
																`jabatan_pengelola`=:jabatan_pengelola,
																`foto_pengelola`=:foto_pengelola
		");
		$query->bindParam(':nip',$nip,PDO::PARAM_STR);
		$query->bindParam(':nama_pengelola',$nama_pengelola,PDO::PARAM_STR);
		$query->bindParam(':jabatan_pengelola',$jabatan_pengelola,PDO::PARAM_STR);
		$query->bindParam(':foto_pengelola',$foto_pengelola,PDO::PARAM_STR);
		try{
			$query->execute();
			return true;
		}
		catch(PDOException $e){
		return	die($e->getMessage());
		
		}		
	}
	
	public function updatePengelola($nip,$nama_pengelola,$jabatan_pengelola,$foto_pengelola){
		
		$query = $this->db->prepare("update `pengelola` SET `nama_pengelola`=:nama_pengelola,
																`jabatan_pengelola`=:jabatan_pengelola,
																`foto_pengelola`=:foto_pengelola
																where `nip`=:nip
		");
		$query->bindParam(':nip',$nip,PDO::PARAM_STR);
		$query->bindParam(':nama_pengelola',$nama_pengelola,PDO::PARAM_STR);
		$query->bindParam(':jabatan_pengelola',$jabatan_pengelola,PDO::PARAM_STR);
		$query->bindParam(':foto_pengelola',$foto_pengelola,PDO::PARAM_STR);
		try{
			$query->execute();
			return true;
		}
		catch(PDOException $e){
		return	die($e->getMessage());
		
		}		
	}
	
	
	public function insetDetailGaleri($id_album,$keterangan,$nama_file){
		
		$query = $this->db->prepare("INSERT INTO `album_detail` SET 	id_album = :id_album,
																		keterangan = :keterangan,
																		nama_file = :nama_file
		");
		$query->bindParam(':id_album',$id_album,PDO::PARAM_INT);
		$query->bindParam(':keterangan',$keterangan,PDO::PARAM_STR);
		$query->bindParam(':nama_file',$nama_file,PDO::PARAM_STR);
		try{
			$query->execute();
			return true;
		}
		catch(PDOException $e){
		return	die($e->getMessage());
		
		}		
	}
	
	
	
	public function deletePengelola($id){
		
			
			$sql="DELETE FROM `pengelola` WHERE `nip` = ?";
			$query = $this->db->prepare($sql);
			$query->bindParam(1, $id,PDO::PARAM_STR);
			
			try{
				$query->execute();
			}
			catch(PDOException $e){
				die($e->getMessage());
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