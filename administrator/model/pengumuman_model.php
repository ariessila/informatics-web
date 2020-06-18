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
	
	
	public function insertPengumuman($judul,$link,$isi,$tanggal){
		
		$query = $this->db->prepare("INSERT INTO `pengumuman` SET 	judul 	= :judul,
																	konten 	= :konten, 
																	link 	= :link,
																	tanggal = :tanggal");
																	
		$query->bindParam(':judul',$judul,PDO::PARAM_STR);
		$query->bindParam(':konten',$isi,PDO::PARAM_STR);
		$query->bindParam(':tanggal',$tanggal,PDO::PARAM_STR);
		$query->bindParam(':link',$link,PDO::PARAM_STR);
		try{
			$query->execute();
			return true;
		}
		catch(PDOException $e){
		return	die($e->getMessage());
		
		}		
	}
	
	
	public function updatePengumuman($judul,$link,$isi,$tanggal, $id){
		
		$query = $this->db->prepare("UPDATE `pengumuman` SET 	judul 	= :judul,
																konten 	= :konten, 
																link 	= :link,
																tanggal = :tanggal
																where id = :id		
		");
		$query->bindParam(':judul',$judul,PDO::PARAM_STR);
		$query->bindParam(':konten',$isi,PDO::PARAM_STR);
		$query->bindParam(':link',$link,PDO::PARAM_STR);
		$query->bindParam(':tanggal',$tanggal);
		$query->bindParam(':id',$id,PDO::PARAM_INT);
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

}
?>