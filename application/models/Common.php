<?php
class Common extends CI_Model 
{/*
	function Common()
	{
		parent::__construct();
		$this->load->database();
	}*/
	public function __construct()
    {
    	$this->load->database();
    }
    public function check_auth() {
        if($this->session->userdata('user_type') == "" || $this->session->userdata('user_id') == "" || $this->session->userdata('user_type')!='admin') {
            if ($this->input->is_ajax_request()) {
                echo '<script>location.reload();</script>';
            }
            redirect(base_url().'admin');
            return false;
        }
        return true;
    }
	function fetchdata($fieldname,$tblname,$where="",$orderby="",$page=false,$max="")
	{
		$qr="SELECT ".$fieldname." FROM ".$tblname." ".$where." ".$orderby." ";
		if($max!="")
		{
			$qr.=" LIMIT ".$page.",".$max."";
		} 
		//echo $qr;
		$query=$this->db->query($qr);
		return $query->result_array(); 
	}
			
	function fetchsingledata($fieldname,$tblname,$where,$orderby='')
	{
		//echo "select ".$fieldname." from ".$tblname." where ".$where." ".$orderby;
		$query=$this->db->query("SELECT ".$fieldname." FROM ".$tblname .$where." ".$orderby);
		return  $query->row_array(); 
	}
			
	function numberofrecord($fieldname,$tblname,$where)
	{
		$qr="SELECT ".$fieldname." FROM ".$tblname;
		if($where!='')
		{
			$qr .= $where;
		}
		$query=$this->db->query($qr);
		//echo $qr;
		return $query->num_rows(); 
	}
	
	function db_add($tablename,$fieldarray)
	{
	   return $this->db->insert($tablename, $fieldarray);
	}	

	function db_update($tablename,$fieldarray,$columnname,$value)
	{
		$this->db->where($columnname,$value);
		return $this->db->update($tablename,$fieldarray); 
	
	}
	
	function db_delete($tablename,$columnname,$value)
	{
		$query = $this->db->where($columnname, $value);
		return $this->db->delete($tablename);
	}
	
	function db_delete_custome($tablename,$wherecondition)
	{
		$sql_del_qry = "DELETE FROM ".$tablename.$wherecondition;
		return $this->db->query($sql_del_qry);
	}

	function findmaxid($fieldname,$tblname)
	{
	   $query=$this->db->query("SELECT MAX(".$fieldname.") AS id FROM ".$tblname);
	   return $query->row_array(); 
	}
	function create_seo($text="",$last_id="")
	{ 
		// replace non letter or digits by -
		$text = preg_replace('~[^\\pL\d]+~u', '-', $text);
		// trim
		$text = trim($text, '-');
		// transliterate
		$text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
		// lowercase
		$text = strtolower($text);
		// remove unwanted characters
		$text = preg_replace('~[^-\w]+~', '', $text);
		if (empty($text))
		{
			return false;
		}
		if($last_id!="")
		{
			return $last_id."-".$text;	
		}
		else
		{
			return $text;
		}
		
	}
	/* create image thumb*/
    public function create_thumb($file_name,$new_image,$width,$height)
    {
        $config['image_library']  = 'gd2';
        $config['source_image']   = $file_name;
        $config['create_thumb']   = TRUE;
        $config['maintain_ratio'] = FALSE;
        $config['thumb_marker']   = '';
        $config['new_image']      = $new_image;
        $config['width']          = $width;
        $config['height']         = $height;
		$this->load->library('image_lib', $config);
		$this->image_lib->initialize($config);
		$this->image_lib->resize();
    }
    /*Convert image*/
    public function imagetostring($image)
    {
    	$errors=array();
	    $allowed_ext= array('jpg','jpeg','png','gif');
	    $file_name =$image['name'];
	 //   $file_name =$_FILES['image']['tmp_name'];
	    $tmp = explode('.', $file_name);
		$file_ext = strtolower(end($tmp));
	    //$file_ext = strtolower( end(explode('.',$file_name)));
	    $file_size=$image['size'];
	    $file_tmp= $image['tmp_name'];
	  
	    $type = pathinfo($file_tmp, PATHINFO_EXTENSION);
	    $data = file_get_contents($file_tmp);
	    $base64 = base64_encode($data);
        return 'data:image/' . $file_ext . ';base64,' .$base64;
    }
	/*currency change amount value*/
    public function currency($to_Currency,$amount)
	{
		$from_Currency='USD';
		$url = 'http://download.finance.yahoo.com/d/quotes.csv?s='.$from_Currency .$to_Currency .'=X&f=l1';
		$c = curl_init($url);
		curl_setopt($c, CURLOPT_HEADER, 0);
		curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
		$this->fxRate = doubleval(curl_exec($c));
		curl_close($c);
		if($this->fxRate == 0)
		{
		 return 0;
		}
		else
		{
		 if($amount!='')
		 {	
		   $rate=$amount * $this->fxRate;
		   return $rate;
		 }else
		 {
		   return  $this->fxRate;
		 }
		}
	}

