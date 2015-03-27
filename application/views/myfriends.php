<?php $friends = $this->friendsmodel->getfriends(); 
      
?>
<section class="col-lg-6 col-md-6 col-sm-5 col-xs-12 coloumn2 groupsSt">
  <h2>My friends</h2>
  <div class="posts">
    <div class="tabBar form-group">
      <div class="col-md-6"> <span>Showing All Friends ( <?php  echo count($friends); ?> ) </span> </div>
      <div class="col-md-6 pull-right">
        <div class="input-group">
          <input type="text" placeholder="Search for..." class="form-control">
          <p class="input-group-btn">
            <button type="button" class="btn btn-default glyphicon glyphicon-search">&nbsp;</button>
          </p>
        </div>
      </div>
      <div class="clearfix"></div>
    </div>
    <div class="groupEditBlock myfriends">
      <ul class="groupEditBlock"> 
             <?php 
			 if(isset($_POST['seachgroupsinput']))
				$groups = $this->profile_set->get_user_groups($_POST['seachgroupsinput']);
				else
				$groups = $this->profile_set->get_user_groups();
				$options = '';
				foreach($groups as $group)
				{
					$options.="<option value='".$group['group_id']."'>".$group['group_name']."</option>";
				}
			 
			 foreach($friends as $frnd){ ?>
        <li class="col-md-6">
        	<div class="fdblock">
        	<figure class="myfriendspfpic"><img alt="<?php echo base_url();?>uploads/<?php echo $frnd['image'] ?>" src="<?php echo base_url();?>uploads/<?php echo $frnd['image'] ?>" ></figure>
            <div class="friendInfo">
            	<h4><a href="<?php echo base_url().'profile/friend/'.$frnd['id']; ?>"><?php echo $frnd['name']?></a></h4>
                <span>( <?php $friendscount = $this->friendsmodel->get_frnds_frnds($frnd['id']); if($friendscount) echo count($friendscount); else echo '0' ;?> friends)</span>
                <div class="select">
                	<select onchange="movetogroup(<?php echo $frnd['id']; ?>,this.value)">
                    	<option value="0">Select group</option>
                    	<?php echo $options; ?>
                    </select>
                </div>
            </div>
            </div>
      	</li>
         <?php } ?>        
        
      </ul>
      <div class="clear"></div>
    </div>
  </div>
</section>
