<?php $result = $this->profile_set->get_group_byid($group_id); 
$group_info = $result[0];
$members = explode(',',$group_info['group_members']);
?>
<section class="col-lg-6 col-md-6 col-sm-5 col-xs-12 coloumn2 groupsSt">
      <h2>Groups</h2>
      <div class="posts">
        <div class="tabBar form-group">
        	<div class="col-md-6">
<span>My Groups</span>  <a href="<?php echo base_url().'profile/addgroup';?>" class="btn btn-info black">Add a Group</a>
</div>
            <div class="col-md-6 pull-right">
<div class="input-group">
          <input type="text" placeholder="Search Groups" id="exampleInputAmount" class="form-control">
          <div class="input-group-addon glyphicon glyphicon-search"></div>
        </div>
</div>  
<div class="clearfix"></div>
        </div>
    <div class="groupEditBlock">
    <?php 
	if($this->session->flashdata('group-add-msg'))
	{
		echo "<h2>".$this->session->flashdata('group-add-msg')."</h2>";
	}
	?>
    <div class="form-group">
        
    </div>
    <div class="clear"></div>
    <div class="form-group">
   <div class="FormFields col-md-5">
 <label>Friends</label>
    <select multiple name="select-from" id="select-from" class="form-control">
      <?php $friends = $this->friendsmodel->getfriends();
				  foreach($friends as $friend)
				  {
				  if(!in_array($friend['id'],$members))
             	  echo " <option value='".$friend['id']."'>".$friend['name']."</option>";
				  }
				  ?>
    </select>
</span>
	</div>
    <div class="FormFields text-center buttons col-md-2">
   <input name="" class="btn btn-info black smallBtn" type="button" value="Add" id="grp_add" style="min-width:70px; line-height:5px; margin-top:8px;">
   OR
   <input name="" type="button" class="btn btn-info black smallBtn" value="Remove" id="grp_remove" style="line-height:5px;">
    </div>
     <div class="FormFields col-md-5">
 <label>Groups</label>
    <span><select multiple name="select-to" id="select-to" class="form-control">
    		  <?php 
			  	  
				  foreach($members as $member)
				  {
					  $result = $this->friendsmodel->get_userinfo_byid($member);
					  $friend = $result[0];
             	      echo " <option value='".$friend['user_id']."'>".$friend['user_firstname'].' '.$friend['user_lastname']."</option>";
				  }
				  ?>
    </select>
</span>
	</div>
    </div>
    <div class="clear"></div>
    <div class="FormFields col-md-12 ">
    	<label>Group Name</label>
        <span><input name="grpname" type="text" id="grpname" value="<?php echo $group_info['group_name']; ?>"></span>
    </div>
    <div class="clear"></div>
    <div class="FormFields col-md-12">
    	<button class="btn black btn-info" onclick="updateGroup(<?php echo $group_info['group_id']; ?>);">Save</button>
    </div>
        <div class="clear"></div>
    </div>
        
        
      </div>
    </section>