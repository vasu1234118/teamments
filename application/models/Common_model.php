<?php
class Common_model extends CI_Model{
	function __construct()
	{
		parent::__construct();
		$this->date=date('Y-m-d H:i:s');
	}
	
	function findLocation($ipaddress){
		$ip_count =$this->get_table_count('location', array('ip_address'=>$ipaddress));
		if($ip_count==0){
			// Ip is not excested in Rapido Bytes Database saved into DB
			$address = file_get_contents('http://api.ipinfodb.com/v3/ip-city/?key=d6c3ea6b60b3184a4d49de66d6d8fca9752926c2cec7b7c47498dab5cc9bbe35&ip='.$ipaddress);
			//print_r($address); die;
			$arrderss_array =explode(';', $address);
			$country_code=$arrderss_array[3];
			$country=$arrderss_array[4];
			$state=$arrderss_array[5];
			$city=$arrderss_array[6];
			$zip_code=$arrderss_array[7];	
			$latitude=$arrderss_array[8];
			$longitude=$arrderss_array[9];
		
			$returndata=array(
				'ip_address'=>$ipaddress,
				'city'=>$city,
				'state'=>$state,
				'country'=>$country,
				'country_code'=>$country_code,
				'zip'=>$zip_code,
				'lat'=>$latitude,
				'long'=>$longitude,
				'isp'=>gethostbyaddr($ipaddress),
				'datentime'=>$this->date
			);
			$this->saveTable('location', $returndata);
		}else{
			//Ip is excested in Tellmeboss Database get Ip details
			$location_data =$this->getRecordDetails('location', array('ip_address'=>$ipaddress));
			$latitude=$location_data[0]['lat'];
			$longitude=$location_data[0]['long'];
			$zip_code=$location_data[0]['zip'];
			$city=$location_data[0]['city'];
			$state=$location_data[0]['state'];
			$country=$location_data[0]['country'];
		}
		setcookie("tbaa", base64_encode($city), time() + (86400 * 30), "/");
		setcookie("tbac", base64_encode($country), time() + (86400 * 30), "/");
		setcookie("tbad", base64_encode($state), time() + (86400 * 30), "/");
		setcookie("tbae", base64_encode($zip_code), time() + (86400 * 30), "/");
		setcookie("tbaj", base64_encode($this->date), time() + (86400 * 30), "/");
		
		$returndata=array(
			'zip'=>$zip_code,
			'city'=>$city,
			'state'=>$state,
			'country'=>$country
		);
		
		return $returndata;
	}
	
	function getProfileImage($display_image,$display_image_url,$gender,$class_name){
		if($display_image){
		$result= '<img src="'.base_url("images/display_images/134X135/".$display_image).'" class="'.$class_name.'" border="0" />';
		}else if($display_image_url){
		$result= '<img src="'.$display_image_url.'" class="'.$class_name.'" border="0" />';
		}else if($gender=='F'){
		$result= '<img src="'.base_url("images/default-girl.png").'" class="'.$class_name.'" border="0" />';
		}else if($gender=='M'){
		$result= '<img src="'.base_url("images/default-boy.png").'" class="'.$class_name.'" border="0" />';
		}else{
		$result= '<img src="'.base_url("images/default-boy.png").'" class="'.$class_name.'" border="0" />';
		}
	return $result;	
	}
	
	
	function fileRename($filename){
		$tmp=explode(".", $filename);
		$extension=end($tmp);
		return date('YmdHis').".".$extension;
	}
	
	function _create_thumbnail($fumm_img_path,$fumm_thumb_img_path,$width,$height) 
    {
        $this->load->library('image_lib');
        $config['image_library'] = 'gd2';
        $config['source_image'] =$fumm_img_path;       
        $config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = TRUE;
        $config['width'] = $width;
        $config['height'] = $height;
        $config['new_image'] = $fumm_thumb_img_path;               
        $this->image_lib->initialize($config);
        if(!$this->image_lib->resize())
        { 
            $this->image_lib->display_errors();
        }        
    }
	
