<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class sign_up_controller extends CI_Controller {
	 
	  public function __construct() {
        parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('email');

    }

	public function index()
	{
		$this->load->view('landing');
	}
	
	public function sign_up()
	{
		//server-side validations
		//$this->load->library('form_validation');
		$this->form_validation->set_rules('firstname','FirstName','trim|required|alpha|min_length[6]|max_length[12]');
		$this->form_validation->set_rules('lastname','LastName','trim|required|alpha|min_length[6]|max_length[12]');
		$this->form_validation->set_rules('email','Email','trim|required|valid_email');
		$this->form_validation->set_rules('phone_number','Phone Number','trim|required');
		$this->form_validation->set_rules('new_password','New Password','trim|required');
		$this->form_validation->set_rules('birthdate','Birth Date','required');
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
		echo "Data inserted successfully in database...";
		$email = $this->input->post('email');
		
		
		
		}
				
		
	}
	
	public function email()
	{
		
		//sending email to user
		
		$this->email->from('sivaprasad@ayatas.com','Sivaprasad');
		$this->email->to($email,'manikanta(Team Lead)');
		$this->email->subject('this is testing email.......');
		$this->email->message('hai this is message');
		$this->email->send();
		echo "email sent successfully";
			
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
?>