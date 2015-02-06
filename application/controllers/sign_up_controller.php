<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class sign_up_controller extends CI_Controller {
	 
	  public function __construct() {
        parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('email');
		$this->load->library('session');

    }

	public function index()
	{
		$this->load->view('landing');
	}
	
	public function sign_up()
	{
		//server-side validations
		//$this->load->library('form_validation');

		$this->form_validation->set_rules('firstname','FirstName','trim|required|alpha|max_length[12]|xss_clean');
		$this->form_validation->set_rules('lastname','LastName','trim|required|alpha|max_length[12]|xss_clean');
		$this->form_validation->set_rules('email','Email','trim|required|valid_email|xss_clean');
		$this->form_validation->set_rules('phone_number','Phone Number','trim|required|xss_clean');
		$this->form_validation->set_rules('new_password','New Password','trim|required|xss_clean|md5');
		$this->form_validation->set_rules('birthdate','Birth Date','required|xss_clean');
		 //$this->form_validation->set_rules('gender','Gender','required');

		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('landing');
		}
		else
		{
			
		//Fetching input data from form
		$data['firstname'] = $this->input->post('firstname');
		$data['lastname'] = $this->input->post('lastname');
		$data['email'] = $this->input->post('email');
		$data['phone_number'] = $this->input->post('phone_number');
		$data['new_password'] = $this->input->post('new_password');
		$data['birthdate'] = $this->input->post('birthdate');
		$data['gender'] = $this->input->post('inlineRadioOptions');
		
		//sending form data to model
		$this->load->model('sign_up_model');
		$this->sign_up_model->sign_up($data);	
		$this->session->set_flashdata('success', 'Sign Up Successfully. We will get back to you shortly');
		redirect(base_url());
		$email = $this->input->post('email');
		$this->email($email);
		}
				
		
	}
	
	public function email($email)
	{
		
		//sending email to user
		
		$this->email->from('sivaprasad@ayatas.com','Sivaprasad');
		$this->email->to($email,' user');
		$this->email->subject('this is testing email.......');
		$this->email->message('hai this is message');
		$this->email->send();
		echo "email sent successfully";
			
	}
	
	public function sign_in()
	{
		$this->load->view('sign_in');
	
	}
	public function db_check_login()
	{
		$this->form_validation->set_rules('email','Email','trim|required|valid_email|xss_clean');
		$this->form_validation->set_rules('password','Password','trim|required|xss_clean');
		
		if($this->form_validation->run() == false)
		 {
		    $this->load->view('sign_in');
		  
		}else{
		  $email = $this->input->post('email');
		  $pwd = $this->input->post('password');
		  $this->load->model('sign_up_model');
		  $result =  $this->sign_up_model->sign_in($email,$pwd);
		echo $result;
		/* if($result)
  			 {
    			 $sess_array = array();
     		   	foreach($result as $row)
     			{
       				$sess_array = array(
         'id' => $row->id,
         'username' => $row->username
       );
       $this->session->set_userdata('logged_in', $sess_array);
     }
     return TRUE;
   }
   else
   {
     $this->form_validation->set_message('check_database', 'Invalid username or password');
     return false;
   }
 }
		*/ 
		$this->load->view('posts');
		}
	}

}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
?>