	function get_raby_ipaddress($ip_address){
		$nTable='ipaddress';
		$system_count =$this->getSelectedRecordDetails('network_system_count, id', $nTable, array('ip_address'=>$ip_address));
		if($system_count){
			$scount=$system_count[0]['network_system_count'];
			$sid=$system_count[0]['id'];
		}else{
			$scount='';
			$sid='';
		}
		
		if(empty($scount)){
			// First Time
			$this->saveTable($nTable, array('ip_address'=>$ip_address,'network_system_count'=>1));
			$raby_browser_ip=$ip_address.'-1';
		}else if(255<$scount) {
			// Max Ip Count
			$this->updateTable($nTable, array('id'=>$sid), array('network_system_count'=>1));
			$raby_browser_ip=$ip_address.'-1';
		}else {
			// Notmal Ip - Increase Count
			$this->updateTable($nTable, array('id'=>$sid), array('network_system_count'=>($scount+1)));
			$raby_browser_ip=$ip_address.'-'.($scount+1);
		}

		$ip_array =explode('.', $raby_browser_ip);
		$ipsum=$ip_array[0]+$ip_array[1]+$ip_array[2];
		$system_iparray =explode('-', $ip_array[3]);
		$ipsum=$ipsum+$system_iparray[0]+$system_iparray[1];
		$raby_browser_ip =base64_encode($raby_browser_ip.'$'.$ipsum);
		
		setcookie("tbe", $raby_browser_ip, time() + (86400 * 30), "/");
		return $raby_browser_ip;
	}
	
	function getReports($query){
		$query =$this->db->query($query);
		return $query->result();
	}
	
	function excuteQuery($query){
		return $this->db->query($query);
	}
	
	function getBrowserIpAddress($ip){
		$ip_array =explode('$',$ip);
		return $ip_array[0];
	}
	
	public function mobileValidation($mobile){
		if ((strlen($mobile)==10) && is_numeric($mobile)){
			return 1;
		}else {
			return 0;
		}
	}
	
