<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Life_Events_Model extends CI_Model {

	function __construct()
    { 
   		parent::__construct(); 
  		
    } 
	
	   public function insert_new_job_event($data)
   {
	   
	if($this->db->insert('bzz_life_events',$data))
	return true;
	else
	return false;	
   }
   
     public function insert_retirement_event($data)
   {
	   
	if($this->db->insert('bzz_life_events',$data))
	return true;
	else
	return false;	
   }
	
	  public function insert_study_abroad_event($data)
   {
	   
	if($this->db->insert('bzz_life_events',$data))
	return true;
	else
	return false;	
   }
	
	  public function insert_engagement_event($data)
   {
	   
	if($this->db->insert('bzz_life_events',$data))
	return true;
	else
	return false;	
   }
	
	
   public function insert_marriage_event($data)
   {  
	if($this->db->insert('bzz_life_events',$data))
	return true;
	else
	return false;	
   }
	
	  public function insert_anniversary_event($data)
   {  
	if($this->db->insert('bzz_life_events',$data))
	return true;
	else
	return false;	
   }
	
		
	  public function insert_child_event($data)
   {  
	if($this->db->insert('bzz_life_events',$data))
	return true;
	else
	return false;	
   }
	
	
	 public function insert_moved_event($data)
   {  
	if($this->db->insert('bzz_life_events',$data))
	return true;
	else
	return false;	
   }
   
   		  public function insert_bought_home_event($data)
   {  
	if($this->db->insert('bzz_life_events',$data))
	return true;
	else
	return false;	
   }
   
    public function insert_new_vehicle_event($data)
   {  
	if($this->db->insert('bzz_life_events',$data))
	return true;
	else
	return false;	
   }
   
       public function insert_organ_donor_event($data)
   {  
	if($this->db->insert('bzz_life_events',$data))
	return true;
	else
	return false;	
   }
   
    public function insert_quit_habit_event($data)
   {  
	if($this->db->insert('bzz_life_events',$data))
	return true;
	else
	return false;	
   }
      public function insert_new_food_habit_event($data)
   {  
	if($this->db->insert('bzz_life_events',$data))
	return true;
	else
	return false;	
   }
   
   
       public function insert_new_glasses_event($data)
   {  
	if($this->db->insert('bzz_life_events',$data))
	return true;
	else
	return false;	
   }
   
    public function insert_new_hobby_event($data)
   {  
	if($this->db->insert('bzz_life_events',$data))
	return true;
	else
	return false;	
   }
   
   
     public function insert_voted_event($data)
   {  
	if($this->db->insert('bzz_life_events',$data))
	return true;
	else
	return false;	
   }
   
   
      
    public function insert_travel_event($data)
   {  
	if($this->db->insert('bzz_life_events',$data))
	return true;
	else
	return false;	
   }
   
      
       public function get_life_events_by_id($user_id){
		
		if($user_id!='')
		{
		$id = $user_id;
		
		}else{
		$id = $this->session->userdata('logged_in')['account_id'];
		}

		$condition = "user_id =" . "'" . $id . "'";
		$this->db->select('*');
		$this->db->from('bzz_life_events');
		$this->db->where($condition);
		$this->db->order_by('exact_date','desc');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result_array();
		} else {
		return false;
		}
   }
   
   
   
   
   
	}
?>
