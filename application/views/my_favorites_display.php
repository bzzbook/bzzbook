
<?php // echo $favorites; 
$result = $this->profile_set->get_userinfo($user_id='');
$name = $result[0]['user_firstname']." ".$result[0]['user_lastname'];
$image = $this->profile_set->get_profile_pic();  ?>
<div class="col-md-9">
            <div class="pin-images-grp">
                <div class="pin-images-grp-inner">
                    <span><?php echo $category_name; ?>(<?php echo count($favorites) ?>)</span>                   
                </div>
                <div class="info-bar">
                    <span class="user-img" style="background:url(<?php echo base_url(); ?>uploads/<?php if(!empty($image[0]->user_img_thumb)) echo $image[0]->user_img_thumb; else echo 'default_profile_pic.png'; ?>)"></span><p><?php echo $name; ?></p>
                    <span class="pull-right"><a href="<?php echo base_url()."profile/showfavs" ?>"><i class="fa fa-backward"></i>
Back to boards</a></span>
                </div>
                <div class="imageHolder" id="imgWaterfall">
                    <?php /*?><script type="text/x-handlebars-template" id="waterfall-tpl">
                        {{#each result}}
                        <div class="item">
                            <div class="innerItem">
                                <a href="#">
                                    <img src="<?php echo base_url().'uploads/'; ?>{{favorite_image}}"/>
                                    <span>{{favorite_post_content}}</span>
                                </a>
                            </div>
                        </div>
                        {{/result}}
                    </script><?php */?>
                        <?php foreach($favorites as $fav): ?>
                        <div class="item">
                            <div class="innerItem <?php if($fav['favorite_post_content']=='') echo 'noBorder'; ?>">
                                <a data-target="#save_as_fav_modal" data-toggle="modal" href="javascript:void(0)" onclick="saveFavAsFav(<?php echo $fav['favorite_id']; ?>);">
                                    <img <?php if($fav['favorite_post_content']=='') echo 'class="bottomRadius"'; ?> src="<?php echo base_url().'uploads/'.$fav['favorite_image']; ?>"/>
                                    <?php if($fav['favorite_post_content']!=''): ?><span><?php echo $fav['favorite_post_content']; ?></span><?php endif; ?>
                                </a>
                            </div>
                        </div>
                        <?php endforeach; ?>
                     
                </div>
            </div>
        </div>
   
	<?php /*?>
  <!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>popgroup</title>
    <link href="../include/css/font-awesome.min.css" rel="stylesheet" />
    <link href="../include/css/bootstrap.min.css" rel="stylesheet" />   
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,500,700' rel='stylesheet' type='text/css'> 
    <link href="style.css" rel="stylesheet" />
</head>
<body>
   
        
        <div class="col-md-9">
            <div class="pin-images-grp">
                <div class="pin-images-grp-inner">
                    <span>Hair styles</span>                   
                </div>
                <div class="info-bar">
                    <span class="user-img" style="background:url(<?php echo base_url(); ?>uploads/sweetgirl.png)"></span><p>Shiva Prasad sunkara</p>
                    <span class="pull-right"></span>
                </div>
                <div class="imageHolder" id="imgWaterfall">
                    <script type="text/x-handlebars-template" id="waterfall-tpl">
                        {{#result}}
                        <div class="item">
                            <div class="innerItem">
                                <a href="#">
                                    <img src="{{favorite_image}}"/>
                                    <span>Lorem Ipsum is simply dummy text of the printing and typesetting industry</span>
                                </a>
                            </div>
                        </div>
                        {{/result}}
                    </script>
                </div>
            </div>
        
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script type="text/javascript" src="../include/js/bootstrap.min.js"></script>
       <script src="<?php echo base_url(); ?>js/handlebars.js"></script>
    <script src="<?php echo base_url(); ?>js/waterfall.min.js"></script>
    <script>
        $('#imgWaterfall').waterfall({
        itemCls: 'item',
        colWidth: 201,
        gutterWidth: 5,
        gutterHeight: 0,
        isFadeIn: true,
        checkImagesLoaded: false,
        path: function (page) {
			url = "<?php echo base_url(); ?>";
            return url+'data/favorites.json;
        }
    });
    </script>
</body>
</html>



<?php */?>
