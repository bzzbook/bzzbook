<?php 

$categories = $this->save_as_favorites_m->get_favorite_categories();
$favorites = $this->save_as_favorites_m->get_all_favorites();
//print_r($categories);
 ?>
        <div class="col-md-9">
            <div class="pin-groupBlock">
                <div class="pin-groupTop">
                    <div class="col-md-4 AboutUser text-center">
                        <span class="user-img" style="background:url(<?php echo base_url(); ?>uploads/sweetgirl.png)"></span>
                        <h3>Shiva Prasad</h3>
                        <div class="col-md-6"><?php echo count($categories); ?><p>Boards</p></div>
                        <div class="col-md-6"><?php echo count($favorites); ?> <p>Pins</p></div>
                       <!-- <div class="col-md-4">12 <p>Likes</p></div> -->
                        <div class="clearfix"></div>
                    </div>
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
                            <h3><?php echo $category['category_name']; ?></h3>
					 <a href="<?php echo base_url();?>signg_in/get_all_favorites_by_cat_id/<?php echo $category['category_id']; ?>">
                        <?php
									
						
						$i = 0;
						foreach($favorie_images as $image)
						{
							
							if($i == 0)
						 { ?>
                        
								<span class="user-img" style="background:url(<?php echo base_url() ?>uploads/<?php echo $image['favorite_image']; ?>)"></span><div class="otherImages">
                                
         <!--<div class="thumgIcon"><span style="background:url(<?php echo base_url(); ?>uploads/empty_category.png)"></span></div>
		<div class="thumgIcon aligncent"><span style="background:url(<?php echo base_url(); ?>uploads/empty_category.png)"></span></div>
        <div class="thumgIcon pull-right"><span style="background:url(<?php echo base_url(); ?>uploads/empty_category.png)"></span></div>-->
                                
                                
						<?php	}else if($i == 1) { ?>
                          
      <div class="thumgIcon"><span style="background:url(<?php echo base_url(); ?>uploads/<?php if($image['favorite_image'])echo $image['favorite_image']; else  echo "empty_category.png"; ?>)"></span></div>

						<?php } else if($i == 2) { ?>
                        
                          <div class="thumgIcon aligncent"><span style="background:url(<?php echo base_url(); ?>uploads/<?php if($image['favorite_image'])echo $image['favorite_image']; else  echo "empty_category.png"; ?>)"></span></div>
     
                        
                        <?php } else if($i == 3) { ?>
                        <div class="thumgIcon pull-right"><span style="background:url(<?php echo base_url(); ?>uploads/<?php if($image['favorite_image'])echo $image['favorite_image']; else  echo "empty_category.png"; ?>)"></span></div>
                        	
						<?php }
						
	$i++;
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
