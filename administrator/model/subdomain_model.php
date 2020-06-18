<?php

class subdomain_model{
	private $db;
	public function __construct($database){
		$this->db = $database;
	}

	public function getSubdomain($a,$b){

		$query = $this->db->prepare("select * from subdomain order by id ASC limit :a,:b");
		$query->bindParam(':a',$a,PDO::PARAM_INT);
		$query->bindParam(':b',$b,PDO::PARAM_INT);

		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
		return $query->fetchAll(PDO::FETCH_ASSOC);
		}

	public function countSubdomain(){

		$query = $this->db->prepare("select * from subdomain");
			try{
				$query->execute();

				return $query->rowCount();
			}catch(PDOException $e){
				die($e->getMessage());
			}
		}
		
	public function getSubdomainById($id){

		$query = $this->db->prepare("select * from subdomain where id = :id");
		$query->bindParam(':id',$id,PDO::PARAM_INT);
		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
		return $query->fetch(PDO::FETCH_ASSOC);
	}
		
	public function getSubdomainBySubdomain($subdomain){

		$query = $this->db->prepare("select * from subdomain where subdomain = :subdomain");
		$query->bindParam(':subdomain',$subdomain,PDO::PARAM_INT);
		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
		return $query->fetch(PDO::FETCH_ASSOC);
	}	
		
	public function countSubdomainBySubdomain($subdomain){

		$query = $this->db->prepare("select * from subdomain where subdomain = :subdomain");
		$query->bindParam(':subdomain',$subdomain,PDO::PARAM_INT);
		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
		return $query->rowCount();
	}	
	
	
	public function insertSubdomain($subdomain,$database,$user,$password){
		
		$query = $this->db->prepare("INSERT INTO `subdomain` SET 	`subdomain`	= :subdomain,
																	`database` 	= :database,
																	`user` 		= :user,
																	`password` 	= :password
		");
		$query->bindParam(':subdomain',$subdomain,PDO::PARAM_STR);
		$query->bindParam(':database',$database,PDO::PARAM_STR);
		$query->bindParam(':user',$user,PDO::PARAM_STR);
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
	
	public function deleteSubdomain($id){
		
			
			$sql="DELETE FROM `subdomain` WHERE `id` = ?";
			$query = $this->db->prepare($sql);
			$query->bindParam(1, $id,PDO::PARAM_STR);
			
			try{
				$query->execute();
			}
			catch(PDOException $e){
				die($e->getMessage());
			}
		
	}
		
	public function createDB($db) { 

		@include_once('masteradministrator/libs/phpMyImporter.php');

		$dbhost = "localhost";
		$dbuser = "root";
		$dbpass = "";
		 $dbname = "$db";

		$path  = "";
		 $filename  = $path."template.sql"; // Filename of dump, default: dump.sql
		$compress  = false; // Import gz compressed file, default: false

		 $connection = @mysql_connect($dbhost,$dbuser,$dbpass);
		
		$dump = new phpMyImporter($dbname,$connection,$filename,$compress);

		$dump->utf8 = true; // Uses UTF8 connection with MySQL server, default: true

		$dump->doImport();
	}
	
	public function copy_directory($source, $destination ) { 
	set_time_limit(0);
		if ( is_dir( $source ) ) { 
			@mkdir( $destination ); 
			$directory = dir( $source ); 
		while ( FALSE !== ( $readdirectory = $directory->read() ) ) { 
			if ( $readdirectory == '.' || $readdirectory == '..' ) { 
				continue; 
			} 
			$PathDir = $source . '/' . $readdirectory; 
			if ( is_dir( $PathDir ) ) { 
				$this->copy_directory( $PathDir, $destination . '/' . $readdirectory ); 
			continue; 
			} 
				copy( $PathDir, $destination . '/' . $readdirectory ); 
			} 

			$directory->close(); 
		}else { 
				copy( $source, $destination ); 
		} 
	} 
	
	
	public function getArtikel($bahasa,$a,$b){

		$query = $this->db->prepare("select * from db_fakultas.artikel where bahasa = :bahasa order by id desc limit :a , :b");
		$query->bindParam(':a',$a,PDO::PARAM_INT);
		$query->bindParam(':b',$b,PDO::PARAM_INT);
		$query->bindParam(':bahasa',$bahasa,PDO::PARAM_STR);
		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
		return $query->fetchAll(PDO::FETCH_ASSOC);
	}
	

}
?>