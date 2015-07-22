<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mdlnotifications extends CI_Model {

	function __construct()
    { 
   		parent::__construct(); 
  		  $this->load->database("bzzbook"); 
    } 
	public function post_notifications(){
	
			$id = $this->session->userdata('logged_in')['account_id'];
			$get_profiledata = $this->customermodel->profiledata($id);
			if(!empty($get_profiledata[0]->user_img_thumb)) 
			$my_img = $get_profiledata[0]->user_img_thumb;
			else
			$my_img = 'default_profile_pic.png';
			$user_time_condition  = "posted_by ='".$id."' AND posted_on >= DATE_ADD( NOW(), INTERVAL - 5 MINUTE ) AND isGhostpost=0 ORDER BY post_id DESC";
			
			$this->db->select('*');
			$this->db->from('bzz_posts');
			$this->db->where($user_time_condition);
			$query = $this->db->get();
			$this->db->last_query();
			if ($query->num_rows() >0){
					
				$posts = $query->result_array();
			
					if($posts){
						$myfriends = $this->friendsmodel->getfriends();
						if($myfriends){
							$content = array();
							$content['user_image'] = $my_img;
							$content['user_name'] = $get_profiledata[0]->user_firstname.' '.$get_profiledata[0]->user_lastname;
							foreach($posts as $post){
								if(empty($post['tagged_friends'])){
								foreach($myfriends as $frnd){
									
									if(!empty($post['uploaded_files']))
									{
										$photo_count = count(explode(',',$post['uploaded_files']));
										if($photo_count>1){
											$content['verb'] = "added ".$photo_count." new photos";
										}
										else{
											$content['verb'] = "added new photo";
										}
									}
									elseif(!empty($post['post_content'])){
										if($get_profiledata[0]->user_gender == 'm')
										$gender = 'his';
										else
										$gender = 'her';
										$content['verb'] = "updated ".$gender." status";
									}
									 
								   $notification = array(
								   'user_id' => $frnd['id'],
								   'generated_user_id' => $id,
								   'post_id' => $post['post_id'],
								   'content_type' => 'post',
								   'content_json' => json_encode($content),
								   'display' => '1');
								$check_exits = "generated_user_id ='".$id."' AND user_id = ".$frnd['id']." AND post_id = ". $post['post_id'];
								$this->db->select('*');
								$this->db->from('bzz_notifications');
								$this->db->where($check_exits);
								$query = $this->db->get();
								$this->db->last_query();
								if ($query->num_rows() == 0){
								
								$this->db->insert('bzz_notifications',$notification);
								}
							}
							}
						if(!empty($post['tagged_friends'])){
							$tagged = explode(',',$post['tagged_friends']);
							$i = 1;
							$tag_names = array();
								foreach($tagged as $tag){
									$tag_data = array();
								$tag_user_data = $this->customermodel->profiledata($tag);
								$tag_data['id'] = $tag;
								$tag_data['name'] = $tag_user_data[0]->user_firstname.' '.$tag_user_data[0]->user_lastname;
								$tag_names[] = $tag_data;
								}
								foreach($tagged as $tag){
									$check_exits = "generated_user_id ='".$id."' AND user_id = ".$tag." AND post_id = ". $post['post_id'];
								$this->db->select('*');
								$this->db->from('bzz_notifications');
								$this->db->where($check_exits);
								$query = $this->db->get();
								$this->db->last_query();
								if ($query->num_rows() == 0){						
									
									$mes_name = array();
									foreach($tag_names as $name){
									if($name['id']==$tag){ //skipp 
									}else{
										$mes_name[] = "<a href='".base_url()."profile/user/".$name['id']."'>".$name['name']."</a>";
									}
									}
									$count_names = count($mes_name);
									if($count_names>=4){
										$sliced_array = array_slice($mes_name, 0, 4);
									}
									else{
										$sliced_array = array_slice($mes_name, 0, $count_names);
									}
									$content['verb'] = 'tagged you ';
									if($count_names==1){
										$lastItem = array_pop($sliced_array);
									$content['verb'] .= ' and '.$lastItem;
									}
									if($count_names>=2 && $count_names<=4){
									$lastItem = array_pop($sliced_array); // c
									$text = implode(', ', $sliced_array); // a, b
									$text .= ' and '.$lastItem;
									$content['verb'].=', '.$text;
									}
									if($count_names>4){
										$text = implode(', ', $sliced_array);
										$text .= ' and '.($count_names-4)." others";
										$content['verb'].=', '.$text;
									}
									 $notification = array(
								   'user_id' => $tag,
								   'generated_user_id' => $id,
								   'content_type' => 'tag',
								   'post_id' => $post['post_id'],
								   'content_json' => json_encode($content),
								   'display' => '1');
								   $this->db->insert('bzz_notifications',$notification);
								   
								}
								}
							}
						}
						//Need to continue
						
						}
					}
				
			}
		}
		
		public function getNotifications(){
		
			 $searchblock = "<ul > ";
			 $id = $this->session->userdata('logged_in')['account_id'];
			 $up_data = array( 'seen_on' => date('Y-m-d H:i:s') );
			 $this->db->where('user_id', $id);
			 $this->db->update('bzz_notifications', $up_data); 
			 $condition  = "user_id = ".$id." AND display=1 ORDER BY id DESC";
			
			$this->db->select('*');
			$this->db->from('bzz_notifications');
			$this->db->where($condition);
			$query = $this->db->get();	
			$userdata = '';		
			if ($query->num_rows() >0){					
				$userdata = $query->result_array();
			}
		     if($userdata) {				
				
				foreach($userdata as $req){
				$jsondata = json_decode($req['content_json']);
				$searchblock .= " <li onclick='location.href=&#39;".base_url()."posts/getpost/".$req['post_id']."&#39;'>
				<div class='member-search-sug'>";
				
				
				if(!empty($jsondata->user_image)){
				$searchblock .= "<figure class='member-sug-pic'><img src='" . base_url() ."uploads/".$jsondata->user_image."' alt='". $jsondata->user_name."'></figure>";
				}else{
				$searchblock .= "<figure class='member-sug-pic'><img src='" . base_url() ."uploads/default_profile_pic.png' alt='". $jsondata['user_name']."'></figure>";
				}
				
				$searchblock .= " <div class='member-search-name'>
				<span class='ntf_user'>". $jsondata->user_name ."</span> <span class='ntf_msg'>";
				if(isset($jsondata->verb))
				$searchblock .= $jsondata->verb."</span>";
				
				
				$searchblock .= "
				</div>
				</li>	";
				
				} 
			 }
			$searchblock .= "</ul>"; 
			echo $searchblock;
		}
		
		public function get_unread_count(){
			
			$id = $this->session->userdata('logged_in')['account_id'];
			$condition  = "user_id = ".$id." AND seen_on = '0000-00-00 00:00:00'";
			$this->db->select('*');
			$this->db->from('bzz_notifications');
			$this->db->where($condition);
			$query = $this->db->get();	
				
			if ($query->num_rows() >0){					
				return $query->num_rows();
			}
			return false;
		}
	}


?>
