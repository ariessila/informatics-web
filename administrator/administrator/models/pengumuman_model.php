<?php

class pengumuman_model{
	private $db;
	public function __construct($database){
		$this->db = $database;
	}

	public function getPengumuman($a,$b){

		$query = $this->db->prepare("select * from pengumuman order by id desc limit :a , :b");
		$query->bindParam(':a',$a,PDO::PARAM_INT);
		$query->bindParam(':b',$b,PDO::PARAM_INT);
		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
		return $query->fetchAll(PDO::FETCH_ASSOC);
		}

	public function countPengumuman(){

		$query = $this->db->prepare("select * from pengumuman ");
			try{
				$query->execute();

				return $query->rowCount();
			}catch(PDOException $e){
				die($e->getMessage());
			}
		}
	
	public function getPengumumanById($id){

		$query = $this->db->prepare("select * from pengumuman where id	= :id");
		$query->bindParam('id',$id,PDO::PARAM_INT);
		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
		return $query->fetch(PDO::FETCH_ASSOC);
		}
	

	public function insertPengumuman($judul,$konten,$tanggal,$link,$gambar,$bahasa){
		
		$query = $this->db->prepare("INSERT INTO `pengumuman` SET 	`judul`=:judul,
																	`konten`=:konten,
																	`tanggal`=:tanggal,
																	`link`=:link,
																	`gambar`=:gambar,
																	`bahasa`=:bahasa
		");
																	
		$query->bindParam(':judul',$judul,PDO::PARAM_STR);
		$query->bindParam(':konten',$konten,PDO::PARAM_STR);
		$query->bindParam(':tanggal',$tanggal,PDO::PARAM_STR);
		$query->bindParam(':link',$link,PDO::PARAM_STR);
		$query->bindParam(':gambar',$gambar,PDO::PARAM_STR);
		$query->bindParam(':bahasa',$bahasa,PDO::PARAM_STR);
		try{
			$query->execute();
			return true;
		}
		catch(PDOException $e){
		return	die($e->getMessage());
		
		}		
	}
	
	
	public function updatePengumuman($judul,$konten,$link,$gambar,$bahasa,$id){
		
		$query = $this->db->prepare("UPDATE `pengumuman` SET 	`judul`=:judul,
																`konten`=:konten,
																`link`=:link,
																`gambar`=:gambar,
																`bahasa`=:bahasa
																where id = :id		
		");
		$query->bindParam(':id',$id,PDO::PARAM_INT);
		$query->bindParam(':judul',$judul,PDO::PARAM_STR);
		$query->bindParam(':konten',$konten,PDO::PARAM_STR);
		$query->bindParam(':link',$link,PDO::PARAM_STR);
		$query->bindParam(':gambar',$gambar,PDO::PARAM_STR);
		$query->bindParam(':bahasa',$bahasa,PDO::PARAM_STR);
		try{
			$query->execute();
			return true;
		}
		catch(PDOException $e){
		return	die($e->getMessage());
		
		}		
	}
	
	
	public function deletePengumuman($id){
		if(is_numeric($id)){
			
			$sql="DELETE FROM `pengumuman` WHERE `id` = ?";
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
	
	public function hapusGambarHalamanById($id){
		$query = $this->db->prepare("UPDATE `pengumuman` SET gambar = '' where id = :id
		");
		$query->bindParam(':id',$id,PDO::PARAM_INT);
		
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