    <script src="<?php echo base_url(); ?>js/handlebars.js"></script>
    <script src="<?php echo base_url(); ?>js/waterfall.min.js"></script>
    <script>
        $('#imgWaterfall').waterfall({
        itemCls: 'item',
        colWidth: 201,
        gutterWidth: 5,
        gutterHeight: 0,
        isFadeIn: true,
        checkImagesLoaded: true,
        });
		$('#waterfall-loading').hide();
    </script>
<script type="text/javascript">
//$('#adv_job_search_bar')[0].reset();
//$('#company_form')[0].reset();
//document.getElementById('adv_job_search_bar').reset();
//document.getElementById('company_form').reset();
/*remove_video_controls();
remove_video_controls()
{
	
$('.remove_video_controls').removeAttribute("controls");
}*/
new_one();
function new_one()
{
	
	 var trigger = $("body").find('[data-toggle="modal"]');
      trigger.click(function () {
          var theModal = $(this).data("target"),
              videoSRC = $(this).attr("data-theVideo"),
              videoSRCauto = videoSRC + "?autoplay=1";
          $(theModal + ' iframe').attr('src', videoSRCauto);
          $(theModal + ' button.close').click(function () {
              $(theModal + ' iframe').attr('src', videoSRC);
          });
          $('.modal').click(function () {
              $(theModal + ' iframe').attr('src', videoSRC);
          });
      });
}
function removefrnd(user_id){
	var addedusers = $('#addedusers').val();
	var len = addedusers.length;
	var newval = '';
	if(len==1)
	{ 
		newval = '';
	}
	else if(addedusers.indexOf(user_id)==(len-1)){
	newval = addedusers.replace(','+user_id,'');
	}
	else if(addedusers.indexOf(user_id)==0)
	newval = addedusers.replace(user_id+',','');
	else
	newval = addedusers.replace(user_id+',','');
	$('#addedusers').val(newval);
	$('#'+user_id).remove();
}
function postsubmitajax(my_form)
{
	//alert(my_form);

//e.preventDefault();
//$('#'+my_form).submit();

	// $('#posts_content_div').find('#loader_img').remove();
        

url = "<?php echo  base_url(); ?>signg_in/send_post/";
var formObj = $('form#my_form')[0];

$.ajax({
	 
url: url, // Url to which the request is send
type: "POST",             // Type of request to be send, called as method
data: new FormData(formObj), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
contentType: false,       // The content type used when sending data to the server.
cache: false,             // To unable request pages to be cached
processData:false,
beforeSend: function(){ $('#posts_content_div').prepend('<article id="loading_img"><img style="margin-left:240px; margin-bottom:8px;" src="<?php echo base_url(); ?>images/block_loader.gif" /></article>'); },        // To send DOMDocument or non processed data file it is set to false
success: function(data)   // A function to be called if request succeeds
{

if(data==404){
	$('#posts_content_div').find('#loading_img').remove(); 
alert('Post data should not be empty, please write your status or attach a file to post');
return false;
}
$('#uploadPhotosdvPreview').html('');

//$('#posts_content_div').html('');
$('#dummypost').html('');
$('#withTokens').html('');
$('#addedusers').val('');
$('#tagaddedusers').val('');
$('#posts').val('');
//$('#taggedfriends #tagaddedusers').html('');
$('#taggedfriends').find('span').remove();
$('#my_form').trigger("reset");
//$('#posts_content_div').html('');
//$('#posts_content_div').find('#last_id').remove();
//$('#selectedfriends #addedusers').html('');
$('#selectedfriends').find('span').remove();
$('#posts_content_div').prepend(data);

//window.location.reload();




}

});

	  
 //var formObj = $('form#imgCmtForm')[0];

//alert('sivaprasad');
}
function myfunction(){
	
	var fkdsfjl = document.getElementById('input_search_frnds').value;
	if(fkdsfjl){
	}
	else
	showOnlineFriends();
}
function insertNotifications(){	 
		url="<?php echo base_url(); ?>notifications";	
		$.ajax({
        url: url,
		success: function(data)
        {  
		},
		cache: false
		});
}
function getNtfcCount(){	 
		url="<?php echo base_url(); ?>notifications/getNtfsCount";	
		$.ajax({
        url: url,
		success: function(data)
        {  
			if(data!=''){ $('#ntfc_count').html(data); }
		},
		cache: false
		});
}
//window.setInterval(myfunction,5000);
//window.setInterval(insertNotifications,3000);
//window.setInterval(getNtfcCount,2000);
user_event_edit();

function invite_event_frnds(keyword,added_users,suggestion_box){
	var value = $('#'+keyword).val();
	var addedusersbefore = $('#'+added_users).val();
	var addedusers = addedusersbefore.replace(/,$/, '');
	//var addedusers = addedusersbefore.trim(',');
	//alert(addedusers);
	if(value!='')
	{	
	url="<?php echo base_url(); ?>friends/getinvitefriendsuggestion/"+value+"/"+addedusers;

	
	$.ajax({
        type: "POST",
        url: url,
        success: function(data)
        {   
			if(data){
			$('#'+suggestion_box).html(data);
			$('#'+suggestion_box).show();
			}
		},
		cache: false
		});
	}
	else{ $('#'+suggestion_box).hide(); }
}


function invite_event_frnds_main_search(keyword,suggestion_box,event_id){
	var value = $('#'+keyword).val();
	//var event_id  = $('#event_id_main').val();
	//alert(event_id)
	if(value!='')
	{	
	url="<?php echo base_url(); ?>friends/getinvitefriend_suggestion_main/"+value+"/"+event_id;

	
	$.ajax({
        type: "POST",
        url: url,
        success: function(data)
        {   
			if(data){
			$('#'+suggestion_box).html(data);
			$('#invite_frnds').load();
			$('#'+suggestion_box).show();
			}
		},
		cache: false
		});
	}
	else{ $('#'+suggestion_box).hide(); }
}






