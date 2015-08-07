
<?php// echo $favorites; ?>
<div class="col-md-9">
            <div class="pin-images-grp">
                <div class="pin-images-grp-inner">
                    <span>Hair styles</span>                   
                </div>
                <div class="info-bar">
                    <span class="user-img" style="background:url(images/sweetgirl.png)"></span><p>Shiva Prasad sunkara</p>
                    <span class="pull-right">(8) Info</span>
                </div>
                <div class="imageHolder" id="imgWaterfall">
                    <script type="text/x-handlebars-template" id="waterfall-tpl">
                        {{#result}}
                        <div class="item">
                            <div class="innerItem">
                                <a href="#">
                                    <img src="{{favorite_image}}"/>
                                    <span>{{favorite_post_content}}</span>
                                </a>
                            </div>
                        </div>
                        {{/result}}
                    </script>
                </div>
            </div>
        </div>
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
            return '.$favorites.';
        }
    });
    </script>