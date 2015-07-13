<?php //session_start();
	  if(empty($user_id))
	  $curr_user_id = $this->session->userdata('logged_in')['account_id'];
	  else
	  $curr_user_id = $user_id; 
	 // $curr_user_data= $this->customermodel->profiledata($curr_user_id);
	  //$_SESSION['username'] = $curr_user_data[0]->username; // Must be already set
	 // echo $curr_user_data[0]->username;
	  ?>

   <?php $image = $this->profile_set->get_profile_pic($user_id);	?>
    <section class="col-lg-6 col-md-6 col-sm-5 col-xs-12 coloumn2">
      <div class="updateStatus" id="updateStatus">
        <ul>
          <li> <img src="<?php echo base_url();?>uploads/<?php if(!empty($image[0]->user_img_thumb)) echo $image[0]->user_img_thumb; else echo 'default_profile_pic.png'; ?>" alt="<?php echo base_url();?>uploads/<?php if(!empty($image[0]->user_img_thumb)) echo $image[0]->user_img_thumb; else echo 'default_profile_pic.png'; ?>" height="60" width="60"> </li>
          <li><a href="javascript:document.getElementById('posts').focus()" >Create a Post</a></li>
          <li><a href="javascript:document.getElementById('uploadPhotos').click()">Upload Photos/Video</a></li>
          <li><a href="#">Create Photo/Video Album</a></li>
        </ul>
   
        <div id="uploadPhotosdvPreview"></div>
        <?php $attr = array('name' => 'post_form', 'id' =>'my_form', 'enctype'=>"multipart/form-data") ?>
        <?php 
		echo form_open('signg_in/send_post',$attr) ?>
        <input type="file" name="uploadPhotos[]" id="uploadPhotos" multiple="multiple" style="display:none;" />
        
<!--        <textarea cols="" rows="" name="posts" id="posts" class="form-control" placeholder="What's Buzzing?"></textarea>
-->       
		<div class="post-content" style="width:100%; min-height:75px;" onclick="document.getElementById('dummypost').focus();"><div contenteditable="true" style="min-height:20px; min-width:10px; padding:8px; float:left;" id="dummypost" onkeyup="takeInputToPost()"></div><div id="withTokens" style="display:none; padding:8px; float:left">--With </div><div style="clear:both;"></div></div>
        <input type="hidden" id="posts" name="posts" />
		<div id="hiddentokens" style="display:none;"></div>
        <div id="selectedfriends"><div id="search_frnd_wrapper"><input type="text" name="txtsearch" id="searchfriends" onkeyup="keyupevent();" /><input type="hidden" id="addedusers" name="addedusers" /><div id="autosuggest"></div></div></div>
        <div id="taggedfriends"><div id="tag_frnd_wrapper"><input type="text" name="tagsearch" id="tagsearchfriends" onkeyup="tagkeyupevent();" /><input type="hidden" id="tagaddedusers" name="tagaddedusers" /><div id="tagautosuggest"></div></div></div>
        <div class="updateControls" id="updateControls"><img class="tagging" onclick="showtaginput();" src='<?php echo base_url().'images/person-tagging.png';?>' /><img class="ghost" onclick="showghostinput();" src='<?php echo base_url().'images/haunted.png';?>' /> <select name="post_group" id="post_group"><option value="0">Public</option> <?php $groups = $this->profile_set->get_user_groups(); if($groups) { 
		foreach($groups as $group)
		{
			echo "<option value='".$group['group_id']."'>".$group['group_name']."</option>";
		}
		
		
		} ?></select> <a href="javascript:{}" onclick="document.getElementById('my_form').submit(); return false;">Post</a> </div>
        <?php echo form_close(); ?>
        <div class="clear"></div>
      </div>
     <div class="posts" id="posts_content_div">
	<?php  $data['products'] = $this->customermodel->All_Posts($user_id);
	 $this->load->view('all_posts_inner',$data);?>
      </div>
      
    </section>
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Share this post</h4>
      </div>
      <div class="modal-body" id="sharePostPopup">
        ...
      </div>
      <?php /*?><div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div><?php */?>
    </div>
  </div>
</div>
<script>
function takeInputToPost(){
$("#posts").val($("#dummypost").text());
}
function showghostpost(post_id,current_id,posted_to,posted_by){
$('#post'+post_id).addClass('ghostpostside');
var viewers = posted_to.split(',');
if(viewers.indexOf(current_id) > -1 || viewers==current_id || posted_by==current_id)
{
	$("#ghostpostBtn"+post_id).hide(200);
	$("#post"+post_id+" .hidethis").show(500);
}
else{
	alert('This is a ghost post.you are not authorized to view');
}

}
</script>