	public function emailValidation($email){
		if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    		return 1;
		}else {
			return 0;
		}
	}
	
	public function passwordValidation($pass,$cpass){
		if(!empty($pass) && ($pass==$cpass)){
			return 1;
		}else {
			return 0;
		}
	}
	
	public function session_arts_authentication(){
		$flat_data =$this->session->userdata('proadmin_data');
		//dd(current_url());
		if(empty($flat_data['TM_ID'])){$this->session->sess_destroy();
			redirect(site_url('welcome?Redirect_url='.current_url()));
		} 
			if(!$flat_data['verified']){
			redirect(site_url('welcome/otp?Redirect_url='.current_url()));
		} 
	}
	
	public function get_table_count($table,$where_array){
		$this->db->from($table)->where($where_array);
		$query =$this->db->get();
		//echo $this->db->last_query();
		return $query->num_rows();

	//return $query->num_rows();
	}
	
	public function get_table_count_or($table,$where_array,$where_or_array){
		$this->db->from($table)->where($where_array);
		if($where_or_array)
			$this->db->or_where($where_or_array);
			
		$query =$this->db->get();
		return $query->num_rows();
	//return $query->num_rows();
	}
	
	public function saveTable($table,$data_array){
		$this->db->insert($table, $data_array);
	
		return $this->db->insert_id();
	}
	
	
	
	public function updateTable($table, $where_array, $data){
		$this->db->where($where_array);
		$res=$this->db->update($table, $data); 
		if($this->db->affected_rows()>0)
			return TRUE;
		else
			return FALSE;	
	}
	
	public function deleteTableRecords($table,$data_array){
		$this->db->where($data_array[0], $data_array[1]);
		return $this->db->delete($table); 
	}
	
	public function deleteTable($table,$data_array){
		$this->db->where($data_array);
		
		return $this->db->delete($table); 
	}
	
	public function getRecordDetails($table, $data_array){
		$query=$this->db->get_where($table, $data_array);
		return $query->result_array();
	}
	
	public function getSelectedRecordDetails($select, $table, $data_array){
		$this->db->select($select)->from($table)->where($data_array);
		$query =$this->db->get();
		//echo $this->db->last_query();die;
		return $query->row();
	}
	
	public function getSelectedRowCount($select, $table, $data_array){
		$query =$this->db->select($select)->from($table)->where($data_array)->get()->num_rows();
		//$query =$this->db->num_rows();
		return $query;
	}
	
	public function getSelectedRecordDetails_or($select, $table, $where_array, $or_where_array){
		$this->db->select($select)->from($table)->where($where_array)->where($or_where_array);
		$query =$this->db->get();
		//echo $this->db->last_query();die;
		return $query->result_array();
	}
	
	public function getAllRecords($select, $table, $where_array, $order_array, $limit_array){
		//$query=$this->db->get_where($table, $where_array);
		$this->db->select($select)->from($table);

		if($where_array)
			$this->db->where($where_array);
			
		$this->db->order_by($order_array[0], $order_array[1])->limit($limit_array[0], $limit_array[1]);
		
		$query =$this->db->get();		
		return $query->result();
	}
	
	public function getlimitedRecords($select, $table, $like, $rlike, $order_field, $order, $offset, $limit){
		$this->db->select($select)->from($table)->like($like[0], $like[1])->or_like($rlike[0], $rlike[1])->order_by($order_field, $order)->limit($limit, $offset);
		$query =$this->db->get();		
		return $query->result();
	}
	
	function getReferalHost()  
	{  
    	$refer = parse_url($_SERVER['HTTP_REFERER']);  
    	$host = $refer['host'];  
      
    	if(strstr($host,'google'))  
    	{  
        return 'Google';  
   	}  
    	elseif(strstr($host,'yahoo'))  
    	{  
        return 'Yahoo';  
    	}  
    	elseif(strstr($host,'msn'))  
    	{  
        return 'MSN';  
    	}  
	} 
	
	function getKeywords()  
	{  
    echo $refer = parse_url($_SERVER['HTTP_REFERER']);  
    die;
    $host = $refer['host'];  
    $refer = $refer['query'];  
      
    if(strstr($host,'google'))  
    {  
        //do google stuff  
        $match = preg_match('/&q=([a-zA-Z0-9+-]+)/',$refer, $output);  
        $querystring = $output[0];  
        $querystring = str_replace('&q=','',$querystring);  
        $keywords = explode('+',$querystring);  
        return $keywords;  
    }  
    elseif(strstr($host,'yahoo'))  
    {  
        //do yahoo stuff  
        $match = preg_match('/p=([a-zA-Z0-9+-]+)/',$refer, $output);  
        $querystring = $output[0];  
        $querystring = str_replace('p=','',$querystring);  
        $keywords = explode('+',$querystring);  
        return $keywords;  
          
    }  
    elseif(strstr($host,'msn'))  
    {  
        //do msn stuff  
        $match = preg_match('/q=([a-zA-Z0-9+-]+)/',$refer, $output);  
        $querystring = $output[0];  
        $querystring = str_replace('q=','',$querystring);  
        $keywords = explode('+',$querystring);  
        return $keywords;  
    }  
    else  
    {  
        //else, who cares  
        return false;  
    }  
	}
	function bwp_get_search_keywords($url = '')
	{
    // Get the referrer
    $referrer = (!empty($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : '';
    $referrer = (!empty($url)) ? $url : $referrer;
    if (empty($referrer))
        return false;
 
    // Parse the referrer URL
    $parsed_url = parse_url($referrer);
    if (empty($parsed_url['host']))
        return false;
    $host = $parsed_url['host'];
    $query_str = (!empty($parsed_url['query'])) ? $parsed_url['query'] : '';
    $query_str = (empty($query_str) && !empty($parsed_url['fragment'])) ? $parsed_url['fragment'] : $query_str;
    if (empty($query_str))
        return false;
 
    // Parse the query string into a query array
    parse_str($query_str, $query);
 
    // Check some major search engines to get the correct query var
    $search_engines = array(
        'q' => 'alltheweb|aol|ask|ask|bing|google',
        'p' => 'yahoo',
        'wd' => 'baidu'
    );
    foreach ($search_engines as $query_var => $se)
    {
        $se = trim($se);
        preg_match('/(' . $se . ')\./', $host, $matches);
        if (!empty($matches[1]) && !empty($query[$query_var]))
            return $query[$query_var];
    }
    return false;
	}
	
	function getThumbName($display_image){
		$explode_array =explode('.',$display_image);
		return $display_thumb_img =$explode_array[0].'_thumb.'.$explode_array[1];
	}
	
	function get_tb_displayimage($display_image,$picture_url,$oauth_uid,$gender){
		$gender =strtolower($gender);
		if($display_image){
			$explode_array =explode('.',$display_image);
			$display_thumb_img_path =site_url('images/display_images/134X135/'.$explode_array[0].'_thumb.'.$explode_array[1]);
			$display_img_path=site_url('images/display_images/'.$display_image);
		}else if($picture_url){
			$display_thumb_img_path ='https://graph.facebook.com/'.$oauth_uid.'/picture?type=small';
			$display_img_path=$picture_url;
		}else if($gender=='m'){
			$display_thumb_img_path=site_url('images/default-boy.png');
			$display_img_path=site_url('images/default-boy.png');
		}else if($gender=='f'){
			$display_thumb_img_path=site_url('images/default-girl.png');
			$display_img_path=site_url('images/default-girl.png');
		}else{
			$display_thumb_img_path=site_url('images/default-boy.png');
			$display_img_path=site_url('images/default-boy.png');
		}
	return array($display_img_path,$display_thumb_img_path);
	}
	
	public function signin($table,$email_phone,$pass,$page_name,$page_view_id){
		$this->db
			->from($table)
			->where("(email = '$email_phone' OR mobile = '$email_phone')")
			->where("password",$pass);
		$query1 =$this->db->get();
		$email_phone_count = $query1->num_rows();
		if($email_phone_count==1){
		
			$this->db
				->from($table)
				->where("(email = '$email_phone' OR mobile = '$email_phone')")
				->where("password",$pass)
				->where("status",1);
			$query2 =$this->db->get();
			$userDetails =$query2->result_array();
			$email_phone_count1 = count($userDetails);
			
			if($email_phone_count1==1){
				$display_thumb_img='';
				$profile_thumb_img='';
				$userDetails =$query2->result_array();
				
				// Page Creation
				if(empty($userDetails[0]['page_ids'])&&($userDetails[0]['page_flag']==0)){
					$data_pages=array('name'=>md5($userDetails[0]['id']),
						'user_id'=>$userDetails[0]['id'],
						'main_page'=>1,
						'created_on'=>$this->date);
					$pageids =$this->saveTable('pages', $data_pages);
					$this->updateTable('users', array('id'=>$userDetails[0]['id']), array('page_ids'=>$pageids,'page_flag'=>1));
				}
				
				if($userDetails[0]['display_image']){
					$explode_array =explode('.',$userDetails[0]['display_image']);
					$display_thumb_img_path =site_url('images/display_images/134X135/'.$explode_array[0].'_thumb.'.$explode_array[1]);
					$display_img_path=site_url('images/display_images/'.$userDetails[0]['display_image']);
				}else if($userDetails[0]['picture_url']){
					$display_thumb_img_path ='https://graph.facebook.com/'.$userDetails[0]['oauth_uid'].'/picture?type=small';
					$display_img_path=$userDetails[0]['picture_url'];
				}else{
					$display_thumb_img_path =site_url('images/default-boy.png');
					$display_img_path=site_url('images/default-boy.png');
				}
				
				
				if($userDetails[0]['display_name']){
					$display_name=$userDetails[0]['display_name'];
				}else{
					$display_name=ucfirst($userDetails[0]['fname']).' '.ucfirst($userDetails[0]['lname']);
				}
				
				$user_data=array(
						"TB_ID" => $userDetails[0]['id'],
						"TB_DISPLAY_IMAGE_PATH" => $display_img_path,
						"TB_DISPLAY_THUMB_IMAGE_PATH" => $display_thumb_img_path,
						"TB_GENDER" => strtoupper($userDetails[0]['gender']),
						"TB_EMAIL" => $userDetails[0]['email'],
						"TB_NAME" => $display_name
				);
				$this->session->set_userdata('tb_logged_in', $user_data);
				
				if($userDetails[0]['city'])
					setcookie("tbaa", base64_encode($userDetails[0]['city']), time() + (86400 * 30), "/");
				if($userDetails[0]['state'])
					setcookie("tbad", base64_encode($userDetails[0]['state']), time() + (86400 * 30), "/");
				if($userDetails[0]['country'])
					setcookie("tbac", base64_encode($userDetails[0]['country']), time() + (86400 * 30), "/");
				if($userDetails[0]['zip'])
					setcookie("tbae", base64_encode($userDetails[0]['zip']), time() + (86400 * 30), "/");
				
				if($page_name=='world')
					redirect(site_url('world/all'));
				else if($page_name)
					redirect(site_url($page_name));
				else if($page_view_id)
					redirect(site_url('wall/view/'.$page_view_id));
				else
					redirect(site_url("public/city"));
			}else{
			   redirect(site_url("Tboss/index/fail-inactive"));
			
			}	
			
		}else{
		   redirect(site_url("Tboss/index/fail-user"));
		
		}
	}
	
	public function activeuser($table, $uid){
		$data_array=array('md5(id)'=>$uid);
		return $this->getRecordDetails($table, $data_array);
	}
	
	function nice_number($n) {
        // first strip any formatting;
        $n = (0+str_replace(",", "", $n));

        // is this a number?
        if (!is_numeric($n)) return false;

        // now filter it;
        if ($n > 1000000000000) return round(($n/1000000000000), 2).'T'; //trillion
        elseif ($n > 1000000000) return round(($n/1000000000), 2).'B'; //billion
        elseif ($n > 1000000) return round(($n/1000000), 2).'M'; //million
        elseif ($n > 1000) return round(($n/1000), 2).'K'; //thousand

        return number_format($n);
    }
	
	function ip_decode($ipaddress){
		//echo $ipaddress;
		$ip_array =explode('.',$ipaddress);
		$ip3_array =explode('-',$ip_array[3]);
		$ip_count_array =explode('$',$ip3_array[1]);
		$ip_total_count=0;
		for($i=0;$i<count($ip_array);$i++)
		{
			if($i!=(count($ip_array)-1))
				$ip_total_count+=$ip_array[$i];
		}
		$ip_gtotal_count=$ip_total_count+$ip3_array[0]+$ip_count_array[0];
		if(($ip_gtotal_count!=0)&&($ip_gtotal_count==$ip_count_array[1]))
			return 1;
		else
			return 0;
	}
	
	function getPublicPage($md5id_pname){
		$this->db->from('pages')->where("name='$md5id_pname'")->where('main_page',1);
		$query =$this->db->get();
		return $query->result_array();
	}
	
	function sanitize($string)
	{
		$string = filter_var($string, FILTER_SANITIZE_STRING);
		$string = trim($string);
		$string = stripslashes($string);
		$string = strip_tags($string);
	
		return $string;
	}
	
	function getCodeEncode($postid,$campaignid){
		$en_postid =$this->getEncode($postid);
		$en_campaignid =$this->getEncode($campaignid);
		$postid_array =str_split($en_postid);
		$postid_count =count($postid_array);
		//print_r($postid_array);
		$campaignid_array =str_split($en_campaignid);
		$campaignid_count =count($campaignid_array);
		
		// Loop Value
		$loop_count=$postid_count+$campaignid_count;
		$final_string=$this->getEncode($postid_count).$this->getEncode($campaignid_count);
		$post_index=0;$campaign_index=0;
		for($i=0;$i<$loop_count;$i++){
			if($i%2==0){
				if($post_index<$postid_count){
					$final_string.=$postid_array[$post_index];
					$post_index++;
				}else{
					$final_string.=$campaignid_array[$campaign_index];
					$campaign_index++;
				}
			}else{
				if($campaign_index<$campaignid_count){
					$final_string.=$campaignid_array[$campaign_index];
					$campaign_index++;
				}else{
					$final_string.=$postid_array[$post_index];
					$post_index++;
				}
			}
		}
		return $final_string;
	}
	
	function getCodeDecode($string){
		$string_array =str_split($string);
		$postid_array_count =$this->getDecode($string_array[0]);
		$campaignid_array_count =$this->getDecode($string_array[1]);
		
		$loop_count=$postid_array_count+$campaignid_array_count;
		
		$array_index=2;$en_post_id=$en_campain_id='';$post_index=$campaign_index=0;
		for($i=0;$i<$loop_count;$i++){
			if($i%2==0){
				if($post_index<$postid_array_count){
					$en_post_id.=$string_array[$array_index];
					$post_index++;
				}else{
					$en_campain_id.=$string_array[$array_index];
					$campaign_index++;
				}
			}else{
				if($campaign_index<$campaignid_array_count){
					$en_campain_id.=$string_array[$array_index];
					$campaign_index++;
				}else{
					$en_post_id.=$string_array[$array_index];
					$post_index++;
				}
			}
		$array_index++;	
		}
		
		$post_id = $this->getDecode($en_post_id);
		$campain_id = $this->getDecode($en_campain_id);
		return array($post_id,$campain_id);		
	}
	
	function getDecode($string_value){
		$alpha_array =array('a'=>'1','b'=>'2','c'=>'3','d'=>'4','e'=>'5','f'=>'6','g'=>'7','h'=>'8','i'=>'9','j'=>'0');
		$string_array =str_split(strtolower($string_value));
		
		$result ='';
		for($i=0; $i<count($string_array); $i++){
				$index = $string_array[$i];
				$string_array[$i]=$alpha_array[$index];
				$result .= $string_array[$i];	
		}
		return $result;
	}
	
	function getEncode($string_value){
		$alpha_array =array('1'=>'a','2'=>'b','3'=>'c','4'=>'d','5'=>'e','6'=>'f','7'=>'g','8'=>'h','9'=>'i','0'=>'j');
		$string_array =str_split($string_value);
		
		$result ='';
		for($i=0; $i<count($string_array); $i++){
			if((is_numeric($string_array[$i]))||($string_array[$i]=='='))
			{
				$index = $string_array[$i];
				$string_array[$i]=$alpha_array[$index];
			}
		$result .= $string_array[$i];	
		}
	
	/*$length=strlen($result);
	$upper_case_value = rand(1,$length);
	
	$randomString='';
	for($i = 0; $i < $length; $i++) {
		$j=$i+1;
		if($j%$upper_case_value==0){
			$randomString .=strtoupper($result[$i]);
		}else
		{
			$randomString .=$result[$i];
		}
	}*/
	
	return $result;
	}
	
	function getFlatsDetails(){
		$this->db->select('sectors.name as sector_name,blocks.name as block_name,sub_blocks.name as sub_blocks_name,flats.flat_number as flat_number,flats.id as flat_id,flats.flat_status as flat_status');
		$this->db->from('blocks');
		$this->db->join('sectors', 'sectors.id = blocks.sector_id');
		$this->db->join('sub_blocks', 'sectors.id = sub_blocks.sector_id AND blocks.id=sub_blocks.block_id');
		$this->db->join('flats', 'sectors.id = flats.sector_id AND blocks.id=flats.block_id AND sub_blocks.id=flats.sub_block_id');
		
		$query =$this->db->get();		
		//echo $this->db->last_query();
		return $query->result();
	}
	
	function getFlat($flat_id){
		$this->db->select('sectors.name as sector_name,blocks.name as block_name,sub_blocks.name as sub_blocks_name,flats.flat_number as flat_number,flats.id as flat_id,flats.flat_status as flat_status');
		$this->db->from('blocks');
		$this->db->join('sectors', 'sectors.id = blocks.sector_id');
		$this->db->join('sub_blocks', 'sectors.id = sub_blocks.sector_id AND blocks.id=sub_blocks.block_id');
		$this->db->join('flats', 'flats.id='.$flat_id.' AND sectors.id = flats.sector_id AND blocks.id=flats.block_id AND sub_blocks.id=flats.sub_block_id');
		
		$query =$this->db->get();		
		//echo $this->db->last_query();
		return $query->result();
	}
	
	function getMileStones($project_id){
		$this->db->select('*');
		$this->db->from('milestones')->where('project_id',$project_id);
		$query =$this->db->get();		
		//echo $this->db->last_query();
		return $query->result();
	}
	
	
	function getRequirements($project_id){
		$this->db->select("*,requirements.uniq_id as formatted_id");
		$this->db->from('requirements')->where('project_id',$project_id);
		$query =$this->db->get();		
		//echo $this->db->last_query();
		return $query->result();
	}


	function getUsers($project_id){
		$this->db->select('*');
		$this->db->from('projects')->where('id',$project_id);
		$query =$this->db->get();		
		
		//echo $this->db->last_query();
		$result = $query->row();

		if($result){
			$this->db->select('*');
			$this->db->from('users')->where_in('id',explode(',',$result->assigned_to));
			$query =$this->db->get();
			return $query->result();
		}
	}


	public function getTotalHolidays(){
		$query = $this->db->query(" SELECT count(*) as f, (SELECT count(*) FROM tm_holidays WHERE MONTH(tm_holidays.date) = (MONTH(NOW())) AND (DAYNAME(tm_holidays.date)!= 'Saturday' AND DAYNAME(tm_holidays.date)!='Sunday')) AS holiday_count, DATE_FORMAT(dt,'%W') DayOfWeek,COUNT(1) DayCount FROM
		(SELECT dt FROM (SELECT DISTINCT (MAKEDATE(YEAR('2019-01-31'),1) +
		INTERVAL (MONTH('2019-01-31')-1) MONTH + INTERVAL (x*y+z-1) DAY) dt FROM
		(SELECT 1 x UNION SELECT 2 UNION SELECT 3
		UNION SELECT 4 UNION SELECT 5 UNION SELECT 6
		UNION SELECT 7 UNION SELECT 8) A,
		(SELECT 1 y UNION SELECT 2 UNION SELECT 3 UNION SELECT 4) B,
		(SELECT 0 z UNION SELECT 1 UNION SELECT 2 UNION SELECT 3) C) AA
		WHERE MONTH('2019-01-31') = MONTH(dt)) cal
		WHERE DAYOFWEEK(dt) IN (1,7) GROUP BY DayOfWeek WITH ROLLUP ;")->result();
		return $query;
	}
}