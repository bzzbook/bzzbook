<?php 
$result = $this->profile_set->get_userinfo($user_id='');
$name = $result[0]['user_firstname']." ".$result[0]['user_lastname'];
$image = $this->profile_set->get_profile_pic(); 
$categories = $this->save_as_favorites_m->get_favorite_categories();
$favorites = $this->save_as_favorites_m->get_all_favorites();
//print_r($categories);
 ?>
        <div class="col-md-9">
            <div class="pin-groupBlock">
                <?php /*?><div class="pin-groupTop">
                    <div class="col-md-4 AboutUser text-center">
                        <span class="user-img" style="background:url(<?php echo base_url(); ?>uploads/<?php if(!empty($image[0]->user_img_thumb)) echo $image[0]->user_img_thumb; else echo 'default_profile_pic.png'; ?>)"></span>
                        <h3><?php echo $name; ?></h3>
                        <div class="col-md-6"><?php echo count($categories); ?><p>Boards</p></div>
                        <div class="col-md-6"><?php echo count($favorites); ?> <p>Pins</p></div>
                       <!-- <div class="col-md-4">12 <p>Likes</p></div> -->
                        <div class="clearfix"></div>
                    </div>
                </div><?php */?>
                <div class="info-bar">
                    <span class="user-img" style="background:url(<?php echo base_url(); ?>uploads/<?php if(!empty($image[0]->user_img_thumb)) echo $image[0]->user_img_thumb; else echo 'default_profile_pic.png'; ?>)"></span><p><?php echo $name; ?></p>
                     <span class="pull-right" ><p>Pins</p><?php echo "(".count($favorites).")"; ?> </span>
                    <span class="pull-right" style="margin-left:5px;"><p>Boards</p><?php echo "(".count($categories).")"; ?></span>
                   
                </div>
                
                <div class="pin-groupBottom">
                
                <?php 
				
				if($categories)
				{
				foreach($categories as $category)
				{?>
                   
					
				<?php	$query = $this->db->select('*')->from('bzz_save_as_favorites')->where('category_id',$category['category_id'])->order_by('favorite_id','desc')->get();
					if($query->num_rows() > 0)
					{
						
						$favorie_images = $query->result_array();
						?>
                        
                        <div class="col-md-3">
                        <div class="pin-group-detail">
                            <h3><?php echo $category['category_name']; ?> <span class="pull-right"><a href=""  data-toggle="modal" data-target="#edit_cat_name" onclick="edit_category_name(<?php echo $category['category_id']; ?>)" class="fa fa-pencil"></a> <a href="#" class="fa  fa-times" onclick="delete_savfav_category(<?php echo $category['category_id']; ?>)"></a></span></h3>
					 <a href="<?php echo base_url();?>signg_in/get_all_favorites_by_cat_id/<?php echo $category['category_id']; ?>">
                   <!--  <a href="javascript:void(0)" onclick="get_favorite_images()" -->
                        <?php
									
						
						$i = 4;
						for($i=0;$i<4;$i++)
						{
							if($i<count($favorie_images))
							$image = $favorie_images[$i];
							else
							$image['favorite_image']= '';
							if($i == 0)
						 { ?>
                        
								<span class="user-img" style="background:url(<?php echo base_url() ?>uploads/<?php echo $image['favorite_image']; ?>)"></span><div class="otherImages">
                                
         <!--<div class="thumgIcon"><span style="background:url(<?php echo base_url(); ?>uploads/empty_category.png)"></span></div>
		<div class="thumgIcon aligncent"><span style="background:url(<?php echo base_url(); ?>uploads/empty_category.png)"></span></div>
        <div class="thumgIcon pull-right"><span style="background:url(<?php echo base_url(); ?>uploads/empty_category.png)"></span></div>-->
                                
                                
						<?php	} else if($i == 1) { ?>
                          
      <div class="thumgIcon"><span style="background:url(<?php echo base_url(); ?>uploads/<?php if($image['favorite_image']) echo $image['favorite_image']; else  echo "empty_category.png"; ?>)"></span></div>

						<?php } else if($i == 2) { ?>
                        
                          <div class="thumgIcon aligncent"><span style="background:url(<?php echo base_url(); ?>uploads/<?php if($image['favorite_image']) echo $image['favorite_image']; else  echo "empty_category.png"; ?>)"></span></div>
     
                        
                        <?php } else if($i == 3) { ?>
                        <div class="thumgIcon pull-right"><span style="background:url(<?php echo base_url(); ?>uploads/<?php if($image['favorite_image']) echo $image['favorite_image']; else  echo "empty_category.png"; ?>)"></span></div>
                        	
						<?php }
						
	
						 } ?>
                            
        
                         <div class="clearfix"></div>
                                </div>
                            </a>
						 </div>
                           </div>
				<?php	} 
                          
				 }
				}
				
				 ?>
                              
                             
                      
                        
                  

                  

                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
<div class="modal fade editName_Favorites" id="edit_cat_name" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Edit Title</h4>
      </div>
      <div class="modal-body" id="edit_cat_disp">

      </div>
      
    </div>
  </div>
</div>