function addinvitedfriends(user_id,name,image){
	/*alert(user_id);
	alert(name);
	alert(image);*/
	$('#img_div'+user_id).find('img').remove();
	$('#img_div'+user_id).append('<img id="img_succ'+user_id+'" src="<?php echo base_url().'images/round3.png'; ?>"/>');

var cur_content = $('#invited_friends').html();
var users_check = $('#invitedusers').val();
if(users_check != '')
{
	var value = users_check.split(",");
	//alert(value);
	//alert(user_id);
	 var users_id_check = users_check.indexOf(user_id);
	// alert(users_id_check);
}
if(users_check == '' || users_id_check < 0)
{
var new_content = "<div class='row'  id='"+user_id+"'><div class='col-md-2 event_user_selected'><img src='<?php echo base_url()?>uploads/"+image+"' /></div><div class='col-md-8 event_model_user_name'>"+name+"</div><div class='col-md-2'><a onclick='removeaddedfrnd("+user_id+")'><img class='as_close_btn' src='<?php echo base_url().'images/close_btn.png'; ?>'/></a></div></div>";
 $('#invited_friends').html(new_content+cur_content);
 $('#invite_eve_friends').focus();
 $('#autosuggest_invite_frnds').hide();
var addedusers = $('#invitedusers').val()
//alert(addedusers);
if(addedusers!='')
$('#invitedusers').val(addedusers+','+user_id)
else
$('#invitedusers').val(user_id)
}
else
{

removeaddedfrnd(user_id);

$('#img_div'+user_id).find('img').remove();
$('#img_div'+user_id).append('<img id="img_succ'+user_id+'" src="<?php echo base_url().'images/round2.png'; ?>"/>');
}

}


function addinvitedfriendsmain(invited_users,eventid)
{
	url="<?php echo base_url();?>events/send_event_invitation/";
//	alert(invited_users);
//	alert(eventid);
	 $.ajax({
		type: "POST",
		url: url,
		data: { eventid:eventid , invited_users:invited_users  } ,
		success: function(html)
		{   					
			$('#autosuggest_invite_frnds_main').hide();
			$('#send_invite_success').append('<span> invitation send succesfully...</span>');
			//invites_list
			$("#invite_frnds").find('li').remove();;
			$("#invite_frnds").html(html);
		
		}


});
}



$('.invite_friends_modal').click(function()
{
	var event_id = $(this).attr("id").substr(11);
	//alert(event_id);
	url="<?php echo base_url(); ?>friends/get_friend_invitation/";
	//base_url="<?php // echo base_url(); ?>";
	$.post( url,  { event_id: event_id })
	.done(function( data ) {
	//	info = JSON.parse(data);
			$('#event_invite_friends').modal('toggle');
			//alert(data.length);
			if(data.length < 20)
			{
			$('#invites_modal_disp').hide();
			$('#no_result_data').show();
			$('#no_result_data').html('<span>No Friends Are Available To Invite!..</span>');
			}else{
			$('#invites_modal_disp').show();
			$('#no_result_data').hide();
			}
			
			$('#all_friends_invites').html(data);
			$("input[name=event_id]").val(event_id);

		    
			});
	return false;
				
	
});

$('#scroll-new').scroll(function()
		{
			var value = $('.data_count').attr("id").substr(5);
			
			
	       var value = parseInt(value) +5;
		  // console.log(value);
			
			url="<?php echo base_url(); ?>friends/get_friend_invitation/"+value;
			$.post( url)
          	.done(function( data ) {
			$('#all_friends_invites').html(data);
		});
});


$('#send_event_invitations').click(function()
{
	var eventid = $('#event_id').val();
	var invited_users = $('#invitedusers').val();
	
//	alert(eventid);
//	alert(invited_users);
	
	url="<?php echo base_url();?>events/send_event_invitation/";
	 $.ajax({
		type: "POST",
		url: url,
		data: { eventid:eventid , invited_users:invited_users } ,
		success: function(html)
		{   					
			
		var redirect_url = "<?php echo base_url(); ?>"+'profile/events';
			window.location.replace(redirect_url);
		}
	
});
		
	
});


function user_event_edit()
{

	$(".user_event_edit").click(function(){
			user_event_id = $(this).attr("id").substr(10);
			$("input[name=event_form_id]").val(user_event_id)
			url="<?php echo base_url(); ?>events/usereventEdit/";
			$.post( url, { user_event_id: user_event_id})
			.done(function( data ) {
				info = JSON.parse(data);
			
				$("input[name=event_name]").val(info.event_name);
				$("input[name=event_details]").val(info.event_details);
				$("input[name=event_location]").val(info.event_location);
				$("input[name=event_date]").val(info.event_date);
				$("select[name=event_time]").val(info.event_time);
				
				$("input[name=user_event_action]").val("update");
				$('#event_cr_btn').remove();
				$('#event_edit_btn').show();
				$('#events_upcoming').modal('toggle');
			});
			return false;
	});
				
}
function send_invite(frnd_id,event_id)
{
	//var event_id = $('#invite_frnd_event_id').val();
	//alert(frnd_id);
	//alert(event_id);
	//$("#invite_btn"+id).html('<img src="<?php echo base_url(); ?>images/block_loader.gif" />');
		url="<?php echo base_url(); ?>events/inviteFriend/";
		$.ajax({
        type: "POST",
        url: url,
		data: { frnd_id:frnd_id , event_id:event_id } ,
        success: function(data)
        {   
			$("#invite_frnds").html(data);
		},
		cache: false
		});
}


uploadimagesdisplay("uploaduserevent_Photos","uploadPhotoseventPreview","tetsdiv");
uploadimagesdisplay("uploaduserevent_Photos1","uploadPhotoseventPreview","tetsdiv");
uploadimagesdisplay("uploaduserevent_comment_Photos","uploadPhotoseventcmtPreview","tetsdiv");




