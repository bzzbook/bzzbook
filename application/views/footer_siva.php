<script type="text/javascript">
user_event_edit();

function invite_event_frnds(keyword,added_users,suggestion_box){
	var value = $('#'+keyword).val();
	var addedusers = $('#'+added_users).val();
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
	//$('.selected_image').find('img').remove();
	//$('.selected_image').append('<img class="col-md-2 selected_image" src="<?php echo base_url().'images/round3.png'; ?>"/>');

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
	var event_id = $('.invite_friends_modal').attr("id").substr(11);
	
	url="<?php echo base_url(); ?>friends/get_friend_invitation/";
	//base_url="<?php // echo base_url(); ?>";
	$.post( url)
	.done(function( data ) {
	//	info = JSON.parse(data);
			$('#event_invite_friends').modal('toggle');
			$('#all_friends_invites').html(data);
			$("input[name=event_id]").val(event_id);

		    
			});
	return false;
				
	
});

$('#all_friends_invites').scroll(function()
		{
			var value = $('.data_count').attr("id").substr(5);
			
			
	       var value = parseInt(value) +5;
		   console.log(value);
			
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
var new_content = "<span id='"+user_id+"'>"+name+"<a onclick='removefrndfromeventtagging("+user_id+")'><img class='as_close_btn' src='<?php echo base_url().'images/close_btn.png'; ?>'/></a></span>";
 $('#added_tag_frnds').html(new_content+cur_content);
 $('#tag_search').focus();
 $('#tag_auto_suggest').hide();
var addedusers = $('#added_tag_users').val()
if(addedusers!='')
$('#added_tag_users').val(addedusers+','+user_id)
else
$('#added_tag_users').val(user_id)



}
	

function removefrndfromeventtagging(user_id){
	
	
	var addedusers = $('#tagaddedusers1').val();
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
	
	if(addedusers.indexOf(',')>1){
	newval = addedusers.replace(user_id+',','');  }
	else{
	newval = addedusers.replace(user_id,'');  }
	}
	else
	newval = addedusers.replace(user_id+',','');
	$('#tagaddedusers1').val(newval);
	$('#'+user_id).remove();
}

function showeventtaginput(taggedfriends,tagsearchfriends){
	//$('#selectedfriends1').hide(500);
	$('#'+taggedfriends).toggle();
	$('#'+tagsearchfriends).focus();
}



function removeaddedfrnd(user_id){
	
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
	else if(addedusers.indexOf(user_id)==0)
	newval = addedusers.replace(user_id+',','');
	else
	newval = addedusers.replace(user_id+',','');
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

$('#event_banner').change(function()
{
	alert('sadsd');
	//$('#upload_event_banner').submit();
});


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
              $('#all_friends_invites').slimscroll({
                  color: '#00f',
                  size: '10px',
                  width: '50px',
                  height: '150px'                  
              });
</script>