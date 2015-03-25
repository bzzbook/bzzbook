<?php 
//$groups = $this->profile_set->get_user_groups();
if(isset($_POST['seachgroupsinput']))
	$groups = $this->profile_set->get_user_groups($_POST['seachgroupsinput']);
	else
	$groups = $this->profile_set->get_user_groups();
?>
<section class="col-lg-6 col-md-6 col-sm-5 col-xs-12 coloumn2 groupsSt">
      <h2>Groups</h2>
      <div class="posts">
      <?php if($this->session->flashdata('group-add-msg')) echo $this->session->flashdata('group-add-msg'); ?>
        <div class="tabBar form-group">
        	<div class="col-md-6">
<span>My Groups</span>  <a href="<?php echo base_url(); ?>profile/addgroup" class="btn btn-info black">Add a Group</a>
</div>
            <div class="col-md-6 pull-right">
<div class="input-group">
		  <form action="<?php echo base_url().'profile/groups'; ?>" method="post" id="groupssearchform" >
          <input type="text" placeholder="Search Groups" id="seachgroupsinput" name="seachgroupsinput" class="form-control">
          </form>
          <div class="input-group-addon glyphicon glyphicon-search" onclick="searchformsubmit();"></div>
          
        </div>
</div>  
<div class="clearfix"></div>
        </div>
    <div class="groupMainBlock">
    <div class="groupProperty">
        <div class="groupBlock">
        <h3>Group Name:</h3>
      
        </div>
        <div class="groupBlock">
        <h3>Members</h3>
        
        </div>
        <div class="groupBlock">
        <h3>Date Created:</h3>
       
        </div>
          <div class="groupBlock  pull-right">
        <h3>Options</h3>
       
        </div>
        
        <div class="clearfix"></div>
    </div>
    <?php if($groups){ foreach($groups as $group){ ?>
    <div class="groupProperty">
        <div class="groupBlock">
      
        <p><?php echo $group['group_name']; ?></p>
        </div>
        <div class="groupBlock">
       
        <p><?php echo count(explode(',',$group['group_members'])); ?></p>
        </div>
        <div class="groupBlock">
      
        <p><?php echo date('Y-m-d', strtotime($group['date_created']));?></p>
        </div>
         <div class="groupBlock pull-right">
        <a href="<?php echo base_url().'profile/edit_group/'.$group['group_id']?>" class="link glyphicon glyphicon-pencil"></a>
        <a href="<?php echo base_url().'profile/delete_group/'.$group['group_id']?>" class="link glyphicon glyphicon-remove"></a>
        </div>
        <div class="clearfix"></div>
    </div>
    <?php } }?>
    </div>
        
        
      </div>
    </section>