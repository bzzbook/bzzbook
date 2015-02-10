<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

session_start();

class sign_in_controller extends CI_Controller {
	 
	  public function __construct() {
        parent::__construct();
		
// Load form helper library
$this->load->helper('form');

	// Load form validation library
	$this->load->library('form_validation');
	// Load database
	$this->load->model('sign_in_model');
    }
	public function index()
	{ 
	
     $this->load->view('sign_in');
   }
	
	
	public function db_check_login()
	{
					$this->form_validation->set_rules('email','Email','trim|required|valid_email|xss_clean');
					$this->form_validation->set_rules('password','Password','trim|required|xss_clean');
		
	if($this->form_validation->run() == FALSE)
		 {
		   $this->load->view('sign_in');
		}else{
		$data = array(
					'email' => $this->input->post('email'),
					'password' => $this->input->post('password')
				    );
		$this->load->model('sign_in_model');
	    $result = $this->sign_in_model->sign_in($data);
	    if($result == TRUE){
		$sess_array = array(
		   					'email' => $this->input->post('email'),
		   					'password' => $this->input->post('password')
						   );
        $this->session->set_userdata('logged_in',$sess_array);
		print_r($this->session->userdata);
		$result = $this->sign_in_model->read_user_information($sess_array);
		if($result != false){
			$data = array(
						'email' =>$result[0]->email,
						'password' =>$result[0]->new_password
					     );
						//$this->load->view('posts', $data);
						redirect('/profile');
		}
						}else{
							$data['error_message'] = 'Invalid Username or Password';
							$this->load->view('sign_in', $data);
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
					$this->load->view('sign_in', $data);
  }
  
  public function send_post()
  {
	 
	 $this->load->model('customer_model');
	 $session_data = $this->session->userdata('logged_in');
	 $data['posted_by'] = $session_data['account_id'];
	 $data['post_content'] = $this->input->post('posts');
	 $this->customer_model->post_buzz($data);
	 echo"post saved successfully..."; 
	 redirect(site_url('customer_controller/view_post'));
   }
 }
?>