function uploadimagesdisplay(a,b,c){

	 var fileUpload = document.getElementById(a);
    fileUpload.onchange = function () {
		//console.log(a+"/"+b);
		$('#'+c).hide();
		//alert(typeof(FileReader));
        if (typeof (FileReader) != "undefined") {
			//console.log('haiii');
            var dvPreview = document.getElementById(b);
            dvPreview.innerHTML = "";
            var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.jpg|.jpeg|.gif|.png|.bmp)$/;
            for (var i = 0; i < fileUpload.files.length; i++) {
                var file = fileUpload.files[i];
                if (regex.test(file.name.toLowerCase())) {
					
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        var img = document.createElement("IMG");
                        img.height = "55";
                        img.width = "55";
                        img.src = e.target.result;
                        dvPreview.appendChild(img);
                    }
                    reader.readAsDataURL(file);
                } else {
                    alert(file.name + " is not a valid image file.");
                    dvPreview.innerHTML = "";
                    return false;
                }
            }
        } else {
            alert("This browser does not support HTML5 FileReader.");
        }
    }
	}


function tagkeyupeventone(tagsearchfriends,tagaddedusers,tagautosuggest){
	var value = $('#tag_search').val();
	var addedusers = $('#added_tag_users').val();
	if(value!='')
	{	
	url="<?php echo base_url(); ?>friends/getfriendsfortaggingtoevent/"+value+"/"+addedusers;
		$.ajax({
        type: "POST",
        url: url,
        success: function(data)
        {   
			if(data){
			$('#tag_auto_suggest').html(data);
			$('#tag_auto_suggest').show();
			}
		},
		cache: false
		});
	}
	else{ $('#tag_auto_suggest').hide(); }
}


function addfrndforeventtagging(user_id,name)
{
var cur_content = $('#added_tag_frnds').html();
var new_content ="<span id='"+user_id+"'>"+name+"<a onclick='removefrndfromeventtagging("+user_id+")'><img class='as_close_btn' src='<?php echo base_url().'images/close_btn.png'; ?>'/></a></span>";
 $('#added_tag_frnds').html(new_content+cur_content);
 $('#tag_search').focus();
 $('#tag_auto_suggest').hide();
var addedusers = $('#added_tag_users').val()
if(addedusers!='')
$('#added_tag_users').val(addedusers+','+user_id)
else
$('#added_tag_users').val(user_id)



}
	

function removefrndfromeventtagging(user_id)
{
	
	
	var addedusers = $('#added_tag_users').val();
	var len = addedusers.length;
	var newval = '';
	if(len==1)
	{ 
		newval = '';
	}
	else if(addedusers.indexOf(user_id)==(len-1)){
	newval = addedusers.replace(','+user_id,'');
	}
	else if(addedusers.indexOf(user_id)==0){
	
	if(addedusers.indexOf(',')>-1){
	newval = addedusers.replace(user_id+',','');  }
	else{
	newval = addedusers.replace(user_id,'');  }
	}
	else{
	if(addedusers.indexOf(user_id+',')>-1)
	newval = addedusers.replace(user_id+',','');
	else if(addedusers.indexOf(','+user_id)>1)
	newval = addedusers.replace(','+user_id,'');
	else
	newval = addedusers.replace(user_id,'');
	}
	$('#added_tag_users').val(newval);
	$('#'+user_id).remove();
	

}

function showeventtaginput(taggedfriends,tagsearchfriends){
	//$('#selectedfriends1').hide(500);
	$('#'+taggedfriends).toggle();
	$('#'+tagsearchfriends).focus();
}



function removeaddedfrnd(user_id){
	
	$('#img_div'+user_id).find('img').remove();
    $('#img_div'+user_id).append('<img id="img_succ'+user_id+'" src="<?php echo base_url().'images/round2.png'; ?>"/>');

	var addedusers = $('#invitedusers').val();
	var len = addedusers.length;
	var newval = '';
	if(len==1)
	{ 
		newval = '';
	}
	else if(addedusers.indexOf(user_id)==(len-1)){
	newval = addedusers.replace(','+user_id,'');
	}
	else if(addedusers.indexOf(user_id)==0){
	
	if(addedusers.indexOf(',')>-1){
	newval = addedusers.replace(user_id+',','');  }
	else{
	newval = addedusers.replace(user_id,'');  }
	}
	else{
	if(addedusers.indexOf(user_id+',')>-1)
	newval = addedusers.replace(user_id+',','');
	else if(addedusers.indexOf(','+user_id)>1)
	newval = addedusers.replace(','+user_id,'');
	else
	newval = addedusers.replace(user_id,'');
	}
	$('#invitedusers').val(newval);
	$('#'+user_id).remove();
	



}


$('#all_friends_invites .as_frnd_container').hover(function() {
	alert('asdfadsf');
});




function like_event_fun(pid,uid,count){
	var posted_by=pid;
	var user_id=uid;
	url="<?php echo base_url();?>signg_in/eventinsertlinks/"+pid+"/"+uid;
	  $.ajax({
        type: "POST",
        url: url,
        data: { liked_by: pid, like_on : uid} ,
        success: function(html)
        {   
			info = JSON.parse(html);
         if(info.like_status == 'N'){
		 	//$("#like_ajax"+pid).html("Unlike");
			$("#link_like"+pid).html("Like");
		    $("#like_count"+pid).html('<img src="<?php echo base_url(); ?>images/like_myphotos.png" alt="">&nbsp;'+(info.like_count-1)+'&nbsp;&nbsp;');

		 }			
		  else{
			//$("#like_ajax"+pid).html("Like");
			$("#link_like"+pid).html("Unlike");
	        $("#like_count"+pid).html('<img src="<?php echo base_url(); ?>images/like_myphotos.png" alt="">&nbsp;'+(info.like_count+1)+'&nbsp;&nbsp;');

		  }
        }
       });	
}



function events_commentlikefun(pid,uid,count){
	var posted_by=pid;
	var user_id=uid;
	url="<?php echo base_url();?>signg_in/event_comment_insertlinks/"+pid+"/"+uid;
	  $.ajax({
        type: "POST",
        url: url,
        data: { liked_by: pid, like_on : uid} ,
        success: function(html)
        {   
			info = JSON.parse(html);
         if(info.like_status == 'N'){
		 	//$("#like_ajax"+pid).html("Unlike");
			$("#cmt_link_like"+pid).html("Like");
		    $("#cmt_like_count"+pid).html('<img src="<?php echo base_url(); ?>images/like_myphotos.png" alt="">&nbsp;'+(info.like_count-1)+'&nbsp;&nbsp;');

		 }			
		  else{
			//$("#like_ajax"+pid).html("Like");
			$("#cmt_link_like"+pid).html("Unlike");
	        $("#cmt_like_count"+pid).html('<img src="<?php echo base_url(); ?>images/like_myphotos.png" alt="">&nbsp;'+(info.like_count+1)+'&nbsp;&nbsp;');

		  }
        }
       });	
}



