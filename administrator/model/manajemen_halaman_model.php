<?php

class manajemen_halaman_model{
	private $db;
	public function __construct($database){
		$this->db = $database;
	}

	public function updateParrentHalamanFalse(){
	
		$query = $this->db->prepare("UPDATE `halaman` SET 	parrent_halaman = 0
		");
		try{
			$query->execute();
			return true;
		}
		catch(PDOException $e){
		return	die($e->getMessage());
		
		}		
	}
		
	public function updateParrentHalamanById($id){
	
		$query = $this->db->prepare("UPDATE `halaman` SET 	parrent_halaman = 1 where id_halaman = ?
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
	
	public function getManajemenHalaman(){

		$query = $this->db->prepare("select * from manajemen_halaman ");
	
		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
		return $query->fetch(PDO::FETCH_ASSOC);
		}
		
		
	public function updateManajemenHalaman($halaman){
		
		$query = $this->db->prepare("UPDATE `manajemen_halaman` SET 	halaman = :halaman
																		where id = 1
		");
		$query->bindParam(':halaman',$halaman);
		try{
			$query->execute();
			return true;
		}
		catch(PDOException $e){
		return	die($e->getMessage());
		
		}		
	}
	
	public function serializeManajemenHalamanDosen($data,$nip){
	
		$this->updateParrentHalamanFalse($nip);
		
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
	
		
	public function deleteHalaman($id){
		if(is_numeric($id)){
			
			$sql="DELETE FROM `halaman` WHERE `id_halaman` = ?";
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