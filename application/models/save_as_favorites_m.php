<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Save_as_favorites_m extends CI_Model {

	function __construct()
    { 
   		parent::__construct(); 
  		
    } 
public function get_category_name($cat_id){
	$query = $this->db->select('category_name')->from('bzz_save_fav_categories')->where('category_id',$cat_id)->get(); 
	if($query->num_rows() > 0)
	{
		return $query->result_array();
	}else
	{
		return false;
	}
}
public function get_favorite_categories()
{
	
	$id =  $this->session->userdata('logged_in')['account_id'];	
	$query = $this->db->select('*')->from('bzz_save_fav_categories')->where('created_by',$id)->get(); 
	if($query->num_rows() > 0)
	{
		return $query->result_array();
	}else
	{
		return false;
	}
}

public function get_all_favorites()
{
	
	$id =  $this->session->userdata('logged_in')['account_id'];	
	$query = $this->db->select('*')->from('bzz_save_as_favorites')->where('favorite_by_user_id',$id)->get(); 
	if($query->num_rows() > 0)
	{
		return $query->result_array();
	}else
	{
		return false;
	}
}

public function get_all_favorites_by_category_id($category_id)
{
	
	$id =  $this->session->userdata('logged_in')['account_id'];	
	$query = $this->db->select('*')->from('bzz_save_as_favorites')->where('favorite_by_user_id',$id)->where('category_id',$category_id)->get(); 
	
	if($query->num_rows() > 0)
	{	
		//print_r($query->result_array());
		return $query->result_array();
	}else
	{
		return false;
	}
}

public function get_category_image($category_id)
{
	$query = $this->db->select('favorite_image')->from('bzz_save_as_favorites')->where('category_id',$category_id)->order_by('favorite_id','desc')->limit(1)->get(); 
	
	if($query->num_rows() == 1)
	{	
		//print_r($query->result_array());
		return $query->result_array();
	}else
	{
		return false;
	}
}

}
?>