</script>
<script>
/*! Copyright (c) 2011 Piotr Rochala (http://rocha.la)
 * Dual licensed under the MIT (http://www.opensource.org/licenses/mit-license.php)
 * and GPL (http://www.opensource.org/licenses/gpl-license.php) licenses.
 *
 * Version: 0.2.5
 * 
 */
(function($) {

    jQuery.fn.extend({
        slimScroll: function(o) {

            var ops = o;
            //do it for every element that matches selector
            this.each(function(){

            var isOverPanel, isOverBar, isDragg, queueHide, barHeight,
                divS = '<div></div>',
                minBarHeight = 30,
                wheelStep = 30,
                o = ops || {},
                cwidth = o.width || 'auto',
                cheight = o.height || '250px',
                size = o.size || '7px',
                color = o.color || '#000',
                position = o.position || 'right',
                opacity = o.opacity || .4,
                alwaysVisible = o.alwaysVisible === true;
            
                //used in event handlers and for better minification
                var me = $(this);

                //wrap content
                var wrapper = $(divS).css({
                    position: 'relative',
                    overflow: 'hidden',
                    width: cwidth,
                    height: cheight
                }).attr({ 'class': 'slimScrollDiv' });

                //update style for the div
                me.css({
                    overflow: 'hidden',
                    width: cwidth,
                    height: cheight
                });

                //create scrollbar rail
                var rail  = $(divS).css({
                    width: '15px',
                    height: '100%',
                    position: 'absolute',
                    top: 0
                });

                //create scrollbar
                var bar = $(divS).attr({ 
                    'class': 'slimScrollBar ', 
                    style: 'border-radius: ' + size 
                    }).css({
                        background: color,
                        width: size,
                        position: 'absolute',
                        top: 0,
                        opacity: opacity,
                        display: alwaysVisible ? 'block' : 'none',
                        BorderRadius: size,
                        MozBorderRadius: size,
                        WebkitBorderRadius: size,
                        zIndex: 99
                });

                //set position
                var posCss = (position == 'right') ? { right: '1px' } : { left: '1px' };
                rail.css(posCss);
                bar.css(posCss);

                //wrap it
                me.wrap(wrapper);

                //append to parent div
                me.parent().append(bar);
                me.parent().append(rail);

                //make it draggable
                bar.draggable({ 
                    axis: 'y', 
                    containment: 'parent',
                    start: function() { isDragg = true; },
                    stop: function() { isDragg = false; hideBar(); },
                    drag: function(e) 
                    { 
                        //scroll content
                        scrollContent(0, $(this).position().top, false);
                    }
                });

                //on rail over
                rail.hover(function(){
                    showBar();
                }, function(){
                    hideBar();
                });

                //on bar over
                bar.hover(function(){
                    isOverBar = true;
                }, function(){
                    isOverBar = false;
                });

                //show on parent mouseover
                me.hover(function(){
                    isOverPanel = true;
                    showBar();
                    hideBar();
                }, function(){
                    isOverPanel = false;
                    hideBar();
                });

                var _onWheel = function(e)
                {
                    //use mouse wheel only when mouse is over
                    if (!isOverPanel) { return; }

                    var e = e || window.event;

                    var delta = 0;
                    if (e.wheelDelta) { delta = -e.wheelDelta/120; }
                    if (e.detail) { delta = e.detail / 3; }

                    //scroll content
                    scrollContent(0, delta, true);

                    //stop window scroll
                    if (e.preventDefault) { e.preventDefault(); }
                    e.returnValue = false;
                }

                var scrollContent = function(x, y, isWheel)
                {
                    var delta = y;

                    if (isWheel)
                    {
                        //move bar with mouse wheel
                        delta = bar.position().top + y * wheelStep;

                        //move bar, make sure it doesn't go out
                        delta = Math.max(delta, 0);
                        var maxTop = me.outerHeight() - bar.outerHeight();
                        delta = Math.min(delta, maxTop);

                        //scroll the scrollbar
                        bar.css({ top: delta + 'px' });
                    }

                    //calculate actual scroll amount
                    percentScroll = parseInt(bar.position().top) / (me.outerHeight() - bar.outerHeight());
                    delta = percentScroll * (me[0].scrollHeight - me.outerHeight());

                    //scroll content
                    me.scrollTop(delta);

                    //ensure bar is visible
                    showBar();
                }

                var attachWheel = function()
                {
                    if (window.addEventListener)
                    {
                        this.addEventListener('DOMMouseScroll', _onWheel, false );
                        this.addEventListener('mousewheel', _onWheel, false );
                    } 
                    else
                    {
                        document.attachEvent("onmousewheel", _onWheel)
                    }
                }

                //attach scroll events
                attachWheel();

                var getBarHeight = function()
                {
                    //calculate scrollbar height and make sure it is not too small
                    barHeight = Math.max((me.outerHeight() / me[0].scrollHeight) * me.outerHeight(), minBarHeight);
                    bar.css({ height: barHeight + 'px' });
                }

                //set up initial height
                getBarHeight();

                var showBar = function()
                {
                    //recalculate bar height
                    getBarHeight();
                    clearTimeout(queueHide);
                    
                    //show only when required
                    if(barHeight >= me.outerHeight()) {
                        return;
                    }
                    bar.fadeIn('fast');
                }

                var hideBar = function()
                {
                    //only hide when options allow it
                    if (!alwaysVisible)
                    {
                        queueHide = setTimeout(function(){
                            if (!isOverBar && !isDragg) { bar.fadeOut('slow'); }
                        }, 1000);
                    }
                }

            });
            
            //maintain chainability
            return this;
        }
    });

    jQuery.fn.extend({
        slimscroll: jQuery.fn.slimScroll
    });

})(jQuery);


