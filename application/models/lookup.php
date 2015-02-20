 <?php if (!defined('BASEPATH'))exit('No direct script access allowed');

 class lookup extends CI_Model {
	 function __construct()
   { 
   		parent::__construct(); 
		
  		
    } 

 function get_lookup_industry()
{
     $query = $this->db->get_where('lookup', array('lookup_category' => 'Industry'));
    $query_result = $query->result();
     return $query_result;
 }  
 function get_lookup_jobtype()
{
     $query = $this->db->get_where('lookup', array('lookup_category' => 'Job Type'));
    $query_result = $query->result();
     return $query_result;
 }  
}
?>