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
	 $data['post_content'] = $this->input->post('posts');
	 $data['uploaded_files'] = $this->doupload();
	 if($this->input->post('addedusers')!='')
	 {
		 $data['posted_to'] = $this->input->post('addedusers');
		 $data['isGhostpost'] = 1;
		  if($this->input->post('tagaddedusers')!='')
		  $data['tagged_friends'] = $this->input->post('tagaddedusers');
		 $this->customermodel->post_buzz($data); 
	 }
	 else if($this->input->post('post_group')==0)
	 {
		  $data['posted_to']='';
		  if($this->input->post('tagaddedusers')!='')
		  $data['tagged_friends'] = $this->input->post('tagaddedusers');
		   $this->customermodel->post_buzz($data);
		   echo "post saved successfully..."; 
		   redirect('profiles');
	 }
	 else
	 {
		 $result = $this->profile_set->get_groupmembers($this->input->post('post_group'));
		 $data['posted_to'] = $result[0]['group_members'];
		 if($this->input->post('tagaddedusers')!='')
		 $data['tagged_friends'] = $this->input->post('tagaddedusers');
		 $this->customermodel->post_buzz($data);
	 }
	 echo "post saved successfully..."; 
	 redirect('profiles');
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
		$user_name = 'Sivaprasad';
		//;$this->load->library('email',$config);
		$this->email->set_newline("\r\n");
		$this->email->from('sprasad96@gmail.com',$user_name);
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
 
 }
?>