	// public function setting_smtp()
	// {
	// 	$permission=TRUE;
	// 	if($permission==TRUE)
	// 	{
	// 		$config['protocol']    	= 'smtp';
	// 		$config['smtp_host']    = 'ssl://smtp.gmail.com';
	// 		$config['smtp_port']    = '465';
	// 		$config['smtp_timeout'] = '7';
	// 		$config['smtp_user']    = 'technokeens@gmail.com';
	// 		$config['smtp_pass']    = 'Technokeens@2014';
	// 		$config['charset']    	= 'utf-8';
	// 		$config['newline']    	= "\r\n";
	// 		$config['mailtype'] 	= 'html'; // or html
	// 		$config['validation'] 	= TRUE; // bool whether to validate email or not  
	// 		$this->email->initialize($config);	
	// 	}
	// }

	public function setting_smtp()
	{
		$permission=TRUE;
		if($permission==TRUE)
		{
			$data = $this->fetchsingledata('*','tbl_mailsetting',' WHERE `id` = 1 ');
        	
			$config['protocol']    	= 'smtp';
			$config['smtp_host']    = $data['smtphost'];
			$config['smtp_port']    = $data['smtpport'];
			$config['smtp_timeout'] = '7';
			$config['smtp_user']    = $data['smtpuser'];
			$config['smtp_pass']    = base64_decode($data['smtppass']);
			$config['charset']    	= 'utf-8';
			$config['newline'] = "\r\n";
			$config['mailtype'] 	= 'html'; // or html
			$config['validation'] 	= TRUE; // bool whether to validate email or not  
			$this->email->initialize($config);	
			$this->email->set_newline("\r\n");
		}
	}

