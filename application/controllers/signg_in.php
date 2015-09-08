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
						    $curr_user_data= $this->customermodel->profiledata($result[0]['user_id']);
	 						$_SESSION['username'] = $curr_user_data[0]->username;
							
		
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
						   $curr_user_data= $this->customermodel->profiledata($result[0]['user_id']);
	 					   $_SESSION['username'] = $curr_user_data[0]->username;
						   
		
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
	    if(!isset($up_res['video']))
	 {
		 $up_res['video'] ="N";
	 }
	 //print_r($up_res); exit;
	   if(isset($up_res['status']))
	   $file_name = implode(',',$up_res['files']);
	   else
	   $file_name = '';
	   
	 $data['post_content'] = $_POST['posts'];
	 $data['uploaded_files'] = $file_name;
	  $data['video'] = $up_res['video'];
	 if($data['post_content']=='' && $data['uploaded_files']==''){
		echo 404; exit;
	 }
	 if($_POST['addedusers']!='')
	 {
		 $data['posted_to'] = $_POST['addedusers'];
		 $data['isGhostpost'] = 1;
		 $data['video'] = $up_res['video'];
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
		   $data['video'] = $up_res['video'];
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
		  $data['video'] = $up_res['video'];
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
						$config['upload_path'] = DIR_FILE_PATH;
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
// public function ajax_image_upload($file_name){
//	//print_r($_FILES); exit(0);
//	$n =  count($_FILES[$file_name]['name']);
//
//	for($i=0;$i<$n;$i++){
//	if(isset($_FILES[$file_name]["type"]) && !empty($_FILES[$file_name]["type"][$i]))	
//	{		
//		$validextensions = array("jpeg", "jpg", "png");
//		
//	
//		
//		$filename = implode(",",$_FILES[$file_name]["name"]);
//		echo $filename;
//		$temporary = explode(".",$filename);
//		print_r($temporary); echo "<br>";
//		$file_extension = end($temporary);
//		echo $file_extension;
//		exit;
//		
//		if((($_FILES[$file_name]["type"][$i] == "image/png") || ($_FILES[$file_name]["type"][$i] == "image/jpg") || ($_FILES[$file_name]["type"][$i] == "image/jpeg")
//		) && ($_FILES[$file_name]["size"][$i] < 1000000)//Approx. 100kb files can be uploaded.
//		&& in_array($file_extension, $validextensions)) {
//			
//		if ($_FILES[$file_name]["error"][$i] > 0)
//		{
//		$file_upload['status'] = false;
//		$file_upload['error_code'] = 2;
//		$file_upload['message'] =  "Return Code: " . $_FILES[$file_name]["error"][$i] . "<br/><br/>";
//		}
//		else
//		{
//		
//		$config['upload_path'] = DIR_FILE_PATH; 
//		//$config['upload_path'] = './uploads/';
//		$sourcePath = $_FILES[$file_name]['tmp_name'][$i]; // Storing source path of the file in a variable
//		//$targetPath = "F:\/xampp\/htdocs\/bzzbook\/uploads\/".$_FILES[$file_name]['name'][0];
//		$targetPath = $config['upload_path'].$_FILES[$file_name]['name'][$i]; // Target path where file is to be stored
//		move_uploaded_file($sourcePath,$targetPath) ; 
//		$file_upload['status'] = true;
//		$file_upload['message'] =  $filename;
//		
//		/*$data=array(
//			   'comment_content'=> $_POST['write_comment'],
//			   'commented_on'=> $_POST['post_id'],
//			   'commented_by'=> $_POST['posted_by'],
//			   'uploadedfiles' => $filename
//			   );
//			   
//		//print_r($data);
//		
//		  $res=$this->customermodel->write_comments($data);
//		  $data['post_id'] = $_POST['post_id'];
//		  echo $this->load->view('single_post',$data);  */
//		
//		}
//		 }
//		else
//		{
//		$file_upload['status'] = false;
//		$file_upload['error_code'] = 3;
//		$file_upload['message'] =  "<span id='invalid'>***Invalid file Size or Type***<span>";
//		}
//		
//	}else{
//		$file_upload['status'] = false;
//		$file_upload['error_code'] = 1;
//		$file_upload['message'] =  "File not uploaded";
//	}
//	}
//	return $file_upload;
//	 
//}
public function ajax_image_upload($file_name){
	//print_r($_FILES); exit(0);
	
	$n =  count($_FILES[$file_name]['name']);
	$validextensions = array("jpeg", "jpg", "png");
	$validvideoextensions = array('webm','mp4','ogg','ogv','wmv','3gp','3g2','3gpp','avi','mov','flv','MOV');
	//print_r($_FILES[$file_name]);
	for($i=0;$i<$n;$i++){
		if(isset($_POST['skipfiles']))
		{
		$skiplist = explode(',',$_POST['skipfiles']);		
		}
		else
		$skiplist = array();
		if(in_array($_FILES[$file_name]["name"][$i],$skiplist)){
		}else{
		$filetype = $_FILES[$file_name]["type"][$i];
		$filename = str_replace(' ', '', time().'_'.$_FILES[$file_name]["name"][$i]);
		$filesize = $_FILES[$file_name]["size"][$i];
		$fileerror = $_FILES[$file_name]["error"][$i];
		$tempname = $_FILES[$file_name]['tmp_name'][$i];
		
	
	if(isset($filetype) && !empty($filetype))	
	{		
		$temporary = explode(".",$filename);
		
		$file_extension = end($temporary);
		
		 if (isset($filename) && $filename != '' && ($filesize < 41943040)
		&& in_array($file_extension, $validvideoextensions)) {
            unset($config);
			$_FILES[$file_name]["name"] = $filename;
			$_FILES[$file_name]["type"] = $filetype;
			$_FILES[$file_name]["name"] = $filename;
			$_FILES[$file_name]["size"] = $filesize;
			$_FILES[$file_name]["error"] = $fileerror; 
			$_FILES[$file_name]['tmp_name'] = $tempname;
			
            $date = date("ymd");
            $configVideo['upload_path'] = 'uploads/';
            $configVideo['max_size'] = '41943040';
            $configVideo['allowed_types'] = 'webm|mp4|ogg|ogv|wmv|3gp|3g2|3gpp|avi|flv|mov|MOV';
            $configVideo['overwrite'] = FALSE;
            $configVideo['remove_spaces'] = TRUE;
            $video_name = $date.$filename;
            $configVideo['file_name'] = $video_name;
//print_r($configVideo);
            $this->load->library('upload',$configVideo);
            $this->upload->initialize($configVideo);
            if (!$this->upload->do_upload($file_name)) {
              $file_upload['status'] = false;		
			  $file_upload['message'] =  $this->upload->display_errors();
            } else {
                $videoDetails = $this->upload->data();
				$input = DIR_FILE_PATH.$video_name;
				$videoname = explode('.',$video_name);
				$output = DIR_FILE_PATH.$videoname[0].'.mp4';
				$imgoupt = DIR_FILE_PATH.$videoname[0].'.png';
				
				if($this->make_jpg($input, $output,$imgoupt)){
				$file_upload['status'] = true;		
			    $file_upload['files'][] =  $videoname[0].'.mp4';
				$file_upload['video'] = "Y";
				return $file_upload;
				}
				else{
				$file_upload['status'] = false;	
				$file_upload['message'] = 'upload failed due to some error';
				return false;
				}
            }
        }
		elseif((($filetype == "image/png") || ($filetype == "image/jpg") || ($filetype == "image/jpeg")
		) && ($filesize < 4194304)//Approx. 100kb files can be uploaded.
		&& in_array($file_extension, $validextensions)) {
			
		if ($fileerror > 0)
		{
		$file_upload['status'] = false;
		$file_upload['error_code'] = 2;
		$file_upload['message'] =  "Return Code: " . $fileerror . "<br/><br/>";
		}
		else
		{
		
		$config['upload_path'] = DIR_FILE_PATH; 
		//$config['upload_path'] = './uploads/';
		$sourcePath = $tempname; // Storing source path of the file in a variable
		//$targetPath = "F:\/xampp\/htdocs\/bzzbook\/uploads\/".$_FILES[$file_name]['name'][0];
		$targetPath = $config['upload_path'].$filename; // Target path where file is to be stored
		move_uploaded_file($sourcePath,$targetPath) ; 
		$file_upload['status'] = true;
		$file_upload['video'] = "N";
		$file_upload['files'][] =  $filename;
		
		    $path = DIR_FILE_PATH.$filename;
			$this->load->library('image_autorotate', array('filepath' => $path));
		    $config['allowed_types'] = 'gif|jpg|png';
			$config['create_thumb'] = TRUE;
			$config['max_size']	= '';
			$config['max_width']  = '';
			$config['max_height']  = '';
		    $config['image_library'] = 'gd2';
			$config['remove_spaces'] = TRUE;
			$config['create_thumb'] = TRUE;
			$config['maintain_ratio'] = TRUE;
			$config['source_image'] = $path;
			
			list($imagewidth, $imageheight, $imageType) = getimagesize($path);
			if($imagewidth>523){
				$default_width = 523;
				$entended_width = 900;
				$thumb_width = 182;
			}else{
				$default_width = $imagewidth;
				$entended_width = $imagewidth;
				$thumb_width = $imagewidth;
			}
			$config['thumb_marker'] = '_default';
			$config['width'] = $default_width;
			$config['height'] = 1;
			$config['master_dim'] = 'width';
			$this->load->library('image_lib', $config);
			$this->image_lib->initialize($config);
			$this->image_lib->resize();
			
			$config['thumb_marker'] = '_extended';
			$config['width'] = $entended_width;
			$config['height'] = 1;
			$config['master_dim'] = 'width';
			$this->load->library('image_lib', $config);
			$this->image_lib->initialize($config);
			$this->image_lib->resize();
			
			$config['thumb_marker'] = '_thumb';
			$config['width'] = $thumb_width;
			$config['height'] = 1;
			$config['master_dim'] = 'width';
			$this->load->library('image_lib', $config);
			$this->image_lib->initialize($config);
			$this->image_lib->resize();
		
		}
		 }
		else
		{
		$file_upload['status'] = false;
		$file_upload['error_code'] = 3;
		$file_upload['message'] =  "<span id='invalid'>***Image size should be less than 4mb and image should be in jpg,png,gif format***<span>";
		}
		
	}else{
		$file_upload['status'] = false;
		$file_upload['error_code'] = 1;
		$file_upload['message'] =  "File not uploaded";
	}
	}
	}
	//echo json_encode($file_upload); exit(0);
	if(isset($file_upload) && $file_upload)
	return $file_upload;
	else
	return false;
	 
	
		 }
public function make_jpg($input, $output, $imgoutput) { 
//$ffmpegpath = $_SERVER['DOCUMENT_ROOT'].'/bzzbook/ffmpeg.exe';

$ffmpegpath = '/usr/bin/avconv';
if(!file_exists($input)){ echo 'file not exists'; return false; }
$command = "$ffmpegpath -i $input $output";
//$command = "$ffmpegpath -i $input -vcodec libx264 $output";

/*$ext_array = explode('.',$input);
$ext = end($ext_array);
$exts = array('avi','wmv');
if(in_array($ext,$exts)){
$command = "$ffmpegpath -i $input -vcodec libx264 $output";
echo 'ext is avi or wmv'; exit;
}
else{ 
echo 'else'; exit;*/


//$imgcommand = "$ffmpegpath -i $input -vsync 1 -r 25 -an -y -qscale 1 $imgoutput";

//$command = "$ffmpegpath -i $input $output";
$imgcommand = "$ffmpegpath -i $input -ss 00:00:02 -vframes 1 $imgoutput";

@exec( $command, $ret );
@exec( $imgcommand, $ret );
if(!file_exists($output)){ echo 'file output not exist'; return false;}
if(filesize($output)==0) {echo 'file size 0'; return false; }
return true;
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


$config['upload_path'] = DIR_FILE_PATH;
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
		$message .= base_url()."signg_in/pwd_reset/".$usermail;
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
		$hidden_posts = $this->customermodel->get_hidden_posts($id);
		
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
	   
	    if(!empty($hidden_posts))
	 {
	   $this->db->where_not_in('post_id',$hidden_posts);
	 }
	
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

public function save_fav_category_search($search_keyword)
{
	
	$user_id = $this->session->userdata('logged_in')['account_id'];
	$query = $this->db->select('*')->from('bzz_save_fav_categories')->like('category_name', $search_keyword, 'both')->where('created_by',$user_id)->get();
	$list= '';
	if( $query->num_rows > 0)
	{
		$categories = $query->result_array();
		foreach($categories as $category)
		{
			$data = $this->save_as_favorites_m->get_category_image($category['category_id']);
			
			if(!empty($data[0]['favorite_image']))
			$data = $data[0]['favorite_image'];
			else
			$data = 'default_profile_pic.png';
			
		$list .='<div class="board-option-pin search_result">
                                    <span class="icon-img" style="background:url('.base_url().'uploads/'.$data.')"></span>
									<p>'.$category['category_name'].'</p>
                                     <a onclick="insert_save_as_favorite('.$category['category_id'].')" class="pinIcon">Add</a>
                                </div>';
		}
		
	}else
	{
	// $list .= "<div class='new_cat_create' onclick='create_ave_fav_category(&#39".$search_keyword."&#39,".$user_id.");' style='height:36px; width:273px; border:2px solid grey;'> create category:".$search_keyword." </div> ";
	$list .='<div class="board-option-pin CreateBoard" id="create_new_category">
                                    <a href="javascript:void(0)" onclick="create_save_fav_category(&#39'.$search_keyword.'&#39,'.$user_id.');">
                                        <span class="icon-create fa fa-plus"></span>
                                        <p>Create a Board : '.urldecode($search_keyword).' </p>
                                    </a>                                  
                                </div>';
	}
	echo $list;
}

public function save_fav_user_categories()
{
	
	$user_id = $this->session->userdata('logged_in')['account_id'];
	$query = $this->db->select('*')->from('bzz_save_fav_categories')->where('created_by',$user_id)->get();
	$list= '';
	
	 
	
	$list .='
	<div class="pin-it-column"> <div class="pin-categories-pinit">
                        <div class="pinBoard">
						<div class="fav_add_success" style="font-size:13px;"></div>
                            <h3>Pick a board</h3>
       <label><i class="fa fa-search"></i><input type="text" placeholder="Search" onkeyup="get_save_fav_categories(this.value);" id="save_fav_category_search"/></label>                            
                        </div><div class="user-option-block"><div class="nano has-scrollbar" style="height:410px;"><div class="nano-content" style="height:410px;">
						<div id="categories" >
						 <h2>All Boards</h2>';

	if( $query->num_rows > 0)
	{
		//$list .= '<h2>All Boards</h2><div class="user-option-block">';
		$categories = $query->result_array();
		foreach($categories as $category)
		{
			$data = $this->save_as_favorites_m->get_category_image($category['category_id']);
			
			if(!empty($data[0]['favorite_image']))
		{	$data = $data[0]['favorite_image'];
		}else{
			$data = 'default_profile_pic.png';
		}
		$list .='
		
		<div class="board-option-pin">
                                    <span class="icon-img" style="background:url( '.base_url().'uploads/'.$data.')"></span>
									<p>'.$category['category_name'].'</p>
                                    <a onclick="insert_save_as_favorite('.$category['category_id'].')" class="pinIcon">Add</a>
                                </div>';
		}
		
	}else
	{
	$list .='<div class="board-option-pin CreateBoard">
                                    <a href="javascript:void(0)" onclick="create_cat_focus();">
                                        <span class="icon-create fa fa-plus"></span>
                                        <p>Create a Board : </p>
                                    </a>                                  
                                </div>';
	}
	
	$list .= '</div></div></div></div></div></div>';
	echo $list;
}

public function insert_save_as_fav()
{
	$uploaded_file = explode('/',$_POST['uploaded_file']);
	$image_file_name = explode('.',end($uploaded_file));
	//$image_file_full_name = implode('.',$image_file_name);
	//print_r($image_file_name);
	$image = substr($image_file_name[0], 0, -9);  
	$uploded_img_file = $image.'.'.$image_file_name[1]; 
	
	
	
	$user_id = $this->session->userdata('logged_in')['account_id'];
	$this->db->select('*');
	$this->db->from('bzz_save_as_favorites');
	$this->db->where('category_id',$_POST['category_id']);
	$this->db->where('favorite_image',$uploded_img_file);
	if(isset($_POST['post_content']))
	{
		$this->db->where('favorite_post_content',$_POST['post_content']);
	}
	$query = $this->db->get();
	
	if($query->num_rows() > 0)
	{
		
	$update_data['category_id'] = $_POST['category_id'];
	$update_data['favorite_image'] = $uploded_img_file;
	if(isset($_POST['post_content']))
	{
	$update_data['favorite_post_content'] = $_POST['post_content'];
	}
	$update_data['favorite_by_user_id'] = $user_id;
	$update_data['created_time'] = date("Y-m-d H:i:s");
	
	$this->db->where('category_id',$_POST['category_id'])->where('favorite_image',$uploded_img_file)->where('favorite_post_content',$_POST['post_content'])->where('favorite_by_user_id',$user_id);
	$this->db->update('bzz_save_as_favorites',$update_data);
	}else
	{
	$data['category_id'] = $_POST['category_id'];
	$data['favorite_image'] = $uploded_img_file;
	if(isset($_POST['post_content']))
	{
	$data['favorite_post_content'] = $_POST['post_content'];
	}
	$data['favorite_by_user_id'] = $user_id;
	$this->db->insert('bzz_save_as_favorites',$data);
	
}
}


public function save_fav_create_category($category_name,$user_id)
{
	$data['category_name'] = urldecode($category_name);
	$data['created_by'] = $user_id;
	if($this->db->insert('bzz_save_fav_categories',$data))
	{
		echo $this->db->insert_id();
	
		
	}else{
		echo false;
	}
	
}
public function get_all_favorites_by_cat_id($category_id)
{
	$data = $this->save_as_favorites_m->get_all_favorites_by_category_id($category_id);
	$cat_result = $this->save_as_favorites_m->get_category_name($category_id);
 
	  $favorites = array();
	  if($data){
		foreach($data as $result):
		
		$favorites_data['favorite_id'] = $result['favorite_id'];
		$favorites_data['favorite_image'] = $result['favorite_image'];
		$favorites_data['favorite_post_content'] = $result['favorite_post_content'];
		$favorites_data['category_id'] = $result['category_id'];
		$favorites_data['created_time'] = $result['created_time'];
		$favorites_data['favorite_by_user_id'] = $result['favorite_by_user_id'];
		
		$favorites[] = $favorites_data;
		
	endforeach;
	  }
	$data['category_name'] = $cat_result[0]['category_name'];
	$data['content']='my_favorites_display';
	//$data['favorites'] = json_encode($favorites);
	//$data['favorites'] = json_encode(array('total'=> count($favorites),'result' => $favorites));
	
	$data['favorites'] = $favorites;
	
	
	$this->load->view('full_content_view',$data);

	
}
	
	
	public function save_albums()
	{
	 $this->load->model('customermodel');
	 $session_data = $this->session->userdata('logged_in');
	 
	 
	  $up_res = $this->ajax_image_upload('imagefile');
	//  echo $up_res['status'];
	   if($up_res['status'])
	   $file_name = implode(',',$up_res['files']);
	   else
	   $file_name = '';
	   
	   
	 $data['posted_by'] = $session_data['account_id'];
	 $data['uploaded_files'] = $file_name;
	 $data['album_id'] = $this->input->post('album_id');
	  
	 // print_r($data);
	  
	  $data = $this->customermodel->post_buzz($data);
	  if($data)
	  {
		  redirect('profile/my_albums/');
	  }


	}
	

 }
?>