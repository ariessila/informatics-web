<?php

class users_model{
	private $db;
	public function __construct($database){
		$this->db = $database;
	}

	public function getUserByUsername($user){
			
			$query=$this->db->prepare("SELECT * FROM `admin` WHERE  `username` = ?");
			$query->bindValue(1,$user);
			
		try{
			$query->execute();
			return $query->fetch();
		}
		catch(PDOException $e){
			$e->getMessage();
		}
		
	}
	
	public function authUser($username){
	
		$query=$this->db->prepare("SELECT * FROM admin WHERE username=?");
		$query->bindValue(1,$username);
		//$query->bindValue(2,$pass);

		try{
				$query->execute();
			
				return $query->rowCount();
		}
			catch(PDOException $e){
				$e->getMessage();
			}
			
	}
	
	public function setSessionUser($user,$session){

		$query = $this->db->prepare("UPDATE `admin` SET `id_session`=? WHERE `username` =?");
		
			$query->bindValue(1, $session);
		 	$query->bindValue(2, $user);
		
		try{
			
			$query->execute();
		
		}
		catch(PDOException $e){
			die($e->getMessage());
		}		
	}

	
	public function insertUser($username,$password,$nama_lengkap,$level,$nip,$email){

		$query = $this->db->prepare("INSERT INTO `admin`(`username`, `password`, `nama_lengkap`, `level`, `nip`,`email`) VALUES (?,?,?,?,?,?)");
		
			$query->bindValue(1, $username);
			$query->bindValue(2, $password);
			$query->bindValue(3, $nama_lengkap);
			$query->bindValue(4, $level);
			$query->bindValue(5, $nip);
			$query->bindValue(6, $email);
			
		try{
			$query->execute();
		}
		catch(PDOException $e){
			die($e->getMessage());
		}		
	}

	public function getUser(){

		$query = $this->db->prepare("SELECT * FROM `admin` WHERE 1");
		try{
		
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
		return $query->fetchAll();
	}
	
	
	public function userHapus($id){
	
		$sql="DELETE FROM `admin` WHERE `username` = ?";
		
		$query = $this->db->prepare($sql);
		
		$query->bindValue(1, $id);
		
		try{
			$query->execute();
		}
		catch(PDOException $e){
			die($e->getMessage());
		}
	}

}
?>