	/* Random 10 digit number Start */ 
	function randomPrefix($length)
	{
		$random= "";
		srand((double)microtime()*1000000);
		$data = "AbcDE123IJKLMN67QRSTUVWXYZ";
		$data .= "aBCdefghijklmn123opq45rs67tuv89wxyz";
		$data .= "0FGH45OP89";
		for($i = 0; $i < $length; $i++)
		{
		$random .= substr($data, (rand()%(strlen($data))), 1);
		}
		return $random;
	}
	/*Ajax pagination code starts*/
	function pagination($limit,$adjacents,$rows,$page)
	{
		$pagination='';
		if ($page == 0) $page = 1;					//if no page var is given, default to 1.
		$prev = $page - 1;							//previous page is page - 1
		$next = $page + 1;							//next page is page + 1
		$prev_='';
		$first='';
		$lastpage = ceil($rows/$limit);	
		$next_='';
		$last='';
		if($lastpage > 1)
		{	
			//previous button
			if ($page > 1) 
				$prev_.= "<li class='paginate-cent'><a  href=\"?page=$prev\">Previous</a></li>";
			else{
				//$pagination.= "<span class=\"disabled\">previous</span>";	
				}
			//pages	
			if ($lastpage < 5 + ($adjacents * 2))	//not enough pages to bother breaking it up
			{	
			$first='';
				for ($counter = 1; $counter <= $lastpage; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<li class='paginate-cent'><a class=\"current\" href=\"javascript:void(0);\">$counter</a></li>";
					else
						$pagination.= "<li class='paginate-cent'><a  href=\"?page=$counter\">$counter</a></li>";					
				}
				$last='';
			}
			elseif($lastpage > 3 + ($adjacents * 2))	//enough pages to hide some
			{
				//close to beginning; only hide later pages
				$first='';
				if($page < 1 + ($adjacents * 2))		
				{
					for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
					{
						if ($counter == $page)
							$pagination.= "<li class='paginate-cent'><a class=\"current\" href=\"javascript:void(0);\">$counter</a></li>";
						else
							$pagination.= "<li class='paginate-cent'><a  href=\"?page=$counter\">$counter</a></li>";					
					}
				$last.= "<li class='paginate-cent'><a  href=\"?page=$lastpage\">Last</a></li>";			
				}
				
				//in middle; hide some front and some back
				elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
				{
				   $first.= "<li class='paginate-cent'><a class='' href=\"?page=1\">First</a>";	
				for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
					{
						if ($counter == $page)
							$pagination.= "<li class='paginate-cent'><a class=\"current\" href=\"javascript:void(0);\">$counter</a></li>";
						else
							$pagination.= "<li class='paginate-cent'><a class='' href=\"?page=$counter\">$counter</a></li>";					
					}
					$last.= "<li class='paginate-cent'><a class='' href=\"?page=$lastpage\">Last</a></li>";			
				}
				//close to end; only hide early pages
				else
				{
					$first.= "<li class='paginate-cent'><a class='' href=\"?page=1\">First</a></li>";	
					for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
					{
						if ($counter == $page)
							$pagination.= "<li class='paginate-cent'><a class=\"current\" href=\"javascript:void(0);\">$counter</a></li>";
						else
							$pagination.= "<li class='paginate-cent'><a class='' href=\"?page=$counter\">$counter</a></li>";					
					}
					$last='';
				}
				}
			if ($page < $counter - 1) 
				$next_.= "<li class='paginate-cent'><a class='' href=\"?page=$next\">Next</a></li>";
			else{
				//$pagination.= "<span class=\"disabled\">next</span>";
				}
			$pagination = "<div class='paginate'><ul>".$first.$prev_.$pagination.$next_.$last;
			//next button
			$pagination.= "</ul></div>\n";		
		}
		else
		{
			//$pagination='nothing'; 
		}
		echo $pagination;  
	}
	/*Ajax Pagination code ends*/

	/*Excel Generator*/
	function excel($column,$feeds)
	{
		header('Content-Type: application/vnd.ms-excel');	//define header info for browser
		header('Content-Disposition: attachment; filename= Leads-'.date('Ymd').'.xls');
		header('Pragma: no-cache');
		header('Expires: 0');
		foreach($column as $c)
		{
			echo $c."\t";
		}
		echo "\n";
		foreach($feeds as $f)
		{
			echo $f;
			echo "\n";
		}

	}
	/*Excel Generator end*/

	function download($path,$file_name)
	{
		$data = file_get_contents($path.'/'.$file_name); // Read the file's contents
		$name = $file_name;

		force_download($name, $data); 
	}

