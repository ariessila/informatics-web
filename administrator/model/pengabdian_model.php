<?php

class pengabdian_model{
	private $db;
	public function __construct($database){
		$this->db = $database;
	}

	public function getPengabdian($a,$b){

		$query = $this->db->prepare("select * from pengabdian order by tahun DESC, id DESC limit :a,:b");
		$query->bindParam(':a',$a,PDO::PARAM_INT);
		$query->bindParam(':b',$b,PDO::PARAM_INT);

		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
		return $query->fetchAll(PDO::FETCH_ASSOC);
	}
	
	public function getPengabdianByNama($nama){

		$query = $this->db->prepare("SELECT * 	FROM  `pengabdian` 
												WHERE  `ketua` =  :a
												OR  `anggota_1` =  :b
												OR  `anggota_2` =  :c
												OR  `anggota_3` =  :d
												OR  `anggota_4` = :e
												");
		

		try{
			$query->bindParam(':a',$nama);
			$query->bindParam(':b',$nama);
			$query->bindParam(':c',$nama);
			$query->bindParam(':d',$nama);
			$query->bindParam(':e',$nama);
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
	
	
	public function insertPengabdian($judul_pengabdian,$ketua,$anggota_1,$anggota_2,$anggota_3,$anggota_4,$tahun){
		
		$query = $this->db->prepare(" INSERT INTO `pengabdian` SET	`judul_pengabdian`=:judul_pengabdian,
																	`ketua`=:ketua,
																	`anggota_1`=:anggota_1,
																	`anggota_2`=:anggota_2,
																	`anggota_3`=:anggota_3,
																	`anggota_4`=:anggota_4,
																	`tahun`=:tahun 		
		");
		$query->bindParam(':judul_pengabdian',$judul_pengabdian,PDO::PARAM_STR);
		$query->bindParam(':ketua',$ketua,PDO::PARAM_STR);
		$query->bindParam(':anggota_1',$anggota_1,PDO::PARAM_STR);
		$query->bindParam(':anggota_2',$anggota_2,PDO::PARAM_STR);
		$query->bindParam(':anggota_3',$anggota_3,PDO::PARAM_STR);
		$query->bindParam(':anggota_4',$anggota_4,PDO::PARAM_STR);
		$query->bindParam(':tahun',$tahun,PDO::PARAM_STR);
		try{
			$query->execute();
			return true;
		}
		catch(PDOException $e){
			die($e->getMessage());
		return false;
		}		
	} 
	
	public function updatePengabdian($id_pengabdian,$judul_pengabdian,$ketua_pengabdian,$anggota_pengabdian_1,$anggota_pengabdian_2,$anggota_pengabdian_3,$anggota_pengabdian_4,$tahun_pengabdian){
		
		$query = $this->db->prepare("update `pengabdian` 	SET	`judul_pengabdian`=:judul_pengabdian,
																`ketua`=:ketua,
																`anggota_1`=:anggota_1,
																`anggota_2`=:anggota_2,
																`anggota_3`=:anggota_3,
																`anggota_4`=:anggota_4,
																`tahun`=:tahun
																where id = :id_pengabdian
		");
		$query->bindParam(':id_pengabdian',$id_pengabdian,PDO::PARAM_STR);
		$query->bindParam(':judul_pengabdian',$judul_pengabdian,PDO::PARAM_STR);
		$query->bindParam(':ketua',$ketua_pengabdian,PDO::PARAM_STR);
		$query->bindParam(':anggota_1',$anggota_pengabdian_1,PDO::PARAM_STR);
		$query->bindParam(':anggota_2',$anggota_pengabdian_2,PDO::PARAM_STR);
		$query->bindParam(':anggota_3',$anggota_pengabdian_3,PDO::PARAM_STR);
		$query->bindParam(':anggota_4',$anggota_pengabdian_4,PDO::PARAM_STR);
		$query->bindParam(':tahun',$tahun_pengabdian,PDO::PARAM_STR);
		try{
			$query->execute();
			return true;
		}
		catch(PDOException $e){
		return	die($e->getMessage());
		
		}		
	}
	
	
	
	public function deletePengabdian($id){
		
			
			$sql="DELETE FROM `pengabdian` WHERE `id` = ?";
			$query = $this->db->prepare($sql);
			$query->bindParam(1, $id,PDO::PARAM_STR);
			
			try{
				$query->execute();
			}
			catch(PDOException $e){
				die($e->getMessage());
			}
		
	}
	############################
	
	
	
	public function getTahunPengabdianByNama($nama){

		$query = $this->db->prepare("
		
		SELECT distinct tahun FROM  `pengabdian` LEFT JOIN `pengabdian_anggota` ON pengabdian_anggota.id_pengabdian = pengabdian.id where ketua = :a  OR `nama_dosen` = :b order by tahun DESC
		
		
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
	
	public function getPengabdianByTahun($nama,$tahun){

		$query = $this->db->prepare("SELECT distinct judul_pengabdian,sumber_dana, ketua, pengabdian.id FROM  `pengabdian` LEFT JOIN `pengabdian_anggota` ON pengabdian_anggota.id_pengabdian = pengabdian.id where tahun = :tahun AND (ketua = :a  OR `nama_dosen` = :b) order by pengabdian.id DESC ");
				
		$query->bindParam(':tahun',$tahun);
		$query->bindParam(':a',$nama);
		$query->bindParam(':b',$nama);
		
		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
		return $query->fetchAll(PDO::FETCH_ASSOC);
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