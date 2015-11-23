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
   public function insert_page_logo($page_id, $cover_image){
	   
	   $data = array(
              'page_image' => $cover_image,
            );

	   $this->db->where('page_id', $page_id);
	   $this->db->update('bzz_pages', $data); 
	   
	   $data = array(
            'page_image' => $cover_image,
			'page_id' => $page_id
        );
        $this->db->insert('bzz_page_profile_pics', $data);	
		return $this->db->insert_id();   
   }
   
   
   public function get_page_about_details($page_id)
   {
	 $query = $this->db->select('*')->from('bzz_page_about')->where('page_id',$page_id)->get();
	   if($query->num_rows() == 1)
	   {
		   return $query->result_array();
	   }else{
	   return false;
   }}
   
   public function add_genre_data($genre,$page_id)
	{
		
			
		$up_data = array(
		'genre'=>$genre
		);
		$this->db->where('page_id',$page_id);
		
		if($this->db->update('bzz_page_about',$up_data))
		return true;
		else
		return false;
	}
	
	   public function add_short_desc_data($short_desc,$page_id)
	{
		
			
		$up_data = array(
		'short_desc'=>$short_desc
		);
		$this->db->where('page_id',$page_id);
		
		if($this->db->update('bzz_page_about',$up_data))
		return true;
		else
		return false;
	}
    public function add_impressum_data($impressum,$page_id)
	{
		
			
		$up_data = array(
		'impressum'=>$impressum
		);
		$this->db->where('page_id',$page_id);
		
		if($this->db->update('bzz_page_about',$up_data))
		return true;
		else
		return false;
	}
   
     public function add_long_desc_data($long_desc,$page_id)
	{
		
			
		$up_data = array(
		'long_desc'=>$long_desc
		);
		$this->db->where('page_id',$page_id);
		
		if($this->db->update('bzz_page_about',$up_data))
		return true;
		else
		return false;
	}
	
	 public function add_web_site_data($web_site,$page_id)
	{
		
		$up_data = array(
		'web_site'=>$web_site
		);
		$this->db->where('page_id',$page_id);
		
		if($this->db->update('bzz_page_about',$up_data))
		return true;
		else
		return false;
	}
		 public function add_record_label_data($record_label,$page_id)
	{
		
		$up_data = array(
		'record_label'=>$record_label
		);
		$this->db->where('page_id',$page_id);
		
		if($this->db->update('bzz_page_about',$up_data))
		return true;
		else
		return false;
	}
		 public function add_band_members_data($band_members,$page_id)
	{
		
		$up_data = array(
		'band_members'=>$band_members
		);
		$this->db->where('page_id',$page_id);
		
		if($this->db->update('bzz_page_about',$up_data))
		return true;
		else
		return false;
	}
		public function add_official_page_data($official_page,$page_id)
	{
		
		$up_data = array(
		'official_page'=>$official_page
		);
		$this->db->where('page_id',$page_id);
		
		if($this->db->update('bzz_page_about',$up_data))
		return true;
		else
		return false;
	}
	public function get_page_categories()
	{
		$query = $this->db->get('bzz_page_categories');
		if($query->num_rows() > 0)
		{
			return $query->result_array();
		}
	}
	
	public function add_category_data($category,$sub_category,$page_id)
	{
		$up_data = array(
		'page_cat_id'=>$category,
		'page_sub_cat_id'=>$sub_category,
		
		);
		$this->db->where('page_id',$page_id);
		
		if($this->db->update('bzz_page_about',$up_data))
		return true;
		else
		return false;
		
	}
	
	public function get_category_name($cat_id)
	{
		$query = $this->db->select('*')->from('bzz_page_categories')->where('main_cat_id',$cat_id)->get();
		
		return $query->result_array();
		
	}
	
	
	
	public function get_subcategory_name($subcat_id)
	{
		$query = $this->db->select('*')->from('bzz_page_sub_categories')->where('sub_cat_id',$subcat_id)->get();	
		
		return $query->result_array();
		
	}
	
	public function get_page_details($page_id)
	{
		$query = $this->db->select('*')->from('bzz_pages')->where('page_id',$page_id)->get();
		return $query->result_array();
	}
	
	public function change_pagename($page_name,$page_id)
	{
		$up_data = array(
		'page_name'=>$page_name,
		
		
		);
		$this->db->where('page_id',$page_id);
		
		if($this->db->update('bzz_pages',$up_data))
		return true;
		else
		return false;
	}
	public function add_page_founder_data($page_found,$page_id)
	{
		$up_data = array(
		'founded_date'=>$page_found,
		
		);
		$this->db->where('page_id',$page_id);
		
		if($this->db->update('bzz_page_about',$up_data))
		return true;
		else
		return false;
		
	}
		public function add_page_awards_data($awards,$page_id)
	{
		$up_data = array(
		'awards'=>$awards,
		
		);
		$this->db->where('page_id',$page_id);
		
		if($this->db->update('bzz_page_about',$up_data))
		return true;
		else
		return false;
		
	}
		public function add_page_products_data($products,$page_id)
	{
		$up_data = array(
		'products'=>$products,
		
		);
		$this->db->where('page_id',$page_id);
		
		if($this->db->update('bzz_page_about',$up_data))
		return true;
		else
		return false;
		
	}
    public function add_page_mission_data($mission,$page_id)
	{
		$up_data = array(
		'mission'=>$mission,
		
		);
		$this->db->where('page_id',$page_id);
		
		if($this->db->update('bzz_page_about',$up_data))
		return true;
		else
		return false;
		
	}
	  public function add_page_phone_data($phone,$page_id)
	{
		$up_data = array(
		'phone'=>$phone,
		
		);
		$this->db->where('page_id',$page_id);
		
		if($this->db->update('bzz_page_about',$up_data))
		return true;
		else
		return false;
		
	}
	  public function add_page_email_data($email,$page_id)
	{
		$up_data = array(
		'email'=>$email,
		
		);
		$this->db->where('page_id',$page_id);
		
		if($this->db->update('bzz_page_about',$up_data))
		return true;
		else
		return false;
		
	}
	  public function add_page_address_data($address,$city,$zip_code,$page_id)
	{
		$up_data = array(
		'address'=>$address,
		'city'=>$city,
		'zip_code'=>$zip_code
		
		);
		$this->db->where('page_id',$page_id);
		
		if($this->db->update('bzz_page_about',$up_data))
		return true;
		else
		return false;
		
	}
	  public function add_page_isbn_data($isbn,$page_id)
	{
		$up_data = array(
		'isbn'=>$isbn,
		
		);
		$this->db->where('page_id',$page_id);
		
		if($this->db->update('bzz_page_about',$up_data))
		return true;
		else
		return false;
		
	}
	  public function add_page_fromdate_data($start_content,$year,$month,$day,$page_id)
	{
		$up_data = array(
		'start_content'=>$start_content,
		'frm_year'=>$year,
		'frm_month'=>$month,
		'frm_day'=>$day
		
		);
		$this->db->where('page_id',$page_id);
		
		if($this->db->update('bzz_page_about',$up_data))
		return true;
		else
		return false;
		
	}
	  public function add_page_todate_data($year,$month,$day,$page_id)
	{
		$up_data = array(
		'to_year'=>$year,
		'to_month'=>$month,
		'to_day'=>$day
		
		);
		$this->db->where('page_id',$page_id);
		
		if($this->db->update('bzz_page_about',$up_data))
		return true;
		else
		return false;
		
	}
	
}
?>
