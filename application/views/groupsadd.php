<section class="col-lg-6 col-md-6 col-sm-5 col-xs-12 coloumn2 groupsSt">
      <h2>Groups</h2>
      <div class="posts">
        <div class="tabBar form-group">
        	<div class="col-md-6">
<span>My Groups</span>  <a href="#" class="btn btn-info black">Add a Group</a>
</div>
            <div class="col-md-6 pull-right">
<div class="input-group">
 <form action="<?php echo base_url().'profile/groups'; ?>" method="post" id="groupssearchform" >
          <input type="text" placeholder="Search Groups" id="seachgroupsinput" name="seachgroupsinput" class="form-control">
          </form>          <div class="input-group-addon glyphicon glyphicon-search" onclick="searchformsubmit();"></div>
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
    
    </select>
</span>
	</div>
    </div>
    <div class="clear"></div>
    <div class="FormFields col-md-12 ">
    	<label>Group Name</label>
        <span><input name="grpname" type="text" id="grpname"></span>
    </div>
    <div class="clear"></div>
    <div class="FormFields col-md-12">
    	<button class="btn black btn-info" onclick="saveGroup();">Save</button>
    </div>
        <div class="clear"></div>
    </div>
        
        
      </div>
    </section>