//invalid name call 
              $('#scroll-new').slimscroll({
                  color: '#5890FF',
                  size: '10px',
				  width: '324px',
				  float: 'left',
                  height: '400px',
				             
              }); 
			  
			  
			
			
			
			
 function updateGoingStatus_frm_suggestions(event_id,cr_by,status)
{
	//alert(status);
//	if(status=='')
//	
//	{ status = document.getElementById('goingsts'+event_id).value; }
	url="<?php echo base_url(); ?>events/change_event_going_sts_frm_sugg/"+event_id+"/"+cr_by+"/"+status;
	$.ajax({
		
		type: "POST",
		dataType: 'text',
        url: url
		}).done(function(data){ 
		if(data){
			
			$('#event_sugg_div').html(data);
			}
	 
		});
}
</script>
<script>
$('body').delegate('.xyzzyx','keypress',function(e) {
	
	
 var post_id = $(this).attr('post_id');
	 var keycode = (e.keyCode ? e.keyCode : e.which);
     if(keycode == '13'){
	
   // if(e.which == 32 || e.which == 13) {  && $('#write_comment'+post_id).val() != ''

 

 
$("#send_comment_ajax"+post_id).on('submit',(function(d) {
url = "<?php echo base_url(); ?>signg_in/post_comment_by_ajax/";
d.preventDefault();

//$("#message").empty();
//$('#loading').show();
$.ajax({
	
url: url, // Url to which the request is send
type: "POST",             // Type of request to be send, called as method
data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
contentType: false,       // The content type used when sending data to the server.
cache: false,             // To unable request pages to be cached
processData:false,        // To send DOMDocument or non processed data file it is set to false
success: function(data)   // A function to be called if request succeeds
{
	
var link = $('#view_more_link'+post_id);
$('#view_more_link'+post_id).remove();
$('#res_comments'+post_id).append(data);
$('#res_comments'+post_id).append(link);
$('#write_comment'+post_id).val('');
var commentboxcont = $('#commentBox'+post_id).html();
$('#commentBox'+post_id).html('');
$('#uploadCommentPhotos'+post_id).val('');
$('#commentBox'+post_id).html(commentboxcont);
$('#write_comment'+post_id).html('');

}
});

}));

/* Function to preview image after validation
$(function() {
$(".abccba").change(function() {
$("#message").empty(); // To remove the previous error message
var file = this.files[0];
var imagefile = file.type;
var match= ["image/jpeg","image/png","image/jpg"];
if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2])))
{
$('#previewing').attr('src','noimage.png');
$("#message").html("<p id='error'>Please Select A valid Image File</p>"+"<h4>Note</h4>"+"<span id='error_message'>Only jpeg, jpg and png Images type allowed</span>");
return false;
}
else
{
var reader = new FileReader();
reader.onload = imageIsLoaded;
reader.readAsDataURL(this.files[0]);
}
});
}); */
function imageIsLoaded(e) {
$(".abccba").css("color","green");
$('#image_preview').css("display", "block");
$('#previewing').attr('src', e.target.result);
$('#previewing').attr('width', '250px');
$('#previewing').attr('height', '230px');
}; 
}

	
});

 $(window).scroll(function() {   
   if($(window).scrollTop() + $(window).height() == $(document).height()) {
	  
	   var last_id = $('#last_id').val();
	  // alert(last_id);
	   
	 $('#posts_content_div').find('#loader_img').remove();
        $('#posts_content_div').find('#post'+last_id).after('<article id="loader_img"><img style="margin-left:240px; margin-bottom:8px;" src="<?php echo base_url(); ?>images/block_loader.gif" /></article>');
    
	   setTimeout(function() {

	url = "<?php echo base_url(); ?>customer/get_posts/";
	$.ajax({
		type: "POST",
		data: { last_id : last_id },
		url : url,
		success : function(html)
		{

		    $('#posts_content_div').find('#loader_img').remove();
			$('#posts_content_div').find('#last_id').remove();
	      	$('#posts_content_div').append(html);		
	
		
		}
	});
	
	
}, 2000);

	   
	   
	   
       
   }
});

/*
 $(document).load(function() {   

	//var lang_data = $('#addedlangs').val();
 var posts_count = 5;
  // var posts_count = parseInt(posts_count) +5;
//  alert(posts_count);
 
	url = "<?php echo base_url(); ?>customer/get_posts/";
	$.ajax({
		type: "POST",
		data: { posts_count : posts_count},
		url : url,
		success : function(html)
		{
			//alert('succes');
			//$('#language_disp').hide();
			//$('#updateStatus #posts').html("");
			$('#posts').remove();
	      	$('#posts').html(html);		
	
		
		}
	});
	

});*/
function delete_user_event()
{
	var event_id = $('#user_event_form_id').val();
	
	
	   if (confirm("You want to Cancel This Event ") == true) {
		   	url="<?php echo base_url();?>events/delete_event/"+event_id;
	 $.ajax({
		url: url,
		success: function(html)
		{   					
			if(html == true)
			{
			 
		url="<?php echo base_url(); ?>profile/events";
	  window.location.replace(url);	
			}
		}
		
	   });
       
    } 

}
//mesages count display in left navigation
 get_unread_messages();
