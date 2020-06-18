<?php

class publikasi_model{
	private $db;
	public function __construct($database){
		$this->db = $database; 
	}

	public function getPublikasi($a,$b,$c){
// "select distinct publikasi_dosen.judul, publikasi_dosen.deskripsi,tahun , publikasi_dosen.id, publikasi_dosen.nama_file, publikasi_dosen.oleh, publikasi_dosen.link from publikasi_dosen inner join publikasi_dosen_anggota ON publikasi_dosen.id = publikasi_dosen_anggota.id where tahun = :tahun and (oleh = :a OR nama_dosen = :b)

		$query = $this->db->prepare("select distinct publikasi_dosen.judul, publikasi_dosen.deskripsi,tahun , publikasi_dosen.id, publikasi_dosen.nama_file, publikasi_dosen.oleh, publikasi_dosen.link from publikasi_dosen left join publikasi_dosen_anggota ON publikasi_dosen.id = publikasi_dosen_anggota.id_publikasi_dosen where oleh = :c OR nama_dosen = :d order by id DESC limit :a,:b"); 
		$query->bindParam(':a',$a,PDO::PARAM_INT);
		$query->bindParam(':b',$b,PDO::PARAM_INT);
		$query->bindParam(':c',$c);
		$query->bindParam(':d',$c);

		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
		return $query->fetchAll(PDO::FETCH_ASSOC);
		}

	public function countPublikasi(){

		$query = $this->db->prepare("select * from publikasi_dosen");
			try{
				$query->execute();

				return $query->rowCount();
			}catch(PDOException $e){
				die($e->getMessage());
			}
		}
		
	public function getPublikasiById($id){

		$query = $this->db->prepare("select * from publikasi_dosen where id = :id");
		$query->bindParam(':id',$id,PDO::PARAM_INT);
		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
		return $query->fetch(PDO::FETCH_ASSOC);
	}
	
	public function getGaleriDetilById($id){

		$query = $this->db->prepare("select * from album_detail where id = :id");
		$query->bindParam('id',$id,PDO::PARAM_INT);
		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
		return $query->fetch(PDO::FETCH_ASSOC);
	}
	
	public function getGaleriDetilByIdGaleriAll($id){

		$query = $this->db->prepare("select * from album_detail where id_album = :id");
		$query->bindParam('id',$id,PDO::PARAM_INT);
		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
		return $query->fetchAll(PDO::FETCH_ASSOC);
	}
	
	public function getGaleriDetilByIdGaleri($id){

		$query = $this->db->prepare("select * from album_detail where id_album = :id");
		$query->bindParam('id',$id,PDO::PARAM_INT);
		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
		return $query->fetch(PDO::FETCH_ASSOC);
	}
	
	public function insertPublikasi($judul,$deskripsi,$nama_file,$oleh,$tahun,$nip,$link){
		//updatePublikasi($judul,$deskripsi,$nama_file,$oleh,$tahun,$nip,$id)

		$query = $this->db->prepare("INSERT INTO `publikasi_dosen` SET 	`judul`=:judul,
																		`deskripsi`=:deskripsi,
																		`nama_file`=:nama_file,
																		`oleh`=:oleh,
																		`tahun`=:tahun,
																		`link`=:link,
																		`nip`=:nip
		");
		$query->bindParam(':nip',$nip,PDO::PARAM_STR);
		$query->bindParam(':tahun',$tahun);
		$query->bindParam(':link',$link);
		$query->bindParam(':oleh',$oleh,PDO::PARAM_STR);
		$query->bindParam(':nama_file',$nama_file,PDO::PARAM_STR);
		$query->bindParam(':deskripsi',$deskripsi,PDO::PARAM_STR);
		$query->bindParam(':judul',$judul,PDO::PARAM_STR);
		try{
			$query->execute();
			return true;
		}
		catch(PDOException $e){
			die($e->getMessage());
		return false;
		}		
	}
	
	public function insertPublikasiDB($judul,$deskripsi,$nama_file,$oleh,$tahun,$nip,$link,$db){
		//updatePublikasi($judul,$deskripsi,$nama_file,$oleh,$tahun,$nip,$id)

		$query = $this->db->prepare("INSERT INTO ".$db.".publikasi_dosen SET 	`judul`=:judul,
																		`deskripsi`=:deskripsi,
																		`nama_file`=:nama_file,
																		`oleh`=:oleh,
																		`tahun`=:tahun,
																		`link`=:link,
																		`nip`=:nip
		");
		$query->bindParam(':nip',$nip,PDO::PARAM_STR);
		$query->bindParam(':tahun',$tahun);
		$query->bindParam(':link',$link);
		$query->bindParam(':oleh',$oleh,PDO::PARAM_STR);
		$query->bindParam(':nama_file',$nama_file,PDO::PARAM_STR);
		$query->bindParam(':deskripsi',$deskripsi,PDO::PARAM_STR);
		$query->bindParam(':judul',$judul,PDO::PARAM_STR);
		try{
			$query->execute();
			return true;
		}
		catch(PDOException $e){
			die($e->getMessage());
		return false;
		}		
	}
	
	public function updatePublikasi($judul,$deskripsi,$nama_file,$oleh,$tahun,$nip,$id,$link){
		
		$query = $this->db->prepare("update `publikasi_dosen` SET 	`judul`=:judul,
																	`deskripsi`=:deskripsi,
																	`nama_file`=:nama_file,
																	`oleh`=:oleh,
																	`link`=:link,
																	`tahun`=:tahun,
																	`nip`=:nip WHERE 
																	`id`=:id
		");
		$query->bindParam(':id',$id,PDO::PARAM_INT);
		$query->bindParam(':nip',$nip,PDO::PARAM_STR);
		$query->bindParam(':link',$link,PDO::PARAM_STR);
		$query->bindParam(':tahun',$tahun);
		$query->bindParam(':oleh',$oleh,PDO::PARAM_STR);
		$query->bindParam(':nama_file',$nama_file,PDO::PARAM_STR);
		$query->bindParam(':deskripsi',$deskripsi,PDO::PARAM_STR);
		$query->bindParam(':judul',$judul,PDO::PARAM_STR);

		try{
			$query->execute();
			
			return true;
		
		}
		catch(PDOException $e){
			
			return	die($e->getMessage());
		
		}		
	}
	
	
	
	public function deletePublikasi($id){
		
			
			$sql="DELETE FROM `publikasi_dosen` WHERE `id` = ?";
			$query = $this->db->prepare($sql);
			$query->bindParam(1, $id,PDO::PARAM_STR);
			
			try{
				$query->execute();
			}
			catch(PDOException $e){
				die($e->getMessage());
			}
		
	}
	

	
	######################
	
	public function deleteAnggotaPublikasi($id){
		
			$sql2="DELETE FROM `publikasi_dosen_anggota` WHERE `id` = ?";
			$query2 = $this->db->prepare($sql2);
			$query2->bindParam(1, $id,PDO::PARAM_STR);
			
			try{
				$query2->execute();
			}
			catch(PDOException $e){
				die($e->getMessage());
			}
		
	}
	
	public function deletePublikasiSemua($id){
		
			
			$sql="DELETE FROM `publikasi_dosen` WHERE `id` = ?";
			$query = $this->db->prepare($sql);
			$query->bindParam(1, $id,PDO::PARAM_STR);
			
			
			$sql2="DELETE FROM `publikasi_dosen_anggota` WHERE `id_pengabdian` = ?";
			$query2 = $this->db->prepare($sql2);
			$query2->bindParam(1, $id,PDO::PARAM_STR);
			
			try{
				$query->execute();
			}
			catch(PDOException $e){
				die($e->getMessage());
			}
		
	}
	
	public function lastInsertId(){
		
		return	$this->db->lastInsertId();
		
	}
	
	public function insertAnggotaPublikasi($id_publikasi,$nama_dosen){
		
		$query = $this->db->prepare("INSERT INTO `publikasi_dosen_anggota` SET 	
																`id_publikasi_dosen` = :id_publikasi,
																`nama_dosen` = :nama_dosen
		");
		$query->bindParam(':id_publikasi',$id_publikasi);
		$query->bindParam(':nama_dosen',$nama_dosen);
		try{
			$query->execute();
			
			return true;
		}
		catch(PDOException $e){
			die($e->getMessage());
		return false;
		}	
		
	}
	
	public function insertAnggotaPublikasiDB($id_publikasi,$nama_dosen,$db){
		
		$query = $this->db->prepare("INSERT INTO ".$db.".publikasi_dosen_anggota SET 	
																`id_publikasi_dosen` = :id_publikasi,
																`nama_dosen` = :nama_dosen
		");
		$query->bindParam(':id_publikasi',$id_publikasi);
		$query->bindParam(':nama_dosen',$nama_dosen);
		try{
			$query->execute();
			
			return true;
		}
		catch(PDOException $e){
			die($e->getMessage());
		return false;
		}	
		
	}
	
	public function updateAnggotaPublikasi($id_publikasi,$nama_dosen,$id){
		
		$query = $this->db->prepare("UPDATE `publikasi_dosen_anggota` SET `nama_dosen` = :nama_dosen
																where 
																`id_publikasi_dosen` = :id_publikasi and `nama_dosen` = :id
		");
		$query->bindParam(':id',$id);
		$query->bindParam(':id_publikasi',$id_publikasi);
		$query->bindParam(':nama_dosen',$nama_dosen);
		try{
			$query->execute();
			
			return true;
		}
		catch(PDOException $e){
			die($e->getMessage());
		return false;
		}	
		
	}
	
	
	public function deleteFileById($id){
		
		$query = $this->db->prepare("update `publikasi_dosen` SET `nama_file`= '' WHERE 
																	`id`=:id
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
	
	
	
	public function getAnggotaPublikasiById($id){

		$query = $this->db->prepare("select * from publikasi_dosen_anggota where id_publikasi_dosen = :id and nama_dosen != '' order by id asc");
		$query->bindParam('id',$id,PDO::PARAM_INT);
		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
		return $query->fetchAll(PDO::FETCH_ASSOC);
	}
	
	#######
}
?>