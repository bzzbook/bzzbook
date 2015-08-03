<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

session_start();

class Signg_in extends CI_Controller {
	 
	  public function __construct() {
        parent::__construct();
		

    }
	public function index()
	{ 
	
     $this->load->view('sign_in_v');
   }
	
	public function api_db_check_login()
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Access-Control-Allow-Origin");
		header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE, OPTIONS");
		header( "Access-Control-Allow-Headers: Authorization, Content-Type" );
		
		
		
		$data = array(
					'email' => $this->input->post('email'),
					'password' => $this->input->post('password')
				    );
					
						
				$this->load->model('sign_inm');
			    $result = $this->sign_inm->sign_in($data);
		
		
	    if($result == TRUE){
	    /*	$sess_array = array(
		   					'email' => $this->input->post('email'),
		   					'password' => $this->input->post('password')
							
						   );
						 */
						 
		$sess_array = array(
		   					'email' =>$result[0]['user_email'],
						    'password' =>$result[0]['password'],
							'account_id' =>$result[0]['user_id']
							
						   );
		
        $this->session->set_userdata('logged_in',$sess_array);
	//	print_r($this->session->userdata);
		$result = $this->sign_inm->read_user_information($sess_array);
		if($result != false){
			$data = array(
						'result' =>$result,
						'success' => true
					     );
						//header('Content-type: application/json');
						echo json_encode($data); 
						//$this->load->view('posts', $data);
						//redirect('/profiles');
		}
						}else{
							//$this->session->set_flashdata('error','Invalid Username or Password ,   Please Try again with valid Details!...');
							$data = array('success'=> false,'message'=>'Invalid Username or Password');
							//header('Content-type: application/json');
							echo json_encode($data); 
							//redirect('signg_in');
							/*$data['error_message'] = 'Invalid Username or Password';
							$this->load->view('sign_in_v', $data);*/
						}
					
					
	}
	
	public function db_check_login()
	{
		$this->form_validation->set_rules('email','Email','trim|required|valid_email|xss_clean');
		$this->form_validation->set_rules('password','Password','trim|required|xss_clean');
		
	if($this->form_validation->run() == FALSE)
		 {
		   $this->load->view('sign_in_v');
		}else{
		$data = array(
					'email' => $this->input->post('email'),
					'password' => $this->input->post('password')
				    );
					
						
				$this->load->model('sign_inm');
			    $result = $this->sign_inm->sign_in($data);
		
		
	    if($result == TRUE){
	    /*	$sess_array = array(
		   					'email' => $this->input->post('email'),
		   					'password' => $this->input->post('password')
							
						   );
						 */
						 
		$sess_array = array(
		   					'email' =>$result[0]['user_email'],
						    'password' =>$result[0]['password'],
							'account_id' =>$result[0]['user_id']
							
						   );
		
        $this->session->set_userdata('logged_in',$sess_array);
		// setting user activity log in database to maintain user online status
		$this->profile_set->update_last_active_time();
	//	print_r($this->session->userdata);
		$result = $this->sign_inm->read_user_information($sess_array);
		if($result != false){
			$data = array(
						'email' =>$result[0]->user_email,
						'password' =>$result[0]->password
						
					     );
					
						 
						//$this->load->view('posts', $data);
						redirect('/profiles');
		}
						}else{
							$this->session->set_flashdata('error','Invalid Username or Password ,   Please Try again with valid Details!...');
							redirect('signg_in');
							/*$data['error_message'] = 'Invalid Username or Password';
							$this->load->view('sign_in_v', $data);*/
						}
					}
	}
	
  public function sign_out()
  {					$this->profile_set->remove_user_activity();	
	  				$sess_array = array(
                                        'email' => ''
                                       );
                    $this->session->unset_userdata('logged_in', $sess_array);
					$cmp_session = array('cmp_id'=> '');
					$this->session->unset_userdata($cmp_session);
					
					//$data['message_display'] = 'Successfully Logout';
					//redirect(base_url());
					$this->session->set_flashdata('signout',' You have Successfully Loged Out!..');
					redirect(base_url()."signg_in");
  }
  
  public function send_post()
  {
	 
	 $this->load->model('customermodel');
	 $session_data = $this->session->userdata('logged_in');
	 $data['posted_by'] = $session_data['account_id'];
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
		 $user_id = $this->session->userdata('logged_in')['account_id'];
	$data['products'] = $this->customermodel->All_Posts($user_id);
	if($data)
	{
	echo $this->load->view('recent_posts',$data);
	}
	
	 }
	 else if($_POST['post_group']==0)
	 {
		  $data['posted_to']='';
		  if($_POST['tagaddedusers']!='')
		  $data['tagged_friends'] = $_POST['tagaddedusers'];
		   $this->customermodel->post_buzz($data);
		  // echo "post saved successfully..."; 
		  // redirect('profiles');
	$user_id = $this->session->userdata('logged_in')['account_id'];
	$data['products'] = $this->customermodel->All_Posts($user_id);
	if($data)
	{
	echo $this->load->view('recent_posts',$data);
	}
	 }
	 else
	 {
		 $result = $this->profile_set->get_groupmembers($_POST['post_group']);
		 $data['posted_to'] = $result[0]['group_members'];
		 if($this->input->post('tagaddedusers')!='')
		 $data['tagged_friends'] = $_POST['tagaddedusers'];
		 $this->customermodel->post_buzz($data);
		 $user_id = $this->session->userdata('logged_in')['account_id'];
	$data['products'] = $this->customermodel->All_Posts($user_id);
	if($data)
	{
	echo $this->load->view('recent_posts',$data);
	}
	
	 }
	
	
	

	 //redirect('profiles');
	 // redirect(site_url('customer_controller/view_post'));
	 // redirect(site_url('customer/view_post'));
   }
   

   
    public function send_cmp_post($cmp_id)
  {
	 
	 $this->load->model('customermodel');
	 $session_data = $this->session->userdata('logged_in');
	 $data['cmp_posted_by'] = $session_data['account_id'];
	 $data['cmp_id'] = $cmp_id;
	 $data['cmp_post_content'] = $this->input->post('posts');
	 $data['cmp_uploaded_files'] = $this->doupload();
	 $data['cmp_posted_to']=$this->input->post('post_group');
	 $this->customermodel->post_cmp_buzz($data);
	 echo "post saved successfully..."; 
	 redirect('company/company_disp/'.$cmp_id);
	
	 // redirect(site_url('customer_controller/view_post'));
	 // redirect(site_url('customer/view_post'));
   }
   public function share_post()
  {
	 
	 $this->load->model('customermodel');
	 $session_data = $this->session->userdata('logged_in');
	 $data['posted_by'] = $session_data['account_id'];
	 $data['share_post_content'] = $this->input->post('share_post_content');
	 $data['uploaded_files'] = $this->input->post('uploaded_files');
	 $data['post_content'] = $this->input->post('post_content');
	 $data['shared'] = 1;
	 if($this->input->post('post_group')==0)
	 {
		  $data['posted_to']='';
		   $this->customermodel->share_buzz($data);
		   echo "post saved successfully..."; 
		   redirect('profiles');
	 }
	 else
	 {
		 $result = $this->profile_set->get_groupmembers($this->input->post('post_group'));
		 $data['posted_to'] = $result[0]['group_members'];
		 $this->customermodel->share_buzz($data);
	 }
	 echo "post saved successfully..."; 
	 redirect('profiles');
	 // redirect(site_url('customer_controller/view_post'));
	 // redirect(site_url('customer/view_post'));
   }
   function doupload($filename='') {
					$name_array = array();
					if($filename=='')
					$count = count($_FILES['uploadPhotos']['size']);
					else
					$count = count($_FILES[$filename]['size']);
					foreach($_FILES as $key=>$value)
					for($s=0; $s<=$count-1; $s++) {
					$_FILES['userfile']['name']=$value['name'][$s];
					$_FILES['userfile']['type']    = $value['type'][$s];
					$_FILES['userfile']['tmp_name'] = $value['tmp_name'][$s];
					$_FILES['userfile']['error']       = $value['error'][$s];
					$_FILES['userfile']['size']    = $value['size'][$s];  
						$config['upload_path'] = './uploads/';
						$type = $_FILES['userfile']['type'];
						$config['allowed_types'] = 'gif|jpg|png';
						
						//switch ($type) {
//						   case 'gif':
//						   case 'jpg':
//						   case 'png':
//						     // do img config setup
//							  					$config['allowed_types'] = 'gif|jpg|png';
//
//							  break;
//						   case 'avi':
//						   case 'flv':
//						   case 'wmv':
//						   case 'mp3':
//						   case 'wma':
//							  // do video config
//							  					$config['allowed_types'] = 'mp4';
//
//							  break;
//						}
						
						
					$config['max_size']	= '';
					$config['max_width']  = '';
					$config['max_height']  = '';
					$this->load->library('upload', $config);
					
					if ( ! $this->upload->do_upload())
					{
						$error = array('error' => $this->upload->display_errors());
						//$this->load->view('uploadform', $error);
					}
					else
					{
						$data = $this->upload->data();
						$name_array[] = $data['file_name'];
					}
					
					
					
					//$this->upload->do_upload();
//					$data = $this->upload->data();
//					$name_array[] = $data['file_name'];
					}
					$names= implode(',', $name_array);
					/* $this->load->database();
					$db_data = array('id'=> NULL,
					'name'=> $names);
					$this->db->insert('testtable',$db_data);
					*/	return $names;
}

