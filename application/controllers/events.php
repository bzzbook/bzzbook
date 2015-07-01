<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Events extends CI_Controller {
	 
	  public function __construct() {
        parent::__construct();

    }
	public function index()
	{
		$this->load->view('sign_in_v');
	}
	
	public function disp_events($id)
	{
	//	echo $id;
	//$id = $this->encrypt->decode($id);
	
	$data['cmp_info'] =  $this->companies->get_cmp_by_id($id);
	$data['event_info'] = $this->eventmodel->get_events_by_cmpid($id);
    $data['check_button'] =  $this->eventmodel->checkbutton($id);
	$data['content']='cmp_events';
	$this->load->view('cmp-fulltemplate-view',$data);
	
	}

	public function create_event()
	{
		
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
	    //$config['create_thumb'] = TRUE;
		$config['max_size']	= '';
		$config['max_width']  = '';
		$config['max_height']  = '';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());
			print_r($error);
			//$this->load->view('uploadform', $error);
		}
		else
		{
			$filedata = $this->upload->data();
		    $path = $filedata['full_path'];
		    $config['image_library'] = 'gd2';
			$config['source_image'] = $path;
			$config['create_thumb'] = TRUE;
			$config['maintain_ratio'] = FALSE;
			$config['thumb_marker'] = '_eventcover';
			$config['height'] = 331;
			$config['width'] = 787;
			$this->load->library('image_lib', $config);
			$this->image_lib->initialize($config);
			$this->image_lib->resize(); 
			$event_cover = $filedata['raw_name'].'_eventcover'.$filedata['file_ext'];
			
			$event_info = array(
			
		'event_name'=>$this->input->post('event_name'),
		'event_location'=>$this->input->post('event_location'),
		'event_date'=>$this->input->post('event_date'),
		'event_time'=>$this->input->post('event_time'),
		'event_description'=>$this->input->post('event_description'),
		'event_privacy'=>$this->input->post('event_privacy'),
		'event_cr_cmp'=>$this->input->post('cmp_id'),
		'event_image'=>$event_cover,
		'event_cr_user'=>$this->session->userdata('logged_in')['account_id']
	
		);
	
        $event_id = $this->eventmodel->insert_event($event_info);
		$this->disp_events($this->input->post('cmp_id'));
		}
	}
public function get_event_byid($id,$cmp_id)
{
		$data['cmp_info'] =  $this->companies->get_cmp_by_id($cmp_id);
		$data['event_info'] = $this->eventmodel->get_event_by_id($id);
		$data['content']='cmp_event_and_discussions';
		$this->load->view('cmp-fulltemplate-view',$data);
		
}

public function write_discussion($event_id,$cmp_id)
{
	//$data['cmp_info'] =  $this->companies->get_cmp_by_id($cmp_id);
	 $id = $this->session->userdata('logged_in')['account_id'];
	 $data=array(
	   'discussion_content'=>$this->input->post('discussion_content'),
	   'discussion_on'=>$event_id,
	   'discussion_by'=> $id,
	   'company_id' => $cmp_id
	   );
	 
	   $event = $this->eventmodel->insert_discussion($data);
	   $data['cmp_info'] =  $this->companies->get_cmp_by_id($cmp_id);
	   redirect('events/get_event_byid/'.$event_id."/".$cmp_id);
}

public function create_user_event()
{
	$event_info = array(
	'event_name'=>$this->input->post('event_name'),
	'event_location'=>$this->input->post('event_location'),
	'event_date'=>$this->input->post('event_date'),
	'event_time'=>$this->input->post('event_time'),
	'event_details'=>$this->input->post('event_details'),
	'event_type'=>$this->input->post('event_type'),
	'event_created_by'=>$this->session->userdata('logged_in')['account_id']
	);

   $event_id = $this->input->post('event_form_id');
   $event_action = $this->input->post('user_event_action');
 
	if($event_action == 'add')
		{
		$event_id = $this->eventmodel->insert_user_event($event_info);
		if($event_id)
		redirect('profile/events');
		else
			return false;
		}
		else if($event_action=='update')
		{
			//$educationInfo['educationinfo_id']=$data['edu_form_id'];
			$this->db->where('event_id', $event_id);
			if($this->db->update('bzz_user_events', $event_info))
			redirect('profile/events');
			else 
			return false; 
		}
	
	
	
	
	
	
}
public function change_event_going_sts($event_id,$status)
	{
		 $result = $this->eventmodel->event_going_sts($event_id,$status);
		 if($result)
		 return true;
		 else
		return false;
	}


public function send_event_invitation()
	{

	$data['result'] = $this->eventmodel->send_event_invitation_to_frnds($_POST['eventid'],$_POST['invited_users']);
	
	}
	
  public function usereventEdit()
  {
	 $data = $this->eventmodel->editEventDetails($_POST['user_event_id']);
	foreach( $data as $result):
		$event_data['event_name'] = $result->event_name;
		$event_data['event_details'] = $result->event_details;
		$event_data['event_location'] = $result->event_location;
		$event_data['event_date'] = $result->event_date;
		$event_data['event_time'] = $result->event_time;
		
	endforeach;
	echo json_encode($event_data);
  }
  
  public function inviteFriend()
  
{
	$data['result'] = $this->eventmodel->send_invite_to_frnd($_POST['frnd_id'],$_POST['event_id']);	
}

public function send_event_post()
{
	
	 
	 
	 $session_data = $this->session->userdata('logged_in');
	 $data['posted_by'] = $session_data['account_id'];
	 $data['posted_content'] = $this->input->post('post_content');
	 $data['uploaded_files'] =  $this->doupload($this->input->post('uploaduserevent_Photos'));
	 $data['event_id'] = $this->input->post('event_id');
		  if($this->input->post('added_tag_users')!='')
		  {
		 $data['tagged_users'] = $this->input->post('added_tag_users');
		  }
		 $this->eventmodel->post_event_buzz($data); 
	
		 echo "post saved successfully..."; 
		 redirect('profile/eventview/'.$this->input->post('event_id'));
	
}

public function send_event_post_two()
{
	
	 
	 
	 $session_data = $this->session->userdata('logged_in');
	 $data['posted_by'] = $session_data['account_id'];
	 $data['posted_content'] = $this->input->post('posted_content_two');
	 $data['uploaded_files'] =  $this->doupload($this->input->post('uploaduserevent_Photos1'));
	 $data['event_id'] = $this->input->post('event_id');
		  if($this->input->post('event_tagged_users')!='')
		  {
		 $data['tagged_users'] = $this->input->post('tagaddedusers2');
		  }
		 $this->eventmodel->post_event_buzz($data); 
	
		 echo "post saved successfully..."; 
		 redirect('profile/eventview/'.$this->input->post('event_id'));
	
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