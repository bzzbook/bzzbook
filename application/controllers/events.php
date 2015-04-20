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
	$data['cmp_info'] =  $this->companies->get_cmp_by_id($id);
	$data['event_info'] = $this->eventmodel->get_events_by_cmpid($id);
    $data['content']='cmp_events';
	$this->load->view('cmp-fulltemplate-view',$data);
	}
	public function create_event()
	{
		
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['create_thumb'] = TRUE;
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
			$event_info['event_image'] = $filedata['file_name'];
		
		}
	   
			$data = $this->upload->data();
	  	  // print_r($data);
		    $path = $data['full_path'];
		    $config['image_library'] = 'gd2';
			$config['source_image'] = $path;
			$config['create_thumb'] = TRUE;
			$config['maintain_ratio'] = TRUE;
			//$config['upload_path'] = './uploads/thumbs/';
			//$config['new_image'] = './uploads/thumbs/';
			$config['thumb_marker'] = '_eventcover';
			$config['width'] = 331;
			$config['height'] = 787;

			$this->load->library('image_lib', $config);
			$this->image_lib->initialize($config);
			$this->image_lib->resize();
			$event_image = $data['raw_name'].'_eventcover'.$data['file_ext'];
			
			$event_info = array(
			
		'event_name'=>$this->input->post('event_name'),
		'event_location'=>$this->input->post('event_location'),
		'event_date'=>$this->input->post('event_date'),
		'event_time'=>$this->input->post('event_time'),
		'event_description'=>$this->input->post('event_description'),
		'event_privacy'=>$this->input->post('event_privacy'),
		'event_cr_cmp'=>$this->input->post('event_cr_cmp'),
		'event_cr_user'=>$this->session->userdata('logged_in')['account_id']
		);
		echo "hail";
		exit;

        $event_id = $this->eventmodel->insert_event($event_info);
/*		if(!empty($event_id))
		{
			//$data['event_info'] = $this->eventmodel->get_events_by_cmpid($id)
			$data['event_info'] = $this->eventmodel->get_events_by_cmpid($this->uri->segment(3,0));
			$data['content']='cmp_events';
			$this->load->view('cmp-fulltemplate-view',$data);
		}*/
		
/*
	 parse_str($_POST['formdata'],$event_info);
	 $returninfo = $this->eventmodel->insert_event($event_info);
	 if($returninfo != false):
	  	$event_info['inserted_id'] = $returninfo;
	 //	echo $this->load->view('event_field');
	 else:
	 	return false;
	 endif;*/
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
}
?>