function get_unread_messages()
{
	
	
	url = "<?php echo base_url(); ?>message/get_msgs_count/";
		$.ajax({
        url: url,
		success: function(html)
        {  
		if(html!='')
		{
		    //$('.un_read_msg_count').html('');
			$('#un_read_msg_count').html(html);
        }
		},
		cache: false
		});
			
}
/*
function postsubmitajax(e,my_form)
{
	//alert(my_form);

//e.preventDefault();
//$('#'+my_form).submit();

	// $('#posts_content_div').find('#loader_img').remove();
        $('#posts_content_div').prepend('<article id="loading_img"><img style="margin-left:240px; margin-bottom:8px;" src="<?php echo base_url(); ?>images/block_loader.gif" /></article>');
    
	   setTimeout(function() {


url = "<?php //echo  base_url(); ?>signg_in/send_post/";
var formObj = $('form#my_form')[0];

$.ajax({
	 
url: url, // Url to which the request is send
type: "POST",             // Type of request to be send, called as method
data: new FormData(formObj), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
contentType: false,       // The content type used when sending data to the server.
cache: false,             // To unable request pages to be cached
processData:false,        // To send DOMDocument or non processed data file it is set to false
success: function(data)   // A function to be called if request succeeds
{

//$('#posts_content_div').html('');
$('#dummypost').html('');
$('#my_form').trigger("reset");
//$('#posts_content_div').html('');
$('#posts_content_div').find('#loading_img').remove();
$('#uploadPhotosdvPreview').html('');

$('#withTokens').html('');
$('#taggedfriends').find('span').html('');
$('#posts_content_div').prepend().html(data);


}

});

	   },5000);
 //var formObj = $('form#imgCmtForm')[0];

//alert('sivaprasad');
}

*/
function get_recent_posts(post_id)
{
	
	
	
		url = "<?php echo base_url(); ?>signg_in/recent_posts/"+post_id;
		$.ajax({
        url: url,
		success: function(html)
        {  
		if(html!='')
		{
		 $('#posts_content_div').prepend(html);
        }
		},
		cache: false
		});
}
/*window.setInterval(function(){


//$('#posts_content_div').first()

   $('#posts_content_div').find('#loading_img').remove();
var post_id = $('#posts_content_div > :first-child').attr("id").substr(4);
get_recent_posts(post_id);
//var id = sub_str(4,post_id);
//alert(post_id);
 
},5000);  
*/

// dynamic display of post likes
function get_recent_post_likes()
{
	url = "<?php echo base_url(); ?>signg_in/get_recent_post_likes/";
		$.ajax({
        url: url,
		accepts: "application/json; charset=utf-8",
		success: function(data)
        {  
		
		var results = $.parseJSON(data);
		if(results.success=='true'){
		$.each(results.likes, function(i, result) {
		$('#posts_content_div').find('#post'+result.post_id).find('#like_count'+result.post_id).remove();
		$('#posts_content_div').find('#post'+result.post_id).find('#link_like'+result.post_id).append('<span id="like_count'+result.post_id+'"><img alt="" src="<?php echo base_url(); ?>images/like_myphotos.png">'+result.likes+'</span>'); 
		});	
		}      
		},
		cache: false
		});
}


// get recent comments data

function get_recent_comments()
{
	url = "<?php echo base_url(); ?>signg_in/get_recent_post_comments/";
		$.ajax({
        url: url,
		accepts: "application/json; charset=utf-8",
		success: function(data)
        {  
		//alert(data);
	var result = $.parseJSON(data);
if(result.success=='true'){
$.each(result.comments, function(i, comment) {
	
	 var last_comment = 0;
	if($('#res_comments'+comment.commented_on).children().length > 0 ) {
     // do something
	 last_comment = $('#res_comments'+comment.commented_on).children('div').last().attr('id').substr(16);

	}
	
	
	//alert(last_comment);//children().last().
	get_dynamic_comments_count(comment.commented_on);
	
	
	url = "<?php echo base_url(); ?>signg_in/get_recent_single_post_data/";
		$.ajax({
        url: url,
		type: "POST",
		data : { postcomments_id : comment.postcomments_id, comment_content : comment.comment_content, commented_on : comment.commented_on, commented_by : comment.commented_by, commented_time : comment.commented_time, uploadedfiles : comment.uploadedfiles, last_comment : last_comment},
		success: function(data)
        { 
	//alert(data);
	 var link = $('#view_more_link'+comment.commented_on);
  $('#view_more_link'+comment.commented_on).remove();
		
	
	$('#res_comments'+comment.commented_on).append(data);
	
		$('#res_comments'+comment.commented_on).append(link);
	},
		cache: false
		});
	
 
});	
}

			
      
		},
		cache: false
		});
}


function get_dynamic_comments_count(post_id)
{


url = "<?php echo base_url(); ?>signg_in/comment_count_data/"+post_id;
		$.ajax({
        url: url,
		success: function(data)
        {  
		if(data)
		{
		
			// $('#posts_content_div').prepend(html);
			$('#posts_content_div').find('#post_comment_count'+post_id).remove();
			$('#posts_content_div').find('#link_comment'+post_id).append('<span id="post_comment_count'+post_id+'" class="comment_count" style="margin-left:5px;">('+data+' )</span>'); 
        }
		},
		cache: false
		});

}


function view_more_comments(post_id){
	
	var last_comment_id = $('#res_comments'+post_id).children('div').last().attr('id').substr(16);
	
	//$comments_details = $this->customermodel->comments_data($row->post_id);
	
//alert(post_id);
	//alert(last_comment_id);
	
	url = "<?php echo base_url(); ?>signg_in/comments_data_viewmore/"+post_id+"/"+last_comment_id;
		$.ajax({
        url: url,
		success: function(data)
        {  
		if(data)
		{
		var link = $('#view_more_link'+post_id); 	
		$('#view_more_link'+post_id).remove();
		$('#res_comments'+post_id).append(data);
		$('#res_comments'+post_id).append(link);
        }
		},
		cache: false
		});
	
	
	
	
}

function get_save_fav_categories(cat_search)
{
	//alert(user_id);
	//var cat_search = $('#category_search').val();
//	alert(cat_search);  
	if(cat_search.length > 0 )
	{
		url = "<?php echo base_url(); ?>signg_in/save_fav_category_search/"+cat_search;
		$.ajax({
        url: url,
		success: function(data)  
        {  
		if(data)
		{
		$('#create_new_category').remove();
		$('.user-option-block').find('.search_result').remove();
		$('#categories').find('.CreateBoard').remove();
        $('.user-option-block #categories').prepend(data);
		}
		},
		cache: false
		});
	
	}else{
	$('#create_new_category').remove();
	$('.user-option-block').find('.search_result').remove();
}
}
function get_save_fav_user_categories()
{
	
		url = "<?php echo base_url(); ?>signg_in/save_fav_user_categories/";
		$.ajax({
        url: url,
		success: function(data)
        {  
		if(data)
		{
		$('#categories').html('');
        $('.user-option-block #categories').append(data);
		}
		},
		cache: false
		});
	
}

