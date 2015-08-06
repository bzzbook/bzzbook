<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class posts extends CI_Controller {
	 
	  public function __construct() {
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Access-Control-Allow-Origin");
		header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE, OPTIONS");
		header( "Access-Control-Allow-Headers: Authorization, Content-Type" );
        parent::__construct();
    }
	public function index()
	{
		
	}
	public function getposts($access_token,$last_id=''){
	
	  $user_res = $this->customermodel->get_user_id($access_token);
	
	  $user_id =  $user_res[0]->user_id;
	  if($user_id)
	  $allposts = $this->customermodel->All_Posts($user_id,$last_id);
	  if($allposts):
	  $posts = array();
	  foreach( $allposts as $row):
	  $post = array();
	  $post['posted_id'] = $row->posted_by;
	  $post['data'] = $row;
	  $post['time'] = $this->customermodel->get_time_difference_php($row->posted_on);
      $get_profiledata = $this->customermodel->profiledata($row->posted_by);
	  $post['posted_user_data'] = $get_profiledata[0];
	  if($row->tagged_friends!='')
	  {
		  $tags = array();
		  $taggedusers = explode(',',$row->tagged_friends);
		  foreach($taggedusers as $taggeduser){
		  $tagusers = $this->customermodel->profiledata($taggeduser);
		  $tags[] = $tagusers[0];
		  }
		  $post['tagged_users_data'] = $tags;
	  }
	  $post['likedetails'] = $this->customermodel->likedata($row->post_id);
	  $post['current_user_like_data'] = $this->customermodel->currentuserlikedata($row->post_id);
	  $comments_details = $this->customermodel->comments_data($row->post_id);
	  $comments = array();
	  for($i=0;$i<count($comments_details);$i++){ 
		  $comment = array();
		  $comment['data'] = $comments_details[$i];
		  $comment['user_data'] = $this->customermodel->profiledata($comments_details[$i]->commented_by); 
		  $comment['time'] = $this->customermodel->get_time_difference_php($comments_details[$i]->commented_time);
		  $comment['likes'] = $this->customermodel->commentlikedata($comments_details[$i]->postcomments_id);
		  $comment['current_user_like_data'] = $this->customermodel->currentusercommentlikedata($comments_details[$i]->postcomments_id);
		  $comments[] = $comment;
	  }
	  $post['comments'] = $comments;
	  $posts[] = $post;
	  endforeach;
	  $data = array('success'=> true,'result'=>$posts);
	  echo json_encode($data);
	  exit(0);
	  endif;
	  
	  $data = array('success'=> false,'result'=>'No data available');
	  echo json_encode($data);
	  exit(0);
	  
	}
	
	
	public function send_post($access_token){
	$user_res = $this->customermodel->get_user_id($access_token);	
	$user_id =  $user_res[0]->user_id;
	if($user_id){ 
	 $data['posted_by'] = $user_id;
	   $up_res = $this->ajax_image_upload('uploadPhotos');
	   if($up_res['status'])
	   $file_name = $up_res['message'];
	   else
	   $file_name = '';
	   
	 $data['post_content'] = $_POST['posts'];
	 $data['uploaded_files'] = $file_name;
	 if($_POST['addedusers']!='')
	 {
		 $data['posted_to'] = $_POST['addedusers'];
		 $data['isGhostpost'] = 1;
		 if($_POST['tagaddedusers']!='')
		 $data['tagged_friends'] = $_POST['tagaddedusers'];
		 $this->customermodel->post_buzz($data); 
		 $insert_id = $this->db->insert_id();
		 $this->getposts($access_token,($insert_id-1));
	
	 }
	 else if($_POST['post_group']==0)
	 {
		  $data['posted_to']='';
		  if($_POST['tagaddedusers']!='')
		  $data['tagged_friends'] = $_POST['tagaddedusers'];
		   $this->customermodel->post_buzz($data);
		    $insert_id = $this->db->insert_id();
		$this->getposts($access_token,$insert_id-1);
		  // echo "post saved successfully..."; 
		  // redirect('profiles');
	
	 }
	 else
	 {
		 $result = $this->profile_set->get_groupmembers($_POST['post_group']);
		 $data['posted_to'] = $result[0]['group_members'];
		 if($this->input->post('tagaddedusers')!='')
		 $data['tagged_friends'] = $_POST['tagaddedusers'];
		 $this->customermodel->post_buzz($data);
		  $insert_id = $this->db->insert_id();
		 $this->getposts($access_token,$insert_id-1);
		
	
	 }
	
	}
	}
	public function getfriendsuggestion($access_token){
		$user_res = $this->customermodel->get_user_id($access_token);	
		$suggestions = $this->friendsmodel->getfriends($_POST['txtsearch'],$_POST['addedusers']);
		if($suggestions)
		$data = array('success'=> true,'result'=>$suggestions);
		else
		$data = array('success'=> false,'result'=>'No suggestions found');
		
		echo json_encode($data);
		exit(0);
	}
	 public function ajax_image_upload($file_name){
	 
	
	
	if(isset($_FILES[$file_name]["type"]) && !empty($_FILES[$file_name]["type"][0]))	
	{		
		$validextensions = array("jpeg", "jpg", "png");
		
	
		
		$filename = implode(",",$_FILES[$file_name]["name"]);
		
		$temporary = explode(".",$filename);
		
		$file_extension = end($temporary);
		
		
		if((($_FILES[$file_name]["type"][0] == "image/png") || ($_FILES[$file_name]["type"][0] == "image/jpg") || ($_FILES[$file_name]["type"][0] == "image/jpeg")
		) && ($_FILES[$file_name]["size"][0] < 1000000)//Approx. 100kb files can be uploaded.
		&& in_array($file_extension, $validextensions)) {
			
		if ($_FILES[$file_name]["error"][0] > 0)
		{
		$file_upload['status'] = false;
		$file_upload['error_code'] = 2;
		$file_upload['message'] =  "Return Code: " . $_FILES[$file_name]["error"][0] . "<br/><br/>";
		}
		else
		{
		
		
		$config['upload_path'] = DIR_FILE_PATH;
		$sourcePath = $_FILES[$file_name]['tmp_name'][0]; // Storing source path of the file in a variable
		//$targetPath = "F:\/xampp\/htdocs\/bzzbook\/uploads\/".$_FILES[$file_name]['name'][0];
		$targetPath = $config['upload_path'].$_FILES[$file_name]['name'][0]; // Target path where file is to be stored
		move_uploaded_file($sourcePath,$targetPath) ; 
		$file_upload['status'] = true;
		$file_upload['message'] =  $filename;
		
		/*$data=array(
			   'comment_content'=> $_POST['write_comment'],
			   'commented_on'=> $_POST['post_id'],
			   'commented_by'=> $_POST['posted_by'],
			   'uploadedfiles' => $filename
			   );
			   
		//print_r($data);
		
		  $res=$this->customermodel->write_comments($data);
		  $data['post_id'] = $_POST['post_id'];
		  echo $this->load->view('single_post',$data);  */
		
		}
		 }
		else
		{
		$file_upload['status'] = false;
		$file_upload['error_code'] = 3;
		$file_upload['message'] =  "<span id='invalid'>***Invalid file Size or Type***<span>";
		}
		return $file_upload;
	}else{
		$file_upload['status'] = false;
		$file_upload['error_code'] = 1;
		$file_upload['message'] =  "File not uploaded";
	}
	 
}
	


}

?>