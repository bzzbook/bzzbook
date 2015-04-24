$('.about-user-details .userPhotos .photoThumb figure img').centerImage(); 	
$('.ProfileView .visitorBox .visitiBoxInner .profileLogo .cmplogo img').centerImage(); 	
$('.myfriends .groupEditBlock figure img').centerImage(); 	
$('.about-user-details .commentboxes .comment_imgbox img').centerImage(); 

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
				$(".fbphotobox-image-content").html('<div style="font-size:16px;">'+$(this).attr("alt")+'</div>'+$(this).attr("src"));
			}
		});
		
		$("button").click(function() {
			$( ".fbphotobox" ).append('<img class="photo" fbphotobox-src="images/dummy-1760x990-Mosque.jpg" src="images/dummy-1760x990-Mosque.jpg"/><img class="photo" fbphotobox-src="images/dummy-1920x2560-Goemetry.jpg" src="images/dummy-1920x2560-Goemetry.jpg"/>');
		});
	});	

 	