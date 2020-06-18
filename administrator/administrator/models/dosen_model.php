<?php

class dosen_model{
	private $db;
	public function __construct($database){
		$this->db = $database;
	}

	public function getDosen(){

		$query = $this->db->prepare("SELECT * FROM `dosen` WHERE 1 order by SUBSTRING( `nip` , 9, 14) ASC
");
		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
		return $query->fetchAll(PDO::FETCH_ASSOC);
		}

	public function getDosenAll($database){

		$query = $this->db->prepare("SELECT * FROM $database.dosen WHERE 1 order by SUBSTRING( `nip` , 9, 14) ASC
");
		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
		return $query->fetchAll(PDO::FETCH_ASSOC);
		}

	public function countDosen(){

		$query = $this->db->prepare("select * from dosen ");
			try{
				$query->execute();

				return $query->rowCount();
			}catch(PDOException $e){
				die($e->getMessage());
			}
		}
		
	public function getDosenById($id){

		$query = $this->db->prepare("select * from dosen where nip = :nip");
		$query->bindParam(':nip',$id,PDO::PARAM_INT);
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
	
	public function insertDosen($nip,$password,$nama_dosen,$jabatan_dosen,$email_dosen,$bidang_penelitian,$foto_dosen,$gelar_depan, $gelar_belakang,$subdomain){
		
		$query = $this->db->prepare("INSERT INTO `dosen` SET 		`nip`= :nip,
																	`password`= :password,
																	`nama_dosen`= :nama_dosen,
																	`gelar_depan`= :gelar_depan,
																	`gelar_belakang`= :gelar_belakang,
																	`jabatan_dosen`= :jabatan_dosen,
																	`email_dosen`= :email_dosen,
																	`bidang_penelitian`= :bidang_penelitian,
																	`subdomain`= :subdomain,
																	`foto_dosen`= :foto_dosen
		");
		$query->bindParam(':nip',$nip,PDO::PARAM_INT);
		$query->bindParam(':password',$password,PDO::PARAM_STR);
		$query->bindParam(':nama_dosen',$nama_dosen,PDO::PARAM_STR);
		$query->bindParam(':gelar_depan',$gelar_depan,PDO::PARAM_STR);
		$query->bindParam(':gelar_belakang',$gelar_belakang,PDO::PARAM_STR);
		$query->bindParam(':jabatan_dosen',$jabatan_dosen,PDO::PARAM_STR);
		$query->bindParam(':email_dosen',$email_dosen,PDO::PARAM_STR);
		$query->bindParam(':bidang_penelitian',$bidang_penelitian,PDO::PARAM_STR);
		$query->bindParam(':subdomain',$subdomain,PDO::PARAM_STR);
		$query->bindParam(':foto_dosen',$foto_dosen,PDO::PARAM_STR);
		try{
			$query->execute();
			return true;
		}
		catch(PDOException $e){
			die($e->getMessage());
		return false;
		}		
	}
	
	public function updateDosen($nip,$nama_dosen,$jabatan_dosen,$email_dosen,$bidang_penelitian,$foto_dosen,$gelar_depan,$gelar_belakang){
		
		$query = $this->db->prepare("update `dosen` SET `nama_dosen`= :nama_dosen,
														`jabatan_dosen`= :jabatan_dosen,
														`email_dosen`= :email_dosen,
														`gelar_depan`= :gelar_depan,
														`gelar_belakang`= :gelar_belakang,
														`bidang_penelitian`= :bidang_penelitian,
														`foto_dosen`= :foto_dosen
														where `nip`= :nip
		");
		$query->bindParam(':nip',$nip,PDO::PARAM_INT);
		$query->bindParam(':nama_dosen',$nama_dosen,PDO::PARAM_STR);
		$query->bindParam(':gelar_depan',$gelar_depan,PDO::PARAM_STR);
		$query->bindParam(':gelar_belakang',$gelar_belakang,PDO::PARAM_STR);
		$query->bindParam(':jabatan_dosen',$jabatan_dosen,PDO::PARAM_STR);
		$query->bindParam(':email_dosen',$email_dosen,PDO::PARAM_STR);
		$query->bindParam(':bidang_penelitian',$bidang_penelitian,PDO::PARAM_STR);
		$query->bindParam(':foto_dosen',$foto_dosen,PDO::PARAM_STR);
		try{
			$query->execute();
			return true;
		}
		catch(PDOException $e){
		return	die($e->getMessage());
		
		}		
	}
	public function resetDosen($nip, $password){
		
		$query = $this->db->prepare("update `dosen` SET `password`= :password
														where `nip`= :nip
		");
		$query->bindParam(':nip',$nip,PDO::PARAM_INT);
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
	
	
	public function insetDetailGaleri($id_album,$keterangan,$nama_file){
		
		$query = $this->db->prepare("INSERT INTO `album_detail` SET 	id_album = :id_album,
																		keterangan = :keterangan,
																		nama_file = :nama_file
		");
		$query->bindParam(':id_album',$id_album,PDO::PARAM_INT);
		$query->bindParam(':keterangan',$keterangan,PDO::PARAM_STR);
		$query->bindParam(':nama_file',$nama_file,PDO::PARAM_STR);
		try{
			$query->execute();
			return true;
		}
		catch(PDOException $e){
		return	die($e->getMessage());
		
		}		
	}
	
	
	
	public function deleteDosen($id){
		
			
			$sql="DELETE FROM `dosen` WHERE `nip` = ?";
			$query = $this->db->prepare($sql);
			$query->bindParam(1, $id,PDO::PARAM_STR);
			
			try{
				$query->execute();
			}
			catch(PDOException $e){
				die($e->getMessage());
			}
		
	}
	
	public function hapusGambarDosenByNip($id){
		$query = $this->db->prepare("UPDATE `dosen` SET foto_dosen = '' where nip = :id
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
		
	public function deleteGaleriDetail($id){
		if(is_numeric($id)){
			
			$sql="DELETE FROM `album_detail` WHERE `id` = ?";
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