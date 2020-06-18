<?php

class pengabdian_model{
	private $db;
	public function __construct($database){
		$this->db = $database;
	}

	public function getPengabdian($a,$b){

		$query = $this->db->prepare("select * from pengabdian order by id DESC limit :a,:b");
		$query->bindParam(':a',$a,PDO::PARAM_INT);
		$query->bindParam(':b',$b,PDO::PARAM_INT);

		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
		return $query->fetchAll(PDO::FETCH_ASSOC);
		}

	public function countPengabdian(){

		$query = $this->db->prepare("select * from pengabdian");
			try{
				$query->execute();

				return $query->rowCount();
			}catch(PDOException $e){
				die($e->getMessage());
			}
		}
		
	public function getPengabdianById($id){

		$query = $this->db->prepare("select * from pengabdian where id = :id_pengabdian");
		$query->bindParam(':id_pengabdian',$id,PDO::PARAM_INT);
		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
		return $query->fetch(PDO::FETCH_ASSOC);
	}
	
	
	public function insertPengabdian($judul_pengabdian,$ketua,$anggota_1,$anggota_2,$anggota_3,$anggota_4,$tahun,$sumber_dana){
		
		$query = $this->db->prepare(" INSERT INTO `pengabdian` SET	`judul_pengabdian`=:judul_pengabdian,
																	`ketua`=:ketua,
																	`anggota_1`=:anggota_1,
																	`anggota_2`=:anggota_2,
																	`anggota_3`=:anggota_3,
																	`sumber_dana`=:sumber_dana,
																	`anggota_4`=:anggota_4,
																	`tahun`=:tahun 		
		");
		$query->bindParam(':judul_pengabdian',$judul_pengabdian,PDO::PARAM_STR);
		$query->bindParam(':ketua',$ketua,PDO::PARAM_STR);
		$query->bindParam(':anggota_1',$anggota_1);
		$query->bindParam(':anggota_2',$anggota_2);
		$query->bindParam(':anggota_3',$anggota_3);
		$query->bindParam(':anggota_4',$anggota_4);
		$query->bindParam(':sumber_dana',$sumber_dana);
		$query->bindParam(':tahun',$tahun);
		try{
			$query->execute();
			return true;
		}
		catch(PDOException $e){
			die($e->getMessage());
		return false;
		}		
	} 
	
	public function updatePengabdian($id_pengabdian,$judul_pengabdian,$ketua_pengabdian,$anggota_pengabdian_1,$anggota_pengabdian_2,$anggota_pengabdian_3,$anggota_pengabdian_4,$tahun_pengabdian,$sumber_dana){
		
		$query = $this->db->prepare("update `pengabdian` 	SET	`judul_pengabdian`=:judul_pengabdian,
																`ketua`=:ketua,
																`anggota_1`=:anggota_1,
																`anggota_2`=:anggota_2,
																`anggota_3`=:anggota_3,
																`anggota_4`=:anggota_4,
																`sumber_dana`=:sumber_dana,
																`tahun`=:tahun
																where id = :id_pengabdian
		");
		$query->bindParam(':id_pengabdian',$id_pengabdian,PDO::PARAM_STR);
		$query->bindParam(':judul_pengabdian',$judul_pengabdian);
		$query->bindParam(':ketua',$ketua_pengabdian);
		$query->bindParam(':anggota_1',$anggota_pengabdian_1);
		$query->bindParam(':anggota_2',$anggota_pengabdian_2);
		$query->bindParam(':anggota_3',$anggota_pengabdian_3);
		$query->bindParam(':anggota_4',$anggota_pengabdian_4);
		$query->bindParam(':tahun',$tahun_pengabdian);
		$query->bindParam(':sumber_dana',$sumber_dana);
		try{
			$query->execute();
			return true;
		}
		catch(PDOException $e){
		return	die($e->getMessage());
		
		}		
	}
	
	
	#######modul antar#############
		
	public function insertPengabdianDB($judul_pengabdian,$ketua,$anggota_1,$anggota_2,$anggota_3,$anggota_4,$tahun,$sumber_dana,$db){
		
		$query = $this->db->prepare(" INSERT INTO ".$db.".pengabdian SET	`judul_pengabdian`=:judul_pengabdian,
																	`ketua`=:ketua,
																	`anggota_1`=:anggota_1,
																	`anggota_2`=:anggota_2,
																	`anggota_3`=:anggota_3,
																	`sumber_dana`=:sumber_dana,
																	`anggota_4`=:anggota_4,
																	`tahun`=:tahun 		
		");
		$query->bindParam(':judul_pengabdian',$judul_pengabdian,PDO::PARAM_STR);
		$query->bindParam(':ketua',$ketua,PDO::PARAM_STR);
		$query->bindParam(':anggota_1',$anggota_1);
		$query->bindParam(':anggota_2',$anggota_2);
		$query->bindParam(':anggota_3',$anggota_3);
		$query->bindParam(':anggota_4',$anggota_4);
		$query->bindParam(':sumber_dana',$sumber_dana);
		$query->bindParam(':tahun',$tahun);
		try{
			$query->execute();
			return true;
		}
		catch(PDOException $e){
			die($e->getMessage());
		return false;
		}		
	} 
	
	public function insertAnggotaPengabdianDB($id_pengabdian,$nama_dosen,$db){
		
		$query = $this->db->prepare("INSERT INTO ".$db.".pengabdian_anggota SET 	
																`id_pengabdian` = :id_pengabdian,
																`nama_dosen` = :nama_dosen
		");
		$query->bindParam(':id_pengabdian',$id_pengabdian);
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
	
	
	#######akhir antar##############
	
	
	
	
	######################
	
	public function deleteAnggotaPengabdian($id){
		
			$sql2="DELETE FROM `pengabdian_anggota` WHERE `id` = ?";
			$query2 = $this->db->prepare($sql2);
			$query2->bindParam(1, $id,PDO::PARAM_STR);
			
			try{
				$query2->execute();
			}
			catch(PDOException $e){
				die($e->getMessage());
			}
		
	}
	
	public function deletePengabdian($id){
		
			
			$sql="DELETE FROM `pengabdian` WHERE `id` = ?";
			$query = $this->db->prepare($sql);
			$query->bindParam(1, $id,PDO::PARAM_STR);
			
			
			$sql2="DELETE FROM `pengabdian_anggota` WHERE `id_pengabdian` = ?";
			$query2 = $this->db->prepare($sql2);
			$query2->bindParam(1, $id,PDO::PARAM_STR);
			
			try{
				$query->execute();
			}
			catch(PDOException $e){
				die($e->getMessage());
			}
		
	}
	
	public function lastInsertId(){
		
		return	$this->db->lastInsertId();
		
	}
	
	public function insertAnggotaPengabdian($id_pengabdian,$nama_dosen){
		
		$query = $this->db->prepare("INSERT INTO `pengabdian_anggota` SET 	
																`id_pengabdian` = :id_pengabdian,
																`nama_dosen` = :nama_dosen
		");
		$query->bindParam(':id_pengabdian',$id_pengabdian);
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
	
	public function updateAnggotaPengabdian($id_pengabdian,$nama_dosen,$id){
		
		$query = $this->db->prepare("UPDATE `pengabdian_anggota` SET `nama_dosen` = :nama_dosen
																where 
																`id_pengabdian` = :id_pengabdian and `nama_dosen` = :id
		");
		$query->bindParam(':id',$id);
		$query->bindParam(':id_pengabdian',$id_pengabdian);
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
	

	public function getAnggotaPengabdianById($id){

		$query = $this->db->prepare("select * from pengabdian_anggota where id_pengabdian = :id and nama_dosen != '' order by id asc");
		$query->bindParam('id',$id,PDO::PARAM_INT);
		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
		return $query->fetchAll(PDO::FETCH_ASSOC);
	}

}
?>