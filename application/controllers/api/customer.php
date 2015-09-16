<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class customer extends CI_Controller {
	 
	  public function __construct() {
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Access-Control-Allow-Origin");
		header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE, OPTIONS");
		header( "Access-Control-Allow-Headers: Authorization, Content-Type" );
        parent::__construct();
    }
	public function index()
	{
		$this->load->view('sign_in_v');
	}


	
	public function sign_up()
	{ 
	$this->load->model('lookup');
	$data['industry'] = $this->lookup->get_lookup_industry();
    $data['jobtype'] = $this->lookup->get_lookup_jobtype();
	$this->load->view('customer_sign_up',$data);
    }
   
   public function cust_sign_up()
   {
	    $this->form_validation->set_rules('firstname','FirstName','trim|required|alpha|xss_clean');
		$this->form_validation->set_rules('lastname','LastName','trim|required|alpha|xss_clean');
		$this->form_validation->set_rules('email','Email','trim|required|valid_email|xss_clean');
		$this->form_validation->set_rules('phone_number','Phone Number','trim|required|xss_clean');
	//	$this->form_validation->set_rules('user_name','User Name','trim|required|xss_clean');
		$this->form_validation->set_rules('password','Password','trim|required|xss_clean|md5');
		$this->form_validation->set_rules('dob','Birthday','required|xss_clean');
		$this->form_validation->set_rules('gender','Gender','required');
		/*$this->form_validation->set_rules('conf_password','Password Confirmation','trim|required|xss_clean|md5');
		$this->form_validation->set_rules('country','Country','required|xss_clean');
		$this->form_validation->set_rules('state','State','required|xss_clean');
		$this->form_validation->set_rules('city','City','required|xss_clean');
		$this->form_validation->set_rules('postal_code','Postal Code','required|xss_clean');			
		$this->form_validation->set_rules('position','Job Position','required|xss_clean');
		$this->form_validation->set_rules('industry','Industry','required|xss_clean');
		$this->form_validation->set_rules('companyname','Company Name','required|xss_clean');
		$this->form_validation->set_rules('office_phone','Office phone no','required|xss_clean');
		$this->form_validation->set_rules('fax','Fax','required|xss_clean');
		//$this->form_validation->set_rules('aboutme','About','required');
		//$this->form_validation->set_rules('intrests','Intrests','required');
    	//$this->form_validation->set_rules('skills','Skills','required');
		//$this->form_validation->set_rules('agree','Terms & Conditions','required');
		*/
		if($this->form_validation->run() == FALSE)
		{
			$data = array('success'=> false,'message'=>'Please check input fields');
							//header('Content-type: application/json');
							echo json_encode($data);
		}else{
		
		
		$user['user_email'] = $this->input->post('email');	
		//$user['username'] = $this->input->post('user_name');
		$user['password'] = $this->input->post('password');
		//$user['user_country'] = $this->input->post('country');
		//$user['user_state'] = $this->input->post('state');
		//$user['user_city'] = $this->input->post('city');
		//$user['user_postalcode'] = $this->input->post('postal_code');
		$user['user_type'] = 'user';
		$user['otp_timestamp'] = time();
		$user['access_token'] = md5(time());
		$this->load->model('person');
		if(!empty ($_POST['job_seaker_industries']) )
		{
		$options = $_POST['job_seaker_industries'];
		$data = implode(",",$options);
		
		$user_info['job_seaking_options'] =  $data;
		}
		
		
		if(!empty ($_POST['job_seaker_jobtypes']) )
		{
		$options = $_POST['job_seaker_jobtypes'];
		$data = implode(",",$options);
		
		$user_info['job_seaker_jobtypes'] =  $data;
		}
		/*print_r($_POST['job_seaker_industries']);
		print_r($_POST['job_seaker_jobtypes']);
		exit(0);*/
		
		$user_info['user_phoneno'] = $this->input->post('phone_number');		
		$user_info['user_firstname'] = $this->input->post('firstname');
		$user_info['user_lastname'] = $this->input->post('lastname');
		$user_info['user_dob'] = $this->input->post('dob');
		$user_info['user_gender'] = $this->input->post('gender');
		$user_info['access_token'] = $user['access_token'];
		//$user_info['con_password'] = $this->input->post('conf_password');
		//$user_info['user_jobtype'] = $this->input->post('position');
		//$user_info['user_industry'] = $this->input->post('industry');
		//$user_info['user_cmpname'] = $this->input->post('companyname');
		//$user_info['user_officephone'] = $this->input->post('office_phone');
		//$user_info['user_fax'] = $this->input->post('fax');
		//$user_info['user_intrests'] = $this->input->post('intrests');
		//$user_info['user_skills'] = $this->input->post('skills');
		//$user_info['user_about'] = $this->input->post('aboutme');
		//$user_info['user_terms_conditions'] = $this->input->post('agree');
	
		
		$email_check = $this->person->email_check($user['user_email']);
		$phone_check = $this->person->phone_check($user_info['user_phoneno']);
		if(empty($email_check) && empty($phone_check))
		{
		  
	   $string = '0123456789';
	   $string_shuffled = str_shuffle($string);
	   $password = substr($string_shuffled, 1, 4);   
	   
	   // Authorisation details.
	$username = "vijaykumar@ayatas.com";
	$hash = "ccb66e8f7e8e72edd3debe43956d8c6d00b8868a";

	// Configuration variables. Consult http://api.txtlocal.com/docs for more info.
	$test = "0";

	// Data for text message. This is the text message data.
	$sender = "Bzzbook"; // This is who the message appears to be from.
	$numbers = $user_info['user_phoneno']; // A single number or a comma-seperated list of numbers
	$message = "You OTP for account activation is ".$password;
	// 612 chars or less
	// A single number or a comma-seperated list of numbers
	$message = urlencode($message);
	$data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
	$ch = curl_init('http://api.txtlocal.com/send/?');
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$result = curl_exec($ch); // This is the result from the API
	curl_close($ch);
			   
		$confirmation_code = md5($password);
		$user['conf_code'] = $confirmation_code;	
			
		
		$user_id =  $this->person->sign_up($user);
		$user_info['user_id'] = $user_id;	
		$this->person->user_info($user_info);
		$this->person->user_settings($user_id);
		$this->person->user_sidebar_settings($user_id);
		$user_data = $this->person->get_user_details($user_id);
	/*	print_r($user_data);
		exit;*/
		$confirmation = 
		array( 
		  'conf_code' => $user_data[0]['conf_code'],
		  'conf_status' => 'N',
		  'user_id' => $user_id,
		  'access_token' => $user_info['access_token']
		);
		$this->load->model('confirmaccount');
		$this->confirmaccount->confirmation_insert($confirmation);
		//print_r($user_data);
		if($user_data)
		{
			//
		/*$config['protocol'] = 'smtp';
		$config['smtp_host'] = 'ssl://smtp.googlemail.com';
		$config['smtp_port'] = 465;
		$config['smtp_user'] = 'mr.s.sivaprasad@gmail.com';
		$config['smtp_pass'] = 'Siv@prasad598';*/

// Load email library and passing configured values to email library
		/*$username = '';
		$mail = $user_data[0]['user_email'];
		$this->load->library('email');
		$this->email->set_newline("\r\n");
		$this->email->from('mr.s.sivaprasad@gmail.com',$username);
		$this->email->to($mail);
		$this->email->subject('Confirmation mail for account activation');
		$message = "Please Click Below Link To Activate Your Acount  \n";
		$message .= "www.bzzbook.com/confirmation/confirm/".$user_data[0]['conf_code'];
		$this->email->message($message);
		if($this->email->send())
		{*/
			$data = array('success'=> true,'message'=>'Sign Up Successfully,To Activate Your account please use OTP sent to your mobile number','access_token'=>$user['access_token']);
							//header('Content-type: application/json');
			echo json_encode($data);
		   
		}else
		{
			$data = array('success'=> false,'message'=>'There is problem sending OTP to the given number');
							//header('Content-type: application/json');
			echo json_encode($data);
			
		}
		//}
		}
		else{ 
		
				
			$data = array('success'=> false,'message'=>'Bzzbook Account already created with this email or phone number, So Please try with another email or phone');
							//header('Content-type: application/json');
							echo json_encode($data);
					}	
		}
		exit(0);
   }
   public function dob_check($str)
	{
		if (!preg_match("/^[0-1][0-9]-[0-3][0-9]-[0-9]{4}$/",$str))
		{
			$this->form_validation->set_message('dob_check','date format should be mm-dd-yyyy');
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
	public function check_otp()
	{ 
	$access_token = $this->input->post('access_token');	
	$otp = $this->input->post('otp');
	if($otp != '')
	{
		$user = $this->confirmaccount->confirmUserAccountByOTP($access_token,$otp);
		if($user===true)
		{
			$data = array('success'=> true,'message'=>'Your Account Has been Activated You Can Login into Your Account!...');
							//header('Content-type: application/json');
			echo json_encode($data);
			
		}
		else{
		$data = array('success'=>false,'message'=>$user);
							//header('Content-type: application/json');
			echo json_encode($data);
		}
		
	}else{
		$data = array('success'=> false,'message'=>'Please input OTP and try again!...');
							//header('Content-type: application/json');
		echo json_encode($data);
	}
	exit(0);
	}
	
	public function regenerate_otp(){
		$access_token = $this->input->post('access_token');	
		
		$check_acctoken = $this->person->check_access_token($access_token);
		
		if($check_acctoken)
		{
				$user = array();
			    $string = '0123456789';
				$string_shuffled = str_shuffle($string);
				$password = substr($string_shuffled, 1, 4);   
				   
				// Authorisation details.
				$username = "vijaykumar@ayatas.com";
				$hash = "ccb66e8f7e8e72edd3debe43956d8c6d00b8868a";
				
				// Configuration variables. Consult http://api.txtlocal.com/docs for more info.
				$test = "0";
				
				// Data for text message. This is the text message data.
				$sender = "Bzzbook"; // This is who the message appears to be from.
				$numbers = $check_acctoken[0]['user_phoneno']; // A single number or a comma-seperated list of numbers
				$message = "You OTP for account activation is ".$password;
				// 612 chars or less
				// A single number or a comma-seperated list of numbers
				$message = urlencode($message);
				$data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
				$ch = curl_init('http://api.txtlocal.com/send/?');
				curl_setopt($ch, CURLOPT_POST, true);
				curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				$result = curl_exec($ch); // This is the result from the API
				curl_close($ch);
						   
				$confirmation_code = md5($password);
				$user['conf_code'] = $confirmation_code;
				$user['otp_timestamp'] = time();
				$user_id =  $this->person->update_otp($access_token,$user);
				if($user_id){		
				$data = array('success'=> true,'message'=>'Your new OTP is sent to your mobile number');
								//header('Content-type: application/json');
				echo json_encode($data);
				}
			
		}
		else{
		$data = array('success'=>false,'message'=>'Invalid authentication, please check your credentials');
							//header('Content-type: application/json');
			echo json_encode($data);
		}
		
	}
	
	
  public function send_invite()
  {
	  if(isset($_POST['submit']))
	  {
	    /*$this->form_validation->set_rules('email','Email','trim|required|valid_email|xss_clean');
	    $email = $this->input->post('email');
	    $this->email->from('sprasad96@gmail.com','Sivaprasad');
		$this->email->to($email,'user');
		$this->email->subject('this is testing email.......');
		$this->email->message('hai this is message');*/
		
				$headers = 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
             
                $to = $this->input->post('email');
                $from = 'support@bzzbook.com';
                $subject = "invitaion for friend";
                $message = 'hai friends';
                $this -> load -> library('email');
                $this -> email -> set_newline("\r\n");
                $this -> email -> from($from, 'Support bzzbook');
                $this -> email -> to($to);
                $this -> email -> subject($subject);
                $this -> email -> message($message);
               
		if($this->email->send())
		{
	//	echo $email;
		
		echo $this->email->print_debugger();
		}//redirect('/profiles');
	  else
		{ 
		 echo"wrong submission";  
	  }
	
	
/*	
$to = $this->input->post('email');
$subject = "My subject";
$txt = "Hello world!";
$headers = "From: webmaster@example.com" . "\r\n" .
"CC: somebodyelse@example.com";

mail($to,$subject,$txt,$headers);*/

  }}
  public function view_post()
	  {
		$data['result'] = $this->customer_m->view_post(); 
		$this->load->view('disp_post',$data); 
	  }
  
  
  public function postboard_update()
  {
	  parse_str($_POST['form_data'],$postboard_info);
	if($this->customermodel->managepostboarddata($postboard_info))
	echo "success";
	else
	return false;
  }
  
  public function password_update()
  {
	   parse_str($_POST['form_data'],$password_info);
	if($this->customermodel->passwordUpdate($password_info))
	echo "success";
	else
	return "failure";
  }
  public function updateabout()
  {
		parse_str($_POST['form_data'], $aboutformdata);
	   echo $this->customermodel->updateAboutInfo($aboutformdata);
  }
  public function updateprivacy()
  {
	  	parse_str($_POST['formdata'],$privacyformdata);
		echo $this->customermodel->updatePrivacyInfo($privacyformdata);
  }
  
  public function updateemailnotification()
  {
	  	parse_str($_POST['formdata'],$privacyformdata);
		echo $this->customermodel->updateEmailInfo($privacyformdata);
  }
    public function sidebarSettings()
  {
	  	parse_str($_POST['form_data'],$sidebar_data);
		
		echo $this->customermodel->updateSidebarSettings($sidebar_data);
  }
  public function manageducation()
  {
	  parse_str($_POST['formdata'],$education_info);
	  $returninfo = $this->customermodel->manageeducationdata($education_info);
	if($returninfo != false):
	  	$education_info['inserted_id'] = $returninfo;
	 	echo $this->load->view('education_field');
	 else:
	 	return false;
	 endif;
  }
  
  public function manageprofession()
  {
	  parse_str($_POST['formdata'],$profession_info);
	  $returninfo = $this->customermodel->manageprofessiondata($profession_info);
	  if($returninfo != false):
	  	$profession_info['inserted_id'] = $returninfo;
	  	echo $this->load->view('profession_field',$profession_info);
	 else:
	 	return false;
	 endif;
	  
  }
  
  public function manageorganization()
  {
	  
	  parse_str($_POST['formdata'],$organization_info);
	  $returninfo = $this->customermodel->manageorganizationdata($organization_info);
	  if($returninfo != false):
	  	$organization_info['inserted_id'] = $returninfo;
	  	echo $this->load->view('organization_field',$organization_info);
	 else:
	 	return false;
	 endif;
	  
  }
  
  public function managegroup()
  {
	   
	  parse_str($_POST['formdata'],$group_info);
	  $returninfo = $this->customermodel->managegroupdata($group_info);
	  if($returninfo != false):
	  	$group_info['inserted_id'] = $returninfo;
	  	echo $this->load->view('group_field',$group_info);
	 else:
	 	return false;
	 endif;
	  
  }
  public function upload_pic()
  {
	    $config['upload_path'] = DIR_FILE_PATH;
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '';
		$config['max_width']  = '';
		$config['max_height']  = '';

		$this->load->library('upload', $config);
	    $this->upload->initialize($config);
		
		if ( ! $this->upload->do_upload('profile_pic'))
		{
			$error = array('error' => $this->upload->display_errors());

			$this->load->view('uploadform', $error);
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());

			$this->load->view('uploadform', $data);
		}
  }

public function search_company()

{
	//$data['industry'] = $this->lookup->get_lookup_industry();
	$data['content']='companies_search';
	$this->load->view('full_content_view',$data);
	//$this->load->view('companies_search');
	
}

public function search_job()

{
	//$data['industry'] = $this->lookup->get_lookup_industry();
	$data['content']='jobs_search';
	$this->load->view('template-view',$data);
	//$this->load->view('jobs_search');
	
}
public function search_event()

{
	//$data['industry'] = $this->lookup->get_lookup_industry();
	$data['content']='events_search';
	$this->load->view('full_content_view',$data);
	//$this->load->view('events_search');
	
}
public function search_member()

{
	//$data['industry'] = $this->lookup->get_lookup_industry();
	$data['content']='members_search';
	$this->load->view('full_content_view',$data);
	//$this->load->view('members_search');
	
}

	public function do_upload()
	{
		$config['upload_path'] = DIR_FILE_PATH;
		$config['allowed_types'] = 'gif|jpg|png';
		$config['create_thumb'] = TRUE;
		$config['max_size']	= '';
		$config['max_width']  = '';
		$config['max_height']  = '';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());
			print_r($error);
			//$this->load->view('uploadform', $error);
		}
		else
		{
			$data = $this->upload->data();
	  	  // print_r($data);
		    $path = $data['full_path'];
		    $config['image_library'] = 'gd2';
			$config['source_image'] = $path;
			$config['create_thumb'] = TRUE;
			$config['maintain_ratio'] = FALSE;
			//$config['upload_path'] = './uploads/thumbs/';
			//$config['new_image'] = './uploads/thumbs/';
			$config['thumb_marker'] = '_thumb';
			$config['width'] = 91;
			$config['height'] = 91;

			$this->load->library('image_lib', $config);
			$this->image_lib->initialize($config);
			$this->image_lib->resize();
			$img_thumb = $data['raw_name'].'_thumb'.$data['file_ext'];

			//creating new image
			$path = $data['full_path'];
			$config_fav['source_image'] = $path;
		    $config_fav['image_library'] = 'gd2';
			$config_fav['maintain_ratio'] = FALSE;
			$config_fav['create_thumb'] = TRUE;
		//	$config_fav['upload_path'] = './uploads/favorite/';
			//$config_fav['new_image'] = './uploads/favorite/';
			$config_fav['thumb_marker'] = '_fav';
			$config_fav['width'] = 62;
			$config_fav['height'] = 62;

			$this->load->library('image_lib', $config_fav);
			$this->image_lib->initialize($config_fav);
			$this->image_lib->resize();
			$img_fav = $data['raw_name'].'_fav'.$data['file_ext'];
			
			
			//print_r($data);
			$file_id = $this->profile_set->add_pics($data['file_name'],$img_thumb,$img_fav);
			redirect('/profile/my_albums');
	}

	}
	
	public function my_photos()
	{
		
		$config['upload_path'] = DIR_FILE_PATH;
		$config['allowed_types'] = 'gif|jpg|png';
		$config['create_thumb'] = TRUE;
		$config['max_size']	= '';
		$config['max_width']  = '';
		$config['max_height']  = '';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());
			print_r($error);
			//$this->load->view('uploadform', $error);
		}
		else
		{
			$data = $this->upload->data();
			//print_r($data);
			$file_id = $this->profile_set->add_pics($data['file_name']);
			redirect('/profile/my_albums');
	}	
	}
	public function getpostcomments($post_id)
	{
		$curr_user_id = $this->session->userdata('logged_in')['account_id'];
		echo "<div id='res_comments".$post_id."'>";
           	       $comments_details = $this->customermodel->comments_data($post_id);
			       for($i=0;$i<count($comments_details);$i++){
				   // foreach($comments_details as $row_comment):
			       if($i<=4){ $com_user_data = $this->customermodel->profiledata($comments_details[$i]->commented_by); 	  $hrsago = $this->customermodel->get_time_difference_php($comments_details[$i]->commented_time);

                   echo "<div class='commentBox'>";
            echo "<figure> <a href='".base_url()."profile/post/".$com_user_data[0]->user_id."'><img style='width:50px;float:left;' src='".base_url()."uploads/"; if(!empty($com_user_data[0]->user_img_thumb)) echo $com_user_data[0]->user_img_thumb; else echo 'default_profile_pic.png';
			echo "' alt='".base_url()."uploads/";
			if(!empty($image[0]->user_img_thumb)) echo $image[0]->user_img_thumb; else echo 'default_profile_pic.png';
			echo "'></a></figure>
            <div class='postAComment'> 
            	<div class='postACommentInner'><span class='pfname' style='color:#5A5998;'><a href='".base_url().'profile/post/'.$com_user_data[0]->user_id."'>".ucfirst($com_user_data[0]->user_firstname)."&nbsp;".ucfirst($com_user_data[0]->user_lastname)."</a></span> <span class='date' style='color:black;'>";
			/*if($hr_final<24){?><?php echo $hr_final;?>hr<?php }else{
				echo  str_replace("-"," ",$days)."days ago";
			}*/ echo $comments_details[$i]->comment_content."</span><br />";
			$commentfiles = explode(',',$comments_details[$i]->uploadedfiles); 
			if(!empty($comments_details[$i]->uploadedfiles)) { 
			
			echo "<div style='padding-top:15px;'><img width='200px' height='200px' src='".base_url().'uploads/'.$commentfiles[0]."/></div>"; 
			} 
			echo $hrsago; 
			
					
			        $comment_likes = $this->customermodel->commentlikedata($comments_details[$i]->postcomments_id);
					$current_user_com_like_data = $this->customermodel->currentusercommentlikedata($comments_details[$i]->postcomments_id);
					if($current_user_com_like_data){
					//if(sizeof($comment_likes)>0){
//			       	$user_id=$comment_likes[0]->liked_by;
//					$like=$comment_likes[0]->like_status;
//					}
//					else
//					$like='';
//					 if(@$user_id == $user_id && $like=='Y'){
						 
					
				echo "<a href='javascript:void(0);' onclick='commentlikefun(".$comments_details[$i]->postcomments_id.','.$curr_user_id.','.count($comment_likes).")  id='cmt_link_like".$comments_details[$i]->postcomments_id."' style='padding-right:0px;'>Unlike";
               
			}else{
				echo "<a href='javascript:void(0);' onclick='commentlikefun(".$comments_details[$i]->postcomments_id.','.$curr_user_id.','.count($comment_likes).")' id='cmt_link_like".$comments_details[$i]->postcomments_id."' style='padding-right:0px;'>Like";
			 }
			 echo "</a>&nbsp;<span id='cmt_like_count".$comments_details[$i]->postcomments_id."'>";
			 $like_count = count($comment_likes); if($like_count>0) 
			 echo "<img src='".base_url()."images/like_myphotos.png' alt=''>".$like_count.'&nbsp;&nbsp;'."</span></div>
                    
              </div>
              <div class='clearfix'></div>
          </div>";
			
				   }
				   }
				   
				   // endforeach;
		    
             if(count($comments_details)>4){ 
            echo "<a href='#' onclick='view_comments(".$row->post_id.")' style='font-size:12px;'>View More</a>";
             }
         echo  "</div>";

		
		
	}
	public function get_industries(){
		$industries = $this->lookup->get_lookup_industry();
		if($industries)
		$data = array('success'=> true,'result'=>$industries);
		else
		$data = array('success'=> false,'result'=>'No suggestions found');	
		echo json_encode($data);
		exit(0);
	}
	public function get_jobtypes(){
		$jobtypes =  $this->lookup->get_lookup_jobtype();
		if($jobtypes)
		$data = array('success'=> true,'result'=>$jobtypes);
		else
		$data = array('success'=> false,'result'=>'No suggestions found');	
		echo json_encode($data);
		exit(0);
	}
	public function getProfileData($access_token){
	$user_res = $this->customermodel->get_user_id($access_token);	
	$session_data = $this->session->userdata('logged_in');
	$get_profiledata = $this->customermodel->profiledata($session_data['account_id']);	
	if($get_profiledata)
	$data = array('success'=> true,'result'=>$get_profiledata);
	else
	$data = array('success'=> false,'result'=>'No suggestions found');	
	echo json_encode($data);
	exit(0);
	}
	
	

}

?>