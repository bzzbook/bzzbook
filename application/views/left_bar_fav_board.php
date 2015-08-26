<?php 
$favorite_boards = $this->save_as_favorites_m->get_favorite_categories();

if($favorite_boards)
{
	?>
<div class="myPhotos">
 <h3>Favorites Board!</h3>
          <ul>
<?php foreach($favorite_boards as $board) { 
$data = $this->save_as_favorites_m->get_category_image($board['category_id']);

if($data[0]['favorite_image']) 
{
$imp_parts = explode('.',$data[0]['favorite_image']);
	$image = $imp_parts[0].'_thumb.'.$imp_parts[1];
?>
         
            <li><a href="<?php echo base_url('signg_in/get_all_favorites_by_cat_id/'.$board['category_id']); ?>"><span style="background:url(<?php echo base_url(); ?>uploads/<?php echo $image; ?>) center center no-repeat; width:70px; height:70px; overflow:hidden; display:block;"></span></a></li>
         
         <?php  } } ?>
          </ul>
          <div class="clear"></div>
        </div>
        
        <?php } ?>