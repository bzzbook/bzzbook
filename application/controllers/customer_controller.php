<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class customer_controller extends CI_Controller {
	 
	  public function __construct() {
        parent::__construct();

    }

public function index()
{
	  $this->load->view('sign_up');
}
	
	
	public function customer_sign_up()
	{ 
     $this->load->view('customer_sign_up');
    }
   
   public function company_sign_up()
   {
	   $this->load->view('company_sign_up');
   }
	}

?>