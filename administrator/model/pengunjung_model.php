<?php

class pengunjung_model{
	private $db;
	public function __construct($database){
		$this->db = $database;
	}

	public function getPengunjung($bahasa,$a,$b){

		$query = $this->db->prepare("select * from pengunjung where bahasa = :bahasa order by id desc limit :a , :b");
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

	public function countPengunjung(){

		$query = $this->db->prepare("select * from pengunjung");
			try{
				$query->execute();

				return $query->rowCount();
			}catch(PDOException $e){
				die($e->getMessage());
			}
		}
	
	public function countPengunjungHariIni(){

		$query = $this->db->prepare("select * from pengunjung where tanggal_pengunjung = :tanggal_pengunjung");
			try{
				$tanggal = date('Y-m-d');
				$query->bindParam('tanggal_pengunjung',$tanggal);
				$query->execute();

				return $query->rowCount();
			}catch(PDOException $e){
				die($e->getMessage());
			}
		}
		
	public function countPengunjungMingguIni(){

		$query = $this->db->prepare("select * from pengunjung where DATE(:tanggal_pengunjung) > (NOW() - INTERVAL 7 DAY)");
			try{
				$tanggal = date('Y-m-d');
				$query->bindParam('tanggal_pengunjung',$tanggal);
				$query->execute();

				return $query->rowCount();
			}catch(PDOException $e){
				die($e->getMessage());
			}
		}
	
	public function getPengunjungByIp($ip){

		$query = $this->db->prepare("select * from pengunjung where ip_pengunjung = :ip and tanggal_pengunjung = :tanggal_pengunjung");
		$tanggal = date('Y-m-d');
		$query->bindParam('ip',$ip,PDO::PARAM_STR);
		$query->bindParam('tanggal_pengunjung',$tanggal);
		
		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
		return $query->fetch(PDO::FETCH_ASSOC);
		}
		
	public function countPengunjungByIp($ip){
		$tanggal = date('Y-m-d');
		$query = $this->db->prepare("select * from pengunjung where ip_pengunjung = :ip and tanggal_pengunjung = :tanggal_pengunjung");
		
		$query->bindParam('ip',$ip,PDO::PARAM_STR);
		$query->bindParam('tanggal_pengunjung',$tanggal);
		
		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
		return $query->rowCount();
		}
	
	public function insertPengunjung($ip,$tanggal_pengunjung){
		
		$query = $this->db->prepare("INSERT INTO `pengunjung` SET 	`ip_pengunjung`=:ip,
																	`tanggal_pengunjung`=:tanggal_pengunjung 
		");
		$query->bindParam(':ip',$ip,PDO::PARAM_STR);
		$query->bindParam(':tanggal_pengunjung',$tanggal_pengunjung,PDO::PARAM_STR);
		
		try{
			$query->execute();
			return true;
		}
		catch(PDOException $e){
		return	die($e->getMessage());
		
		}		
	}
	
	
	public function updatePengunjung($judul,$link,$isi,$gambar,$penulis,$kategori,$id){
		
		$query = $this->db->prepare("UPDATE `pengunjung` SET 	judul = :judul,
																isi = :isi, 
																gambar = :gambar,
																tanggal = :tanggal,
																kategori = :kategori,
																penulis = :penulis,
																link = :link
																where id = :id
		");
		$tanggal = date('Y-m-d');
		$query->bindParam(':id',$id,PDO::PARAM_INT);
		$query->bindParam(':judul',$judul,PDO::PARAM_STR);
		$query->bindParam(':isi',$isi,PDO::PARAM_STR);
		$query->bindParam(':link',$link,PDO::PARAM_STR);
		$query->bindParam(':gambar',$gambar);
		$query->bindParam(':tanggal',$tanggal);
		$query->bindParam(':kategori',$kategori);
		$query->bindParam(':penulis',$penulis);
		try{
			$query->execute();
			return true;
		}
		catch(PDOException $e){
		return	die($e->getMessage());
		
		}		
	}
	
	
	public function deletePengunjung($id){
		if(is_numeric($id)){
			
			$sql="DELETE FROM `pengunjung` WHERE `id` = ?";
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