<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Companies extends CI_Model {

	function __construct()
   { 
   		parent::__construct(); 
  		  $this->load->database("bzzbook"); 
    } 

	   
	   public function sign_up($data)
	   {
		  
		    $this->db->insert('comp_sign_up', $data);

	   }
	   public function companies_list($limit=0)
	   {
		   $id = $this->session->userdata('logged_in')['account_id'];
	       $condition = "user_id =" . "'" . $id .  "'";
		   $this->db->select('*');
		   $this->db->from('bzz_companyinfo');
		   $this->db->where($condition);
		   if($limit!= 0)
		   $this->db->limit($limit);
		   $query = $this->db->get();
		   if($query->num_rows() > 0)
		   {
			   return $query->result();
		}else{
			return false;
		}
	   }  
	   	 public function following_companies_list($limit=0)
	   {
		   $id = $this->session->userdata('logged_in')['account_id'];
	       $condition = "user_id =" . "'" . $id . "'" . " AND " . "follow_status = 'Y' ";
		   $this->db->select('*');
		   $this->db->from('bzz_cmp_follow');
		   $this->db->where($condition);
		   if($limit!= 0)
		   $this->db->limit($limit);
		   $query = $this->db->get();
		   $companies = array();
		   if($query->num_rows() > 0)
		   {
			   $result = $query->result_array();
			  
			   foreach($result as $row):
			   $cmp_id= $row['companyinfo_id'];
			 
				   $condition = "companyinfo_id =". "'" . $cmp_id . "'";
				   $this->db->select('*');
			       $this->db->from('bzz_companyinfo');
				   $this->db->where($condition);
				   
				   $query = $this->db->get();
				   if ($query->num_rows() > 0) {
				   $company = $query->result_array();	
				   $companies[] = $company[0];
		           }
	            	endforeach;
		   return $companies;
		   }
		   
	   }
public function managecompanydata($data)
{
	/*	$company_info = array(
		'cmp_name'=>$data['cmp_name'],
		'cmp_industry'=>$data['cmp_industry'],
		'cmp_estb'=>$data['cmp_estb'],
		'cmp_colleagues'=>$data['cmp_colleagues'],
		'cmp_about'=>$data['cmp_about'],
		'company_address'=>$data['company_address'],
		'company_state'=>$data['company_state'],
		'company_city'=>$data['company_city'],	
		'company_postalcode'=>$data['company_postalcode'],
		'company_email'=>$data['company_email'],
		'company_phone'=>$data['company_phone'],
		'company_office'=>$data['company_office'],		
		'company_fax'=>$data['company_fax'],
		'company_image'=>$img_name,
		'user_id'=>$this->session->userdata('logged_in')['account_id']
		);*/
	   if( $this->db->insert('bzz_companyinfo',$data))
	   return $this->db->insert_id();
	   else
	   return false;
	
}

	   public function other_companies($limit=2)
	   {
		   $id = $this->session->userdata('logged_in')['account_id'];
	       $condition = "user_id !=" . "'" . $id .  "'";
		   $this->db->select('*');
		   $this->db->from('bzz_companyinfo');
		   $this->db->where($condition);
		   if($limit!= 0)
		   $this->db->limit($limit);
		   $query = $this->db->get();
		   if($query->num_rows() > 0)
		   {
			   return $query->result();
		}else{
			return false;
		}
	   }
	   
	   
	   public function managecmp_settings($data)
	   {
		   if($this->db->insert('bzz_cmpsettings',$data))
		   return true;
	   else
	   return false;
	   }
	   
	  public function company_follow($cmpinfo_id,$follow_as)
	   {
		   
		    $id = $this->session->userdata('logged_in')['account_id'];
		    $condition =  "user_id =" . "'" . $id . "'" . " AND " . "companyinfo_id = ". "'" .$cmpinfo_id."'";
		    $this->db->where($condition);
			$query = $this->db->get('bzz_cmp_follow');
			$result = $query->result_array();
			
			if($result){
		     if($result[0]['follow_status'] != 'Y')
		    {
		     $data['follow_status'] = 'Y';
			 $data['follow_as'] = $follow_as;
			 $condition =  "user_id =" . "'" . $id . "'" . " AND " . "companyinfo_id = ". "'" .$cmpinfo_id."'";
		     $this->db->where($condition);
		     $this->db->update('bzz_cmp_follow',$data);
			 
			 	$cmp_follow = $this->get_companies_to_follow();
			$list = "";
		    if(!empty($cmp_follow)) { foreach($cmp_follow as $follow){
           $list .= " <li>
              <figure><img src='".base_url()."uploads/".$follow['company_image']."' alt='".$follow['cmp_name']."'></figure>
              <div class='disc'>
                <h4>".$follow['cmp_name']."</h4>
                <div class='dcBtn'><a href='javascript:void(0);'>View</a><a href='javascript:void(0);' onclick='cmpFollow(".$follow['companyinfo_id'].")'>Follow</a></div>
                </div>
            </li>";
             } }else $list = "No Companies Available";
			 
			 echo $list;
		   
			   

			 }
			elseif($result[0]['follow_status'] == 'Y')
			   {
				   return false;
			   }
			   
			}
			 else{
			   $data['companyinfo_id'] = $cmpinfo_id;
			   $data['user_id'] = $id;
			   $data['follow_status'] = 'W';
			   $data['follow_as'] = $follow_as;
			   $this->db->insert('bzz_cmp_follow',$data);
			   
			   //dynamic list display
			 
			   	$cmp_follow = $this->get_companies_to_follow();
			$list = "";
		    if(!empty($cmp_follow)) { foreach($cmp_follow as $follow){
           $list .= " <li>
              <figure><img src='".base_url()."uploads/".$follow['company_image']."' alt='".$follow['cmp_name']."'></figure>
              <div class='disc'>
                <h4>".$follow['cmp_name']."</h4>
                <div class='dcBtn'><a href='<?php echo base_url() ?>company/company_disp/".$follow['companyinfo_id']."'>View</a><a href='javascript:void(0);' onclick='cmpFollow(".$follow['companyinfo_id'].")'>Follow</a></div>
                </div>
            </li>";
             } }else $list = "No Companies Available";
			 
			 echo $list;
		   
			   
			 }
			   
			  
	   }
	   
	   public function company_view_follow($cmpinfo_id,$follow_as)
	   {
		   
		   
		    $id = $this->session->userdata('logged_in')['account_id'];
		    $condition =  "user_id =" . "'" . $id . "'" . " AND " . "companyinfo_id = ". "'" .$cmpinfo_id."'";
		    $this->db->where($condition);
			$query = $this->db->get('bzz_cmp_follow');
			$result = $query->result_array();
			
			if($result){
		     if($result[0]['follow_status'] != 'Y')
		    {
		     $data['follow_status'] = 'Y';
			 $data['follow_as'] = $follow_as;
			 $condition =  "user_id =" . "'" . $id . "'" . " AND " . "companyinfo_id = ". "'" .$cmpinfo_id."'";
		     $this->db->where($condition);
		     $this->db->update('bzz_cmp_follow',$data);

			 }
			elseif($result[0]['follow_status'] == 'Y')
			   {
				   echo "failure";
			   }
			   
			}
			 else{
			   $data['companyinfo_id'] = $cmpinfo_id;
			   $data['user_id'] = $id;
			   $data['follow_status'] = 'Y';
			   $data['follow_as'] = $follow_as;
			   $this->db->insert('bzz_cmp_follow',$data);
			   
			 }
			 
	   }
	   
	   
	   public function company_follow_req_accept($user_id,$cmp_id,$follow_status='Y')
	   { 
		     $data['follow_status'] = $follow_status;
		     $condition =  "user_id =" . "'" . $user_id . "'" . " AND " . "companyinfo_id = ". "'" .$cmp_id."'";
		     $this->db->where($condition);
		     $this->db->update('bzz_cmp_follow',$data);
			
			 $pend_req = $this->getPendingFollowRequests();
			
			$list = "";
		    if($pend_req) { foreach($pend_req as $req){
           $list .= " <li>
              <figure><img src='".base_url()."uploads/".$req[0]['user_img_thumb']."' alt='".$req[0]['user_img_thumb']."'></figure>
              <div class='disc'>
                <h4>" .$req[0]['user_firstname']." ".$req[0]['user_lastname']."</h4>
                <div class='dcBtn'><a href='javascript:void(0);' onclick='acceptFollow(".$req[0]['user_id'].",".$cmp_id.")'>Confirm</a><a href='javascript:void(0);' onclick='denyFollow(".$req[0]['user_id'].",".$cmp_id.")'>Deny</a></div>
                </div>
            </li>";
             } }else $list = "No Requests Pending";
			 
			 echo $list;
		   
	   }
	   
	   public function company_unfollow($cmpinfo_id)
	   {
		   $data= array(
		   'follow_status' => 'N'
		   );
		   $id = $this->session->userdata('logged_in')['account_id'];
		   $condition =  "user_id =" . "'" . $id . "'" . " AND " . "companyinfo_id =" . "'" . $cmpinfo_id .  "'"; 
		   $this->db->where($condition);
		   $this->db->update('bzz_cmp_follow', $data); 
	   }
	   

public function get_mn_cmp_list()
	{
		$id = $this->session->userdata('logged_in')['account_id'];
	    $condition = "user_id =" . "'" . $id . "'";
		$this->db->select('*');
		$this->db->from('bzz_companyinfo');
		$this->db->where($condition);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
		return false;
		}
	}
	
	
	public function get_companies_to_follow()
	{
	    $id = $this->session->userdata('logged_in')['account_id'];
	    $condition = "user_id =" . "'" . $id . "' AND request_status='Y'";
		$this->db->select('*');
		$this->db->from('bzz_userfriends');
		$this->db->where($condition);
		$query = $this->db->get();
		$friends = $query->result_array();
		if($friends) {
			
			$jobs= array();
			$elements = array();
			foreach($friends as $friend)
			{
				
				// friends following companies
				$id = $this->session->userdata('logged_in')['account_id'];
			   //$condition = "user_id =" . "'" . $friend['friend_id'] ."'  AND follow_status='Y'" ;
			    $condition = "user_id =" . "'" . $friend['friend_id']  ."'  AND follow_status='Y'" ;
				$this->db->distinct();
				$this->db->from('bzz_cmp_follow'); 
				$this->db->where($condition);
				$query = $this->db->get();
				if($query->num_rows()>0)
				{
					$follower = $query->result_array();		
					
					$elements[] = $follower[0]['companyinfo_id'];		
				
			    }else
				return false;
		}
			//echo 'friends following cmps';
			$elements_uni = array_unique($elements);
			//print_r($elements_uni);
		//	exit;
			
			// user following companies list
			
			
		     	$condition = "user_id =" . "'" . $id  ."'  AND follow_status='Y' OR 'W'" ;
				$this->db->select('companyinfo_id');
				$this->db->from('bzz_cmp_follow'); 
				$this->db->where($condition);
				$query = $this->db->get();
				$userfollow = $query->result_array();
				$userfollowing = array();
				if($userfollow)
				{
					
					foreach($userfollow as $userfollow)
					{
						$userfollowing[] = $userfollow['companyinfo_id'];
					}
				//echo 'user following cmps';
				//print_r($userfollowing);
				
				}
			// user companies
			$mycmpcondition = "user_id =" . "'" . $id . "'" ;
			$this->db->select('companyinfo_id');
			$this->db->from('bzz_companyinfo');
			$this->db->where($mycmpcondition);
			$query = $this->db->get();
			$mycmps = $query->result_array();
			if($mycmps)
			{
				$cmp = array();
				foreach($mycmps as $mycmp)
				{
					$cmp[] = $mycmp['companyinfo_id'];	
				}
			//	echo 'user cmps';
			//print_r($cmp);
		
			}
			
			
			$following_cmps = array_merge($elements_uni,$userfollowing);
		//	echo "all following companies";
		//	print_r($following_cmps);
			
			$first = array_diff($following_cmps,$userfollowing);
			//echo " first differ"; 
		//	print_r($first);
			
			$second = array_diff($first,$cmp);
		//	print_r($second);
			
				}
				if($second)
				{
				  $this->db->select('*');
				  $this->db->from('bzz_companyinfo');
				  $this->db->where_in('companyinfo_id',$second);
				  $this->db->limit(2);
				  $query = $this->db->get();
				  if ($query->num_rows() > 0) {
				   return $query->result_array();
				  } else {
				  return false;
				  }
				}
		return false;	
	}
	
	public function get_cmp_by_id($id)
	{
		$condition = "companyinfo_id =" . "'" . $id . "'";
		$this->db->select('*');
		$this->db->from('bzz_companyinfo');
	    $this->db->join('bzz_cmpsettings','bzz_companyinfo.companyinfo_id = bzz_cmpsettings.companyinfo_id AND bzz_companyinfo.companyinfo_id ='.$id);
	//	$this->db->where($condition);
		$query = $this->db->get();
		if($query->num_rows() == 1)
		{
			return $query->result_array();
		}
		return false;
	}
	
	public function getPendingFollowRequests()
	{
		$user_id =  $this->session->userdata('logged_in')['account_id'];
		$cmp_id = $this->uri->segment(3,0);
		$condition =  "user_id =" . "'" . $user_id . "'"; 
		$this->db->select('*');
		$this->db->from('bzz_companyinfo');
		$this->db->where($condition);
		$query = $this->db->get();
		$cmp_ids = array();
		$user = array();
		if($query->num_rows() > 0)
		{
			
			
			$companies = $query->result_array();
				foreach($companies as $company)
				{	
				$cmp_ids[] = $company['companyinfo_id'];
				}
			
		if(in_array($cmp_id,$cmp_ids))
			{
			$condition = "companyinfo_id =" . "'" . $cmp_id . "'  AND follow_status='W'" ; 
			$this->db->select('*');
			$this->db->from('bzz_cmp_follow');
			$this->db->where($condition);
			$query = $this->db->get();
			$followers = $query->result_array();
			
				foreach($followers as $follower)
				{
					$condition = "user_id =" . "'" . $follower['user_id'] . "'";
					$this->db->select('*');
					$this->db->from('bzz_userinfo');
					$this->db->join('bzz_user_images','bzz_userinfo.user_id=bzz_user_images.user_id AND bzz_userinfo.user_id='.$follower['user_id']);
					//$this->db->where($condition);
					$this->db->order_by('bzz_user_images.user_imageinfo_id','desc');
					$this->db->limit(2);
					$query = $this->db->get();
					if($query->num_rows() > 0)
					{
					$user_data = $query->result_array();
					$user[] = $user_data;
					}
			    }
		}
	return $user;
		}
	return false;
}

