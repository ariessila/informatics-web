<?php

class dokumen_akreditasi_model{
	private $db;
	public function __construct($database){
		$this->db = $database;
	}
	// ini baigan akreditasi dokumen
	
	public function countCariAkreditasi($katacari){
		$katacari = htmlentities(strip_tags($katacari),ENT_QUOTES,'utf-8'); // sanitasi filter
		$katacari = filter_var($katacari, FILTER_SANITIZE_MAGIC_QUOTES);
		
		$query = $this->db->prepare("select * from dokumen_akreditasi where IFNULL(judul, '') LIKE CONCAT('%', :katacari, '%') OR IFNULL(konten, '') LIKE CONCAT('%', :katacari2, '%')  order by id desc ");
		try{
		$query->bindParam(':katacari',$katacari,PDO::PARAM_STR);
		$query->bindParam(':katacari2',$katacari,PDO::PARAM_STR);
		$query->execute();
		return $query->rowCount();
		}catch(PDOException $e){
			die($e->getMessage());
		}
		}

	public function countAkreditasi(){

		$query = $this->db->prepare("select * from dokumen_akreditasi");
			try{
				$query->execute();

				return $query->rowCount();
			}catch(PDOException $e){
				die($e->getMessage());
			}
		}
	public function cariAkreditasi($katacari,$a,$b){

		$query = $this->db->prepare("select * from dokumen_akreditasi where IFNULL(judul, '') LIKE CONCAT('%', :katacari, '%') OR IFNULL(konten, '') LIKE CONCAT('%', :katacari2, '%')  order by id desc LIMIT :a,:b");
		$query->bindParam(':katacari',$katacari,PDO::PARAM_STR);
		$query->bindParam(':katacari2',$katacari,PDO::PARAM_STR);
		$query->bindParam(':a',$a,PDO::PARAM_INT);
		$query->bindParam(':b',$b,PDO::PARAM_INT);
		try{
		
			$query->execute();
			
			return $query->fetchAll(PDO::FETCH_ASSOC);
		
		}catch(PDOException $e){
			die($e->getMessage());
		}
		}

	public function getAkreditasi($a,$b){

		$query = $this->db->prepare("select * from dokumen_akreditasi limit :a , :b "); // interval 3 hari yang lalu dan 30 hari kedepan
		// SELECT * FROM `artikel` WHERE `tanggal_mulai` BETWEEN DATE_SUB(NOW(), INTERVAL 7 DAY) AND DATE_ADD(NOW(), INTERVAL 7 DAY)
		
		$query->bindParam(':a',$a,PDO::PARAM_INT);
		$query->bindParam(':b',$b,PDO::PARAM_INT);
		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
		return $query->fetchAll(PDO::FETCH_ASSOC);
		}

}