<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class posts extends CI_Controller {
	 
	  public function __construct() {
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Access-Control-Allow-Origin");
		header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE, OPTIONS");
		header( "Access-Control-Allow-Headers: Authorization, Content-Type" );
        parent::__construct();
    }
	public function index()
	{
		
	}
	public function getposts($access_token){
	
	  $user_res = $this->customermodel->get_user_id($access_token);
	
	  $user_id =  $user_res[0]->user_id;
	  if($user_id)
	  $allposts = $this->customermodel->All_Posts($user_id);
	  if($allposts):
	  $posts = array();
	  foreach( $allposts as $row):
	  $post = array();
	  $post['posted_id'] = $row->posted_by;
	  $post['data'] = $row;
	  $post['time'] = $this->customermodel->get_time_difference_php($row->posted_on);
      $get_profiledata = $this->customermodel->profiledata($row->posted_by);
	  $post['posted_user_data'] = $get_profiledata[0];
	  if($row->tagged_friends!='')
	  {
		  $tags = array();
		  $taggedusers = explode(',',$row->tagged_friends);
		  foreach($taggedusers as $taggeduser){
		  $tagusers = $this->customermodel->profiledata($taggeduser);
		  $tags[] = $tagusers[0];
		  }
		  $post['tagged_users_data'] = $tags;
	  }
	  $post['likedetails'] = $this->customermodel->likedata($row->post_id);
	  $post['current_user_like_data'] = $this->customermodel->currentuserlikedata($row->post_id);
	  $comments_details = $this->customermodel->comments_data($row->post_id);
	  $comments = array();
	  for($i=0;$i<count($comments_details);$i++){ 
		  $comment = array();
		  $comment['data'] = $comments_details[$i];
		  $comment['user_data'] = $this->customermodel->profiledata($comments_details[$i]->commented_by); 
		  $comment['time'] = $this->customermodel->get_time_difference_php($comments_details[$i]->commented_time);
		  $comment['likes'] = $this->customermodel->commentlikedata($comments_details[$i]->postcomments_id);
		  $comment['current_user_like_data'] = $this->customermodel->currentusercommentlikedata($comments_details[$i]->postcomments_id);
		  $comments[] = $comment;
	  }
	  $post['comments'] = $comments;
	  $posts[] = $post;
	  endforeach;
	  $data = array('success'=> true,'result'=>$posts);
	  echo json_encode($data);
	  exit(0);
	  endif;
	  
	  $data = array('success'=> false,'result'=>'No data available');
	  echo json_encode($data);
	  exit(0);
	  
	}


}

?>