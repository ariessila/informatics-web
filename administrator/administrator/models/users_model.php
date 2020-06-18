<?php

class users_model{
	private $db;
	public function __construct($database){
		$this->db = $database;
	}

	public function getUserByUsername($user){
			
			$query=$this->db->prepare("SELECT * FROM `users` WHERE  `username` = ?");
			$query->bindValue(1,$user);
			
		try{
			$query->execute();
			return $query->fetch();
		}
		catch(PDOException $e){
			$e->getMessage();
		}
		
	}
	
	public function authSubdomain($user,$subdomain){
			
			$query=$this->db->prepare("SELECT * FROM `users` WHERE  `username` = ? and `subdomain` = ? ");
			$query->bindValue(1,$user);
			$query->bindValue(2,$subdomain);
			
		try{
			$query->execute();
			
			return $query->rowCount();
		}
		catch(PDOException $e){
			$e->getMessage();
			return false;
		}
		
	}
	
	public function getUserByEmail($user){
			
			$query=$this->db->prepare("SELECT * FROM `users` WHERE  `email` = ?");
			$query->bindValue(1,$user);
			
		try{
			$query->execute();
			return $query->fetch();
		}
		catch(PDOException $e){
			$e->getMessage();
		}
		
	}
	
	public function authUserbyEmail($username){
	
		$query=$this->db->prepare("SELECT * FROM users WHERE email = ?");
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
	
	public function authUser($username){
	
		$query=$this->db->prepare("SELECT * FROM users WHERE username=?");
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
	
	public function updatePasswordByEmail($email,$password){

		$query = $this->db->prepare("UPDATE `users` SET `password`=? WHERE `email` =?");
		
			$query->bindValue(1, $password);
		 	$query->bindValue(2, $email);
		
		try{
			
			$query->execute();
		
		}
		catch(PDOException $e){
			die($e->getMessage());
		}		
	}

	public function setSessionUser($user,$session){

		$query = $this->db->prepare("UPDATE `users` SET `id_session`=? WHERE `username` =?");
		
			$query->bindValue(1, $session);
		 	$query->bindValue(2, $user);
		
		try{
			
			$query->execute();
		
		}
		catch(PDOException $e){
			die($e->getMessage());
		}		
	}

	
	public function insertUser($username,$nama_lengkap,$password,$email,$level,$subdomain){

		$query = $this->db->prepare("INSERT INTO `users` SET	`username` = :username,
																`nama_lengkap` = :nama_lengkap,
																`password` = :password,
																`email` = :email,
																`level` = :level,
																`subdomain` = :subdomain
																		
		");
		
			$query->bindValue(':username', $username);
			$query->bindValue(':nama_lengkap', $nama_lengkap);
			$query->bindValue(':password', $password);
			$query->bindValue(':email', $email);
			$query->bindValue(':level', $level);
			$query->bindValue(':subdomain', $subdomain);
			
		try{
			$query->execute();
			return true;
		}
		catch(PDOException $e){
			die($e->getMessage());
			return false;
		}		
	}
	
	public function editUser($username,$nama_lengkap,$email){

		$query = $this->db->prepare("update `users` 		SET	`nama_lengkap` = :nama_lengkap,
																`email` = :email
																where `username` = :username	
		");
		
			$query->bindValue(':username', $username,PDO::PARAM_STR);
			$query->bindValue(':nama_lengkap', $nama_lengkap);
			$query->bindValue(':email', $email);
			
		try{
			$query->execute();
			return true;
		}
		catch(PDOException $e){
			die($e->getMessage());
			return false;
		}		
	}

	public function resetUser($username, $password){
		
		$query = $this->db->prepare("update `users` SET `password`= :password
														where `username`= :username
		");
		$query->bindParam(':username',$username,PDO::PARAM_STR);
		$query->bindParam(':password',$password,PDO::PARAM_STR);
		try{
			$query->execute();
			return true;
		}
		catch(PDOException $e){
		die($e->getMessage());
		return false;
		}		
	}
	
	public function getUser(){

		$query = $this->db->prepare("SELECT * FROM `users` WHERE 1");
		try{
		
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
		return $query->fetchAll();
	}
	
	
	public function deleteUser($id){
	
		$sql="DELETE FROM `users` WHERE `username` = ?";
		
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