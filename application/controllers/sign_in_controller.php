<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class sign_in_controller extends CI_Controller {
	 
	  public function __construct() {
        parent::__construct();

    }

	public function index()
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
		  $this->load->model('sign_in_model');
		  $data = $this->sign_in_model->sign_in($email,$pwd);
		  $this->load->view('posts',$data);
		  
		  $myresult = $this -> Customer_model -> cust_log();
			foreach ($myresult as $row) {
				$newdata = array('customerlogid' => $row -> customerlogid, );
				$this -> session -> set_userdata($newdata);
	}}}
?>