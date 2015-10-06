<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customermodel extends CI_Model {

	function __construct()
    { 
   		parent::__construct(); 
  		
    } 
	 public function get_user_id($access_token){
	    
	    $condition = "bzz_confirmation.access_token = '" . $access_token . "' AND conf_status = 'Y'";
		$this->db->select('*');
		$this->db->from('bzz_confirmation');
		$this->db->join('bzz_users','bzz_users.user_id = bzz_confirmation.user_id');
		$this->db->where($condition);
		if($query = $this->db->get()){
			$user_res = $query->result();
			if($user_res){
				$sess_array = array(		   					
							'email' =>$user_res[0]->user_email,
						    'password' =>$user_res[0]->password,
							'account_id' =>$user_res[0]->user_id							
						   );		
       			$this->session->set_userdata('logged_in',$sess_array);
				return $query->result();
			}else{
				return false;
			}
		}
		else
				return false;
		
   }
	
	function post_buzz($data){
		 $this->db->insert('bzz_posts',$data);
		 return $this->db->insert_id();
	}
	function post_page_buzz($data){
		 $this->db->insert('bzz_page_posts',$data);
		 return $this->db->insert_id();
	}
	/*function temp_upload_images($data){
		$images = explode(',',$data);
		if(count($images)){
		foreach($images as $image){
		 $data['pic_name'] = $image;
		 $this->db->insert('bzz_image_tags',$data);
		}
		return true;
		}
		else
		return false;
	}*/
	function post_cmp_buzz($data){
		 $this->db->insert('bzz_cmp_posts',$data);
		 return $this->db->insert_id();
	}
	function share_buzz($data){
		 $this->db->insert('bzz_posts',$data);
		 return $this->db->insert_id();
	}
	function share_page_buzz($data){
		 $this->db->insert('bzz_page_posts',$data);
		 return $this->db->insert_id();
	}
	function post_to_wall($data){
		 $this->db->insert('bzz_posts_postedto',$data);
		 return true;
	}
	function insertfav($data){
		 if($this->db->insert('bzz_favorites',$data))
		 return true;
		 else
		 return false;
	}
	public function All_Page_Posts($page_id,$last_id='',$first_id=''){	
	   $this->db->select('user_id');
	   $this->db->where('page_id',$page_id);
	   $this->db->from('bzz_pages');
	    $query = $this->db->get();
   	   if ($query->num_rows() > 0) {
	   		$result =  $query->result();			
			$posted_by_id = $result[0]->user_id;
	   } 
	   $this->db->select('*');
	   $condition = '';
	   if($first_id!=''){
		$condition .= "post_id > $first_id AND ";   
	   }
	   $condition .= "posted_by = ".$posted_by_id." AND page_id=".$page_id." AND hidden = 'N'";
	   if($last_id != '')
	   {
	   $condition = "post_id <" . "'" . $last_id . "'" ;	   
	   }
	   $this->db->where($condition);
	   $this->db->from('bzz_page_posts');
	   $this->db->limit(10);
	   $this->db->order_by("post_id","desc");
	   $query = $this->db->get();
   	   if ($query->num_rows() > 0) {
	   		$result =  $query->result();			
			return $result;
	   } 
	   else 
	   return false;
   
	}
	public function get_none_page_posts($page_id){
		
	   $cur_user_id = $this->session->userdata('logged_in')['account_id'];
	   $condition = "posted_by != ".$cur_user_id." AND page_id=".$page_id." AND hidden = 'N'";
	   $this->db->select('*');	  
	   $this->db->where($condition);
	   $this->db->from('bzz_page_posts');
	   $this->db->limit(10);
	   $this->db->order_by("post_id","desc");
	   $query = $this->db->get();
   	   if ($query->num_rows() > 0) {
	   		$result =  $query->result();			
			return $result;
	   } 
	   else 
	   return false;
	}
	public function All_Posts($pst_usr_id,$last_id = ''){
	
		if(empty($pst_usr_id))
  	    $id = $this->session->userdata('logged_in')['account_id'];
		else
		$id = $pst_usr_id;
		
		
		$hidden_posts = $this->get_hidden_posts($id);
	 
	// print_r($hidden_posts);
	// exit;
	   
		
		$cur_usr_id = $this->session->userdata('logged_in')['account_id'];
	    $condition = "(user_id ='" . $id . "' OR friend_id ='".$id."') AND request_status = 'Y'";
		$this->db->select('*');
		$this->db->from('bzz_userfriends');
		$this->db->where($condition);
		$query = $this->db->get();
			$friends = array();
		if ($query->num_rows() > 0) {
			$res = $query->result();
			if($res)
			{
			foreach($res as $friend)	
			{
			   $friends[] =	$friend->friend_id;
			   $friends[] = $friend->user_id;
			}
			}
		}	
	   $friends[] =  $id;
	   $friends = array_unique($friends);
	  // print_r($friends); exit;
	   $this->db->select('*');
	   if($last_id != '')
	   {
	   $condition = "post_id <" . "'" . $last_id . "'" ;
	   
	   $this->db->where($condition);
	   }
	  
	   $this->db->from('bzz_posts');
	 if(!empty($hidden_posts))
	 {
	   $this->db->where_not_in('post_id',$hidden_posts);
	 }
	   $this->db->limit(10);
	   $this->db->order_by("post_id","desc");
	   $query = $this->db->get();
   	   if ($query->num_rows() > 0) {
	   		$result =  $query->result();
			// $this->db->last_query();
			//exit;
			$posts = array();
			foreach($result as $res){
		    $friend_ids = explode(',',$res->posted_to);
				
			if(($res->posted_to==0 && in_array($res->posted_by,$friends)) || ($res->isGhostpost==1 && in_array($res->posted_by,$friends)) || ($res->posted_by==$id && $id==$cur_usr_id) || (in_array($id, $friend_ids) && $id==$cur_usr_id) ||  (!empty($pst_usr_id) && in_array($pst_usr_id, $friend_ids)) || ($res->posted_by==$id && in_array($cur_usr_id, $friend_ids)))
			{
				$posts[] = $res;
			}
			}
			
			return $posts;
	   } 
	   else 
	   return false;
   }
   
   
   public function get_hidden_posts($id= '')
   {
	   if(empty($id))
  	    $id = $this->session->userdata('logged_in')['account_id'];
		else
		$id = $id;
	   
	 $query = $this->db->select('hidden_post_id')->from('bzz_hidden_posts')->where('hide_by_user',$id)->get();
	 if($query->num_rows() > 0)
	 {
	 $hidden_post_ids = $query->result_array();
	 $data =  array();
	 foreach($hidden_post_ids as $post_id)
	 {
		 $data[] = $post_id['hidden_post_id'];
	 }
	 return $data;
	 }else {
	 return false;
	 }
   }
   public function All_event_posts($event_id)
   {
	   $this->db->select('*');
	   $this->db->from('bzz_user_event_posts');
       $this->db->where('event_id',$event_id);
	   $this->db->order_by("event_post_id","desc");
	   $query = $this->db->get();
   	   if ($query->num_rows() > 0) {
	   		$result =  $query->result();
			
			return $result;
	   } 
	   return false;
   }
   
   
   public function All_Cmp_Posts($cmp_id){
	
  	    $id = $this->session->userdata('logged_in')['account_id'];		
	    $condition1 = "companyinfo_id = '".$cmp_id."' AND user_id ='".$id."'";
		$this->db->select('follow_as');
		$this->db->from('bzz_cmp_follow');
		$this->db->where($condition1);
		$follow_as = '';
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			$res = $query->result();
			$follow_as = $res[0]->follow_as;
		}		
		$condition2 = "companyinfo_id ='".$cmp_id."' ";
		$this->db->select('user_id');
		$this->db->from('bzz_companyinfo');
		$this->db->where($condition2);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			$res = $query->result();
			if($res[0]->user_id == $id)
			{
				$condition = "cmp_id ='".$cmp_id."'";
			}
			elseif(empty($follow_as))
			{
				$condition = "cmp_id ='".$cmp_id."' AND cmp_posted_to ='0'";
			}
			elseif($follow_as =='customer')
			{
				$condition = "cmp_id ='".$cmp_id."' AND cmp_posted_to ='2'";
			}
			elseif($follow_as =='colleague')
			{
				$condition = "cmp_id ='".$cmp_id."' AND cmp_posted_to ='1'";
			}
		}	
		else { $condition = ''; }
	
	   $this->db->select('*');
	   $this->db->from('bzz_cmp_posts');
	   if(!empty($condition)) $this->db->where($condition);
	   $this->db->order_by("cmp_post_id","desc");
	   $query = $this->db->get();
   	   if ($query->num_rows() > 0) {
	   		$result =  $query->result();
			return $result;
	   } 
	   else 
	   return false;
   }
   public function my_favorites()
   {
	   $id = $this->session->userdata('logged_in')['account_id'];
	   $condition = "user_id ='".$id."'";
	   $this->db->select('*');
	   $this->db->from('bzz_favorites');
	   $this->db->where($condition);
	   $query = $this->db->get();
   	   if ($query->num_rows() > 0) {
	   		$result =  $query->result();
			$post_ids = array();
			foreach($result as $row)
			{
				$post_ids[] = $row->post_id;
			}
		   $this->db->select('*');
		   $this->db->from('bzz_posts');
		   $this->db->where_in('post_id',$post_ids);
		   $query = $this->db->get();
   	       if ($query->num_rows() > 0) {
	   		return $result =  $query->result();
		   }
	   }
   }
   public function my_pages()
   {
	   $id = $this->session->userdata('logged_in')['account_id'];
	   $condition = "user_id ='".$id."'";
	   $this->db->select('*');
	   $this->db->from('bzz_pages');
	   $this->db->where($condition);
	   $query = $this->db->get();
   	   if ($query->num_rows() > 0) {
	   		return  $query->result();
	   }else
	   return false;
   }
   public function profiledata($id){
	    $condition = "user_id =" . "'" . $id . "'";		
		$this->db->select('*');
		$this->db->from('bzz_user_images');
		$this->db->where($condition);
		$query = $this->db->get();
		if($query->num_rows() > 0)
		{
			$this->db->select('*');
			$this->db->from('bzz_userinfo');
			$this->db->join('bzz_user_images','bzz_userinfo.user_id=bzz_user_images.user_id AND bzz_userinfo.user_id='.$id);
			$this->db->order_by('bzz_user_images.user_imageinfo_id','desc');
			$this->db->limit(1);
			$query = $this->db->get();
			if ($query->num_rows() == 1) {
				return $query->result();
			} else {
			return false;
			}
		}
		else{
			$this->db->select('*');
			$this->db->from('bzz_userinfo');
			$this->db->where($condition);
			//$this->db->join('bzz_user_images','bzz_userinfo.user_id=bzz_user_images.user_id AND bzz_userinfo.user_id='.$id);
			//$this->db->order_by('user_id','desc');
			//$this->db->limit(1);
			$query = $this->db->get();
			if ($query->num_rows() == 1) {
				return $query->result();
			} else {
			return false;
			}
		}
   }
   public function page_profiledata($page_id){	   
	    $condition = "page_id =" . "'" . $page_id . "'";		
		$this->db->select('*');
		$this->db->from('bzz_page_images');
		$this->db->where($condition);
		$query = $this->db->get();
		if($query->num_rows() > 0)
		{
			$this->db->select('*');
			$this->db->from('bzz_pages');
			$this->db->join('bzz_page_images','bzz_pages.page_id=bzz_page_images.page_id AND bzz_pages.page_id='.$page_id);
			$this->db->order_by('bzz_page_images.user_image_id','desc');
			$this->db->limit(1);
			$query = $this->db->get();
			if ($query->num_rows() == 1) {
				return $query->result();
			} else {
			return false;
			}
		}
		else{
			$this->db->select('*');
			$this->db->from('bzz_pages');
			$this->db->where($condition);
			//$this->db->join('bzz_user_images','bzz_userinfo.user_id=bzz_user_images.user_id AND bzz_userinfo.user_id='.$id);
			//$this->db->order_by('user_id','desc');
			//$this->db->limit(1);
			$query = $this->db->get();
			if ($query->num_rows() == 1) {
				return $query->result();
			} else {
			return false;
			}
		}	   
   }
 public function  eventinsertlinks($data)
{
	
	
	    $pid=$data['like_on'];
	    $aid=$data['liked_by'];
	   // $like=$data['like'];
	    $condition = "like_on =" . $pid . " AND liked_by =".$aid;
	    $this->db->select('*');
		$this->db->from('bzz_event_likes');
		$this->db->where($condition);
		$query = $this->db->get();
		$like_count = count($this->customermodel->eventlikedata($pid));
		if($query->num_rows()>0){
			$res=$query->result();
			$res_like=$res[0]->like_status;			
			if($res_like == 'Y' ){
				$slike="N";
			}
			else if($res_like == 'N'){
				$slike="Y";
			}
			
		$data1 = array('like_status' => $slike);
        $this->db->where($condition);
  		$this->db->update('bzz_event_likes',$data1);	
	    $data1 = array('like_status' => $slike,'like_count' => $like_count);
			echo json_encode($data1);
		}
		else{
	    $this->db->insert('bzz_event_likes',$data);
			$data1 = array('like_status' => 'Y','like_count' => $like_count);
			echo json_encode($data1);
		}
		
   
}
   public function insertlinks($data)
   {
	    $pid=$data['like_on'];
	    $aid=$data['liked_by'];
	   // $like=$data['like'];
	    $condition = "like_on =" . $pid . " AND liked_by =".$aid;
	    $this->db->select('*');
		$this->db->from('bzz_likes');
		$this->db->where($condition);
		$query = $this->db->get();
		$like_count = count($this->customermodel->likedata($pid));
		if($query->num_rows()>0){
			$res=$query->result();
			$res_like=$res[0]->like_status;			
			if($res_like == 'Y' ){
				$slike="N";
			}
			else if($res_like == 'N'){
				$slike="Y";
			}
			
		$data1 = array('like_status' => $slike);
        $this->db->where($condition);
  		$this->db->update('bzz_likes',$data1);	
	    $data1 = array('like_status' => $slike,'like_count' => $like_count);
			echo json_encode($data1);
		}
		else{
	    $this->db->insert('bzz_likes',$data);
			$data1 = array('like_status' => 'Y','like_count' => $like_count);
			echo json_encode($data1);
		}
		
   }
   public function insert_page_like($data)
   {
	    $pid=$data['like_on'];
	    $aid=$data['liked_by'];
	   // $like=$data['like'];
	    $condition = "like_on =" . $pid . " AND liked_by =".$aid;
	    $this->db->select('*');
		$this->db->from('bzz_page_likes');
		$this->db->where($condition);
		$query = $this->db->get();
		$like_count = count($this->customermodel->page_likedata($pid));
		if($query->num_rows()>0){
			$res=$query->result();
			$res_like=$res[0]->like_status;			
			if($res_like == 'Y' ){
				$slike="N";
			}
			else if($res_like == 'N'){
				$slike="Y";
			}
			
		$data1 = array('like_status' => $slike);
        $this->db->where($condition);
  		$this->db->update('bzz_page_likes',$data1);	
	    $data1 = array('like_status' => $slike,'like_count' => $like_count);
			echo json_encode($data1);
		}
		else{
	    $this->db->insert('bzz_page_likes',$data);
			$data1 = array('like_status' => 'Y','like_count' => $like_count);
			echo json_encode($data1);
		}
		
   }
   public function apiinsertlinks($data)
   {
	    $pid=$data['like_on'];
	    $aid=$data['liked_by'];
	   // $like=$data['like'];
	    $condition = "like_on =" . $pid . " AND liked_by =".$aid;
	    $this->db->select('*');
		$this->db->from('bzz_likes');
		$this->db->where($condition);
		$query = $this->db->get();
		$like_count = count($this->customermodel->likedata($pid));
		if($query->num_rows()>0){
			$res=$query->result();
			$res_like=$res[0]->like_status;			
			if($res_like == 'Y' ){
				$slike="N";
			}
			else if($res_like == 'N'){
				$slike="Y";
			}
			
		$data1 = array('like_status' => $slike);
        $this->db->where($condition);
  		$this->db->update('bzz_likes',$data1);	
	    $data1 = array('like_status' => $slike,'like_count' => $like_count);
			
		}
		else{
	    $this->db->insert('bzz_likes',$data);
			$data1 = array('like_status' => 'Y','like_count' => $like_count);
		
		}
		return $data1;
   }
    public function commentinsertlinks($data)
   {
	    $pid=$data['like_on'];
	    $aid=$data['liked_by'];
	   // $like=$data['like'];
	    $condition = "like_on =" . $pid . " AND liked_by =".$aid;
	    $this->db->select('*');
		$this->db->from('bzz_comment_likes');
		$this->db->where($condition);
		$query = $this->db->get();
		$like_count = count($this->customermodel->commentlikedata($pid));
		if($query->num_rows()>0){
			$res=$query->result();
			$res_like=$res[0]->like_status;			
			if($res_like == 'Y' ){
				$slike="N";
			}
			else if($res_like == 'N'){
				$slike="Y";
			}
			
		$data1 = array('like_status' => $slike);
        $this->db->where($condition);
  		$this->db->update('bzz_comment_likes',$data1);	
	    $data1 = array('like_status' => $slike,'like_count' => $like_count);
			echo json_encode($data1);
		}
		else{
	    $this->db->insert('bzz_comment_likes',$data);
			$data1 = array('like_status' => 'Y','like_count' =>$like_count);
			echo json_encode($data1);
		}
		
   }
    public function page_commentinsertlikes($data)
   {
	    $pid=$data['like_on'];
	    $aid=$data['liked_by'];
	   // $like=$data['like'];
	    $condition = "like_on =" . $pid . " AND liked_by =".$aid;
	    $this->db->select('*');
		$this->db->from('bzz_page_comment_likes');
		$this->db->where($condition);
		$query = $this->db->get();
		$like_count = count($this->customermodel->page_comment_likes($pid));
		if($query->num_rows()>0){
			$res=$query->result();
			$res_like=$res[0]->like_status;			
			if($res_like == 'Y' ){
				$slike="N";
			}
			else if($res_like == 'N'){
				$slike="Y";
			}
			
		$data1 = array('like_status' => $slike);
        $this->db->where($condition);
  		$this->db->update('bzz_page_comment_likes',$data1);	
	    $data1 = array('like_status' => $slike,'like_count' => $like_count);
			echo json_encode($data1);
		}
		else{
	    $this->db->insert('bzz_page_comment_likes',$data);
			$data1 = array('like_status' => 'Y','like_count' =>$like_count);
			echo json_encode($data1);
		}
		
   }
   public function page_photocommentinsertlinks($data)
   {
	   
	    $pid=$data['like_on'];
	    $aid=$data['liked_by'];
		$photo = $data['photo_name'];
	   // $like=$data['like'];
	    $condition = "like_on =" . $pid . " AND photo_name = '".$photo."' AND liked_by =".$aid;
	    $this->db->select('*');
		$this->db->from('bzz_page_photo_comment_likes');
		$this->db->where($condition);
		$query = $this->db->get();
		$like_count = count($this->customermodel->page_photocommentlikedata($pid,$photo));
		if($query->num_rows()>0){
			$res=$query->result();
			$res_like=$res[0]->like_status;			
			if($res_like == 'Y' ){
				$slike="N";
			}
			else if($res_like == 'N'){
				$slike="Y";
			}
			
		$data1 = array('like_status' => $slike);
        $this->db->where($condition);
  		$this->db->update('bzz_page_photo_comment_likes',$data1);	
	    $data1 = array('like_status' => $slike,'like_count' => $like_count);
			echo json_encode($data1);
		}
		else{
	    $this->db->insert('bzz_page_photo_comment_likes',$data);
			$data1 = array('like_status' => 'Y','like_count' =>$like_count);
			echo json_encode($data1);
		}
		
   }
   public function photocommentinsertlinks($data)
   {
	    $pid=$data['like_on'];
	    $aid=$data['liked_by'];
		$photo = $data['photo_name'];
	   // $like=$data['like'];
	    $condition = "like_on =" . $pid . " AND photo_name = '".$photo."' AND liked_by =".$aid;
	    $this->db->select('*');
		$this->db->from('bzz_photo_comment_likes');
		$this->db->where($condition);
		$query = $this->db->get();
		if($this->customermodel->photocommentlikedata($pid,$photo))
		$like_count = count($this->customermodel->photocommentlikedata($pid,$photo));
		else
		$like_count = 0;
		if($query->num_rows()>0){
			$res=$query->result();
			$res_like=$res[0]->like_status;			
			if($res_like == 'Y' ){
				$slike="N";				
			}
			else if($res_like == 'N'){
				$slike="Y";
			}
			
		$data1 = array('like_status' => $slike);
        $this->db->where($condition);
  		$this->db->update('bzz_photo_comment_likes',$data1);	
	    $data1 = array('like_status' => $slike,'like_count' => $like_count);
			echo json_encode($data1);
		}
		else{
	    $this->db->insert('bzz_photo_comment_likes',$data);
			$data1 = array('like_status' => 'Y','like_count' =>$like_count);
			echo json_encode($data1);
		}
		
   }

       public function event_comment_insert_links($data)
   {
	    $pid=$data['like_on'];
	    $aid=$data['liked_by'];
	   // $like=$data['like'];
	    $condition = "like_on =" . $pid . " AND liked_by =".$aid;
	    $this->db->select('*');
		$this->db->from('bzz_event_comment_likes');
		$this->db->where($condition);
		$query = $this->db->get();
		$like_count = count($this->customermodel->eventcommentlikedata($pid));
		if($query->num_rows()>0){
			$res=$query->result();
			$res_like=$res[0]->like_status;			
			if($res_like == 'Y' ){
				$slike="N";
			}
			else if($res_like == 'N'){
				$slike="Y";
			}
			
		$data1 = array('like_status' => $slike);
        $this->db->where($condition);
  		$this->db->update('bzz_event_comment_likes',$data1);	
	    $data1 = array('like_status' => $slike,'like_count' => $like_count);
			echo json_encode($data1);
		}
		else{
	    $this->db->insert('bzz_event_comment_likes',$data);
			$data1 = array('like_status' => 'Y','like_count' =>$like_count);
			echo json_encode($data1);
		}
		
   }
   
   
   public function insertcmplikes($data)
   {
	    $pid=$data['like_on'];
	    $aid=$data['liked_by'];
	   // $like=$data['like'];
	    $condition = "like_on =" . $pid . " AND liked_by =".$aid;
	    $this->db->select('*');
		$this->db->from('bzz_cmp_likes');
		$this->db->where($condition);
		$query = $this->db->get();
		if($query->num_rows()>0){
			$res=$query->result();
			$res_like=$res[0]->like_status;			
			if($res_like == 'Y' ){
				$slike="N";
			}
			else if($res_like == 'N'){
				$slike="Y";
			}
			$like_count = count($this->customermodel->cmplikedata($pid));
		$data1 = array('like_status' => $slike);
        $this->db->where($condition);
  		$this->db->update('bzz_cmp_likes',$data1);	
	    $data1 = array('like_status' => $slike,'like_count' => $like_count);
			echo json_encode($data1);
		}
		else{
	    $this->db->insert('bzz_cmp_likes',$data);
			$data1 = array('like_status' => 'Y','like_count' => 0);
			echo json_encode($data1);
		}
		
   }
   public function likedata($pid){
	    $condition = "like_on =" . "'" . $pid . "' AND like_status = 'Y'";
		$this->db->select('*');
		$this->db->from('bzz_likes');
		$this->db->where($condition);
		$query = $this->db->get();
		//return $query->num_rows();
		return $query->result();
		
   }
   public function page_likedata($pid){
	    $condition = "like_on =" . "'" . $pid . "' AND like_status = 'Y'";
		$this->db->select('*');
		$this->db->from('bzz_page_likes');
		$this->db->where($condition);
		$query = $this->db->get();
		//return $query->num_rows();
		return $query->result();
		
   }
   
   
     public function comment_count_data($pid){
	   
		$this->db->select('*');
		$this->db->from('bzz_postcomments');
		$this->db->where('commented_on',$pid);
		$query = $this->db->get();
		//return $query->num_rows();
		return $query->result();
		
   }
    public function page_comment_count_data($pid){
	   
		$this->db->select('*');
		$this->db->from('bzz_page_comments');
		$this->db->where('cmt_on',$pid);
		$query = $this->db->get();
		//return $query->num_rows();
		return $query->result();
		
   }
   
      public function eventlikedata($pid){
	    $condition = "like_on =" . "'" . $pid . "' AND like_status = 'Y'";
		$this->db->select('*');
		$this->db->from('bzz_event_likes');
		$this->db->where($condition);
		$query = $this->db->get();
		//return $query->num_rows();
		return $query->result();
		
   }
   public function currentuserlikedata($pid){
	    $id = $this->session->userdata('logged_in')['account_id'];
	    $condition = "like_on =" . "'" . $pid . "' AND liked_by='".$id."' AND like_status = 'Y'";
		$this->db->select('*');
		$this->db->from('bzz_likes');
		$this->db->where($condition);
		if($query = $this->db->get())
				return $query->result();
		else
				return false;
		
   }
    public function cur_user_pagelikes($pid){
	    $id = $this->session->userdata('logged_in')['account_id'];
	    $condition = "like_on =" . "'" . $pid . "' AND liked_by='".$id."' AND like_status = 'Y'";
		$this->db->select('*');
		$this->db->from('bzz_page_likes');
		$this->db->where($condition);
		if($query = $this->db->get())
				return $query->result();
		else
				return false;
		
   }
      public function currentusereventlikedata($pid){
	    $id = $this->session->userdata('logged_in')['account_id'];
	    $condition = "like_on =" . "'" . $pid . "' AND liked_by='".$id."' AND like_status = 'Y'";
		$this->db->select('*');
		$this->db->from('bzz_event_likes');
		$this->db->where($condition);
		if($query = $this->db->get())
				return $query->result();
		else
				return false;
		
   }
   public function commentlikedata($cid){
	    $condition = "like_on =" . "'" . $cid . "' AND like_status = 'Y'";
		$this->db->select('*');
		$this->db->from('bzz_comment_likes');
		$this->db->where($condition);
		$query = $this->db->get();
		//return $query->num_rows();
		return $query->result();
		
   }
   public function page_comment_likes($cid){
	    $condition = "like_on =" . "'" . $cid . "' AND like_status = 'Y'";
		$this->db->select('*');
		$this->db->from('bzz_page_comment_likes');
		$this->db->where($condition);
		$query = $this->db->get();
		//return $query->num_rows();
		return $query->result();
		
   }
   public function photocommentlikedata($cid,$photo){
	    $condition = "like_on ='" . $cid . "' AND photo_name ='".$photo."' AND like_status = 'Y'";
		$this->db->select('*');
		$this->db->from('bzz_photo_comment_likes');
		$this->db->where($condition);
		$query = $this->db->get();
		//return $query->num_rows();
		return $query->result();
		
   }
    public function page_photocommentlikedata($cid,$photo){
	    $condition = "like_on ='" . $cid . "' AND photo_name ='".$photo."' AND like_status = 'Y'";
		$this->db->select('*');
		$this->db->from('bzz_page_photo_comment_likes');
		$this->db->where($condition);
		$query = $this->db->get();
		//return $query->num_rows();
		return $query->result();
		
   }
  
   
   
      public function eventcommentlikedata($cid){
	    $condition = "like_on =" . "'" . $cid . "' AND like_status = 'Y'";
		$this->db->select('*');
		$this->db->from('bzz_event_comment_likes');
		$this->db->where($condition);
		$query = $this->db->get();
		//return $query->num_rows();
		return $query->result();
		
   }
   public function currentusercommentlikedata($cid){
	    $id = $this->session->userdata('logged_in')['account_id'];
	    $condition = "like_on ='".$cid."' AND liked_by='".$id."'  AND like_status = 'Y'";
		$this->db->select('*');
		$this->db->from('bzz_comment_likes');
		$this->db->where($condition);
		$query = $this->db->get();
		//return $query->num_rows();
		return $query->result();
		
   }
   
   public function currentuser_page_commentlikes($cid){
	    $id = $this->session->userdata('logged_in')['account_id'];
	    $condition = "like_on ='".$cid."' AND liked_by='".$id."'  AND like_status = 'Y'";
		$this->db->select('*');
		$this->db->from('bzz_page_comment_likes');
		$this->db->where($condition);
		$query = $this->db->get();
		//return $query->num_rows();
		return $query->result();
		
   }
   public function currentuser_photo_commentlikedata($cid){
	    $id = $this->session->userdata('logged_in')['account_id'];
	    $condition = "like_on ='".$cid."' AND liked_by='".$id."'  AND like_status = 'Y'";
		$this->db->select('*');
		$this->db->from('bzz_photo_comment_likes');
		$this->db->where($condition);
		$query = $this->db->get();
		//return $query->num_rows();
		return $query->result();
		
   }
    public function currentuser_page_photo_commentlikedata($cid){
	    $id = $this->session->userdata('logged_in')['account_id'];
	    $condition = "like_on ='".$cid."' AND liked_by='".$id."'  AND like_status = 'Y'";
		$this->db->select('*');
		$this->db->from('bzz_page_photo_comment_likes');
		$this->db->where($condition);
		$query = $this->db->get();
		//return $query->num_rows();
		return $query->result();
		
   }
   
      public function currentusereventcommentlikedata($cid){
	    $id = $this->session->userdata('logged_in')['account_id'];
	    $condition = "like_on ='".$cid."' AND liked_by='".$id."'  AND like_status = 'Y'";
		$this->db->select('*');
		$this->db->from('bzz_event_comment_likes');
		$this->db->where($condition);
		$query = $this->db->get();
		//return $query->num_rows();
		return $query->result();
		
   }
   public function cmplikedata($pid){
	    $condition = "like_on ='".$pid."' AND like_status = 'Y'";
		$this->db->select('*');
		$this->db->from('bzz_cmp_likes');
		$this->db->where($condition);
		$query = $this->db->get();
		//return $query->num_rows();
		return $query->result();
		
   }
   public function write_comments($data){
	    $this->db->insert('bzz_postcomments',$data);
   }
    public function write_page_comments($data){
	    $this->db->insert('bzz_page_comments',$data);
   }
   public function write_photo_comments($data){
	  return $this->db->insert('bzz_post_image_comments',$data);
   }
   public function write_page_photo_comments($data){
	  return $this->db->insert('bzz_page_post_image_comments',$data);
   }
   public function write_event_comments($data){
	    $this->db->insert('bzz_event_postcomments',$data);
   }
   public function write_cmp_comments($data){
	    $this->db->insert('bzz_cmp_postcomments',$data);
   }
    public function page_comments_data($pid){
	   $condition = "cmt_on =" . "'" . $pid . "' and (cmt_content != '' OR uploadedfiles!='')";
		$this->db->select('*');
		$this->db->from('bzz_page_comments');
		$this->db->where($condition);
		$query = $this->db->get();
		//return $query->num_rows();
		return $query->result(); 
   }
   public function comments_data($pid){
	   $condition = "commented_on =" . "'" . $pid . "' and (comment_content != '' OR uploadedfiles!='')";
		$this->db->select('*');
		$this->db->from('bzz_postcomments');
		$this->db->where($condition);
		$query = $this->db->get();
		//return $query->num_rows();
		return $query->result(); 
   }
    public function page_comments_data_desc($pid){
	   $condition = "cmt_on =" . "'" . $pid . "' and (cmt_content != '' OR uploadedfiles!='')";
		$this->db->select('*');
		$this->db->from('bzz_page_comments');
		$this->db->limit(1);
		$this->db->where($condition);
		$this->db->order_by('cmt_id','desc');
		$query = $this->db->get();
		
		//return $query->num_rows();
		return $query->result(); 
   }
      public function comments_data_desc($pid){
	   $condition = "commented_on =" . "'" . $pid . "' and (comment_content != '' OR uploadedfiles!='')";
		$this->db->select('*');
		$this->db->from('bzz_postcomments');
		$this->db->limit(1);
		$this->db->where($condition);
		$this->db->order_by('postcomments_id','desc');
		$query = $this->db->get();
		
		//return $query->num_rows();
		return $query->result(); 
   }
   public function photo_comments_data($pid,$image){
	   $condition = "post_id =" . "'" . $pid . "' AND  img_commented_on ='".$image."'  AND (comment != '' OR uploaded_files!='')";
		$this->db->select('*');
		$this->db->from('bzz_post_image_comments');
		$this->db->where($condition);
		$query = $this->db->get();
		//return $query->num_rows();
		return $query->result(); 
   }
    public function page_photo_comments_data($pid,$image){
	   $condition = "post_id =" . "'" . $pid . "' AND  img_commented_on ='".$image."'  AND (comment != '' OR uploaded_files!='')";
		$this->db->select('*');
		$this->db->from('bzz_page_post_image_comments');
		$this->db->where($condition);
		$query = $this->db->get();
		//return $query->num_rows();
		return $query->result(); 
   }
      public function event_comments_data($eventid){
	   $condition = "commented_on =" . "'" . $eventid . "' and (comment_content != '' OR uploadedfiles!='')";
		$this->db->select('*');
		$this->db->from('bzz_event_postcomments');
		$this->db->where($condition);
		$query = $this->db->get();
		//return $query->num_rows();
		return $query->result(); 
   }
   public function cmp_comments_data($pid){
	   $condition = "commented_on =" . "'" . $pid . "' and (comment_content != '' OR uploadedfiles!='')";
		$this->db->select('*');
		$this->db->from('bzz_cmp_postcomments');
		$this->db->where($condition);
		$query = $this->db->get();
		//return $query->num_rows();
		return $query->result(); 
   }

   public function updateAboutInfo($data)
   {
	//	$updated_data=array('');  
	$updateddata = array(
		'user_about'=>$data['about_me_info'],
		'user_intrests'=>$data['about_me_intrests'],
		'user_skills'=>$data['about_me_skills']
	);
	$this->db->where('user_id',$this->session->userdata('logged_in')['account_id']);
	if($this->db->update('bzz_userinfo',$updateddata))
	return true;
	else
	return false;	
   }
   
   public function updatePrivacyInfo($data)
   {
		$updatedata = array(
		'profile_visible'=>$data['profile_visible'],
		'comments_visible'=>$data['comments_visible'],
		'companies_visible'=>$data['companies_visible']
		);
		$this->db->where('user_id',$this->session->userdata('logged_in')['account_id']);
		if($this->db->update('bzz_usersettings',$updatedata))
			return true;
		else
			return false;	
   }
   
   public function updateSidebarSettings($data)
   {
	    $id = $this->session->userdata('logged_in')['account_id'];
	   	$updatedata = array(
		'pend_frnd_requests'=>$data['pend_frnd_req'],
		'latest_frnds'=>$data['latest_frnds'],
		'your_add_one'=>$data['your_add_one'],
		'add_friends'=>$data['add_frnds'],
		'companies_to_follow'=>$data['cmps_to_follow'],
		'companies_im_following'=>$data['user_following_cmps'],	
		'your_add_two'=>$data['your_add_two'],
		'my_companies'=>$data['my_cmps'],
		'recent_viewers'=>$data['visited_users']
		);
		
		$this->db->where('user_id',$id);
		$query = $this->db->get('bzz_sidebar_display_settings');
		$side_settings = $query->result_array();
		
		if($side_settings[0]['user_id'] == $id)
		{
		$this->db->where('user_id',$id);
		if($this->db->update('bzz_sidebar_display_settings',$updatedata))
		return true;
		
		}else{
			
		$data['pend_frnd_requests']  = 'y';
		$data['latest_frnds'] = 'y';
		$data['your_add_one'] = 'y';
		$data['add_friends'] = 'y';
		$data['companies_to_follow'] = 'y';
		$data['companies_im_following'] = 'y';	
		$data['your_add_two'] = 'y';
		$data['my_companies'] = 'y';
		$data['recent_viewers'] = 'y';
		$data['user_id'] = $user_id;
	    if($this->db->insert('bzz_sidebar_display_settings',$data))
		return true;
		
		
		}
		
		return false;
   }
   
   public function updateEmailInfo($data)
   {
	  $updatedata = array(
		'email_notification'=>$data['email_notofication'],
	  ); 
	  $this->db->where('user_id',$this->session->userdata('logged_in')['account_id']);
	  if($this->db->update('bzz_usersettings',$updatedata))
			return true;
		else
			return false;
   }
   
   public function manageeducationdata($data)
   {
	   	$educationInfo = array(
		'field_of_study'=>$data['field_of_study'],
		'college_institution'=>$data['college_institution'],
		'degree_certificate'=>$data['degree_certificate'],
		'attended_from'=>$data['year_attended_from'].'-'.$data['month_attended_from'],
		'attended_upto'=>$data['year_attended_to'].'-'.$data['month_attended_to'],
		'specialised_studies'=>$data['special_studies'],
		'user_id'=>$this->session->userdata('logged_in')['account_id']
		);
		if($data['edu_action']=='add')
		{
		if($this->db->insert('bzz_educationinfo', $educationInfo))
			return $this->db->insert_id();
		else
			return false;
		}
		else if($data['edu_action']=='update')
		{
			//$educationInfo['educationinfo_id']=$data['edu_form_id'];
			$this->db->where('educationinfo_id', $data['edu_form_id']);
			if($this->db->update('bzz_educationinfo', $educationInfo))
			return true;
			else 
			return false; 
		}
   }
    public function manageprofessiondata($data)
   {
	   	$professionInfo = array(
		'job_title'=>$data['job_title'],
		'start_date'=>$data['year_attended_from'].'-'.$data['month_attended_from'],
		'end_date'=>$data['year_attended_to'].'-'.$data['month_attended_to'],
		'job_description'=>$data['job_description'],
			
		'user_id'=>$this->session->userdata('logged_in')['account_id']
		);
		if(isset($data['current']))
			$professionInfo['current_job']=$data['current'];
		if($data['prof_action']=='add')
		{
		if($this->db->insert('bzz_professionalinfo', $professionInfo))
			return $this->db->insert_id();
		else
			return false;
		}
		elseif($data['prof_action']=='update')
		{
			//$professionInfo['professionalinfo_id']=$data['prof_form_id'];
			$this->db->where('professionalinfo_id', $data['prof_form_id']);
			if($this->db->update('bzz_professionalinfo', $professionInfo))
			return true;
			else 
			return false; 
		}
   }
    public function manageorganizationdata($data)
   {
	   	$organizationInfo = array(
		'org_name'=>$data['org_name'],
		'position'=>$data['position'],
		'emp_status'=>$data['emp_status'],
		'start_date'=>$data['year_attended_from'].'-'.$data['month_attended_from'],
		'end_date'=>$data['year_attended_to'].'-'.$data['month_attended_to'],
		'org_desc'=>$data['org_description'],
		'user_id'=>$this->session->userdata('logged_in')['account_id']
		);
		if($data['org_action']=='add')
		{
		if($this->db->insert('bzz_organizationinfo', $organizationInfo))
			return $this->db->insert_id();
		else
			return false;
		}
		elseif($data['org_action']=='update')
		{
			//$organizationInfo['organization_id']=$data['org_form_id'];
			$this->db->where('organization_id', $data['org_form_id']);
			if($this->db->update('bzz_organizationinfo', $organizationInfo))
			return true;
			else 
			return false; 
		}
   }
    public function managegroupdata($data)
   {
	   	$groupInfo = array(
		'group_name'=>$data['group_name'],
		'group_type'=>$data['group_type'],
		'group_web_url'=>$data['website_url'],
		'group_state'=>$data['usa_states'],
		'group_postalcode'=>$data['postal_code'],
		'group_about'=>$data['additional_info'],
		'group_city'=>$data['city'],
		'user_id'=>$this->session->userdata('logged_in')['account_id']
		);
		if($data['grp_action']=='add')
		{
		if($this->db->insert('bzz_groupinfo',$groupInfo))
			return $this->db->insert_id();
		else
			return false;
		}
		elseif($data['grp_action']=='update')
		{
			//$groupInfo['groupinfo_id']=$data['grp_form_id'];
			$this->db->where('groupinfo_id', $data['grp_form_id']);
			if($this->db->update('bzz_groupinfo', $groupInfo))
			return true;
			else 
			return false; 
		}
   }
   
    public function managepostboarddata($data)
   {
	   	$userInfo = array(
		'user_firstname'=>$data['firstname'],
		'user_lastname'=>$data['lastname'],
		'user_jobtype'=>$data['position'],
		'user_industry'=>$data['industry'],
		'user_cmpname'=>$data['companyname'],
		);
		
		$user =array(
		'user_email'=>$data['email'],
		//'password'=>md5($data['password']),
		//'con_password'=>md5($data['con_password']),
		'user_country'=>$data['country'],
		'user_state'=>$data['state'],
		'user_city'=>$data['city'],
		'user_postalcode'=>$data['postal_code'],
		);
		//'other_industry'=>$data['oth_industry'],
		$this->db->where('user_id',$this->session->userdata('logged_in')['account_id']);
		if($this->db->update('bzz_userinfo',$userInfo))
  $con1 = true;
  $this->db->where('user_id',$this->session->userdata('logged_in')['account_id']);
  if($this->db->update('bzz_users',$user))
  $con2 = true;
  if($con1 && $con2)
  return true;
  else
  return false;
		
   }
   
   public function passwordUpdate($password_info)
   {
	    
		   $id = $this->session->userdata('logged_in')['account_id'];
		   $condition = "user_id =" . "'".$id."'";
		   $this->db->where($condition);
		   $query = $this->db->get('bzz_users');
		   $user_info = $query->result_array();
		   print_r($user_info);
		if($user_info[0]['password'] == md5($password_info['password']))
		{
			
			$data = array('password' =>md5($password_info['con_new_password']));
			$this->db->where($condition);
			$this->db->update('bzz_users',$data);
		}else
		return false;
   }
	function get_time_difference_php($created_time)
 {
        //date_default_timezone_set('Asia/Calcutta'); //Change as per your default time
        $str = strtotime($created_time);
        $today = strtotime(date('Y-m-d H:i:s'));

        // It returns the time difference in Seconds...
        $time_differnce = $today-$str;

        // To Calculate the time difference in Years...
        $years = 60*60*24*365;

        // To Calculate the time difference in Months...
        $months = 60*60*24*30;

        // To Calculate the time difference in Days...
        $days = 60*60*24;

        // To Calculate the time difference in Hours...
        $hours = 60*60;

        // To Calculate the time difference in Minutes...
        $minutes = 60;

        if(intval($time_differnce/$years) > 1)
        {
            return intval($time_differnce/$years)." years ago";
        }else if(intval($time_differnce/$years) > 0)
        {
            return intval($time_differnce/$years)." year ago";
        }else if(intval($time_differnce/$months) > 1)
        {
            return intval($time_differnce/$months)." months ago";
        }else if(intval(($time_differnce/$months)) > 0)
        {
            return intval(($time_differnce/$months))." month ago";
        }else if(intval(($time_differnce/$days)) > 1)
        {
            return intval(($time_differnce/$days))." days ago";
        }else if (intval(($time_differnce/$days)) > 0) 
        {
            return intval(($time_differnce/$days))." day ago";
        }else if (intval(($time_differnce/$hours)) > 1) 
        {
            return intval(($time_differnce/$hours))." hours ago";
        }else if (intval(($time_differnce/$hours)) > 0) 
        {
            return intval(($time_differnce/$hours))." hour ago";
        }else if (intval(($time_differnce/$minutes)) > 1) 
        {
            return intval(($time_differnce/$minutes))." minutes ago";
        }else if (intval(($time_differnce/$minutes)) > 0) 
        {
            return intval(($time_differnce/$minutes))." minute ago";
        }else if (intval(($time_differnce)) > 1) 
        {
            return intval(($time_differnce))." seconds ago";
        }else
        {
            return "few seconds ago";
        }
  } 
  
  public function getPostById($id){
	    $condition = "post_id =" . "'" . $id . "'";
		$this->db->select('*');
		$this->db->from('bzz_posts');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() == 1) {
			return $query->result();
		} else {
		return false;
		}
   }
   public function getPagePostById($id){
	    $condition = "post_id =" . "'" . $id . "'";
		$this->db->select('*');
		$this->db->from('bzz_page_posts');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() == 1) {
			return $query->result();
		} else {
		return false;
		}
   }
    public function getFavById($id){
	    $condition = "favorite_id =" . "'" . $id . "'";
		$this->db->select('*');
		$this->db->from('bzz_save_as_favorites');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() == 1) {
			return $query->result();
		} else {
		return false;
		}
   }
   public function getCmpPostById($id){
	    $condition = "cmp_post_id =" . "'" . $id . "'";
		$this->db->select('*');
		$this->db->from('bzz_cmp_posts');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() == 1) {
			return $query->result();
		} else {
		return false;
		}
   }
   
   public function reset_password($usermail,$pwd)
   {
	
		$data['password'] = $pwd;
		
		$this->db->where('user_email',$usermail);
		$this->db->update('bzz_users',$data);
		if($this->db->affected_rows() == 1)
		{
		$this->session->set_flashdata('resest_pwd_success','Your password Has Been Reset Successfully  You Can Login with New Password!....');
			redirect('signg_in');
		}else{
		$this->session->set_flashdata('resest_pwd_failure','Your password Reset Not done ,Please Try again !....');
			redirect('signg_in');
		}
   }
   
