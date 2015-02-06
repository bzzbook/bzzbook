<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class sign_in extends CI_Controller {
	 
	  public function __construct() {
        parent::__construct();

    }

	public function index()
	{ 
	
     $this->load->view('sign_in');
   }
   
	}

?>