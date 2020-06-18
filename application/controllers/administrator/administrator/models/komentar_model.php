<?php

class komentar_model{
	private $db;
	public function __construct($database){
		$this->db = $database;
	}
	
	public function countKomentar(){
		$query = $this->db->prepare("select * from komentar ");
		try{
			$query->execute();
			return $query->rowCount();
		}catch(PDOException $e){
			return false;
			break;
		}
			
	}
	
	public function countKomentarById($id,$is){
		$id = filter_var($id, FILTER_SANITIZE_STRING);
		$query = $this->db->prepare("select * from komentar where date(`tanggal_komentar`) = curdate() and ip = :id and id_artikel = :is");
		
		
		$query->bindParam(':id',$id);
		$query->bindParam(':is',$is);
		try{
			$query->execute();
			return $query->rowCount();
		}catch(PDOException $e){
			return false;
			break;
		}
			
	}
	
	public function getNamaArtikel($id){

		$query = $this->db->prepare("select judul from artikel where id = :id");
		$query->bindParam('id',$id,PDO::PARAM_INT);
		try{
			$query->execute();
			
		}catch(PDOException $e){ 
			
		}
			return $query->fetch(PDO::FETCH_ASSOC);
	}
	
	public function getKomentarById($id){

		$query = $this->db->prepare("select * from komentar where id = :id");
		$query->bindParam('id',$id,PDO::PARAM_INT);
		try{
			$query->execute();
			
		}catch(PDOException $e){ 
			
		}
			return $query->fetch(PDO::FETCH_ASSOC);
	}
	
	public function getKomentarByIdArtikel($id){

		$query = $this->db->prepare("select * from komentar where id_artikel = :id");
		$query->bindParam('id',$id,PDO::PARAM_INT);
		try{
			$query->execute();
			
		}catch(PDOException $e){ 
			
		}
			return $query->fetchAll(PDO::FETCH_ASSOC);
	}
		
	public function getKomentar(){

		$query = $this->db->prepare("select * from komentar order by id_komentar DESC ");
		$query->bindParam('id',$id,PDO::PARAM_INT);
		try{
			$query->execute();
			
		}catch(PDOException $e){ 
			
		}
			return $query->fetchAll(PDO::FETCH_ASSOC);
	}
		
	public function updateDukungan($id){

		$query = $this->db->prepare("update komentar set dukungan = dukungan + 1  where id = :id order by  id DESC ");
		$query->bindParam('id',$id,PDO::PARAM_INT);
		try{
			$query->execute();
			
		}catch(PDOException $e){ 
			
		}
			return $query->fetchAll(PDO::FETCH_ASSOC);
	}
	
	
	public function insertKomentar($id_artikel,$nama_komentar,$email_komentar,$isi_komentar,$ip){
		
		$query = $this->db->prepare("INSERT INTO `komentar` SET `id_artikel`=:id_artikel,
																`nama_komentar`=:nama_komentar,
																`email_komentar`=:email_komentar,
																`tanggal_komentar`=NOW(),
																`isi_komentar`=:isi_komentar,
																`ip`=:ip
																");
																	
		$query->bindParam(':id_artikel',$id_artikel,PDO::PARAM_INT);
		$query->bindParam(':nama_komentar',$nama_komentar,PDO::PARAM_STR);
		$query->bindParam(':email_komentar',$email_komentar,PDO::PARAM_STR);
		$query->bindParam(':isi_komentar',$isi_komentar,PDO::PARAM_STR);
		$query->bindParam(':ip',$ip,PDO::PARAM_STR);
		try{
			$query->execute();
			return true;
		}
		catch(PDOException $e){
		
			return false;
			break;
		}		
	}
	
	
	public function insertDukungan($id,$session){
		
		$query = $this->db->prepare("INSERT INTO `dukungan` SET `session`=:session,
																`id_komentar`=:id
																");
																	
		$query->bindParam(':session',$session,PDO::PARAM_STR);
		$query->bindParam(':id',$id,PDO::PARAM_INT);

		try{
			$query->execute();
			return true;
		}
		catch(PDOException $e){
		
			return false;
			break;
		}		
	}
	
	public function countDukungan($id){
		
		$id = filter_var($id, FILTER_SANITIZE_STRING);
		if(is_numeric($id)){
		$query = $this->db->prepare("select * from dukungan where id_komentar='?' ");
		
		
		$query->bindParam(1,$id);
		try{
			$query->execute();
			return $query->rowCount();
		}catch(PDOException $e){
			return false;
			break;
		}
		}
	
	}
	
	public function deleteKomentar($id){
		
			
			$sql="DELETE FROM `komentar` WHERE `id_komentar` = ?";
			$query = $this->db->prepare($sql);
			$query->bindParam(1, $id,PDO::PARAM_STR);
			
			try{
				$query->execute();
			}
			catch(PDOException $e){
				die($e->getMessage());
			}
		
	}

}
?>