<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$is_logged = $this->session->userdata('logged_in');
		if($is_logged)
		{
		$data = array('content'=>'posts','user_id'=>'');
		$this->load->view('template-view',$data);
		}else{
		$this->load->view('sign_in_v');
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */