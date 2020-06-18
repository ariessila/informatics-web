<?php

class bantuan_model{
	private $db;
	public function __construct($database){
		$this->db = $database;
	}

	public function getBantuan($a,$b){

		$query = $this->db->prepare("select * from bantuan order by no_ticket DESC limit :a,:b");
		$query->bindParam(':a',$a,PDO::PARAM_INT);
		$query->bindParam(':b',$b,PDO::PARAM_INT);

		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
		return $query->fetchAll(PDO::FETCH_ASSOC);
	}
	
	public function getBantuanReply($a){

		$query = $this->db->prepare("select * from bantuan_reply where no_ticket = :a order by tanggal , jam ASC ");
		
		$query->bindParam(':a',$a,PDO::PARAM_INT);
		
		try{
			
			$query->execute();
			
		}catch(PDOException $e){
			die($e->getMessage());
		}
		return $query->fetchAll(PDO::FETCH_ASSOC);
	}

	public function countBantuan(){

		$query = $this->db->prepare("select * from bantuan");
			try{
				$query->execute();

				return $query->rowCount();
			}catch(PDOException $e){
				die($e->getMessage());
			}
		}
		
	public function getBantuanPesanById($id){

		$query = $this->db->prepare("select * from bantuan where no_ticket = :no_ticket");
		$query->bindParam(':no_ticket',$id,PDO::PARAM_INT);
		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
		return $query->fetch(PDO::FETCH_ASSOC);
	}

	
	public function insertBantuan($konten,$penulis){
		
		$query = $this->db->prepare("INSERT INTO `bantuan` SET 	`konten`= :konten,
																`tanggal`= NOW(),
																`jam`= NOW(),
																`penulis`= :penulis
		");
		$query->bindParam(':konten',$konten,PDO::PARAM_STR);
		$query->bindParam(':penulis',$penulis,PDO::PARAM_STR);
	
		try{
			$query->execute();
			return true;
		}
		catch(PDOException $e){
			
			die($e->getMessage());
			
			return false;
			
		}		
	}
	
	public function insertBantuanReply($konten,$penulis,$noticket){
		
		$query = $this->db->prepare("INSERT INTO `bantuan_reply` SET 	`no_ticket`= :no_ticket,
																		`konten`= :konten,
																		`tanggal`= NOW(),
																		`jam`= NOW(),
																		`penulis`= :penulis
		");
		$query->bindParam(':konten',$konten,PDO::PARAM_STR);
		$query->bindParam(':penulis',$penulis,PDO::PARAM_STR);
		$query->bindParam(':no_ticket',$noticket,PDO::PARAM_STR);
	
		try{
			$query->execute();
			return true;
		}
		catch(PDOException $e){
			
			die($e->getMessage());
			
			return false;
			
		}		
	}
	
	public function updateBantuan($id_bantuan,$institusi,$jenis_bantuan){
		
		$query = $this->db->prepare("update `bantuan` SET 	`institusi` 		= :institusi,
																`jenis_bantuan` 	= :jenis_bantuan
																where id_bantuan = :id_bantuan
		");
		$query->bindParam(':id_bantuan',$id_bantuan,PDO::PARAM_STR);
		$query->bindParam(':jenis_bantuan',$jenis_bantuan,PDO::PARAM_STR);
		$query->bindParam(':institusi',$institusi,PDO::PARAM_STR);
		
		try{
			$query->execute();
			return true;
		}
		catch(PDOException $e){
		return	die($e->getMessage());
		
		}		
	}
	
	
	
	public function deleteBantuan($id){
		
			
			$sql="DELETE FROM `bantuan` WHERE `id_bantuan` = ?";
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