function create_save_fav_category(search_key_word,user_id)
{
		//alert(search_key_word);
		url = "<?php echo base_url(); ?>signg_in/save_fav_create_category/"+search_key_word+"/"+user_id;
		$.ajax({
        url: url,
		success: function(data)
        { 
		//alert("hai"); 
		if(data)
		{
			var data = data.trim();
			insert_save_as_favorite(data);
	  
		}
		},
		cache: false
		});
}

function insert_save_as_favorite(category_id)
{
//if(category_id != '')	
//var category_id = $('#category_id').val();
//else
//alert('prasad'+category_id+'siva');
var category_id = category_id;

//if($('#post_content').val() != '')
//{
var post_content = $('#post_content').val();
//}else
//{
//var post_content = '';
//}
var uploaded_file = $('.active #uploaded_files').val();
//alert(category_id);
//alert(post_content);
//alert(uploaded_file);

	url = "<?php echo base_url(); ?>signg_in/insert_save_as_fav/";
		$.ajax({
		type: "POST",
        url: url,
		data : {category_id:category_id, post_content:post_content, uploaded_file:uploaded_file},
	
		success: function()
        {  
		$('.fav_add_success').html('');
		$('.fav_add_success').append('<span> Added To Favorites Successfully... </span>');
		
		$('.fav_add_success').fadeOut(5000);
		//$('.fav_add_success').find('span').remove();
		
		//$('#save_as_fav_modal').modal('toggle');
	   // url="<?php //echo base_url(); ?>signg_in/get_all_favorites_by_cat_id/"+category_id;
	  // window.location.replace(url);
		},
		cache: false
		});
}


function get_latest_friends_of_user()
{
		
		url = "<?php echo base_url(); ?>friends/get_latest_frnds/";
		$.ajax({
        url: url,
		success: function(html)
        {  
		//alert(html);
		if(html)
		{
			//alert(html);
			//$('.latestFriends').show();	
	    	//$('#latest_frnds_by_time').find('li').remove();
	 	$('.latest_frnds_demo').html('');	
		 $('.latest_frnds_demo').append(html);
		}
		else
		{
			$('.latestFriends').hide();
		}},
		cache: false
		});
}



/*window.setInterval(function(){


//var post_id = $('#posts_content_div > :first-child').attr("id").substr(4);
   get_recent_post_likes();
  get_recent_comments();
  get_latest_friends_of_user();

},5000);  
*/
function delete_post(post_id)
{
//alert(post_id);

	if (confirm("Delete Your Post From bzzBook") == true) {
	url="<?php echo base_url();?>profile/deletePost/"+post_id;
	 $.ajax({
		url: url,
		type: "POST",
		success: function(data)
		{   					
			if(data == true)
			$('#post'+post_id).remove();
			else
			return false;

		}
		
	   });
       
    } 
	
}

function hide_post(post_id,user_id)
{


	if (confirm("Hide Your Post From bzzBook") == true) {
	url="<?php echo base_url();?>profile/hidePost/"+post_id+"/"+user_id;
	 $.ajax({
		url: url,
		type: "POST",
		success: function(data)
		{   					
			if(data == true)
			$('#post'+post_id).remove();
			else
			return false;

		}
		
	   });
       
    } 
	
}

function search_online_friends(name){
  
if(name!=''){
	$('#online-friends-search').show();
  url="<?php echo base_url(); ?>friends/get_online_frnds/"+name;
 
 
  $.ajax({
        url: url,
  success: function(data)
        { 
   $('#online-friends').hide();
   $('#online-friends-search').html(data);
  },
  cache: false
  });
}else{
	$('#online-friends').show();
	$('#online-friends-search').hide();
}
}

function create_cat_focus()
{
$('#save_fav_category_search').focus();
}
function create_album_focus()
{

$('#album_search').focus();
}

$('.searchBlock .originalBlock a').click(function () {


var job_id = $(this).attr('id').substr(8);
//alert(job_id);




  url="<?php echo base_url();?>jobs/hide_a_job/";
	 $.ajax({
		data : { job_id :  job_id},
		url: url,
		type: "POST",
		success: function()
		{   
		//$('#job_block'+job_id).toggleClass('removed');
		$('#originalBlock'+job_id).hide();
		$('#overlayBlock'+job_id).fadeIn().delay(5000).fadeOut();
	    $('#job_block'+job_id).fadeOut(5000);
		}
		
	   });
	   	

});

$('.searchBlock .overlayBlock a').click(function () {

var job_id = $(this).attr('id').substr(10);

url="<?php echo base_url();?>jobs/remove_hide_a_job/";
	 $.ajax({
		data : { job_id :  job_id},
		url: url,
		type: "POST",
		success: function()
		{  
		$('#overlayBlock'+job_id).stop();		
		$('#job_block'+job_id).stop();	
		$('#job_block'+job_id).fadeIn('fast');
		$('#originalBlock'+job_id).fadeIn('fast').css('display','block');
		$('#overlayBlock'+job_id).css('display','none');
		}
		
	   });


});

$('#advanced_job_search').click(function()
{
	$('#adv_job_search').submit();

});

</script>
 <script type="text/javascript">
$(function() {
    // init carousel
    $('.carousel').carousel({
        pause: true,        // init without autoplay (optional)
        interval: false,    // do not autoplay after sliding (optional)
        wrap:false          // do not loop
    });
    // init carousels with hidden left control:
    $('.carousel').children('.left.carousel-control').hide();
});

