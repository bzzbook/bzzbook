<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Page_About extends CI_Controller {
	 
	  public function __construct() {
        parent::__construct();
		$this->load->model('profile_set');
		$is_logged = $this->session->userdata('logged_in');	
		if(!$is_logged)
		redirect(base_url());
    }

public function add_genre()
{
	//$this->load->model('pagemodel');
	if($this->pagemodel->add_genre_data($_POST['genre'],$_POST['page_id']))
	{
	//$this->load->view('aboutme/address_inner');
	$data = $this->pagemodel->get_page_about_details($_POST['page_id']);
	echo $data[0]['genre'];
	//return true;
	}else
	return false;
	
}

public function add_short_desc()
{
	if($this->pagemodel->add_short_desc_data($_POST['short_desc'],$_POST['page_id']))
	{
	
	$data = $this->pagemodel->get_page_about_details($_POST['page_id']);
	echo $data[0]['short_desc'];
	
	}else
	return false;
	
}
public function add_impressum()
{
	if($this->pagemodel->add_impressum_data($_POST['impressum'],$_POST['page_id']))
	{
	
	$data = $this->pagemodel->get_page_about_details($_POST['page_id']);
	echo $data[0]['impressum'];
	
	}else
	return false;
	
}
public function add_long_desc()
{
	if($this->pagemodel->add_long_desc_data($_POST['long_desc'],$_POST['page_id']))
	{
	
	$data = $this->pagemodel->get_page_about_details($_POST['page_id']);
	echo $data[0]['long_desc'];
	
	}else
	return false;
	
}
public function add_web_site()
{
	if($this->pagemodel->add_web_site_data($_POST['page_web_site'],$_POST['page_id']))
	{
	
	$data = $this->pagemodel->get_page_about_details($_POST['page_id']);
	echo $data[0]['web_site'];
	
	}else
	return false;
	
}
public function add_record_label()
{
	if($this->pagemodel->add_record_label_data($_POST['record_label'],$_POST['page_id']))
	{
	
	$data = $this->pagemodel->get_page_about_details($_POST['page_id']);
	echo $data[0]['record_label'];
	
	}else
	return false;
	
}
public function add_band_members()
{
	if($this->pagemodel->add_band_members_data($_POST['band_members'],$_POST['page_id']))
	{
	
	$data = $this->pagemodel->get_page_about_details($_POST['page_id']);
	echo $data[0]['band_members'];
	
	}else
	return false;
	
}
public function add_official_page()
{
	if($this->pagemodel->add_official_page_data($_POST['official_page'],$_POST['page_id']))
	{
	
	$data = $this->pagemodel->get_page_about_details($_POST['page_id']);
	echo $data[0]['official_page'];
	
	}else
	return false;
	
}
public function get_page_sub_categories()
{
	$query = $this->db->select('*')->from('bzz_page_sub_categories')->where('main_cat_id',$_POST['category_id'])->get();
	if($query->num_rows()>0)
	{
		$data = '';
		$page_sub_categories = $query->result_array();
		foreach($page_sub_categories as $sub_category)
		{
			$data .= '<option value="'.$sub_category['sub_cat_id'].'">'.$sub_category['sub_cat_name'].'</option>';
		}
		
		echo $data;
	}
}
public function add_category()
{
	if($this->pagemodel->add_category_data($_POST['category'],$_POST['sub_category'],$_POST['page_id']))
	{
	
	$data = $this->pagemodel->get_page_about_details($_POST['page_id']);
	
	$cat_name = $this->pagemodel->get_category_name($data[0]['page_cat_id']);
	$sub_cat_name = $this->pagemodel->get_subcategory_name($data[0]['page_sub_cat_id']);
	
	
	echo $cat_name[0]['main_cat_name']." : ".$sub_cat_name[0]['sub_cat_name'] ;
	
	}else
	return false;
}
 public function change_page_name()
 {
	 if($this->pagemodel->change_pagename($_POST['page_name'],$_POST['page_id']))
	{
	
	$data = $this->pagemodel->get_page_details($_POST['page_id']);
	echo $data[0]['page_name'];
	
	}else
	return false;
 }
 
  public function add_page_founder()
 {
	 if($this->pagemodel->add_page_founder_data($_POST['page_found'],$_POST['page_id']))
	{
	
	$data = $this->pagemodel->get_page_about_details($_POST['page_id']);
	echo $data[0]['founded_date'];
	
	}else
	return false;
 }
 
  public function add_page_awards()
 {
	 if($this->pagemodel->add_page_awards_data($_POST['awards'],$_POST['page_id']))
	{
	
	$data = $this->pagemodel->get_page_about_details($_POST['page_id']);
	echo $data[0]['awards'];
	
	}else
	return false;
 }
   public function add_page_products()
 {
	 if($this->pagemodel->add_page_products_data($_POST['products'],$_POST['page_id']))
	{
	
	$data = $this->pagemodel->get_page_about_details($_POST['page_id']);
	echo $data[0]['products'];
	
	}else
	return false;
 }
 
   public function add_page_mission()
 {
	 if($this->pagemodel->add_page_mission_data($_POST['mission'],$_POST['page_id']))
	{
	
	$data = $this->pagemodel->get_page_about_details($_POST['page_id']);
	echo $data[0]['mission'];
	
	}else
	return false;
 }
}
?>