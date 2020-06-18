<?php

class penelitian_model{
	private $db;
	public function __construct($database){
		$this->db = $database;
	}

	public function getPenelitian($a,$b){

		$query = $this->db->prepare("select * from penelitian order by tahun_penelitian DESC , id_penelitian DESC limit :a,:b");
		$query->bindParam(':a',$a,PDO::PARAM_INT);
		$query->bindParam(':b',$b,PDO::PARAM_INT);

		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
		return $query->fetchAll(PDO::FETCH_ASSOC);
		}

	public function countPenelitian(){

		$query = $this->db->prepare("select * from penelitian");
			try{
				$query->execute();

				return $query->rowCount();
			}catch(PDOException $e){
				die($e->getMessage());
			}
		}
		
	public function getPenelitianById($id){

		$query = $this->db->prepare("select * from penelitian where id_penelitian = :id_penelitian");
		$query->bindParam(':id_penelitian',$id,PDO::PARAM_INT);
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
	public function getAnggotaPenelitianById($id){

		$query = $this->db->prepare("select * from penelitian_anggota where id_penelitian = :id and nama_dosen != '' order by id asc");
		$query->bindParam('id',$id,PDO::PARAM_INT);
		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
		return $query->fetchAll(PDO::FETCH_ASSOC);
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
	
	public function insertAnggotaPenelitian($id_penelitian,$nama_dosen){
		
		$query = $this->db->prepare("INSERT INTO `penelitian_anggota` SET 	
																`id_penelitian` = :id_penelitian,
																`nama_dosen` = :nama_dosen
		");
		$query->bindParam(':id_penelitian',$id_penelitian);
		$query->bindParam(':nama_dosen',$nama_dosen);
		try{
			$query->execute();
			
			return true;
		}
		catch(PDOException $e){
			die($e->getMessage());
		return false;
		}	
		
	}
	
	public function updateAnggotaPenelitian($id_penelitian,$nama_dosen,$id){
		
		$query = $this->db->prepare("UPDATE `penelitian_anggota` SET `nama_dosen` = :nama_dosen
																where 
																`id_penelitian` = :id_penelitian and `nama_dosen` = :id
		");
		$query->bindParam(':id',$id);
		$query->bindParam(':id_penelitian',$id_penelitian);
		$query->bindParam(':nama_dosen',$nama_dosen);
		try{
			$query->execute();
			
			return true;
		}
		catch(PDOException $e){
			die($e->getMessage());
		return false;
		}	
		
	}
	
	public function getTahunPenelitianByNama($nama){

		$query = $this->db->prepare("
		
		
		SELECT distinct penelitian.tahun_penelitian FROM  `penelitian` LEFT JOIN `penelitian_anggota` ON penelitian_anggota.id_penelitian = penelitian.id_penelitian where ketua_penelitian = :a  OR `nama_dosen` = :b order by tahun_penelitian DESC
		
		
		");
		
		
		$query->bindParam(':a',$nama);
		$query->bindParam(':b',$nama);
		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
		return $query->fetchAll(PDO::FETCH_ASSOC);
	}
	
	public function getPenelitianByTahun($nama,$tahun){

		$query = $this->db->prepare("SELECT distinct penelitian.judul_penelitian,penelitian.sumber_dana, penelitian.ketua_penelitian, penelitian.id_penelitian FROM  `penelitian` LEFT JOIN `penelitian_anggota` ON penelitian_anggota.id_penelitian = penelitian.id_penelitian where tahun_penelitian = :tahun_penelitian AND (ketua_penelitian = :a  OR `nama_dosen` = :b) order by penelitian.id_penelitian DESC");
				
		$query->bindParam(':tahun_penelitian',$tahun);
		$query->bindParam(':a',$nama);
		$query->bindParam(':b',$nama);
		
		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
		return $query->fetchAll(PDO::FETCH_ASSOC);
	}
	
	public function getPenelitianByNama($nama){

		$query = $this->db->prepare("SELECT distinct tahun_penelitian, judul_penelitian FROM  `penelitian` INNER JOIN `penelitian_anggota` ON penelitian_anggota.id_penelitian = penelitian.id_penelitian where ketua_penelitian = :a  OR `nama_dosen` = :b ");
		
		
		$query->bindParam(':a',$nama);
		$query->bindParam(':b',$nama);
		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
		return $query->fetchAll(PDO::FETCH_ASSOC);
	}
	
	public function insertPenelitian($judul_penelitian,$ketua_penelitian,$anggota_penelitian_1,$anggota_penelitian_2,$anggota_penelitian_3,$anggota_penelitian_4,$tahun_penelitian){
		
		$query = $this->db->prepare("INSERT INTO `penelitian` SET 	`judul_penelitian` = :judul_penelitian,
																`ketua_penelitian` = :ketua_penelitian,
																`anggota_penelitian_1` = :anggota_penelitian_1,
																`anggota_penelitian_2` = :anggota_penelitian_2,
																`anggota_penelitian_3` = :anggota_penelitian_3,
																`anggota_penelitian_4` = :anggota_penelitian_4,
																`tahun_penelitian` = :tahun_penelitian
		");
		$query->bindParam(':judul_penelitian',$judul_penelitian,PDO::PARAM_STR);
		$query->bindParam(':ketua_penelitian',$ketua_penelitian);
		$query->bindParam(':anggota_penelitian_1',$anggota_penelitian_1);
		$query->bindParam(':anggota_penelitian_2',$anggota_penelitian_2);
		$query->bindParam(':anggota_penelitian_3',$anggota_penelitian_3);
		$query->bindParam(':anggota_penelitian_4',$anggota_penelitian_4);
		$query->bindParam(':tahun_penelitian',$tahun_penelitian);
		try{
			$query->execute();
			
		}
		catch(PDOException $e){
			die($e->getMessage());
		return false;
		}		
	}
	
	public function updatePenelitian($id_penelitian,$judul_penelitian,$ketua_penelitian,$anggota_penelitian_1,$anggota_penelitian_2,$anggota_penelitian_3,$anggota_penelitian_4,$tahun_penelitian){
		
		$query = $this->db->prepare("update `penelitian` SET 	`judul_penelitian` = :judul_penelitian,
																`ketua_penelitian` = :ketua_penelitian,
																`anggota_penelitian_1` = :anggota_penelitian_1,
																`anggota_penelitian_2` = :anggota_penelitian_2,
																`anggota_penelitian_3` = :anggota_penelitian_3,
																`anggota_penelitian_4` = :anggota_penelitian_4,
																`tahun_penelitian` = :tahun_penelitian
																where id_penelitian = :id_penelitian
		");
		$query->bindParam(':id_penelitian',$id_penelitian,PDO::PARAM_STR);
		$query->bindParam(':judul_penelitian',$judul_penelitian);
		$query->bindParam(':ketua_penelitian',$ketua_penelitian);
		$query->bindParam(':anggota_penelitian_1',$anggota_penelitian_1);
		$query->bindParam(':anggota_penelitian_2',$anggota_penelitian_2);
		$query->bindParam(':anggota_penelitian_3',$anggota_penelitian_3);
		$query->bindParam(':anggota_penelitian_4',$anggota_penelitian_4);
		$query->bindParam(':tahun_penelitian',$tahun_penelitian);
		try{
			$query->execute();
			return true;
		}
		catch(PDOException $e){
		return	die($e->getMessage());
		
		}		
	}
	
	
	
	public function deletePenelitian($id){
		
			
			$sql="DELETE FROM `penelitian` WHERE `id_penelitian` = ?";
			$query = $this->db->prepare($sql);
			$query->bindParam(1, $id,PDO::PARAM_STR);
			
			$sql="DELETE FROM `penelitian_anggota` WHERE `id_penelitian` = ?";
			$query2 = $this->db->prepare($sql);
			$query2->bindParam(1, $id,PDO::PARAM_STR);
			
			try{
				$query->execute();
				$query2->execute();
			}
			catch(PDOException $e){
				die($e->getMessage());
			}
		
	}
	
	
	public function lastInsertId(){
		
		return	$this->db->lastInsertId();
		
	}
	

}
?>