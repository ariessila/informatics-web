<?php

class pengaturan_model{
	private $db;
	public function __construct($database){
		$this->db = $database;
	}
	public function getPengaturan($a,$b){

		$query = $this->db->prepare("select * from pengaturan ");
		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
		return $query->fetchAll(PDO::FETCH_ASSOC);
		}
	
	public function getPengaturanById($id){

		$query = $this->db->prepare("select * from pengaturan where id_nama_website = :id");
		$query->bindParam(':id',$id,PDO::PARAM_INT);
		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
		return $query->fetch(PDO::FETCH_ASSOC);
	}
	
	
	public function updatePengaturan($id_nama_website,$nama_website,$nama_website_en,$icon,$footer){
		
		$query = $this->db->prepare("UPDATE `pengaturan` SET 	nama_website = :nama_website,
																nama_website_en = :nama_website_en,
																icon = :icon, 
																footer = :footer
																where id_nama_website = :id_nama_website
		");
		$query->bindParam(':id_nama_website',$id_nama_website,PDO::PARAM_INT);
		$query->bindParam(':nama_website',$nama_website,PDO::PARAM_STR);
		$query->bindParam(':nama_website_en',$nama_website_en,PDO::PARAM_STR);
		$query->bindParam(':icon',$icon,PDO::PARAM_STR);
		$query->bindParam(':footer',$footer,PDO::PARAM_STR);
		try{
			$query->execute();
			return true;
		}
		catch(PDOException $e){
		return	die($e->getMessage());
		
		}		
	}
	
	
	public function deletePengaturan($id){
		if(is_numeric($id)){
			
			$sql="DELETE FROM `halaman` WHERE `id_halaman` = ?";
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