<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class signg_up extends CI_Controller {
	 
	  public function __construct() {
        parent::__construct();

    }


    public function index()
    {
	  $this->load->view('sign_up');
    }
	
	public function sign_up()
	{
		//server-side validations
		//$this->load->library('form_validation');

		$this->form_validation->set_rules('firstname','FirstName','trim|required|alpha|max_length[12]|xss_clean');
		$this->form_validation->set_rules('lastname','LastName','trim|required|alpha|max_length[12]|xss_clean');
		$this->form_validation->set_rules('email','Email','trim|required|valid_email|xss_clean');
		$this->form_validation->set_rules('phone_number','Phone Number','trim|required|xss_clean');
		$this->form_validation->set_rules('new_password','New Password','trim|required|xss_clean');
		$this->form_validation->set_rules('birthdate','Birth Date','required|xss_clean');
		$this->form_validation->set_rules('gender','Gender','required');
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
		$data['new_password'] = md5($this->input->post('new_password'));
		$data['birthdate'] = $this->input->post('birthdate');
		$data['gender'] = $this->input->post('gender');
		
		//sending form data to model
		$this->load->model('sign_up');
		$this->sign_up->store($data);	
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
	
	}

?>