//function temp_upload($filename='') {
//					$name_array = array();
//					if($filename=='')
//					$count = count($_FILES['uploadPhotos']['size']);
//					else
//					$count = count($_FILES[$filename]['size']);
//					foreach($_FILES as $key=>$value)
//					for($s=0; $s<=$count-1; $s++) {
//					$_FILES['userfile']['name']=$value['name'][$s];
//					$_FILES['userfile']['type']    = $value['type'][$s];
//					$_FILES['userfile']['tmp_name'] = $value['tmp_name'][$s];
//					$_FILES['userfile']['error']       = $value['error'][$s];
//					$_FILES['userfile']['size']    = $value['size'][$s];  
//						$config['upload_path'] = './uploads/';
//						$type = $_FILES['userfile']['type'];
//						$config['allowed_types'] = 'gif|jpg|png';
//						
//						//switch ($type) {
////						   case 'gif':
////						   case 'jpg':
////						   case 'png':
////						     // do img config setup
////							  					$config['allowed_types'] = 'gif|jpg|png';
////
////							  break;
////						   case 'avi':
////						   case 'flv':
////						   case 'wmv':
////						   case 'mp3':
////						   case 'wma':
////							  // do video config
////							  					$config['allowed_types'] = 'mp4';
////
////							  break;
////						}
//						
//						
//					$config['max_size']	= '';
//					$config['max_width']  = '';
//					$config['max_height']  = '';
//					$this->load->library('upload', $config);
//					
//					if ( ! $this->upload->do_upload())
//					{
//						$error = array('error' => $this->upload->display_errors());
//						//$this->load->view('uploadform', $error);
//					}
//					else
//					{
//						$data = $this->upload->data();
//						$name_array[] = $data['file_name'];
//					}
//					
//					
//					
//					//$this->upload->do_upload();
////					$data = $this->upload->data();
////					$name_array[] = $data['file_name'];
//					}
//					$names = implode(',', $name_array);
//					/* $this->load->database();
//					$db_data = array('id'=> NULL,
//					'name'=> $names);
//					$this->db->insert('testtable',$db_data);
//					*/	
//					$this->customermodel->temp_upload_images($names); 
//					echo json_encode($names);
//}

   function insertlinks($pid,$uid){
	   $data=array(
	       'like_on'=>$pid,
	       'liked_by'=>$uid,
		   
	   );
	 $res=$this->customermodel->insertlinks($data);
	 if($res){		 
		 echo "success";
	 }	   
   }
   
     function eventinsertlinks($pid,$uid){
	   $data=array(
	       'like_on'=>$pid,
	       'liked_by'=>$uid,
		   
	   );
	 $res=$this->customermodel->eventinsertlinks($data);
	 if($res){		 
		 echo "success";
	 }	   
   }
   
   function commentinsertlinks($pid,$uid){
	   $data=array(
	       'like_on'=>$pid,
	       'liked_by'=>$uid,
		   
	   );
	 $res=$this->customermodel->commentinsertlinks($data);
	 if($res){
		 
		 echo "success";
	 }	   
   }
   function photocommentinsertlinks($pid,$uid,$photoname){
	   $data=array(
	       'like_on'=>$pid,
	       'liked_by'=>$uid,
		   'photo_name'=>$photoname
	   );
	 $res=$this->customermodel->photocommentinsertlinks($data);
	 if($res){
		 
		 echo "success";
	 }	   
   }
   
   
      function event_comment_insertlinks($pid,$uid){
	   $data=array(
	       'like_on'=>$pid,
	       'liked_by'=>$uid,
		   
	   );
	 $res=$this->customermodel->event_comment_insert_links($data);
	 if($res){
		 
		 echo "success";
	 }	   
   }
    function insertcmplikes($pid,$uid){
	   $data=array(
	       'like_on'=>$pid,
	       'liked_by'=>$uid,
		   
	   );
	 $res=$this->customermodel->insertcmplikes($data);
	 if($res){
		 
		 echo "success";
	 }
	  
	   
   }
   
   function saveasfav($pid){
	     $user_id = $this->session->userdata('logged_in')['account_id'];
	     $data=array(
	       'post_id'=>$pid,
	       'user_id'=>$user_id,
		   
	   );
	 $res=$this->customermodel->insertfav($data);
	 if($res){
		 
		 echo "success";
	 }
   }
   
   
    public function write_comment($id){
		
	   $data=array(
	   'comment_content'=>$this->input->post('write_comment'),
	   'commented_on'=>$this->input->post('post_id'),
	   'commented_by'=>$this->input->post('posted_by'),
	   'uploadedfiles' => $this->doupload('uploadCommentPhotos'.$id)
	   );
	  
	  //$data['uploadedfiles'] = $this->doupload('uploadCommentPhotos');
	   $res=$this->customermodel->write_comments($data);
	  // $res=$this->customer->write_comments($data);
	   redirect('profiles');
	   
   }
   public function write_photo_comment($id,$image){
	  
	   $up_res = $this->ajax_image_upload('uploadImgCommentPhotos'.$id);
	   if($up_res['status'] || $_POST['write_comment']!=''){
	   if($up_res['status'])
	   $file_name = $up_res['message'];
	   else
	   $file_name = '';
	   $data=array(
	   'comment'=>$_POST['write_comment'],
	   'post_id'=>$_POST['post_id'],
	   'user_id'=>$_POST['posted_by'],
	   'img_commented_on'=>$image,
	   'uploaded_files' => $file_name
	   );
	 
	  //$data['uploadedfiles'] = $this->doupload('uploadCommentPhotos');
	 //$this->customermodel->write_photo_comments($data);
	   
	  // $res=$this->customer->write_comments($data);
	   //redirect('profiles');
	   if($this->customermodel->write_photo_comments($data)){
		echo 'success';   
	   }
	   }
	   else{
		   echo $up_res['message'];
	   }
	   
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
		
		
		$config['upload_path'] = './uploads/';
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
 public function post_comment_by_ajax()
   {
	
	 $file_name = "uploadCommentPhotos".$_POST['post_id'];
	
	   if(isset($_FILES[$file_name]["type"]) && !empty($_FILES[$file_name]["type"][0]))
	
{
	
	
$validextensions = array("jpeg", "jpg", "png");

$filename = implode("",$_FILES[$file_name]["name"]);

$temporary = explode(".",$filename);

$file_extension = end($temporary);


if((($_FILES[$file_name]["type"][0] == "image/png") || ($_FILES[$file_name]["type"][0] == "image/jpg") || ($_FILES[$file_name]["type"][0] == "image/jpeg")
) && ($_FILES[$file_name]["size"][0] < 1000000)//Approx. 100kb files can be uploaded.
&& in_array($file_extension, $validextensions)) {
	
if ($_FILES[$file_name]["error"][0] > 0)
{
echo "Return Code: " . $_FILES[$file_name]["error"][0] . "<br/><br/>";
}
else
{


$config['upload_path'] = './uploads/';
$sourcePath = $_FILES[$file_name]['tmp_name'][0]; // Storing source path of the file in a variable
//$targetPath = "F:\/xampp\/htdocs\/bzzbook\/uploads\/".$_FILES[$file_name]['name'][0];
$targetPath = $config['upload_path'].$_FILES[$file_name]['name'][0]; // Target path where file is to be stored
move_uploaded_file($sourcePath,$targetPath) ; 


$data=array(
	   'comment_content'=> $_POST['write_comment'],
	   'commented_on'=> $_POST['post_id'],
	   'commented_by'=> $_POST['posted_by'],
	   'uploadedfiles' => $filename
	   );
	   
//print_r($data);

  $res=$this->customermodel->write_comments($data);
  $data['post_id'] = $_POST['post_id'];
  echo $this->load->view('single_post',$data);  

}
 }
else
{
echo "<span id='invalid'>***Invalid file Size or Type***<span>";
}
	
}else if($_POST['write_comment'] != '')
{
$data_a=array(
	   'comment_content'=> $_POST['write_comment'],
	   'commented_on'=> $_POST['post_id'],
	   'commented_by'=> $_POST['posted_by'],
	   'uploadedfiles' => ''
	   );
	   
//print_r($data);

  $res=$this->customermodel->write_comments($data_a);
            
  $data['post_id'] = $_POST['post_id'];
  echo $this->load->view('single_post',$data);  
}else{
	return false;
}
   }

 public function write_event_comment($id){
		
	   $data=array(
	   'comment_content'=>$this->input->post('write_comment'),
	   'commented_on'=>$id,
	   'commented_by'=>$this->input->post('posted_by'),
	   'uploadedfiles' => $this->doupload('uploadCommentPhotos'.$id)
	   );
	  $event_id = $this->input->post('event_id');
	  //$data['uploadedfiles'] = $this->doupload('uploadCommentPhotos');
	   $res=$this->customermodel->write_event_comments($data);
	  // $res=$this->customer->write_comments($data);
	   redirect('profile/eventview/'.$event_id);
	   
   }
    public function write_cmp_comment($cmp_post_id,$cmp_id){
		
	   $data=array(
	   'comment_content'=>$this->input->post('write_comment'),
	   'commented_on'=>$this->input->post('post_id'),
	   'commented_by'=>$this->input->post('posted_by'),
	   'uploadedfiles' => $this->doupload('CmpCommentPhotos'.$cmp_post_id)
	   );
	   $res=$this->customermodel->write_cmp_comments($data);
	  // $res=$this->customer->write_comments($data);
	   redirect('company/company_disp/'.$cmp_id);
	   
   }
    
   
   function checkpass($pass){
	    $id = $this->session->userdata('logged_in')['account_id'];
	    $condition = "password =" . "'" . md5($pass) . "'"." and user_id=$id";
		$this->db->select('*');
		$this->db->from('bzz_users');
		$this->db->where($condition);
		$query = $this->db->get();
		if ($query->num_rows() == 1) {
			echo true;
		} else {
		    echo false;
		}
	   
   }
  
   public function forgetpwd($user_email)
   {
	    $condition ="user_email ="."'".$user_email."'";
		$this->db->select('*');
		$this->db->from('bzz_users');
		$this->db->where($condition);
		$query = $this->db->get();
		if ($query->num_rows() == 1) {
			echo true;
		} else {
		    echo false;
		}
	   
   }
      public function username_check($user_name)
   {
	    $condition ="username ="."'".$user_name."'";
		$this->db->select('*');
		$this->db->from('bzz_users');
		$this->db->where($condition);
		$query = $this->db->get();
		if ($query->num_rows() >= 1) {
			echo true;
		} else {
		    echo false;
		}
	   
   }
   
   
   
   public function user_email_check($user_email)
   {
	    $condition ="user_email ="."'".$user_email."'";
		$this->db->select('*');
		$this->db->from('bzz_users');
		$this->db->where($condition);
		$query = $this->db->get();
		if ($query->num_rows() >= 1) {
			echo true;
		} else {
		    echo false;
		}
	   
   }
   
       public function pwd_reset($usermail)
	{
	  $data['usermail'] =  $usermail;
	   $this->load->view('password_reset',$data);
    }
	
   public function reset_pwd()
   {
	   $user_email = $this->input->post('usermail');	
	   $password = md5($this->input->post('password'));
	   $data['result'] = $this->customermodel->reset_password($user_email,$password);
	  // $this->session->set_flashdata('reset_success', 'Your password Reset Done Sucessfully you Can login With new Password!...');
	 //  redirect('/signg_in');
   }
 
 public function reset_pwd_sendmail($usermail)
{
	
	
	/*
		$config['protocol'] = 'smtp';
		$config['smtp_host'] = 'ssl://smtp.googlemail.com';
		$config['smtp_port'] = 465;
		$config['smtp_user'] = 'mr.s.sivaprasad@gmail.com';
		$config['smtp_pass'] = 'Siv@prasad598';
*/
// Load email library and passing configured values to email library
		$mail = $usermail;
		//$this->load->library('encrypt');
		//$usermail = $this->encrypt->encode($usermail);
		$user_name = 'bzzBook';
		//;$this->load->library('email',$config);
		$this->email->set_newline("\r\n");
		$this->email->from('support@bzzbook.com',$user_name);
		$this->email->to($mail,'user');
		$this->email->subject('bzzbook Pasword Reset');
		$message = "Please Click Below Link To Resest Your Acount Password  \n";
		$message .= "www.bzzbook.com/signg_in/pwd_reset/".$usermail;
		$this->email->message($message);
		if($this->email->send())
		{
		    $this->session->set_flashdata('cust_success', 'Your pasword Reset Link Sent to your email');
			redirect('/signg_in');
			//echo "mail sent";
			//echo $this->email->print_debugger();
		}else
		{
			$this->session->set_flashdata('cust_success', 'Cannot send Password Reset link to your e-mail address');
			redirect('/signg_in');
				//	echo "mail not sent";
		}

}

public function emailTest()
{
	
	$config = Array(		
		    'protocol' => 'smtp',
		    'smtp_host' => 'ssl://smtp.googlemail.com',
		    'smtp_port' => 465,
		    'smtp_user' => 'ayatasdev@gmail.com',
		    'smtp_pass' => 'Ayatas123',
		    'smtp_timeout' => '4',
		    'mailtype'  => 'html', 
		    'charset'   => 'iso-8859-1'
		);

$this->load->library('email', $config);
$this->email->set_newline("\r\n");

//Add file directory if you need to attach a file
$to ='sivaprasad@ayatas.com';
$this->email->from('manikanta@ayatas.com', 'Sending Name');
$this->email->to($to); 

$this->email->subject('Email Subject');
$this->email->message('Email Message'); 

if($this->email->send()){
   //Success email Sent
   echo $this->email->print_debugger();
   echo $to;
}else{
   //Email Failed To Send
   echo $this->email->print_debugger();
}
}
 
 
public function recent_posts($recent_post_id)
{
  	    $id = $this->session->userdata('logged_in')['account_id'];
		
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
	   
	   $this->db->from('bzz_posts');
	$user_time_condition  = "post_id > '".$recent_post_id."' AND posted_on >= DATE_ADD( NOW(), INTERVAL - 5 MINUTE ) AND isGhostpost=0 ORDER BY post_id DESC";	
	   //$this->db->limit(10);
	
   $this->db->where($user_time_condition);
//   $this->db->order_by("post_id","desc");
	   $query = $this->db->get();
   	   if ($query->num_rows() > 0) {
	   		$result =  $query->result();
			$data = array();
			foreach($result as $res){
		    $friend_ids = explode(',',$res->posted_to);
				
			if(($res->posted_to==0 && in_array($res->posted_by,$friends)) || ($res->isGhostpost==1 && in_array($res->posted_by,$friends)) || ($res->posted_by==$id && $id==$cur_usr_id) || (in_array($id, $friend_ids) && $id==$cur_usr_id) ||  (!empty($pst_usr_id) && in_array($pst_usr_id, $friend_ids)) || ($res->posted_by==$id && in_array($cur_usr_id, $friend_ids)))
			{
				$data['products'][] = $res;
			}
			}
			
			if(!empty($data))
			{
			echo $this->load->view('recent_posts',$data);	
			}
			
			   } 
	   else 
	   echo false;

}

//dynamic display of likes count

public function get_recent_post_likes()
{
	$this->db->select('like_on');   
    $this->db->from('bzz_likes');
	$user_like_condition  = "datetime >= DATE_ADD( NOW(), INTERVAL - 5 MINUTE ) ORDER BY like_id DESC";	
	   
    $this->db->where($user_like_condition);
	   $query = $this->db->get();
   	   if ($query->num_rows() > 0) {
	   		$result =  $query->result_array();
			$data =  array();
			foreach($result as $res)
			{
				$data[] =  $res['like_on'];
			}
			$result = array_unique($data);
			//print_r($result);
			$like = array();
			$like_data =  array();
			foreach($result as $res)
			{
				$condition = "like_on = '".$res."' AND like_status = 'Y'";	
				$this->db->select('*');
				$this->db->from('bzz_likes');
				$this->db->where($condition);
				$query = $this->db->get();
				$likes = $query->num_rows();
				$like_data['post_id'] = $res;
				$like_data['likes'] = $likes;
				$like[] = $like_data;
			}

			if($likes){
				echo '{"success":"true","likes":'.json_encode($like).'}';
			//echo json_encode($like);
			}

		//	print_r($like);
	
		//	print_r($like);
}else{
echo '{"success":"false"}';
}

}

public function get_recent_post_comments()
{
	$this->db->select('*');   
    $this->db->from('bzz_postcomments');
	$user_like_condition  = "commented_time >= DATE_ADD( NOW(), INTERVAL - 5 MINUTE ) ORDER BY postcomments_id DESC";	
	   
    $this->db->where($user_like_condition);
	   $query = $this->db->get();
   	   if ($query->num_rows() > 0) {
	   		$result =  $query->result_array();

			if($result){
			echo '{"success":"true","comments":'.json_encode($result).'}';
			}


	//	print_r($like);
		//	print_r($like);
		}
		else{
		echo '{"success":"false"}';
		}

}

public function get_recent_single_post_data()
{
	if($_POST['postcomments_id'] > $_POST['last_comment'] )
	{
	
	$data['postcomments_id'] = $_POST['postcomments_id'];
	$data['comment_content'] = $_POST['comment_content'];
	$data['commented_on'] = $_POST['commented_on'];
	$data['commented_by'] = $_POST['commented_by'];
	$data['commented_time'] = $_POST['commented_time'];
	$data['uploadedfiles'] = $_POST['uploadedfiles'];
	//$data['last_comment'] = $_POST['last_comment'];
	
	echo $this->load->view('single_comment',$data);
	}else
	{
		echo false;
	}
}

public function comment_count_data($pid){
	   
		$this->db->select('*');
		$this->db->from('bzz_postcomments');
		$this->db->where('commented_on',$pid);
		$query = $this->db->get();
		//return $query->num_rows();
		echo $query->num_rows();
		
   }


   public function comments_data_viewmore($pid,$last_comment_id = '' ){
	   if($last_comment_id == '')
	   {
	   $condition = "commented_on =" . "'" . $pid . "' and (comment_content != '' OR uploadedfiles!='')";
	   }else{
	   $condition = "commented_on =" . "'" . $pid . "' and postcomments_id >" ."'".$last_comment_id ."'and (comment_content != '' OR uploadedfiles!='')";  
	   }
		
		$this->db->select('*');
		$this->db->from('bzz_postcomments');
		$this->db->where($condition);		
		$this->db->limit(5);
		$query = $this->db->get();
		$data['comments'] = $query->result_array(); 
		echo $this->load->view('viewmore_comment',$data);
   }

public function save_fav_category_search($search_keyword,$user_id)
{
	
	$this->db->select('*')->from('bzz_save_fav_categories')->like('category_name', $search_keyword, 'both');
	$query = $this->db->get();
	$list= '';
	if( $query->num_rows >= 1)
	{
		
	}else
	{
	echo  $list = "<div class='new_cat_create' onclick='create_ave_fav_category(&#39".$search_keyword."&#39,".$user_id.");' style='height:36px; width:273px; border:2px solid grey;'> create category:".$search_keyword." </div> ";
	}

}

public function save_fav_create_category($category_name,$user_id)
{
	$data['category_name'] = $category_name;
	$data['created_by'] = $user_id;
	if($this->db->insert('bzz_save_fav_categories',$data))
	{
		echo true;
	}else{
		echo false;
	}
}
	

 }
?>