	function create_square_image($original_file, $destination_file=NULL, $square_size = 96){
		
		/*if(isset($destination_file) and $destination_file!=NULL){
			if(!is_writable($destination_file)){
				echo '<p style="color:#FF0000">Oops, the destination path is not writable. Make that file or its parent folder wirtable.</p>'; 
			}
		}*/
		
		// get width and height of original image
		$imagedata = getimagesize($original_file);
		$original_width = $imagedata[0];	
		$original_height = $imagedata[1];
		
		if($original_width > $original_height){
			$new_height = $square_size;
			$new_width = $new_height*($original_width/$original_height);
		}
		if($original_height > $original_width){
			$new_width = $square_size;
			$new_height = $new_width*($original_height/$original_width);
		}
		if($original_height == $original_width){
			$new_width = $square_size;
			$new_height = $square_size;
		}
		
		$new_width = round($new_width);
		$new_height = round($new_height);
		
		// load the image
		if(substr_count(strtolower($original_file), ".jpg") or substr_count(strtolower($original_file), ".jpeg")){
			$original_image = imagecreatefromjpeg($original_file);
		}
		if(substr_count(strtolower($original_file), ".gif")){
			$original_image = imagecreatefromgif($original_file);
		}
		if(substr_count(strtolower($original_file), ".png")){
			$original_image = imagecreatefrompng($original_file);
		}
		
		$smaller_image = imagecreatetruecolor($new_width, $new_height);
		$square_image = imagecreatetruecolor($square_size, $square_size);
		
		imagecopyresampled($smaller_image, $original_image, 0, 0, 0, 0, $new_width, $new_height, $original_width, $original_height);
		
		if($new_width>$new_height){
			$difference = $new_width-$new_height;
			$half_difference =  round($difference/2);
			imagecopyresampled($square_image, $smaller_image, 0-$half_difference+1, 0, 0, 0, $square_size+$difference, $square_size, $new_width, $new_height);
		}
		if($new_height>$new_width){
			$difference = $new_height-$new_width;
			$half_difference =  round($difference/2);
			imagecopyresampled($square_image, $smaller_image, 0, 0-$half_difference+1, 0, 0, $square_size, $square_size+$difference, $new_width, $new_height);
		}
		if($new_height == $new_width){
			imagecopyresampled($square_image, $smaller_image, 0, 0, 0, 0, $square_size, $square_size, $new_width, $new_height);
		}
		

		// if no destination file was given then display a png		
		if(!$destination_file){
			imagepng($square_image,NULL,9);
		}
		
		// save the smaller image FILE if destination file given
		if(substr_count(strtolower($destination_file), ".jpg")){
			imagejpeg($square_image,$destination_file,100);
		}
		if(substr_count(strtolower($destination_file), ".gif")){
			imagegif($square_image,$destination_file);
		}
		if(substr_count(strtolower($destination_file), ".png")){
			imagepng($square_image,$destination_file,9);
		}

		imagedestroy($original_image);
		imagedestroy($smaller_image);
		imagedestroy($square_image);

	}

	/*function watermark($image,$watermark)
	{
		$stamp = imagecreatefrompng($watermark);
		$im = imagecreatefromjpeg($image);

		// Set the margins for the stamp and get the height/width of the stamp image
		$marge_right = 10;
		$marge_bottom = 10;
		$sx = imagesx($stamp);
		$sy = imagesy($stamp);

		// Copy the stamp image onto our photo using the margin offsets and the photo 
		// width to calculate positioning of the stamp. 
		imagecopy($im, $stamp, imagesx($im) - $sx - $marge_right, imagesy($im) - $sy - $marge_bottom, 0, 0, imagesx($stamp), imagesy($stamp));

		// Output and free memory
		header('Content-type: image/png');
		imagepng($im);
		imagedestroy($im);
	}*/

	function watermark_image($target, $wtrmrk_file, $newcopy) {
	    $watermark = imagecreatefrompng($wtrmrk_file);
	    imagealphablending($watermark, false);
	    imagesavealpha($watermark, true);
	    $img = imagecreatefromjpeg($target);
	    $img_w = imagesx($img);
	    $img_h = imagesy($img);
	    $wtrmrk_w = imagesx($watermark);
	    $wtrmrk_h = imagesy($watermark);
	    $dst_x = ($img_w / 2) - ($wtrmrk_w / 2); // For centering the watermark on any image
	    $dst_y = ($img_h / 2) - ($wtrmrk_h / 2); // For centering the watermark on any image
	    imagecopy($img, $watermark, $dst_x, $dst_y, 0, 0, $wtrmrk_w, $wtrmrk_h);
	    imagejpeg($img, $newcopy, 100);
	    imagedestroy($img);
	    imagedestroy($watermark);
	}

	function encode_img($img)
	{
		$img_file = $img;

		// Read image path, convert to base64 encoding
		$imgData = base64_encode(file_get_contents($img_file));

		// Format the image SRC:  data:{mime};base64,{data};
		return $src = 'data:image/png|jpg;base64,'.$imgData;
	}

