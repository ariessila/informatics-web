<?php

class home_model{
	private $db;
	public function __construct($database){
		$this->db = $database;
	}
	
	public function getRunningById(){

		$query = $this->db->prepare("select * from running_text where id = 1");
		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
		return $query->fetch(PDO::FETCH_ASSOC);
		}
	
		
	public function getNomorPenting(){

		$query = $this->db->prepare("select * from nomor_penting order by id");
		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
		return $query->fetchAll(PDO::FETCH_ASSOC);
		}
	
	
	public function updateRunning($konten){
		
		$query = $this->db->prepare("UPDATE `running_text` SET 	konten = :konten, 
																tanggal = :tanggal
																where id = 1
		");
		$query->bindParam(':konten',$konten,PDO::PARAM_STR);
		$query->bindParam(':tanggal',date("Y-m-d"));
		try{
			$query->execute();
			return true;
		}
		catch(PDOException $e){
		return	die($e->getMessage());
		
		}		
	}
	
	 public function insertNomor($nama, $nomor)
    {
		
      $query =  $this->db->prepare('INSERT INTO nomor_penting SET nama = :nama,
																  nomor = :nomor');
      $query->bindValue(':nama',$nama);
      $query->bindValue(':nomor',$nomor);
      $query->execute();
	  
      // $data = array('nama'=>$nama,'nomor'=>$nomor,'id'=>$this->db->lastInsertId());
      // return json_encode($data);
      
    }
	
	public function deleteNomor($id){
		if(is_numeric($id)){
			// echo 1;
			$sql="DELETE FROM `nomor_penting` WHERE `id` = ?";
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