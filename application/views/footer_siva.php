<script type="text/javascript">

function invite_event_frnds(){
	var value = $('#invite_eve_friends').val();
	var addedusers = $('#invitedusers').val();
	if(value!='')
	{	
	url="<?php echo base_url(); ?>friends/getinvitefriendsuggestion/"+value+"/"+addedusers;
		$.ajax({
        type: "POST",
        url: url,
        success: function(data)
        {   
			if(data){
			$('#autosuggest_invite_frnds').html(data);
			$('#autosuggest_invite_frnds').show();
			}
		},
		cache: false
		});
	}
	else{ $('#autosuggest_invite_frnds').hide(); }
}




function addinvitedfriends(user_id,name,image){
	/*alert(user_id);
	alert(name);
	alert(image);*/
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
var new_content = "<span id='"+user_id+"'><img src='<?php echo base_url()?>uploads/"+image+"' />"+name+"<a onclick='removefrnd("+user_id+")'><img class='as_close_btn' src='<?php echo base_url().'images/close_btn.png'; ?>'/></a></span>";
 $('#invited_friends').html(new_content+cur_content);
 $('#invite_eve_friends').focus();
 $('#autosuggest_invite_frnds').hide();
var addedusers = $('#invitedusers').val()
if(addedusers!='')
$('#invitedusers').val(addedusers+','+user_id)
else
$('#invitedusers').val(user_id)
}
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
			
			
	       var value = parseInt(value) +1;
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
	
	alert(eventid);
	alert(invited_users);
	
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
</script>