<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Life_Events extends CI_Controller {
	 
	  public function __construct() {
        parent::__construct();
    }
	public function index()
	{
		$this->load->view('sign_in_v');
	}
	
	  public function add_new_job()
  {
	$start_date = $this->input->post('n_j_frm_years')."-".$this->input->post('n_j_frm_months')."-".$this->input->post('n_j_frm_days');
	if($this->input->post('n_j_status') == 'Y')
	{
	$end_date = date("Y-m-d");	
	}else{
	$end_date = $this->input->post('n_j_to_years')."-".$this->input->post('n_j_to_months')."-".$this->input->post('n_j_to_days');
	}
	
			$add_job_info = array(
	    'employer'=>$this->input->post('n_j_employer'),
		'position'=>$this->input->post('n_j_position'),
		'location'=>$this->input->post('n_j_location'),
		'story'=>$this->input->post('n_j_story'),
		'life_event_type'=>$this->input->post('n_j_type'),
		'from_date'=>$start_date,
		'to_date'=>$end_date,
		'exact_date'=>$end_date,
		'curent_work_or_stud'=>$this->input->post('n_j_status'),
		'uploaded_files' => $this->doupload($this->input->post('n_j_images')),
		'user_id'=>$this->session->userdata('logged_in')['account_id']
	
		);
		
        $result = $this->life_events_model->insert_new_job_event($add_job_info);
		redirect('/Profile/about_me');
		//$this->load->view('footer');
		//mov_life_events();
		}
	
	  
	  
	  
	  	  public function add_retirement()
  {
	  
	  $retirement_date = $this->input->post('r_year')."-".$this->input->post('r_month')."-".$this->input->post('r_date');
	
			$add_retirement_info = array(
	    'title'=>$this->input->post('r_title'),
		'profession'=>$this->input->post('r_profession'),
		'with_or_whom'=>$this->input->post('r_with'),
		'story'=>$this->input->post('r_story'),
		'life_event_type'=>$this->input->post('r_type'),
		'location'=>$this->input->post('r_location'),
		'exact_date'=>$retirement_date,
		'uploaded_files' => $this->doupload($this->input->post('r_images')),
		'user_id'=>$this->session->userdata('logged_in')['account_id']
	
		);
		
	        $result = $this->life_events_model->insert_retirement_event($add_retirement_info);
		redirect('/Profile/about_me');
		//$this->load->view('footer');
		//mov_life_events();
		}





	  	  public function add_study_abroad()
  {
	  
	  $frm_date = $this->input->post('s_a_frmyear')."-".$this->input->post('s_a_frmmonth')."-".$this->input->post('s_a_frmdate');
	  
	  $to_date =  $this->input->post('s_a_to_years')."-".$this->input->post('s_a_to_months')."-".$this->input->post('s_a_to_days');
	
		$add_stu_abr_info = array(
	    'title'=>$this->input->post('s_a_title'),
		'school_name'=>$this->input->post('s_a_school'),
		'with_or_whom'=>$this->input->post('s_a_with'),
		'story'=>$this->input->post('s_a_story'),
		'life_event_type'=>$this->input->post('s_a_type'),
		'location'=>$this->input->post('s_a_location'),
		'studying'=>$this->input->post('s_a_studying'),
		'from_date'=>$frm_date,
		'to_date'=>$to_date,
		'exact_date'=>$to_date,
		'uploaded_files' => $this->doupload($this->input->post('s_a_images')),
		'user_id'=>$this->session->userdata('logged_in')['account_id']
	
		);
		
	    $result = $this->life_events_model->insert_study_abroad_event($add_stu_abr_info);
		redirect('/Profile/about_me');
		//$this->load->view('footer');
		//mov_life_events();
		}





	  	  public function add_engagement()
  {
	  
	  $engaged_date = $this->input->post('engage_year')."-".$this->input->post('engage_month')."-".$this->input->post('engage_date');
	
		$add_engagement_info = array(
	    'title'=>$this->input->post('engage_title'),
		'with_or_whom'=>$this->input->post('engage_with'),
		'story'=>$this->input->post('engage_story'),
		'life_event_type'=>$this->input->post('engage_type'),
		'location'=>$this->input->post('engage_location'),
		'exact_date'=>$engaged_date,
		'uploaded_files' => $this->doupload($this->input->post('engage_images')),
		'user_id'=>$this->session->userdata('logged_in')['account_id']
	
		);
		
	    $result = $this->life_events_model->insert_engagement_event($add_engagement_info);
		redirect('/Profile/about_me');
		//$this->load->view('footer');
		//mov_life_events();
		}

	  	  public function add_marriage()
  {
	  
	  $marriage_date = $this->input->post('mrg_year')."-".$this->input->post('mrg_month')."-".$this->input->post('mrg_date');
	
		$add_marriage_info = array(
	    'title'=>$this->input->post('mrg_title'),
		'with_or_whom'=>$this->input->post('mrg_with'),
		'story'=>$this->input->post('mrg_story'),
		'life_event_type'=>$this->input->post('mrg_type'),
		'location'=>$this->input->post('mrg_location'),
		'exact_date'=>$marriage_date,
		'uploaded_files' => $this->doupload($this->input->post('marriage_images')),
		'user_id'=>$this->session->userdata('logged_in')['account_id']
	
		);
		
	    $result = $this->life_events_model->insert_marriage_event($add_marriage_info);
		redirect('/Profile/about_me');
		//$this->load->view('footer');
		//mov_life_events();
		}





	  	  public function add_anniversary()
  {
	  
	  $anniversary_date = $this->input->post('ann_year')."-".$this->input->post('ann_month')."-".$this->input->post('ann_date');
	
		$add_anniversary_info = array(
	    'title'=>$this->input->post('ann_title'),
		'with_or_whom'=>$this->input->post('ann_partner'),
		'relationship'=>$this->input->post('ann_relationship'),
		'no_of_years'=>$this->input->post('ann_no_of_years'),
		'life_event_type'=>$this->input->post('ann_type'),
		'story'=>$this->input->post('ann_story'),
		'exact_date'=>$anniversary_date,
		'uploaded_files' => $this->doupload($this->input->post('anniversary_images')),
		'user_id'=>$this->session->userdata('logged_in')['account_id']
	
		);
		
		$result = $this->life_events_model->insert_anniversary_event($add_anniversary_info);
		redirect('/Profile/about_me');
		//$this->load->view('footer');
		//mov_life_events();
		}




	  	  public function add_child()
  {
	  
	  $child_birth_date = $this->input->post('ch_year')."-".$this->input->post('ch_month')."-".$this->input->post('ch_date');
	
		$add_child_info = array(
	    'title'=>$this->input->post('ch_title'),
		'child_name'=>$this->input->post('ch_name'),
		'with_or_whom'=>$this->input->post('ch_with'),
		'gender'=>$this->input->post('ch_gender'),
		'location'=>$this->input->post('ch_location'),
		'life_event_type'=>$this->input->post('ch_type'),
		'story'=>$this->input->post('ch_story'),
		'exact_date'=>$child_birth_date,
		'uploaded_files' => $this->doupload($this->input->post('child_images')),
		'user_id'=>$this->session->userdata('logged_in')['account_id']
	
		);
		
		$result = $this->life_events_model->insert_child_event($add_child_info);
		redirect('/Profile/about_me');
		//$this->load->view('footer');
		//mov_life_events();
		}

	  public function add_movedlocation()
  {
	  
	  $mov_date = $this->input->post('mov_year')."-".$this->input->post('mov_month')."-".$this->input->post('mov_date');
	
		$add_moved_info = array(
	    'title'=>$this->input->post('mov_title'),
		'where_to_addr'=>$this->input->post('mov_where_to'),
	    'address'=>$this->input->post('mov_address'),
		'from_addr'=>$this->input->post('mov_from'),
		'with_or_whom'=>$this->input->post('mov_with'),
		'life_event_type'=>$this->input->post('mov_type'),
		'story'=>$this->input->post('mov_story'),
		'exact_date'=>$mov_date,
		'uploaded_files' => $this->doupload($this->input->post('moved_images')),
		'user_id'=>$this->session->userdata('logged_in')['account_id']
	
		);
		

		$result = $this->life_events_model->insert_moved_event($add_moved_info);
		redirect('/Profile/about_me');
		//$this->load->view('footer');
		//mov_life_events();
		}



	  public function add_bought_home()
  {
	  
	  $bought_home_date = $this->input->post('bt_hme_year')."-".$this->input->post('bt_hme_month')."-".$this->input->post('bt_hme_date');
	
		$add_bought_home_info = array(
	    'title'=>$this->input->post('bt_hme_title'),
		'location'=>$this->input->post('bt_hme_location'),
		'house_type'=>$this->input->post('bt_hme_type'),
		'with_or_whom'=>$this->input->post('bt_hme_with'),
		'life_event_type'=>$this->input->post('bt_hme_type'),
		'story'=>$this->input->post('bt_hme_story'),
		'exact_date'=>$bought_home_date,
		'uploaded_files' => $this->doupload($this->input->post('bought_home_images')),
		'user_id'=>$this->session->userdata('logged_in')['account_id']
	
		);
		
	
		$result = $this->life_events_model->insert_bought_home_event($add_bought_home_info);
		redirect('/Profile/about_me');
		//$this->load->view('footer');
		//mov_life_events();
		}



	  public function add_newvehicle()
  {
	  
	  $vehicle_date = $this->input->post('n_v_year')."-".$this->input->post('n_v_month')."-".$this->input->post('n_v_date');
	
		$add_new_vehicle_info = array(
	    'title'=>$this->input->post('n_v_title'),
		'location'=>$this->input->post('n_v_location'),
		'car_type'=>$this->input->post('n_v_type'),
		'model'=>$this->input->post('n_v_model'),
		'model_year'=>$this->input->post('n_v_model_year'),
		'with_or_whom'=>$this->input->post('n_v_with'),
		'life_event_type'=>$this->input->post('n_v_type'),
		'story'=>$this->input->post('n_v_story'),
		'exact_date'=>$vehicle_date,
		'uploaded_files' => $this->doupload($this->input->post('n_v_images')),
		'user_id'=>$this->session->userdata('logged_in')['account_id']
	
		);
	
		$result = $this->life_events_model->insert_new_vehicle_event($add_new_vehicle_info);
		redirect('/Profile/about_me');
		//$this->load->view('footer');
		//mov_life_events();
		}



	  public function add_organ_donor()
  {
	  
	  $organ_donate_date = $this->input->post('o_d_year')."-".$this->input->post('o_d_month')."-".$this->input->post('o_d_date');
	
		$add_organ_donor_info = array(
	    'title'=>$this->input->post('o_d_title'),
		'location'=>$this->input->post('o_d_location'),
		'story'=>$this->input->post('o_d_story'),
		'life_event_type'=>$this->input->post('o_d_type'),
		'exact_date'=>$organ_donate_date,
		'user_id'=>$this->session->userdata('logged_in')['account_id']
		);
		
			$result = $this->life_events_model->insert_organ_donor_event($add_organ_donor_info);
		redirect('/Profile/about_me');
		//$this->load->view('footer');
		//mov_life_events();
		}



  public function add_quit_habit()
  {
	  
	  $quit_habit_date = $this->input->post('q_h_year')."-".$this->input->post('q_h_month')."-".$this->input->post('q_h_date');
	
		$add_quit_habit_info = array(
	    'title'=>$this->input->post('q_h_title'),
		'location'=>$this->input->post('q_h_location'),
		'story'=>$this->input->post('q_h_story'),
		'habit'=>$this->input->post('q_h_habit'),
		'life_event_type'=>$this->input->post('q_h_type'),
		'with_or_whom'=>$this->input->post('q_h_with'),
		'exact_date'=>$quit_habit_date,
		'uploaded_files' => $this->doupload($this->input->post('quit_habit_images')),
		'user_id'=>$this->session->userdata('logged_in')['account_id']
		);
		
			
		$result = $this->life_events_model->insert_quit_habit_event($add_quit_habit_info);
		redirect('/Profile/about_me');
		//$this->load->view('footer');
		//mov_life_events();
		}


  public function add_food_habit()
  {
	  
	  $food_habit_date = $this->input->post('n_h_year')."-".$this->input->post('n_h_month')."-".$this->input->post('n_h_date');
	
		$add_new_food_habit_info = array(
	    'title'=>$this->input->post('n_h_title'),
		'location'=>$this->input->post('n_h_location'),
		'story'=>$this->input->post('n_h_story'),
		'food_habit'=>$this->input->post('n_h_habit'),
		'life_event_type'=>$this->input->post('n_h_type'),
		'with_or_whom'=>$this->input->post('n_h_with'),
		'exact_date'=>$food_habit_date,
		'uploaded_files' => $this->doupload($this->input->post('new_food_habit_images')),
		'user_id'=>$this->session->userdata('logged_in')['account_id']
		);
		
			
		$result = $this->life_events_model->insert_new_food_habit_event($add_new_food_habit_info);
		redirect('/Profile/about_me');
		//$this->load->view('footer');
		//mov_life_events();
		}
		
		
 public function add_glasses()
  {
	  
	  $new_glasses_date = $this->input->post('glas_year')."-".$this->input->post('glas_month')."-".$this->input->post('glas_date');
	
		$add_new_glasses_info = array(
	    'title'=>$this->input->post('glas_title'),
		'location'=>$this->input->post('glas_location'),
		'story'=>$this->input->post('glas_story'),
		'life_event_type'=>$this->input->post('glas_type'),
		'glasses_type'=>$this->input->post('glas_type'),
		'with_or_whom'=>$this->input->post('glas_with'),
		'exact_date'=>$new_glasses_date,
		'uploaded_files' => $this->doupload($this->input->post('new_glasses_images')),
		'user_id'=>$this->session->userdata('logged_in')['account_id']
		);
		
			
		$result = $this->life_events_model->insert_new_glasses_event($add_new_glasses_info);
		redirect('/Profile/about_me');
		//$this->load->view('footer');
		//mov_life_events();
		}
		
		
		
		public function add_hobby()
  {
	  
	  $new_hobby_date = $this->input->post('n_h_year')."-".$this->input->post('n_h_month')."-".$this->input->post('n_h_date');
	
		$add_new_hobby_info = array(
	    'title'=>$this->input->post('n_h_title'),
		'location'=>$this->input->post('n_h_location'),
		'story'=>$this->input->post('n_h_story'),
		'life_event_type'=>$this->input->post('n_hobby_type'),
		'hobby'=>$this->input->post('n_h_hobby'),
		'with_or_whom'=>$this->input->post('n_h_with'),
		'exact_date'=>$new_hobby_date,
		'uploaded_files' => $this->doupload($this->input->post('new_hobby_images')),
		'user_id'=>$this->session->userdata('logged_in')['account_id']
		);
		
			
		$result = $this->life_events_model->insert_new_hobby_event($add_new_hobby_info);
		redirect('/Profile/about_me');
		//$this->load->view('footer');
		//mov_life_events();
		}
		
  public function add_voted()
  {
	  
	  $voted_date = $this->input->post('voted_year')."-".$this->input->post('voted_month')."-".$this->input->post('voted_date');
	
		$add_voted_info = array(
	    'title'=>$this->input->post('voted_title'),
		'life_event_type'=>$this->input->post('voted_type'),
		'story'=>$this->input->post('voted_story'),
		'candidate'=>$this->input->post('voted_candidate'),
		'exact_date'=>$voted_date,
		'uploaded_files' => $this->doupload($this->input->post('new_voted_images')),
		'user_id'=>$this->session->userdata('logged_in')['account_id']
		);
		
	
		$result = $this->life_events_model->insert_voted_event($add_voted_info);
		redirect('/Profile/about_me');
		//$this->load->view('footer');
		//mov_life_events();
		}
		
		
		
	 public function add_travel()
  {
	  $travel_frm_date = $this->input->post('travel_year')."-".$this->input->post('travel_month')."-".$this->input->post('travel_date');
	  $travel_to_date = $this->input->post('travel_to_year')."-".$this->input->post('travel_to_month')."-".$this->input->post('travel_to_date');
			
			
			$add_travel_info = array(
	    'title'=>$this->input->post('travel_title'),
		'trip_name'=>$this->input->post('travel_tripname'),
		'location'=>$this->input->post('travel_location'),
		'story'=>$this->input->post('travel_story'),
		'life_event_type'=>$this->input->post('travel_type'),
		'with_or_whom'=>$this->input->post('travel_with'),
		'from_date'=>$travel_frm_date,
		'to_date'=>$travel_to_date,
		'exact_date'=>$travel_to_date,
		'uploaded_files' => $this->doupload($this->input->post('travel_images')),
		'user_id'=>$this->session->userdata('logged_in')['account_id']
	
		);
	
        $result = $this->life_events_model->insert_travel_event($add_travel_info);
		redirect('/Profile/about_me');
		//$this->load->view('footer');
		//mov_life_events();
		}
	
		
		
	
		
		
		
		
		

  function doupload($filename='',$imgs_id='') {
					$name_array = array();
					if($filename=='')
					$count = count($_FILES[$imgs_id]['size']);
					else
					$count = count($_FILES[$filename]['size']);
					foreach($_FILES as $key=>$value)
					for($s=0; $s<=$count-1; $s++) {
					$_FILES['userfile']['name']=$value['name'][$s];
					$_FILES['userfile']['type']    = $value['type'][$s];
					$_FILES['userfile']['tmp_name'] = $value['tmp_name'][$s];
					$_FILES['userfile']['error']       = $value['error'][$s];
					$_FILES['userfile']['size']    = $value['size'][$s];  
						$config['upload_path'] = './uploads/';
						$type = $_FILES['userfile']['type'];
						$config['allowed_types'] = 'gif|jpg|png';
						

						
					$config['max_size']	= '';
					$config['max_width']  = '';
					$config['max_height']  = '';
					$this->load->library('upload', $config);
					
					if ( ! $this->upload->do_upload())
					{
						$error = array('error' => $this->upload->display_errors());
						//$this->load->view('uploadform', $error);
					}
					else
					{
						$data = $this->upload->data();
						$name_array[] = $data['file_name'];
					}
		
					}
					$names= implode(',', $name_array);

						return $names;
}


}
?>