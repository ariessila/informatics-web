<?php

class struktur_organisasi_model{
	private $db;
	public function __construct($database){
		$this->db = $database;
	}

	public function getStrukturOrganisasi($a,$b){

		$query = $this->db->prepare("select * from struktur_organisasi order by id desc limit :a , :b");
		$query->bindParam(':a',$a,PDO::PARAM_INT);
		$query->bindParam(':b',$b,PDO::PARAM_INT);
		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
		return $query->fetchAll(PDO::FETCH_ASSOC);
		}
		
	public function getBadanStrukturOrganisasi(){

		$query = $this->db->prepare("select * from struktur_organisasi where id != 1 order by id asc ");
		$query->bindParam(':a',$a,PDO::PARAM_INT);
		$query->bindParam(':b',$b,PDO::PARAM_INT);
		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
		return $query->fetchAll(PDO::FETCH_ASSOC);
		}

	public function countGaleri(){

		$query = $this->db->prepare("select * from struktur_organisasi ");
			try{
				$query->execute();

				return $query->rowCount();
			}catch(PDOException $e){
				die($e->getMessage());
			}
		}
		
	public function getBadanPegawai($id){
		if(is_numeric($id)){
			$query = $this->db->prepare("select * from pegawai where kelompok_bidang = :a and kelompok_bidang != 1 order by id ASC ");
			$query->bindParam(':a',$id,PDO::PARAM_INT);
			try{
				$query->execute();
			}catch(PDOException $e){
				die($e->getMessage());
			}
			return $query->fetchAll(PDO::FETCH_ASSOC);
			}
	}
	
	public function getPegawai($id){
		if(is_numeric($id)){
			$query = $this->db->prepare("select * from pegawai where kelompok_bidang = :a order by id ASC ");
			$query->bindParam(':a',$id,PDO::PARAM_INT);
			try{
				$query->execute();
			}catch(PDOException $e){
				die($e->getMessage());
			}
			return $query->fetchAll(PDO::FETCH_ASSOC);
			}
	}

	public function getStrukturOrganisasiById($id){

		$query = $this->db->prepare("select * from struktur_organisasi where id = :id");
		$query->bindParam('id',$id,PDO::PARAM_INT);
		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
		return $query->fetch(PDO::FETCH_ASSOC);
	}
	
	public function getPegawaiById($id){

		$query = $this->db->prepare("select * from pegawai where kelompok_bidang = :id");
		$query->bindParam('id',$id,PDO::PARAM_INT);
		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
		return $query->fetch(PDO::FETCH_ASSOC);
	}
	
	public function insertStrukturOrganisasi($nama){
		
		$query = $this->db->prepare("INSERT INTO `struktur_organisasi` SET 	kelompok = :nama ");
		$query->bindParam(':nama',$nama,PDO::PARAM_STR);
		try{
			$query->execute();
			return true;
		}
		catch(PDOException $e){
		return	die($e->getMessage());
		
		}		
	}
	
	public function updateGaleri($nama,$link,$id){
		
		$query = $this->db->prepare("UPDATE `galeri` SET 		nama = :nama,
																link = :link 
									where 						id = :id
		");
		$query->bindParam(':nama',$nama,PDO::PARAM_STR);
		$query->bindParam(':link',$link,PDO::PARAM_STR);
		$query->bindParam(':id',$id,PDO::PARAM_INT);
		try{
			$query->execute();
			return true;
		}
		catch(PDOException $e){
		return	die($e->getMessage());
		
		}		
	}
	
	public function insertPegawai($kelompok_bidang,$nama_lengkap,$pangkat,$tanggal_lahir,$email,$foto,$jabatan){
	

		$query = $this->db->prepare("INSERT INTO `pegawai` SET 	
													kelompok_bidang = :kelompok_bidang,
													nama_lengkap = :nama_lengkap,
													pangkat = :pangkat,		
													tanggal_lahir = :tanggal_lahir,
													email = :email,
													foto = :foto,
													jabatan = :jabatan
		");
		$query->bindParam(':kelompok_bidang',$kelompok_bidang,PDO::PARAM_INT);
		$query->bindParam(':nama_lengkap',$nama_lengkap);
		$query->bindParam(':pangkat',$pangkat);
		$query->bindParam(':tanggal_lahir',$tanggal_lahir);
		$query->bindParam(':email',$email);
		$query->bindParam(':foto',$foto);
		$query->bindParam(':jabatan',$jabatan);
		try{
			$query->execute();
			return true;
		}
		catch(PDOException $e){
		return	die($e->getMessage());
		
		}		
	}
	
	
	
	public function deleteStrukturOrganisasi($id){
		if(is_numeric($id)){
			
			$sql="DELETE FROM `struktur_organisasi` WHERE `id` = ?";
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
	
	public function deletePegawai($id){
		if(is_numeric($id)){
			
			$sql="DELETE FROM `pegawai` WHERE `id` = ?";
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