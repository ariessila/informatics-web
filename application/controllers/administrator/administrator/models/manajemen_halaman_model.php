<?php

class manajemen_halaman_model{
	private $db;
	public function __construct($database){
		$this->db = $database;
	}

	public function updateParrentHalamanFalse(){
	
		$query = $this->db->prepare("UPDATE `halaman` SET 	parent_halaman = 0
		");
		try{
			$query->execute();
			return true;
		}
		catch(PDOException $e){
		return	die($e->getMessage());
		
		}		
	}
	
	public function updatePosisiHalamanFalse(){
	
		$query = $this->db->prepare("UPDATE `halaman` SET 	posisi = 0
		");
		try{
			$query->execute();
			return true;
		}
		catch(PDOException $e){
		return	die($e->getMessage());
		
		}		
	}
	
	
	public function getHalamanByPosisi0(){

		$query = $this->db->prepare("select * from halaman where posisi = 0 order by id_halaman desc");
	
		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
		return $query->fetchAll(PDO::FETCH_ASSOC);
		}
	
	public function serializeManajemenHalaman($data){
	
		$this->updateParrentHalamanFalse();
		
		$this->updatePosisiHalamanFalse();
		
		$data = json_decode($data,true);
		
		foreach($data as $parrent)
		{

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
	
	
	public function serializeManajemenHalamanWithHalaman($data){
	
		$this->updateParrentHalamanFalse(); // false parent
		
		$this->updatePosisiHalamanFalse(); // false posisi
		
		$data = json_decode($data,true);
		$parent = 1;
		$child = 1;
		foreach($data as $parrent)
		{

			if(isset($parrent['children']))
			{
				
					// $this->updateParrentHalamanById($parrent['id']);
					$this->updateParenHalamanByIdToWithPosisition($parrent['id'], $parent);
					
				
					foreach($parrent['children'] as $sub)
					{ // sub yang pertama
						
						
						// $this->updateParrentHalamanById($sub['id']);
						$this->updateParenHalamanByIdToWithPosisition($sub['id'], $child); 
						$this->updateParenHalamanByIdToPosisition($sub['id'], $parrent['id']); 
						
						
						$child++;
					}//akhir sub 1
			}else{
					$this->updateParenHalamanByIdToWithPosisition($parrent['id'], $parent);
					// $this->updateParrentHalamanById($parrent['id']);
				
			}//parrent parrent
			
			
		$child = 1;
		$parent++;
		}//akhir parrent
	}
	
	
	public function updateParrentHalamanById($id){
	
		$query = $this->db->prepare("UPDATE `halaman` SET 	parent_halaman = 1 where id_halaman = ?
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
	
	public function updateParenHalamanByIdToWithPosisition($id, $parent){
	
		$query = $this->db->prepare("UPDATE `halaman` SET 	posisi = :parent where id_halaman = :id
		");
		$query->bindParam(':id',$id);
		$query->bindParam(':parent',$parent);
		try{
			$query->execute();
			return true;
		}
		catch(PDOException $e){
		return	die($e->getMessage());
		
		}		
	}
	
	public function updateParenHalamanByIdToPosisition($id, $parent){
	
		$query = $this->db->prepare("UPDATE `halaman` SET 	parent_halaman = :parent where id_halaman = :id
		");
		$query->bindParam(':id',$id);
		$query->bindParam(':parent',$parent);
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