// execute function after sliding:
$('.carousel').on('slid.bs.carousel', function () {
    // This variable contains all kinds of data and methods related to the carousel
    var carouselData = $(this).data('bs.carousel');
    // get current index of active element
    var currentIndex = carouselData.getItemIndex(carouselData.$element.find('.item.active'));

    // hide carousel controls at begin and end of slides
    $(this).children('.carousel-control').show();
    if(currentIndex == 0){
        $(this).children('.left.carousel-control').fadeOut();
    }else if(currentIndex+1 == carouselData.$items.length){
        $(this).children('.right.carousel-control').fadeOut();
    }
});



      $(".advancedSearchControl span").click(function () {
			 $(".advancedSearch-block").slideToggle("slow");
				//alert("Test Block");
				$('#adv_job_search').get(0).reset();
					
            $(this).children('i').toggleClass(function () {
                if ($(this).is(".fa-angle-double-down")) {
                    $(this).removeClass('fa-angle-double-down');
                    return "fa-angle-double-up";
                } else {
                    $(this).removeClass('fa-angle-double-up');
                    return "fa-angle-double-down";
                }
            });
          
        });

callcommonAjaxCall();
function callcommonAjaxCall(){
var first_element = $('#posts_content_div > :first-child').attr("id");
if(first_element=='loading_img')
var post_id = $('#posts_content_div > :nth-child(2)').attr("id").substr(4);
else
var post_id = $('#posts_content_div > :first-child').attr("id").substr(4);
commonAjaxCall(post_id);
window.setTimeout(callcommonAjaxCall,15000);
}
function commonAjaxCall(ajax_post_id){

  url="<?php echo base_url(); ?>common/singlecall/"+ajax_post_id; 
  $.ajax({
  url: url,
  success: function(data){  
  		
		var result = JSON.parse(data);
		//showOnlineFriends
		if(result.showOnlineFriends){
			
			var search_text = document.getElementById('input_search_frnds').value;
			if(!search_text){
				
				$('#online-friends').html(result.showOnlineFriends);
			}
		  
		}
		//getNtfcCount
		if(result.getNtfcCount!=''){ 
		 $('#ntfc_count').html(result.getNtfcCount); 
		}else{ 
		 $('#ntfc_count').html(''); 
		}
		
		//get_recent_posts
		if(result.get_recent_posts!='')
		{
		 $('#posts_content_div').prepend(result.get_recent_posts);
        }
		
		//get_recent_post_likes
		  
		if(result.get_recent_post_likes!='')
		{
			$.each(result.get_recent_post_likes, function(i, res) {
			$('#posts_content_div').find('#post'+res.post_id).find('#like_count'+res.post_id).remove();
			$('#posts_content_div').find('#post'+res.post_id).find('#link_like'+res.post_id).append('<span id="like_count'+res.post_id+'"><img alt="" src="<?php echo base_url(); ?>images/like_myphotos.png">'+res.likes+'</span>'); 
			});	
			   
		}
		//get_recent_comments 
		
		if(result.get_recent_comments!=''){
			 
			$.each(result.get_recent_comments, function(i, comment) {
			
			var last_comment = 0;
			if($('#res_comments'+comment.commented_on).children().length > 0 ) {
			// do something
			last_comment = $('#res_comments'+comment.commented_on).children('div').last().attr('id').substr(16);
			
			}
			
			
			//alert(last_comment);//children().last().
			get_dynamic_comments_count(comment.commented_on);
			
			
			url = "<?php echo base_url(); ?>signg_in/get_recent_single_post_data/";
			$.ajax({
			url: url,
			type: "POST",
			data : { postcomments_id : comment.postcomments_id, comment_content : comment.comment_content, commented_on : comment.commented_on, commented_by : comment.commented_by, commented_time : comment.commented_time, uploadedfiles : comment.uploadedfiles, last_comment : last_comment},
			success: function(data)
			{ 
			//alert(data);
			var link = $('#view_more_link'+comment.commented_on);
			$('#view_more_link'+comment.commented_on).remove();
			
			
			$('#res_comments'+comment.commented_on).append(data);
			
			$('#res_comments'+comment.commented_on).append(link);
			},
			cache: false
			});
			
			
			});	
			
		}
		//get_latest_friends_of_user
		if(result.get_latest_friends_of_user!='')
		{			
	 	 $('.latest_frnds_demo').html('');	
		 $('.latest_frnds_demo').append(result.get_latest_friends_of_user);
		}
		else
		{
			$('.latestFriends').hide();
		}
		//get_unread_messages
		if(result.get_unread_messages!='')
		{
		    //$('.un_read_msg_count').html('');
			$('#un_read_msg_count').html(result.get_unread_messages);
        }
		
  },
  cache: false
  });
}

/*
        $(".searchBlock a.fa").click(function (e) {
            e.preventDefault();
            $(this).parent().parent().toggleClass('removed');
        });
        $(".searchBlock .overlayBlock a").click(function (e) {
            e.preventDefault();
            $(this).parent().parent().parent().toggleClass('removed');
        });
*/

// video play in modal form
function existed_album_search(search_keyword)
{
	if(search_keyword!='')
	{	
	url="<?php echo base_url(); ?>profile/get_albums/"+search_keyword;
		$.ajax({
        url: url,
		success: function(data)  
        {  
		if(data)
		{
			//alert(data);
			$('.scroll-pane #create_new_category').remove();
			$('#albums .scroll-pane').html('');
			$('#albums .scroll-pane').append(data);
		}
		},
		cache: false
		});
	
	}else
	{
		$('.scroll-pane #create_new_category').remove();
		$('#albums .scroll-pane').html('');
	}

}


function create_album(album_name,user_id)
{
	url = "<?php echo base_url(); ?>profile/create_album/"+album_name+"/"+user_id;
		$.ajax({
        url: url,
		success: function(data)
        { 
		//alert("hai"); 
		if(data)
		{
			//var data = data.trim();
			//insert_save_as_favorite(data);
			$('#album_search').val('');
			$('#albums .scroll-pane').html('');
			$('#album_id').val(data);
			//$('#album_name').html('');
			$('#album_name').show();
			$('#album_name').append(album_name+'Album');
	  
		}
		},
		cache: false
		});
}

function add_album(album_name,album_id)
{
	//alert(album_id);
	//alert(album_name);
$('#album_search').val('');
$('#albums .scroll-pane').html('');
$('#album_id').val(album_id);
//$('#album_name').html('');
$('#album_name').show();
$('#album_name').append(' '+album_name+'  Album');

}

    </script>
