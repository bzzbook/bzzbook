<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class confirmation extends CI_Controller {
	 
	  public function __construct() {
        parent::__construct();
		$this->load->model('confirmaccount');
    }
	public function index()
	{
		$this->load->view('landing');
	}

	
	public function confirm($conf_code)
	{ 
	if($conf_code != '')
	{
		$user = $this->confirmaccount->confirmUserAccount($conf_code);
		if(!empty($user))
		{
			
			$activation_success = "Your Account Hasbeen Activated You Can Login into Your Account!..."
			$this->load->view('sign_in_v',$activation_success);
		}
	}
	
	}
	

}

?>