public function individual_Posts($post_id)
{
	  $this->db->select('*');
	   
	   $this->db->where('post_id',$post_id);
	 
	   $this->db->from('bzz_posts');
	
	   $this->db->limit(1);
	
	   $query = $this->db->get();
   	   if ($query->num_rows() == 1)
	    {
	   	return $query->result();
       }
}
public function individual_Page_Posts($post_id)
{
	  $this->db->select('*');
	   
	   $this->db->where('post_id',$post_id);
	 
	   $this->db->from('bzz_page_posts');
	
	   $this->db->limit(1);
	
	   $query = $this->db->get();
   	   if ($query->num_rows() == 1)
	    {
	   	return $query->result();
       }
}


	public function individualPost($post_id){
		if(empty($pst_usr_id))
  	    $id = $this->session->userdata('logged_in')['account_id'];
		else
		$id = $pst_usr_id;
		$cur_usr_id = $this->session->userdata('logged_in')['account_id'];
	    $condition = "(user_id ='" . $id . "' OR friend_id ='".$id."') AND request_status = 'Y'";
		$this->db->select('*');
		$this->db->from('bzz_userfriends');
		$this->db->where($condition);
		$query = $this->db->get();
			$friends = array();
		if ($query->num_rows() > 0) {
			$res = $query->result();
			if($res)
			{
			foreach($res as $friend)	
			{
			   $friends[] =	$friend->friend_id;
			   $friends[] = $friend->user_id;
			}
			}
		}	
	   $friends[] =  $id;
	   $friends = array_unique($friends);
	 
	   $this->db->select('*');
	
	   $this->db->from('bzz_posts');
	
	   
	
     $this->db->where('post_id',$post_id);
	
	   $query = $this->db->get();
   	   if ($query->num_rows() > 0) {
	   		$result =  $query->result();
			$posts = array();
			foreach($result as $res){
		    $friend_ids = explode(',',$res->posted_to);
				
			if(($res->posted_to==0 && in_array($res->posted_by,$friends)) || ($res->isGhostpost==1 && in_array($res->posted_by,$friends)) || ($res->posted_by==$id && $id==$cur_usr_id) || (in_array($id, $friend_ids) && $id==$cur_usr_id) ||  (!empty($pst_usr_id) && in_array($pst_usr_id, $friend_ids)) || ($res->posted_by==$id && in_array($cur_usr_id, $friend_ids)))
			{
				$posts[] = $res;
			}
			}
			
			return $posts;
	   } 
	   else 
	   return false;
   }

 }
?>
