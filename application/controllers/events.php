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
		echo $id;
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

}
?>