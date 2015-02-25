<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class customer extends CI_Model {

	function __construct()
    { 
   		parent::__construct(); 
  		
    } 
	
	function post_buzz($data){
		 $this->db->insert('posts',$data);
		 return true;
	}
	public function All_Posts(){
	   $this->db->select('*');
	   $this->db->from('posts');
	   $this->db->order_by("id","desc");
	   $query = $this->db->get();
   	   if ($query->num_rows() > 1) {
	   		return  $query->result();
		
	   } 
   }
   public function profiledata($id){
	    $condition = "account_id =" . "'" . $id . "'";
		$this->db->select('*');
		$this->db->from('sign_up');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();

		if ($query->num_rows() == 1) {
			return $query->result();
		} else {
		return false;
		}
   }
   
   public function insertlinks($data)
   {
	    $pid=$data['post_id'];
	    $aid=$data['account_id'];
	    $like=$data['like'];
	    $condition = "post_id =" . "'" . $pid . "' and account_id = $aid";
	    $this->db->select('*');
		$this->db->from('tbl_likes');
		$this->db->where($condition);
		$query = $this->db->get();
		if($query->num_rows()>0){
			$res=$query->result();
			$res_like=$res[0]->like;
			
			if($res_like == 'yes'){
				$slike="no";
			}
			else if($res_like == 'no'){
				$slike="yes";
			}
			
			
		$data1 = array('like' => $slike);

        $this->db->where(array('post_id'=>$pid,'account_id'=>$aid));
        //$where = "post_id = $pid AND account_id = $aid"; 

       // $str = $this->db->update_string('table_name', $data, $where);


		$this->db->update('tbl_likes',$data1);	
			
		}else{
	    $this->db->insert('tbl_likes',$data);
		}
		return true;
   }
   public function likedata($pid){
	    $condition = "post_id =" . "'" . $pid . "'";
		$this->db->select('*');
		$this->db->from('tbl_likes');
		$this->db->where($condition);
		$query = $this->db->get();
		//return $query->num_rows();
		return $query->result();
		
   }
   
   public function write_comment(){
	   $write_comment=$this->input->post('write_comment');
	   
   }
    
}
?>
