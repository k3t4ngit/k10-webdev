<?php

	class event_model extends CI_Model
	{
		public function add_event($img,$data)
		{	
			
			print_r( $imgnames=$this->add_images($img));
		
			// print_r($imgnames);
			$remvnimg=array_flip(array('nimg'));
			$output = array_diff_key($data, $remvnimg);
			
			
			// $result = array_merge((array)$output, (array)$imgnames);
			// print_r($result);
			// if($this->db->insert('evedetails',$result)){
			// 	return true;
			// }
			// else{
			// 	return false;
			// }
		}

		public function add_images($nimg)
		{
			$imagenames;
			$burl=base_url();

			for($i=0;$i<$nimg;$i++)
			{
				echo $img="img".$i;
				$date = new DateTime();
				$datetime= $date->format('Y-m-d H:i:s');
				
				$filename = $_FILES[$img]["name"] ;
				$image_path = sprintf(
				    "%s/%s_%s_%s.%s","images",$img,
				    $_POST['Title'],
				    $datetime,
				    pathinfo($filename, PATHINFO_EXTENSION)
				);
				echo $image_path;
				
				$chckimg=move_uploaded_file($_FILES[$img]["tmp_name"],$image_path);
				if($chckimg)
				{
				
				 	// echo "Image uploaded <a href=' " .$burl.$image_path ."'>here</a>";
				}
				else
				{
					// echo "error";
				}
				$imagenames[$img]=$image_path;
				// print_r($imagenames);

			}
			// print_r($imagenames);
			// return $imagenames;
			

			
		}

		public function listevents(){
			$this->db->select('EventId,Title, DT');
			$query = $this->db->get('evedetails');
			return $query->result();
		

		}
		public function eventdetails($id){
			$query = $this->db->get_where('evedetails', array('EventId' => $id));
			return $query->result();
			// return $query->result();

		}
// select  3956*2*ASIN(SQRT(POWER(SIN((".$Latitude."-abs(tr.latitude))*pi()/180/2),2)+COS(".$Latitude."*pi()/180)*COS(abs(tr.latitude)*pi()/180)*POWER(SIN((".$Longitude."-tr.longitude)*pi()/180/2), 2))) as distance 
// from tbl_name having distance <".$GivenRadius."

	}