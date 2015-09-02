<?php 
$favorite_boards = $this->save_as_favorites_m->get_favorite_categories();

if($favorite_boards)
{
	$i = 0;
	?>
 <div class="pendingRequest">
          <h3>Favourites Board</h3>
          <ul id="add_friends">
<?php foreach($favorite_boards as $board) { 
if($i == 3)
break;
$data = $this->save_as_favorites_m->get_category_image($board['category_id']);

if($data[0]['favorite_image']) 
{
$imp_parts = explode('.',$data[0]['favorite_image']);
	$image = $imp_parts[0].'_thumb.'.$imp_parts[1];
?>
        
          <li>
              <figure><a href="<?php echo base_url('signg_in/get_all_favorites_by_cat_id/'.$board['category_id']); ?>"><span style="background:url(<?php echo base_url(); ?>uploads/<?php echo $image; ?>) center center no-repeat; width:70px; height:70px; overflow:hidden; display:block;"></span></a></figure>
              <div class="disc">
                <h4><!--<a class="override_exist_styles" href="<?php // echo base_url('profile/user/'.$req[0]['user_id']); ?>" >--><?php  echo   $str_des=substr($board['category_name'],0,8);
				// character_limiter($board['category_name'], 2); ?><!--</a>--></h4>
         
          </div>
          </li>
         
         <?php  } $i++; } ?>
          </ul>
          <div class="clear"></div>
        </div>
        
        <?php } ?>