public function updatePrivacyInfo($data,$id)
{
	
		$updatedata = array(
		'profile_visible'=>$data['profile_visible'],
		'comments_visible'=>$data['comments_visible']
		);
		$condition =   "companyinfo_id =" . "'" . $id . "'"; 
		$this->db->where($condition);
		if($this->db->update('bzz_cmpsettings',$updatedata))
			return true;
		else
			return false;	
   
}

   public function updateEmailInfo($data,$id)
   {
	  $updatedata = array(
		'email_notification'=>$data['email_notofication'],
	  );
	  $condition = "companyinfo_id =" . "'" . $id . "'"; 
	  $this->db->where($condition);
	  if($this->db->update('bzz_cmpsettings',$updatedata))
			return true;
		else
			return false;
   }
   
    public function updateAboutInfo($data,$id)
   {
	$updateddata = array(
		'cmp_colleagues' => $data['cmp_colleagues'],
		'company_phone' => $data['cmp_phone'],
		'company_office' => $data['cmp_office'],
		'company_email' => $data['cmp_email'],
		'company_fax' => $data['cmp_fax']
	);
	 $condition = "companyinfo_id =" . "'" . $id . "'"; 
	 $this->db->where($condition);
	if($this->db->update('bzz_companyinfo',$updateddata))
	return true;
	else
	return false;	
   }
   
      public function managepostboarddata($data,$id)
   {
	   	$userInfo = array(
		'cmp_name'=>$data['companyname'],
		'company_country'=>$data['country'],
		'company_state'=>$data['state'],
		'company_city'=>$data['city'],
		'company_postalcode'=>$data['postal_code'],
		'cmp_industry'=>$data['industry'],
		'cmp_estb'=>$data['estb'],
		'cmp_about'=>$data['about_me_info']
		);
	 $condition = "companyinfo_id =" . "'" . $id . "'";
     $this->db->where($condition);
   if($this->db->update('bzz_companyinfo',$userInfo))
  return true;
  else
  return false;
		
   }

public function update_pic($dataa,$id)
{
	$condition = "companyinfo_id =" . "'" . $id . "'";  
	$this->db->where($condition);
	if($this->db->update('bzz_companyinfo',$dataa))
	return true;
	else
	return false;

}

}
?>
