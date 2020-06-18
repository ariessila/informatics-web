<?php

class manajemen_halaman_model{
	private $db;
	public function __construct($database){
		$this->db = $database;
	}

	public function updateParrentHalamanFalse($nip){
	
		$query = $this->db->prepare("UPDATE `halaman_dosen` SET 	parent_halaman = 0 where posisi = '$nip'
		");
		try{
			$query->execute();
			return true;
		}
		catch(PDOException $e){
		return	die($e->getMessage());
		
		}		
	}
	
	public function updateUrutanHalamanFalse($nip){
	
		$query = $this->db->prepare("UPDATE `halaman_dosen` SET 	urutan = 0 where posisi = '$nip'
		");
		try{
			$query->execute();
			return true;
		}
		catch(PDOException $e){
		return	die($e->getMessage());
		
		}		
	}
	
	public function insertMenuManager($nip){
		
		$query = $this->db->prepare("INSERT INTO `manajemen_halaman_dosen` SET 	id = :nip");
		$query->bindParam(':nip',$nip);
		try{
			$query->execute();
			return true;
		}
		catch(PDOException $e){
		return	die($e->getMessage());
		
		}		
	}
	
	public function serializeManajemenHalaman($data,$nip){
	
		$this->updateParrentHalamanFalse($nip);
		
		if(!empty($data)){
		$data = json_decode($data,true);
		
			foreach($data as $parrent)
			{ // 	var_dump($halaman->getHalamanById($parrent['id'])); 

				if(isset($parrent['children']))
				{
					
						$this->updateParrentHalamanById($parrent['id']);
					
						foreach($parrent['children'] as $sub)
						{ // sub yang pertama
							
							if(isset($sub['children']))
							{	

								$this->updateParrentHalamanById($sub['id']);
								
								foreach($sub['children'] as $sub2)
								{ 	
									if(isset($sub2['children']))
									{
										$this->updateParrentHalamanById($sub2['id']);		
									
										foreach($sub2['children'] as $sub3)
										{ //sub ke 3
											if(isset($sub3['children'])){
											
												$this->updateParrentHalamanById($sub3['id']);
												
											}else{
											
												$this->updateParrentHalamanById($sub3['id']);
											
											}//child sub 3
										}//akhir sub 3
								
									}else{
						
										$this->updateParrentHalamanById($sub2['id']);	
										
									} //child sub 2
									
								}//akhir sub 2
							
							}else{
							
								$this->updateParrentHalamanById($sub['id']);
								
							}//child sub 1
						}//akhir sub 1
				}else{
						
						$this->updateParrentHalamanById($parrent['id']);
					
				}//parrent parrent
			}//akhir parrent
		}
	}
	
	public function serializeManajemenHalamanDosen($data,$nip){
	
		// $this->updateParrentHalamanFalse($nip);
		$this->updateUrutanHalamanFalse($nip);
		$no = 1;
		if(!empty($data)){
		$data = json_decode($data,true);
		
			foreach($data as $parrent)
			{ // 	var_dump($halaman->getHalamanById($parrent['id'])); 

				
						
						$this->updateUrutanHalamanById($parrent['id'],$no);
						
						// $this->updateParrentHalamanById($parrent['id']);
					
			$no++;	
			}//akhir parrent
		}
	}
	
	
	public function updateUrutanHalamanById($id, $urutan){
	
		$query = $this->db->prepare("UPDATE `halaman_dosen` SET 	urutan = :urutan where id_halaman = :id
		");
		$query->bindParam(':urutan',$urutan);
		$query->bindParam(':id',$id);
		try{
			$query->execute();
			return true;
		}
		catch(PDOException $e){
		return	die($e->getMessage());
		
		}		
	}
	
	public function updateParrentHalamanById($id){
	
		$query = $this->db->prepare("UPDATE `halaman_dosen` SET 	parent_halaman = 1 where id_halaman = ?
		");
		$query->bindParam(1,$id);
		try{
			$query->execute();
			return true;
		}
		catch(PDOException $e){
		return	die($e->getMessage());
		
		}		
	}
		
	public function getManajemenHalamanByNip($id){

		$query = $this->db->prepare("select * from manajemen_halaman_dosen where id  =  :id");
		$query->bindParam(':id',$id);
		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
		return $query->fetch(PDO::FETCH_ASSOC);
	}
	
	public function getManajemenHalaman(){

		$query = $this->db->prepare("select * from manajemen_halaman_dosen ");
	
		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
		return $query->fetch(PDO::FETCH_ASSOC);
		}
		
	public function updateManajemenHalaman($halaman,$nip){
		
		$query = $this->db->prepare("UPDATE `manajemen_halaman_dosen` SET 	halaman = :halaman
																		where id = :nip
		");
		$query->bindParam(':halaman',$halaman);
		$query->bindParam(':nip',$nip);
		try{
			$query->execute();
			return true;
		}
		catch(PDOException $e){
		return	die($e->getMessage());
		
		}		
	}
	
	public function updateParrentHalaman($data){
	
	$data = json_decode($hasil['halaman'],true);
		foreach($data as $parrent)
		{ // parrent
		
			$this->updateParrentHalamanById($parrent['id']); // update parrent
			
			if(isset($parrent['children']))
			{
				foreach($parrent['children'] as $sub)
				{ // sub yang pertama
					
					$this->updateParrentHalamanById($sub['id']); // update parrent
					
					if(isset($sub['children']))
					{	
						foreach($sub['children'] as $sub2)
						{ // sub ke 2

							$this->updateParrentHalamanById($sub2['id']); // update parrent

							if(isset($sub2['children']))
							{	
								foreach($sub2['children'] as $sub3){ //sub ke 3
									
									$this->updateParrentHalamanById($sub3['id']); // update parrent

									if(isset($sub3['children']))
									{	
										foreach($sub3['children'] as $sub4)
										{ //sub ke 4

											$this->updateParrentHalamanById($sub4['id']); // update parrent
											
											if(isset($sub4['children']))
											{	
												foreach($sub4['children'] as $sub5)
												{ //sub ke 5
													
													$this->updateParrentHalamanById($sub5['id']); // update parrent
												
												}//akhir sub 5
											}//child sub 4
										}//akhir sub 4
									}//child sub 3
								}//akhir sub 3
							} //child sub 2
						}//akhir sub 2
					} //child sub 1
				}//akhir sub 1
			}// child parrent 
		}//akhir parrent

		
	}
	
		
	public function deleteHalaman($id){
		if(is_numeric($id)){
			
			$sql="DELETE FROM `halaman_dosen` WHERE `id_halaman` = ?";
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