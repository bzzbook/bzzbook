<section class="col-lg-6 col-md-6 col-sm-5 col-xs-12 coloumn2 groupsSt">
      <h2>Groups</h2>
      <div class="posts">
        <div class="tabBar form-group">
        	<div class="col-md-6">
<span>My Groups</span>  <a href="#" class="btn btn-info black">Add a Group</a>
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
    <div class="col-md-6">
<select name="f" class="form-control" id="grp_list">
<option value="-1">select group</option>
<?php $data = $this->profile_set->get_groups(); ?>
     <?php foreach($data as $grp) { ?>
                 <option value="<?php echo $grp->groupinfo_id ?>"><?php echo $grp->group_name ?></option>
                 <?php } ?> 
    </select>
</div>    
    </div>
    <div class="clear"></div>
    <div class="form-group">
   <div class="FormFields col-md-5">
 <label>Members</label>
    <span id="select_frm"><select multiple name="select-from" id="select-from" class="form-control">
     
    </select>
</span>
	</div>
    <div class="FormFields text-center buttons col-md-2">
   <input name="" class="btn btn-info black smallBtn" type="button" value="Add" id="grp_add">
   OR
   <input name="" type="button" class="btn btn-info black smallBtn" value="Remove" id="grp_remove">
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