	function ip_info($ip = NULL, $purpose = "location", $deep_detect = TRUE) {
	    $output = NULL;
	    if (filter_var($ip, FILTER_VALIDATE_IP) === FALSE) {
	        $ip = $_SERVER["REMOTE_ADDR"];
	        if ($deep_detect) {
	            if (filter_var(@$_SERVER['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP))
	                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	            if (filter_var(@$_SERVER['HTTP_CLIENT_IP'], FILTER_VALIDATE_IP))
	                $ip = $_SERVER['HTTP_CLIENT_IP'];
	        }
	    }
	    $purpose    = str_replace(array("name", "\n", "\t", " ", "-", "_"), NULL, strtolower(trim($purpose)));
	    $support    = array("country", "countrycode", "state", "region", "city", "location", "address");
	    $continents = array(
	        "AF" => "Africa",
	        "AN" => "Antarctica",
	        "AS" => "Asia",
	        "EU" => "Europe",
	        "OC" => "Australia (Oceania)",
	        "NA" => "North America",
	        "SA" => "South America"
	    );
	    if (filter_var($ip, FILTER_VALIDATE_IP) && in_array($purpose, $support)) {
	        $ipdat = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ip));
	        if (@strlen(trim($ipdat->geoplugin_countryCode)) == 2) {
	            switch ($purpose) {
	                case "location":
	                    $output = array(
	                        "city"           => @$ipdat->geoplugin_city,
	                        "state"          => @$ipdat->geoplugin_regionName,
	                        "country"        => @$ipdat->geoplugin_countryName,
	                        "country_code"   => @$ipdat->geoplugin_countryCode,
	                        "continent"      => @$continents[strtoupper($ipdat->geoplugin_continentCode)],
	                        "continent_code" => @$ipdat->geoplugin_continentCode
	                    );
	                    break;
	                case "address":
	                    $address = array($ipdat->geoplugin_countryName);
	                    if (@strlen($ipdat->geoplugin_regionName) >= 1)
	                        $address[] = $ipdat->geoplugin_regionName;
	                    if (@strlen($ipdat->geoplugin_city) >= 1)
	                        $address[] = $ipdat->geoplugin_city;
	                    $output = implode(", ", array_reverse($address));
	                    break;
	                case "city":
	                    $output = @$ipdat->geoplugin_city;
	                    break;
	                case "state":
	                    $output = @$ipdat->geoplugin_regionName;
	                    break;
	                case "region":
	                    $output = @$ipdat->geoplugin_regionName;
	                    break;
	                case "country":
	                    $output = @$ipdat->geoplugin_countryName;
	                    break;
	                case "countrycode":
	                    $output = @$ipdat->geoplugin_countryCode;
	                    break;
	            }
	        }
	    }
	    return $output;
	}

	function getCategoryTree($level = 0, $prefix = '',$id=0) {
        $rows = $this->fetchdata("*","tbl_product_category"," WHERE sub_for='".$level."'"," ORDER BY cat_name ASC");
        //echo $id;exit();
        $category = '';
        if (count($rows) > 0) {
            foreach ($rows as $row) {
        ?>
            <option value="<?php echo $row['cat_id']?>" <?php if($id==$row['cat_id']){echo "selected";}?>><?php echo $prefix . $row['cat_name'];?></option>

        <?php
                //echo '<option value="'.$row['id'].'" "'.$selected.'">'.$prefix . $row['name'].'</option>';
                $this->getCategoryTree($row['cat_id'], $prefix . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;',$id);
            }
        }
        return $category;
    }

    function getmenutree($level = 0, $prefix = '',$id=0) {
        $rows = $this->fetchdata("*","tbl_menus"," WHERE parent_menu='".$level."' AND status='1'"," ORDER BY title ASC");
        //echo $id;exit();
        $category = '';
        if (count($rows) > 0) {
            foreach ($rows as $row) {
        ?>
            <option value="<?php echo $row['menu_id']?>" <?php if($id==$row['menu_id']){echo "selected";}?>><?php echo $prefix . $row['title'];?></option>

        <?php
                //echo '<option value="'.$row['id'].'" "'.$selected.'">'.$prefix . $row['name'].'</option>';
                $this->getmenutree($row['menu_id'], $prefix . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;',$id);
            }
        }
        return $category;
    }

    public function setValueStore($key, $value)
    {
        $this->db->where('thekey', $key);
        $query = $this->db->get('value_store');

        if ($query->num_rows() > 0) {
            $this->db->where('thekey', $key);
            if (!$this->db->update('value_store', array('value' => $value))) {
               
            }
        } else {
            if (!$this->db->insert('value_store', array('value' => $value, 'thekey' => $key))) {
                
            }
        }
    }
    
    public function getValueStore($key)
    {
        $query = $this->db->query("SELECT value FROM value_store WHERE thekey = '$key'");
        $img = $query->row_array();
        return $img['value'];
    }

 } 
?>