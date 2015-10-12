<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pagemodel extends CI_Model {
	function __construct()
    { 
   		parent::__construct(); 
  		
    } 
	public function get_page_data($page_id)
   {
	 	$condition = "page_id =" . "'" . $page_id . "'";
		$this->db->select('*');
		$this->db->from('bzz_pages');
		$this->db->where($condition);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result_array()[0];
		} else {
		return false;
		}
   }
   public function get_cover_images($page_id)
   {
	 	$condition = "page_id =" . "'" . $page_id . "'";
		$this->db->select('*');
		$this->db->from('bzz_cover_images');
		$this->db->where($condition);
		$this->db->order_by('id','desc');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
		return false;
		}
   }
   public function get_timeline_images($page_id)
   {
	 	$condition = "page_id =" . "'" . $page_id . "' AND uploaded_files!=''";
		$this->db->select('*');
		$this->db->from('bzz_page_posts');
		$this->db->where($condition);
		$this->db->order_by('post_id','desc');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			$result =  $query->result();
			$timeline_images = array();
			foreach($result as $rec){
				$up_files = explode(',',$rec->uploaded_files);	
				foreach($up_files as $file_name){
				$timeline_images[] =  $file_name;
				}
			}
			return $timeline_images;
		} else {
		return false;
		}
   }
   public function insert_cover_image($page_id, $cover_image){
	   
	   $data = array(
              'cover_image' => $cover_image,
            );

	   $this->db->where('page_id', $page_id);
	   $this->db->update('bzz_pages', $data); 
	   
	   $data = array(
            'cover_image' => $cover_image,
			'page_id' => $page_id
        );
        $this->db->insert('bzz_cover_images', $data);	
		return $this->db->insert_id();   
   }
}
?>
