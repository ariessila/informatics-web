<?php

class external_link_model{
	private $db;
	public function __construct($database){
		$this->db = $database;
	}
	
	public function getExternalLinkById($id){

		$query = $this->db->prepare("select * from link where id_link = :id");
		try{
			$query->bindParam(':id',$id);
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
		return $query->fetch(PDO::FETCH_ASSOC);
		}
	
		
	public function getExternalLink(){

		$query = $this->db->prepare("select * from link order by id_link");
		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
		return $query->fetchAll(PDO::FETCH_ASSOC);
		}
	
	public function insertExternalLink($link)
	{
		
      $query =  $this->db->prepare('INSERT INTO link SET link = :link');
      $query->bindValue(':link',$link);
      $query->execute();
	  
    }
	
	public function updateExternalLink($link,$id)
	{
		
      $query =  $this->db->prepare('UPDATE link SET link = :link where id_link = :id');
      $query->bindValue(':link',$link);
      $query->bindValue(':id',$id);
      $query->execute();
	  
    }
	
	public function deleteNomor($id){
		if(is_numeric($id)){
			// echo 1;
			$sql="DELETE FROM `link` WHERE `id_link` = ?";
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