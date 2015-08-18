
$('.about-user-details .userPhotos .photoThumb figure img').centerImage(); 	
$('.ProfileView .visitorBox .visitiBoxInner .profileLogo .cmplogo img').centerImage(); 	
$('.myfriends .groupEditBlock figure img').centerImage(); 	
$('.about-user-details .commentboxes .comment_imgbox img').centerImage(); 
$('.curentUser .userImg img').centerImage();
$('.fdblock .friendInfo .disc .dcBtn a').centerImage();

// For comments pop

$(document).ready(function() {
	
		$(".fbphotobox img").fbPhotoBox({
			rightWidth: 360,
			leftBgColor: "black",
			rightBgColor: "white",
			footerBgColor: "black",
			overlayBgColor: "#222",
			containerClassName: 'fbphotobox',
			imageClassName: 'photo',
			onImageShow: function() {
				$(".fbphotobox img").fbPhotoBox("addTags",
						[{x:0.3,y:0.3,w:0.3,h:0.3}]
				);
				$(".fbphotobox-image-content").html();
			}
		});
		
		/*$("button").click(function() {
			$( ".fbphotobox" ).append('<img class="photo" fbphotobox-src="images/dummy-1760x990-Mosque.jpg" src="images/dummy-1760x990-Mosque.jpg"/><img class="photo" fbphotobox-src="images/dummy-1920x2560-Goemetry.jpg" src="images/dummy-1920x2560-Goemetry.jpg"/>');
		});*/
	});	
$(document).ready(function(){
	// Controls the Dropdown Visiblility ON	
$('.menuModule a').on('click', function (event) {
$(this).parent().toggleClass('open');
});
	
$(document).on('click', function (e) {
	// Controls the Dropdown Visiblility OFF		
    if ($('.open').has(e.target).length === 0) {		
        $('.menuModule').removeClass('open');
		$('.momentControl').removeClass('openSub');
    }
});
	// Controls the Sub Event Click
	$('#event_Bar a').click(function(e){
		e.preventDefault();
		var cl = $(this).attr('href');
		$('#'+cl).addClass('tabOpen');
		$('.momentControl').addClass('openSub');

	});

	$('#event_Bar a').hover(function(e){	
		$(".sub-links").removeClass('tabOpen');
		$('#event_Bar a').removeClass('active');
		var cl = $(this).attr('href');
		$('#'+cl).addClass('tabOpen');
		$(this).addClass('active');
	});
});



