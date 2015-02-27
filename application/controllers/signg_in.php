<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

session_start();

class signg_in extends CI_Controller {
	 
	  public function __construct() {
        parent::__construct();

    }
	public function index()
	{ 
	
     $this->load->view('sign_in_v');
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
		   					'email' =>$result[0]->email,
						    'password' =>$result[0]->new_password,
							'account_id' =>$result[0]->account_id
							
						   );
		
        $this->session->set_userdata('logged_in',$sess_array);
		print_r($this->session->userdata);
		$result = $this->sign_inm->read_user_information($sess_array);
		if($result != false){
			$data = array(
						'email' =>$result[0]->email,
						'password' =>$result[0]->new_password
						
					     );
					
						 
						//$this->load->view('posts', $data);
						redirect('/profiles');
		}
						}else{
							$data['error_message'] = 'Invalid Username or Password';
							$this->load->view('sign_in_v', $data);
						}
					}
	}
	
  public function sign_out()
  {
	  				$sess_array = array(
                                        'email' => ''
                                       );
                    $this->session->unset_userdata('logged_in', $sess_array);
					$data['message_display'] = 'Successfully Logout';
					//redirect(base_url());
					$this->load->view('sign_in_v', $data);
  }
  
  public function send_post()
  {
	 
	 $this->load->model('customer_m');
	 $session_data = $this->session->userdata('logged_in');
	 $data['posted_by'] = $session_data['account_id'];
	 $data['post_content'] = $this->input->post('posts');
	 
	 $this->customer_m->post_buzz($data);
	 echo "post saved successfully..."; 
	 redirect('profiles');
	 // redirect(site_url('customer_controller/view_post'));
	 // redirect(site_url('customer/view_post'));
   }
   function insertlinks($pid,$uid){
	   $data=array(
	       'post_id'=>$pid,
	       'account_id'=>$uid,
		   'like'=>'yes'
	   );
	 $res=$this->customer_m->insertlinks($data);
	 if($res){
		 
		 echo "success";
	 }
	  
	   
   }
   
   
    public function write_comment(){
		
	   $data=array(
	   'comment'=>$this->input->post('write_comment'),
	   'post_id'=>$this->input->post('post_id'),
	   'account_id'=>$this->input->post('posted_by')
	   );
	  
	   $res=$this->customer_m->write_comments($data);
	   redirect('profiles');
	   
   }
    
   
   function checkpass($pass){
	   $user_id=$this->session->userdata['logged_in']['account_id'];
	     $condition = "new_password =" . "'" . $pass . "' and account_id=$user_id";
		$this->db->select('*');
		$this->db->from('sign_up');
		$this->db->where($condition);
		$query = $this->db->get();
		

		if ($query->num_rows() == 1) {
			echo "success";
		} else {
		    echo "failure";
		}
	   
   }
  
   
 }
?>