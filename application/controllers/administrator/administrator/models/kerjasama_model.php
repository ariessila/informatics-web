<?php

class kerjasama_model{
	private $db;
	public function __construct($database){
		$this->db = $database;
	}

	public function getKerjasama($a,$b){

		$query = $this->db->prepare("select * from kerjasama order by id_kerjasama ASC limit :a,:b");
		$query->bindParam(':a',$a,PDO::PARAM_INT);
		$query->bindParam(':b',$b,PDO::PARAM_INT);

		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
		return $query->fetchAll(PDO::FETCH_ASSOC);
		}

	public function countKerjasama(){

		$query = $this->db->prepare("select * from kerjasama");
			try{
				$query->execute();

				return $query->rowCount();
			}catch(PDOException $e){
				die($e->getMessage());
			}
		}
		
	public function getKerjasamaById($id){

		$query = $this->db->prepare("select * from kerjasama where id_kerjasama = :id_kerjasama");
		$query->bindParam(':id_kerjasama',$id,PDO::PARAM_INT);
		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
		return $query->fetch(PDO::FETCH_ASSOC);
	}
	
	public function insertKerjasama($institusi,$jenis_kerjasama,$tahun,$masa_berlaku){
		
		$query = $this->db->prepare("INSERT INTO `kerjasama` SET 	`institusi` 		= :institusi,
																	`jenis_kerjasama` 	= :jenis_kerjasama,
																	`tahun` 			= :tahun,
																	`masa_berlaku` 		= :masa_berlaku
		");
		$query->bindParam(':institusi',$institusi,PDO::PARAM_STR);
		$query->bindParam(':jenis_kerjasama',$jenis_kerjasama,PDO::PARAM_STR);
		$query->bindParam(':tahun',$tahun,PDO::PARAM_STR);
		$query->bindParam(':masa_berlaku',$masa_berlaku,PDO::PARAM_STR);
	
		try{
			$query->execute();
			return true;
		}
		catch(PDOException $e){
			die($e->getMessage());
		return false;
		}		
	}
	
	public function updateKerjasama($id_kerjasama,$institusi,$jenis_kerjasama,$tahun,$masa_berlaku){
		
		$query = $this->db->prepare("update `kerjasama` SET 	`institusi` 		= :institusi,
																`jenis_kerjasama` 	= :jenis_kerjasama,
																`tahun` 	= :tahun,
																`masa_berlaku` 	= :masa_berlaku
																where id_kerjasama = :id_kerjasama
		");
		$query->bindParam(':id_kerjasama',$id_kerjasama,PDO::PARAM_STR);
		$query->bindParam(':jenis_kerjasama',$jenis_kerjasama,PDO::PARAM_STR);
		$query->bindParam(':institusi',$institusi,PDO::PARAM_STR);
		$query->bindParam(':tahun',$tahun,PDO::PARAM_STR);
		$query->bindParam(':masa_berlaku',$masa_berlaku,PDO::PARAM_STR);
		
		try{
			$query->execute();
			return true;
		}
		catch(PDOException $e){
		return	die($e->getMessage());
		
		}		
	}
	
	
	
	public function deleteKerjasama($id){
		
			
			$sql="DELETE FROM `kerjasama` WHERE `id_kerjasama` = ?";
			$query = $this->db->prepare($sql);
			$query->bindParam(1, $id,PDO::PARAM_STR);
			
			try{
				$query->execute();
			}
			catch(PDOException $e){
				die($e->getMessage());
			}
		
	}
	

}
?>