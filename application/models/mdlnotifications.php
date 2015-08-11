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
		public function like_notifications(){
			$id = $this->session->userdata('logged_in')['account_id'];
			
			$user_time_condition  = "liked_by ='".$id."' AND datetime >= DATE_ADD( NOW(), INTERVAL - 5 MINUTE ) AND like_on NOT IN ( SELECT post_id FROM bzz_notifications WHERE generated_user_id = ".$id." )";
			
			$this->db->select('*');
			$this->db->from('bzz_likes');
			$this->db->join('bzz_posts','bzz_likes.like_on = bzz_posts.post_id','inner');
			$this->db->where($user_time_condition);
			$query = $this->db->get();
			$this->db->last_query();
			if ($query->num_rows() >0){
					
				$likes = $query->result_array();
			
					if($likes){
						foreach($likes as $like){
						$notification = array(
								   'user_id' => $like['posted_by'],
								   'generated_user_id' => $id,
								   'content_type' => 'like',
								   'post_id' => $like['post_id'],
								   'content_json' => '',
								   'display' => '1');
								   $this->db->insert('bzz_notifications',$notification);
							
						}
					}
			}
		}
		public function cmt_like_notifications(){
			$id = $this->session->userdata('logged_in')['account_id'];
			
			$user_time_condition  = "liked_by ='".$id."' AND datetime >= DATE_ADD( NOW(), INTERVAL - 5 MINUTE ) AND bzz_postcomments.commented_on NOT IN ( SELECT post_id FROM bzz_notifications WHERE generated_user_id = ".$id." AND content_type ='commentlike' ) AND bzz_postcomments.commented_by != bzz_posts.posted_by";
			
			$this->db->select('*');
			$this->db->from('bzz_comment_likes');
			$this->db->join('bzz_postcomments','bzz_postcomments.postcomments_id = bzz_comment_likes.like_on','inner');
			$this->db->join('bzz_posts','bzz_posts.post_id = bzz_postcomments.commented_on','inner');
			$this->db->where($user_time_condition);
			$query = $this->db->get();
			echo $this->db->last_query();
			if ($query->num_rows() >0){
					
				$likes = $query->result_array();
			
					if($likes){
						foreach($likes as $like){
						$notification = array(
								   'user_id' => $like['commented_by'],
								   'generated_user_id' => $id,
								   'content_type' => 'commentlike',
								   'post_id' => $like['commented_on'],
								   'content_json' => '',
								   'display' => '1');
								   $this->db->insert('bzz_notifications',$notification);
							
						}
					}
			}
		}
		public function photo_cmt_like_ntfc(){
			$id = $this->session->userdata('logged_in')['account_id'];
			
			$user_time_condition  = "liked_by ='".$id."' AND datetime >= DATE_ADD( NOW(), INTERVAL - 5 MINUTE ) AND bzz_post_image_comments.post_id NOT IN ( SELECT post_id FROM bzz_notifications WHERE generated_user_id = ".$id." AND content_type ='photocommentlike' )";
			
			$this->db->select('*');
			$this->db->from('bzz_photo_comment_likes');
			$this->db->join('bzz_post_image_comments','bzz_post_image_comments.cmt_id = bzz_photo_comment_likes.like_on','inner');
			//$this->db->join('bzz_posts','bzz_posts.post_id = bzz_postcomments.commented_on','inner');
			$this->db->where($user_time_condition);
			$query = $this->db->get();
			echo $this->db->last_query();
			if ($query->num_rows() >0){
					
				$likes = $query->result_array();
			
					if($likes){
						foreach($likes as $like){
						$notification = array(
								   'user_id' => $like['user_id'],
								   'generated_user_id' => $id,
								   'content_type' => 'photocommentlike',
								   'post_id' => $like['post_id'],
								   'content_json' => '',
								   'display' => '1');
								   $this->db->insert('bzz_notifications',$notification);
							
						}
					}
			}
		}
		public function photo_cmt_notifications(){
			$id = $this->session->userdata('logged_in')['account_id'];
			
			$user_time_condition  = "user_id ='".$id."' AND commented_time >= DATE_ADD( NOW(), INTERVAL - 5 MINUTE ) AND bzz_post_image_comments.post_id NOT IN ( SELECT post_id FROM bzz_notifications WHERE generated_user_id = ".$id." AND content_type ='photocomment' )";
			
			$this->db->select('*');
			$this->db->from('bzz_post_image_comments');
			//$this->db->join('bzz_postcomments','bzz_postcomments.postcomments_id = bzz_comment_likes.like_on','inner');
			$this->db->join('bzz_posts','bzz_posts.post_id = bzz_post_image_comments.post_id','inner');
			$this->db->where($user_time_condition);
			$query = $this->db->get();
			echo $this->db->last_query();
			if ($query->num_rows() >0){
					
				$likes = $query->result_array();
			
					if($likes){
						foreach($likes as $like){
						$notification = array(
								   'user_id' => $like['posted_by'],
								   'generated_user_id' => $id,
								   'content_type' => 'photocomment',
								   'post_id' => $like['post_id'],
								   'content_json' => '',
								   'display' => '1');
								   $this->db->insert('bzz_notifications',$notification);
							
						}
					}
			}
		}
		public function comment_notifications(){
			$id = $this->session->userdata('logged_in')['account_id'];
			
			$user_time_condition  = "commented_by ='".$id."' AND commented_time >= DATE_ADD( NOW(), INTERVAL - 5 MINUTE ) AND commented_on NOT IN ( SELECT post_id FROM bzz_notifications WHERE generated_user_id = ".$id." AND content_type ='comment' ) AND bzz_postcomments.commented_by != bzz_posts.posted_by";
			
			$this->db->select('*');
			$this->db->from('bzz_postcomments');
			$this->db->join('bzz_posts','bzz_postcomments.commented_on = bzz_posts.post_id','inner');
			$this->db->where($user_time_condition);
			$query = $this->db->get();
			
			if ($query->num_rows() >0){
					
				$cmts = $query->result_array();
			
					if($cmts){
						foreach($cmts as $cmt){
						$notification = array(
								   'user_id' => $cmt['posted_by'],
								   'generated_user_id' => $id,
								   'content_type' => 'comment',
								   'post_id' => $cmt['post_id'],
								   'content_json' => '',
								   'display' => '1');
								   $this->db->insert('bzz_notifications',$notification);
							
						}
					}
			}
		}
		public function share_notifications(){
			$id = $this->session->userdata('logged_in')['account_id'];
			
			$user_time_condition  = "posted_by ='".$id."' AND posted_on >= DATE_ADD( NOW(), INTERVAL - 5 MINUTE ) AND shared = 1 AND post_id NOT IN ( SELECT post_id FROM bzz_notifications WHERE generated_user_id = ".$id." AND content_type ='share' )";
			
			$this->db->select('*');
			$this->db->from('bzz_posts');
			$this->db->where($user_time_condition);
			$query = $this->db->get();
			
			if ($query->num_rows() >0){
					
				$shares = $query->result_array();
			
					if($shares){
						foreach($shares as $share){
							$myfriends = $this->friendsmodel->getfriends();
							foreach($myfriends as $friend){
									$notification = array(
								   'user_id' => $friend['id'],
								   'generated_user_id' => $id,
								   'content_type' => 'share',
								   'post_id' => $share['post_id'],
								   'content_json' => '',
								   'display' => '1');
								   $this->db->insert('bzz_notifications',$notification);
							}
							
						}
					}
			}
		}
		public function getNotifications(){
		
			 $searchblock = "<div class='nano'><div class='nano-content'><ul > ";
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
				$post_ids_array = array();
				$cmt_post_ids_array = array();
				$share_post_ids_array = array();
				foreach($userdata as $req){
				
				if($req['content_type']=='like' || $req['content_type']=='commentlike' || $req['content_type']=='photocommentlike'){
					
					if(!in_array($req['post_id'],$post_ids_array)){
						
						$post_ids_array[] = $req['post_id'];
						if($req['content_type']=='like')
						$content_type = 'like';
						else if($req['content_type']=='commentlike')
						$content_type = 'commentlike';
						else
						$content_type = 'photocommentlike';
						$condition  = "bzz_notifications.user_id = ".$id." AND content_type = '".$content_type."' AND post_id = ".$req['post_id'];					
						$this->db->select('*');
						$this->db->from('bzz_notifications');
						$this->db->join('bzz_userinfo','bzz_notifications.generated_user_id = bzz_userinfo.user_id','inner');
						$this->db->where($condition);
						$query = $this->db->get();	
						$userdata = '';		
						if($query->num_rows() >0){					
						$userdata = $query->result_array();
						
						$first = 1;
						$like_name = array();
						foreach($userdata as $user){
							
							if($first==1){
							$like_user_data = $this->customermodel->profiledata($user['generated_user_id']);
						
							if(isset($like_user_data[0]->user_img_thumb))
							$first_user_image = $like_user_data[0]->user_img_thumb;
							else
							$first_user_image = 'default_profile_pic.png';
							}
							if($user['generated_user_id']==$id){ //skipp 
							}else{
								$like_name[] = "<a class='ntf_user' href='".base_url()."profile/user/".$user['user_id']."'>".$user['user_firstname'].' '.$user['user_lastname']."</a>"; 
							}
							$first++;
						}
					$count_names = count($like_name); 
									if($count_names>=4){
										$sliced_array = array_slice($like_name, 0, 4);
									}
									else{
										$sliced_array = array_slice($like_name, 0, $count_names);
									}
									if($req['content_type']=='like')
									$verb = 'likes your post';
									else if($req['content_type']=='commentlike' || $req['content_type']=='photocommentlike')
									$verb = 'likes your comment';
									
									if($count_names==1){
										$lastItem = array_pop($sliced_array);
									$verb = $lastItem.' '.$verb;
									}
									if($count_names>=2 && $count_names<=4){
									$lastItem = array_pop($sliced_array); // c
									$text = implode(', ', $sliced_array); // a, b
									$text .= ' and '.$lastItem;
									$verb = $text.' '.$verb;
									}
									if($count_names>4){
										$text = implode(', ', $sliced_array);
										$text .= ' and '.($count_names-4)." others";
										$verb.= $text.' '.$verb;
									}
									$searchblock .= " <li onclick='location.href=&#39;".base_url()."posts/getpost/".$req['post_id']."&#39;'>
						<div class='member-search-sug'>";
						
						
						if(!empty($first_user_image)){
						$searchblock .= "<figure class='member-sug-pic'><img src='" . base_url() ."uploads/".$first_user_image."' ></figure>";
						}else{
						$searchblock .= "<figure class='member-sug-pic'><img src='" . base_url() ."uploads/default_profile_pic.png' ></figure>";
						}
						
						$searchblock .= " <div class='member-search-name'>
						<span class='ntf_msg'>";
						if(isset($verb))
						$searchblock .= $verb."</span>";
						
						
						$searchblock .= "
						</div>
						</li>	";
						}
						
						}
						
						
				}
				else if($req['content_type']=='comment' || $req['content_type']=='photocomment'){
					
					
					if(!in_array($req['post_id'],$cmt_post_ids_array)){
						
						$cmt_post_ids_array[] = $req['post_id'];
						if($req['content_type']=='comment')
						$content_type = 'comment';
						else
						$content_type = 'photocomment';
						$condition  = "bzz_notifications.user_id = ".$id." AND content_type = '".$content_type."' AND post_id = ".$req['post_id']." GROUP BY generated_user_id";					
						$this->db->select('*');
						$this->db->from('bzz_notifications');
						$this->db->join('bzz_userinfo','bzz_notifications.generated_user_id = bzz_userinfo.user_id','inner');
						$this->db->where($condition);
						$query = $this->db->get();	
						$userdata = '';		
						if($query->num_rows() >0){					
						$userdata = $query->result_array();
						
						$first = 1;
						$like_name = array();
						foreach($userdata as $user){
							
							if($first==1){
							$like_user_data = $this->customermodel->profiledata($user['generated_user_id']);
						
							if(isset($like_user_data[0]->user_img_thumb))
							$first_user_image = $like_user_data[0]->user_img_thumb;
							else
							$first_user_image = 'default_profile_pic.png';
							}
							if($user['generated_user_id']==$id){ //skipp 
							}else{
								$like_name[] = "<a class='ntf_user' href='".base_url()."profile/user/".$user['user_id']."'>".$user['user_firstname'].' '.$user['user_lastname']."</a>"; 
							}
							$first++;
						}
					$count_names = count($like_name); 
									if($count_names>=4){
										$sliced_array = array_slice($like_name, 0, 4);
									}
									else{
										$sliced_array = array_slice($like_name, 0, $count_names);
									}
									if($req['content_type']=='comment')
									$verb = 'commented your post';
									else
									$verb = 'commented your photo';
									if($count_names==1){
										$lastItem = array_pop($sliced_array);
									$verb = $lastItem.' '.$verb;
									}
									if($count_names>=2 && $count_names<=4){
									$lastItem = array_pop($sliced_array); // c
									$text = implode(', ', $sliced_array); // a, b
									$text .= ' and '.$lastItem;
									$verb = $text.' '.$verb;
									}
									if($count_names>4){
										$text = implode(', ', $sliced_array);
										$text .= ' and '.($count_names-4)." others";
										$verb.= $text.' '.$verb;
									}
									$searchblock .= " <li onclick='location.href=&#39;".base_url()."posts/getpost/".$req['post_id']."&#39;'>
						<div class='member-search-sug'>";
						
						
						if(!empty($first_user_image)){
						$searchblock .= "<figure class='member-sug-pic'><img src='" . base_url() ."uploads/".$first_user_image."' ></figure>";
						}else{
						$searchblock .= "<figure class='member-sug-pic'><img src='" . base_url() ."uploads/default_profile_pic.png' ></figure>";
						}
						
						$searchblock .= " <div class='member-search-name'>
						<span class='ntf_msg'>";
						if(isset($verb))
						$searchblock .= $verb."</span>";
						
						
						$searchblock .= "
						</div>
						</li>	";
						}
						
						}
						
						
				
				}
				else if($req['content_type']=='share'){
					if(!in_array($req['post_id'],$share_post_ids_array)){
						
						$share_post_ids_array[] = $req['post_id'];
						
						$condition  = "bzz_notifications.user_id = ".$id." AND content_type = 'share' AND post_id = ".$req['post_id']." GROUP BY generated_user_id";					
						$this->db->select('*');
						$this->db->from('bzz_notifications');
						$this->db->join('bzz_userinfo','bzz_notifications.generated_user_id = bzz_userinfo.user_id','inner');
						$this->db->where($condition);
						$query = $this->db->get();	
						$userdata = '';		
						if($query->num_rows() >0){					
						$userdata = $query->result_array();
						
						$first = 1;
						$share_name = array();
						foreach($userdata as $user){
							
							if($first==1){
							$share_user_data = $this->customermodel->profiledata($user['generated_user_id']);
						
							if(isset($share_user_data[0]->user_img_thumb))
							$first_user_image = $share_user_data[0]->user_img_thumb;
							else
							$first_user_image = 'default_profile_pic.png';
							}
							if($user['generated_user_id']==$id){ //skipp 
							}else{
								$share_name[] = "<a class='ntf_user' href='".base_url()."profile/user/".$user['user_id']."'>".$user['user_firstname'].' '.$user['user_lastname']."</a>"; 
							}
							$first++;
						}
					$count_names = count($share_name); 
									if($count_names>=4){
										$sliced_array = array_slice($share_name, 0, 4);
									}
									else{
										$sliced_array = array_slice($share_name, 0, $count_names);
									}
									$verb = 'shared your post';
									if($count_names==1){
										$lastItem = array_pop($sliced_array);
									$verb = $lastItem.' '.$verb;
									}
									if($count_names>=2 && $count_names<=4){
									$lastItem = array_pop($sliced_array); // c
									$text = implode(', ', $sliced_array); // a, b
									$text .= ' and '.$lastItem;
									$verb = $text.' '.$verb;
									}
									if($count_names>4){
										$text = implode(', ', $sliced_array);
										$text .= ' and '.($count_names-4)." others";
										$verb.= $text.' '.$verb;
									}
									$searchblock .= " <li onclick='location.href=&#39;".base_url()."posts/getpost/".$req['post_id']."&#39;'>
						<div class='member-search-sug'>";
						
						
						if(!empty($first_user_image)){
						$searchblock .= "<figure class='member-sug-pic'><img src='" . base_url() ."uploads/".$first_user_image."' ></figure>";
						}else{
						$searchblock .= "<figure class='member-sug-pic'><img src='" . base_url() ."uploads/default_profile_pic.png' ></figure>";
						}
						
						$searchblock .= " <div class='member-search-name'>
						<span class='ntf_msg'>";
						if(isset($verb))
						$searchblock .= $verb."</span>";
						
						
						$searchblock .= "
						</div>
						</li>	";
						}
						
						}
						
				}
				else{
				$jsondata = json_decode($req['content_json']);
				
				//print_r($jsondata);
				
				$searchblock .= " <li onclick='location.href=&#39;".base_url()."posts/getpost/".$req['post_id']."&#39;'>
				<div class='member-search-sug'>";
				
				
				if(!empty($jsondata->user_image)){
				$searchblock .= "<figure class='member-sug-pic'><img src='" . base_url() ."uploads/".$jsondata->user_image."' alt='". $jsondata->user_name."'></figure>";
				}else{
				$searchblock .= "<figure class='member-sug-pic'><img src='" . base_url() ."uploads/default_profile_pic.png' alt='". $jsondata['user_name']."'></figure>";
				}
			if(isset($jsondata->user_name))
			{
				$searchblock .= "<div class='member-search-name'><span class='ntf_user'>".$jsondata->user_name."</span> <span class='ntf_msg'>";
			}
				
				if(isset($jsondata->verb))
				$searchblock .= $jsondata->verb."</span>";
				
				
				$searchblock .= "
				</div>
				</li>	";
				
				} 
			 }
			 }
			$searchblock .= "</ul></div></div>"; 
			echo $searchblock;
		}
		
		public function get_unread_count(){
			
			$id = $this->session->userdata('logged_in')['account_id'];
			$post_count =0;
			$condition  = "user_id = ".$id." AND seen_on = '0000-00-00 00:00:00' AND content_type = 'post'";
			$this->db->select('*');
			$this->db->from('bzz_notifications');
			$this->db->where($condition);
			$query = $this->db->get();	
				
			if ($query->num_rows() >0){					
				$post_count = $query->num_rows();
			}
			$like_count = 0;
			$condition  = "user_id = ".$id." AND seen_on = '0000-00-00 00:00:00' AND content_type = 'like' GROUP BY post_id";
			$this->db->select('*');
			$this->db->from('bzz_notifications');
			$this->db->where($condition);
			$query = $this->db->get();	
				
			if ($query->num_rows() >0){					
				$like_count = $query->num_rows();
			}
			$comt_count = 0;
			$condition  = "user_id = ".$id." AND seen_on = '0000-00-00 00:00:00' AND content_type = 'comment' GROUP BY post_id";
			$this->db->select('*');
			$this->db->from('bzz_notifications');
			$this->db->where($condition);
			$query = $this->db->get();	
				
			if ($query->num_rows() >0){					
				$comt_count = $query->num_rows();
			}
			$share_count = 0;
			$condition  = "user_id = ".$id." AND seen_on = '0000-00-00 00:00:00' AND content_type = 'share' GROUP BY post_id";
			$this->db->select('*');
			$this->db->from('bzz_notifications');
			$this->db->where($condition);
			$query = $this->db->get();	
				
			if ($query->num_rows() >0){					
				$share_count = $query->num_rows();
			}
			$comlike_count = 0;
			$condition  = "user_id = ".$id." AND seen_on = '0000-00-00 00:00:00' AND content_type = 'commentlike' GROUP BY post_id";
			$this->db->select('*');
			$this->db->from('bzz_notifications');
			$this->db->where($condition);
			$query = $this->db->get();	
				
			if ($query->num_rows() >0){					
				$comlike_count = $query->num_rows();
			}
			$photo_com_count = 0;
			$condition  = "user_id = ".$id." AND seen_on = '0000-00-00 00:00:00' AND content_type = 'photocomment' GROUP BY post_id";
			$this->db->select('*');
			$this->db->from('bzz_notifications');
			$this->db->where($condition);
			$query = $this->db->get();	
				
			if ($query->num_rows() >0){					
				$photo_com_count = $query->num_rows();
			}
			$photo_com_like_count = 0;
			$condition  = "user_id = ".$id." AND seen_on = '0000-00-00 00:00:00' AND content_type = 'photocommentlike' GROUP BY post_id";
			$this->db->select('*');
			$this->db->from('bzz_notifications');
			$this->db->where($condition);
			$query = $this->db->get();	
				
			if ($query->num_rows() >0){					
				$photo_com_like_count = $query->num_rows();
			}
			if($post_count || $like_count || $comt_count || $share_count || $comlike_count || $photo_com_count || $photo_com_like_count)
			return $post_count+$like_count+$comt_count+$share_count+$comlike_count+$photo_com_count+$photo_com_like_count;
			else
			return false;
		}
	}


?>
