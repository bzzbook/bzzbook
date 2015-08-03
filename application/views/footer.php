<?php session_start();
	  if(empty($user_id))
	  $curr_user_id = $this->session->userdata('logged_in')['account_id'];
	  else
	  $curr_user_id = $user_id; 
	  $curr_user_data= $this->customermodel->profiledata($curr_user_id);
	  $_SESSION['username'] = $curr_user_data[0]->username; // Must be already set
	 // echo $curr_user_data[0]->username;
	  ?>
<!--      <div id="online-friends"></div>
-->
<div class="wrapper">

    <div class="toggle">

    <ul id="online-friends"></ul>
     <div class="clearfix"></div>

    </div>
    <div  class="rig_bottoms">
<div class="col-md-1"><i class="fa fa-search "></i></div>
<div class="col-md-8"><input id="input_search_frnds" type="text" onkeyup="showOnlineFriends(this.value)"  /></div>
<div class="col-md-1"><i class="fa  fa-external-link"></i></div>
</div>
    </div>

<?php
$upload_path = "uploads/";							
$thumb_width = "150";						
$thumb_height = "150";		
?>

<footer class="post">
  <ul>
    <li><a hrte>ABOUT US</a></li>
    <li><a href="#">PRIVACY POLICY</a></li>
    <li><a href="#">TERMS OF USE</a></li>
  </ul>
  <p>Bzzbook &copy; 2015 English (US)</p>
</footer>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script src="<?php echo base_url(); ?>js/jquery-1.11.1.min.js"></script> 
<?php /*?><script src="<?php echo base_url(); ?>javascripts/jquery.attach.js"></script> 
<script src="<?php echo base_url(); ?>javascripts/example.js"></script><?php */?>
<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script> 
<?php
if(strpos($_SERVER['REQUEST_URI'],'company/my_companies') !== false) {
?>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script>
$(function () {
    $("#fileupload").change(function () {
		$("#dvPreview").html("");
        var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.jpg|.jpeg|.gif|.png|.bmp)$/;
        if (regex.test($(this).val().toLowerCase())) {
            if ($.browser.msie && parseFloat(jQuery.browser.version) <= 9.0) {
                $("#dvPreview").show();
                $("#dvPreview")[0].filters.item("DXImageTransform.Microsoft.AlphaImageLoader").src = $(this).val();
            }
            else {
                if (typeof (FileReader) != "undefined") {
                    $("#dvPreview").show();
                    $("#dvPreview").append("<img />");
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $("#dvPreview img").attr("src", e.target.result);
      $("#dvPreview img").attr("style", 'width:149px;height:156px' );
                    }
                    reader.readAsDataURL($(this)[0].files[0]);
                } else {
                    alert("This browser does not support FileReader.");
                }
            }
        } else {
            alert("Please upload a valid image file.");
        }
    });
	
});
	</script>
<?php }
?>
<script src="<?php echo base_url(); ?>js/animate-plus.min.js"></script> 
<script src="<?php echo base_url(); ?>js/jquery.validate.min.js"></script>
<script src="<?php echo base_url(); ?>js/jquery.validate.min.js"></script>
<script src="<?php echo base_url(); ?>js/additional-methods.js"></script>
<script src="<?php echo base_url(); ?>js/countries.js"></script>
<script src="<?php echo base_url(); ?>js/usa_states.js"></script>
<script language="javascript">print_country("country");</script>  
<script src="<?php echo base_url(); ?>js/jquery.jqtransform.js"></script>
<script language="javascript">print_usa_states("usa_states");</script>
<script src="<?php echo base_url(); ?>js/lightbox.min.js"></script>
<script src="<?php echo base_url(); ?>js/jquery.uploadfile.min.js"></script>
<script src="<?php echo base_url(); ?>js/bootstrap-datepicker.js"></script> 
<script src="<?php echo base_url(); ?>js/jquery.blImageCenter.js"></script> 
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/jquery-ui.min.js"></script> 
<script src="<?php echo base_url(); ?>js/fbphotobox.js"></script>
<script src="<?php echo base_url(); ?>js/custom.js"></script> 
<script src="<?php echo base_url(); ?>js/jquery.nanoscroller.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/chat.js"></script>
<script>
		$( document ).ready(function() {
		$('.select').jqTransform({ imgPath: '' });
		$('#calYears').datepicker();
		
   $('#email_invite').validate();
   $('#upload_file').validate();
   $('#search_job').validate(); 
   $('#event_discussion').validate();
   $('#change_pwd').hide();
   $('#pf_pwd_change').validate();
   $(".message").fadeOut(6000);
 
  $('#dummypost').focusin(function() 
   {
   $('#updateControls').show();
  
});



$('#share_business_card_frnds').keypress(function(e) {
	
    if(e.which == 32) {
	var cur_content = $('#selected_emails').html();
	
	var user_mail = $.trim($(this).val());
	
	
	var new_content  =  "<span class='bc_mail_ids' id='"+user_mail+"'>"+user_mail+"<a onclick='removemail(&#39"+user_mail+"&#39)'><img class='as_close_btn' src='<?php echo base_url().'images/close_post.png'; ?>'/></a></span>";
	$('#selected_emails').html(new_content+cur_content);
	$('#selected_emails').show();
	$(this).val('').focus();
	
	 var added_emails = $('#addedmails').val()
if(added_emails!='')
$('#addedmails').val(added_emails+','+user_mail)
else
$('#addedmails').val(user_mail)

    }

});



});




function removemail(user_mail){

	var added_emails = $('#addedmails').val();
	var len = added_emails.length;
	var newval = '';
	if(len==1)
	{ 
		newval = '';
	}
	else if(added_emails.indexOf(user_mail)==(len-1)){
	newval = added_emails.replace(','+user_mail,'');
	}
	else if(added_emails.indexOf(user_mail)==0)
	newval = added_emails.replace(user_mail+',','');
	else
	newval = added_emails.replace(user_mail+',','');
	$('#addedmails').val(newval);
	$('#'+user_mail).remove();
}




</script>
<script>
$(document).ready(function()
{
var settings = {
    url : "<?php echo base_url(); ?>upload.php ?>",
    dragDrop:true,
    fileName: "myfile",
    allowedTypes:"jpg,png,gif,doc,pdf,zip",	
    returnType:"json",
	 onSuccess:function(files,data,xhr)
    {
       // alert((data));
    },
    showDelete:true,
    deleteCallback: function(data,pd)
	{
    for(var i=0;i<data.length;i++)
    {
        $.post("delete.php",{op:"delete",name:data[i]},
        function(resp, textStatus, jqXHR)
        {
            //Show Message  
            $("#status").append("<div>File Deleted</div>");   
			$("#status1").append("<div>File Deleted</div>");      
        });
     }      
    pd.statusbar.hide(); //You choice to hide/not.

}
}
//var uploadObj = $("#mulitplefileuploader").uploadFile(settings);
//var uploadObj = $("#mulitplefileuploader1").uploadFile(settings);


});



</script>   

<script>
$(function(){
	education_edit();
	profile_edit();
	organization_edit();
	group_edit();
			$("form[name=formabout_me]").submit(function(event){
			   url="<?php echo base_url();?>customer/updateabout/";
				 $.ajax({
        			type: "POST",
			        url: url,
			        data: { form_data: $(this).serialize()} ,
        			success: function(html)
			        {   
            			if(html == true)
							alert("Information Updated");
						else
							alert("Something went wrong Please try after sometime");
			        }
			       });			
				event.preventDefault();
			});
			
			$("form[name=newone]").submit(function(event){
			   url="<?php echo base_url();?>customer/sidebarSettings/";
				 $.ajax({
        			type: "POST",
			        url: url,
			        data: { form_data: $(this).serialize()} ,
        			success: function(html)
			        {   
            			if(html == true)
							alert("Information Updated");
					
						else
							alert("Something went wrong Please try after sometime");
			        }
			       });			
				event.preventDefault();
			});
			
				$("form[name=postboard]").submit(function(event){
			   url="<?php echo base_url();?>customer/postboard_update/";
				 $.ajax({
        			type: "POST",
			        url: url,
			        data: { form_data: $(this).serialize()} ,
        			success: function(html)
			        {   
            			alert("Information Updated");
						
			        }
			       });			
				event.preventDefault();
			});
			
			$("form[name=pf_pwd_change]").submit(function(event){
		
				var errors = '';
					if($('#pwd').val()== '' || $("#npwd").val()=='' || $("#cnpwd").val()=='')
					{
						//$("#change_pwd_error").html("please enter password AND Confirmation Password");
				
					}else{
	   url="<?php echo base_url();?>customer/password_update/";
		 $.ajax({
			type: "POST",
			url: url,
			data: { form_data: $(this).serialize()} ,
			success: function(html)
			{   
				$('#change_pwd').toggle();
				alert("Password Updated");
				$('#pwd_change_btn').toggle();
				
			}
		   });			
					}
		event.preventDefault();
	});
			
			$("#privacy_form").submit(function( event ){
					 url="<?php echo base_url();?>customer/updateprivacy/";
					$.post( url, { formdata: $(this).serialize() })
					.done(function( data ) {
					   	if(data == true)
							alert("Information Updated");
						else
							alert("Something Went wrong please try again after sometime");
					  });
					event.preventDefault();
			});
			$("#emailnotification").submit(function( event ){
				url="<?php echo base_url();?>customer/updateemailnotification/";
				$.post( url, { formdata: $(this).serialize() })
					.done(function( data ) {
					   	if(data == true)
							alert("Information Updated");
						else
							alert("Something Went wrong please try again after sometime");
					  });
					event.preventDefault();
			});
			$("#education_form").submit(function( event){
					
					if($("#year_attended_from").val()==0 || $("#month_attended_from").val()==0 || $("#year_attended_to").val()==0 || $("#month_attended_to").val()==0 || $("#field_of_study").val()=='' || $("#college_institution").val()=='' || $("#degree_certificate").val()=='')
					{
						$("#eduformerrors").html("Fields with '*' are mandatory, Please fill them...");
					}
					else if($("#year_attended_from").val() > $("#year_attended_to").val())
					{
						$("#eduformerrors").html("Years Attended Details Not Valid, Please check...");
					}
					else
					{				
					url="<?php echo base_url();?>customer/manageducation/";
					$.post( url, { formdata: $(this).serialize() })
					.done(function( data ) {
						   	if(data == false)
							alert("Please Enter Valid Details");
						else
						{
							$(".groupMainBlock").html(data);
							$('#education_form').trigger("reset");
							$('#eduModal').modal('toggle');
							education_edit();
						}
						
					  });
					}
					event.preventDefault();
				});
				$("#profession_form").submit(function( event){
					
					if($("#pro_year_attended_from").val()==0 || $("#pro_month_attended_from").val()==0 || $("#pro_year_attended_to").val()==0 || $("#pro_month_attended_to").val()==0 || $("#job_title").val()=='' || $("#job_description").val()=='' )
					{
						$("#proformerrors").html("Fields with '*' are mandatory, Please fill them...");
					}
					else if($("#pro_year_attended_from").val() > $("#pro_year_attended_to").val())
					{
						$("#proformerrors").html("Start should not be greater than end date");
					}
					else
					{	
							
					url="<?php echo base_url();?>customer/manageprofession/";
					$.post( url, { formdata: $(this).serialize() })
					.done(function( data ) {
					   	if(data == false)
							alert("Please Enter Valid Details");
						else
							$(".groupMainBlock1").html(data);
							$('#profession_form').trigger("reset");
							$('#profModal').modal('toggle');
							profile_edit();
					  });
					}
				event.preventDefault();});	
				$("#organization_form").submit(function( event){
					if($("#org_year_attended_from").val()==0 || $("#org_month_attended_from").val()==0 || $("#org_year_attended_to").val()==0 || $("#org_month_attended_to").val()==0 || $("#org_name").val()=='' || $("#position").val()==''   )
					{
						$("#orgformerrors").html("Fields with '*' are mandatory, Please fill them...");
					}
					else if($("#org_year_attended_from").val() > $("#org_year_attended_to").val())
					{
						$("#orgformerrors").html("Start date should not be greater than end date");
					}
					else
					{	
					url="<?php echo base_url();?>customer/manageorganization/";
					$.post( url, { formdata: $(this).serialize() })
					.done(function( data ) {
					   	if(data == false)
							alert("Please Enter Valid Details");
						else
							$(".groupMainBlock2").html(data);
							$('#organization_form').trigger("reset");
							$('#orgModal').modal('toggle');
							organization_edit();
					  });
					}
				event.preventDefault();
				});	
				$('#group_form').submit( function( event){
					if($("#group_name").val()=='' || $("#city").val()=="" || $("#usa_states").val()==0 || $("#postal_code").val()=='' )
					{
						$("#grpformerrors").html("Fields with '*' are mandatory, Please fill them...");
					}
					else
					{	
					url="<?php echo base_url(); ?>customer/managegroup/";
					$.post( url, { formdata: $(this).serialize()})
					.done(function( data ) {
						if(data == false)
						alert("Please Enter Valid Details");
						else
						$(".groupMainBlock3").html(data);
						$('#group_form').trigger("reset");
						$('#grpModal').modal('toggle');
						group_edit();
					});
					}
					event.preventDefault();
				});
				function education_edit()
				{
				$(".edu_edit").click(function(){
						education_id = $(this).attr("id").substr(14);
						$("input[name=edu_form_id]").val(education_id)
						url="<?php echo base_url(); ?>profile/eduEdit/";
						$.post( url, { education_id: education_id})
						.done(function( data ) {
							info = JSON.parse(data);
							$("input[name=field_of_study]").val(info.field_of_study);
							$("input[name=college_institution]").val(info.college_institution);
							$("input[name=degree_certificate]").val(info.degree_certificate);
							$("textarea[name=special_studies]").val(info.specialised_studies);
							from_date = info.attended_from.split('-')
							$("select[name=year_attended_from]").val(from_date[0]);
							$("select[name=month_attended_from]").val(from_date[1]);
							to_date = info.attended_upto.split('-')
							$("select[name=year_attended_to]").val(to_date[0]);
							$("select[name=month_attended_to]").val(to_date[1]);
							$("input[name=edu_action]").val("update");
							$('#eduModal').modal('toggle');
						});
						return false;
				});
				}
				function profile_edit()
				{
					$(".prof_edit").click(function(){
						profession_id = $(this).attr("id").substr(15);
						$("input[name=prof_form_id]").val(profession_id)
						url="<?php echo base_url(); ?>profile/profEdit/";
						$.post( url, { profession_id: profession_id})
						.done(function( data ) {
							info = JSON.parse(data);
							$("input[name=job_title]").val(info.job_title);
							start_date = info.start_date.split('-')
							$("select[name=year_attended_from]").val(start_date[0]);
							$("select[name=month_attended_from]").val(start_date[1]);
							end_date = info.end_date.split('-')
							$("select[name=year_attended_to]").val(end_date[0]);
							$("select[name=month_attended_to]").val(end_date[1]);
							$("textarea[name=job_description]").val(info.job_description);
							$("input[name=current]").attr("checked","checked");
							$("input[name=prof_action]").val("update")
							$('#profModal').modal('toggle');
						});
						return false;
				});
				}
				function organization_edit()
				{
					$(".org_edit").click(function(){
						organization_id = $(this).attr("id").substr(14);
						$("input[name=org_form_id]").val(organization_id)
						url="<?php echo base_url(); ?>profile/orgEdit/";
						$.post( url, { organization_id: organization_id})
						.done(function( data ) {
							info = JSON.parse(data);
							$("input[name=org_name]").val(info.org_name);
							$("input[name=position]").val(info.position);
							$("textarea[name=org_description]").val(info.org_desc);
							start_date = info.start_date.split('-')
							$("select[name=year_attended_from]").val(start_date[0]);
							$("select[name=month_attended_from]").val(start_date[1]);
							end_date = info.end_date.split('-')
							$("select[name=year_attended_to]").val(end_date[0]);
							$("select[name=month_attended_to]").val(end_date[1]);
						    $("select[name=emp_status]").val(info.emp_status);	
							$("input[name=org_action]").val("update")
							$('#orgModal').modal('toggle');
						});
						return false;
				});
				}
				function group_edit()
				{
					$(".grp_edit").click(function(){
						group_id = $(this).attr("id").substr(14);
						$("input[name=grp_form_id]").val(group_id)
						url="<?php echo base_url(); ?>profile/grpEdit/";
						$.post( url, { group_id: group_id})
						.done(function( data ) {
							info = JSON.parse(data);
							$("input[name=group_name]").val(info.group_name);
							$("input[name=group_type]").val(info.group_type);
							$("input[name=website_url]").val(info.group_web_url);
							$("input[name=city]").val(info.group_city);
							$("select[name=usa_states]").val(info.group_state);
							$("input[name=postal_code]").val(info.group_postalcode);
							$("textarea[name=additional_info]").val(info.group_about);
							$("input[name=grp_action]").val("update")
							$('#grpModal').modal('toggle');
						});
						return false;
				});
				}
				function job_edit()
				{
				$(".job_edit").click(function(){
						job_id = $(this).attr("id").substr(14);
						$("input[name=edu_form_id]").val(job_id)
						url="<?php echo base_url(); ?>jobs/jobEdit/";
						$.post( url, { job_id: job_id})
						.done(function( data ) {
							info = JSON.parse(data);
							$("input[name=job_title]").val(info.job_title);
							$("input[name=job_type]").val(info.job_type);
							$("input[name=job_keyword]").val(info.job_keyword);							
							$("input[name=job_contact_phone]").val(info.job_contact_phone);
							$("input[name=job_contact_email]").val(info.job_contact_email);
							$("input[name=job_contact_name]").val(info.job_contact_name);
							$("textarea[name=job_description]").val(info.job_description);
							$("textarea[name=job_how_to_apply]").val(info.job_how_to_apply);
							$("textarea[name=job_requirements]").val(info.job_requirements);
							$("select[name=job_category]").val(info.job_category);
							$("select[name=company_posted_by]").val(info.company_posted_by);
							$("select[name=job_salary]").val(info.job_salary);
							$("input[name=edu_action]").val("update");
							$('.bs-example-modal-lg').modal('toggle');
						});
						return false;
				});
				}
				
});
function pwdchange(){
	
var errors = '';
	if($('#pwd').val()== '')
	{
		
	//	$("#change_pwd_error").html("please enter password");

	}else{
var pass=$('#pwd').val();
   url="<?php echo base_url();?>signg_in/checkpass/"+pass;
   $.ajax({
        type: "POST",
        url: url,
        data: { pass: pass} ,
        success: function(data)
        {   
		if(data == false){
    	alert("Please enter valid password");
		$('#pwd').focus();
		}else{
		$('#npwd').focus();
		}
		}
       });
	}
}
 $('#profile_interchange').change(function(){
     id = $(this).val();
	 if(id == 'user')
	 {
	  url="<?php echo base_url(); ?>profile";
	 }else{
	 url="<?php echo base_url(); ?>company/company_disp/"+id;
	 }
	 window.location.replace(url);
	});

</script>
<!-- <script type="text/javascript">
		$( document ).ready(function() {
			$("#country").val("<?php// echo $r->country; ?>");
			print_state('state',$("#country option:selected").index());
			$("#state").val("<?php//echo $r->state?>");
			/*$('#dpYears').datepicker();*/
		});
	</script> -->
    <script type="text/javascript">
function myfunc(cid){
	$('#msg'+cid).toggle();
	$('#des'+cid).toggle();
	

}
function popmyfunc(cid){
	$('#popmsg'+cid).toggle();
	$('#popdes'+cid).toggle();
	

}

function likefun(pid,uid,count){
	var posted_by=pid;
	var user_id=uid;
	url="<?php echo base_url();?>signg_in/insertlinks/"+pid+"/"+uid;
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
			   $("#like_count"+pid).html('');
		    $("#like_count"+pid).html('<img src="<?php echo base_url(); ?>images/like_myphotos.png" alt="">&nbsp;'+(info.like_count-1)+'&nbsp;&nbsp;');

		 }			
		  else{
			//$("#like_ajax"+pid).html("Like");
			$("#link_like"+pid).html("Unlike");
			   $("#like_count"+pid).html('');
	        $("#like_count"+pid).html('<img src="<?php echo base_url(); ?>images/like_myphotos.png" alt="">&nbsp;'+(info.like_count+1)+'&nbsp;&nbsp;');

		  }
        }
       });	
}

function commentlikefun(pid,uid,count){
	var posted_by=pid;
	var user_id=uid;
	url="<?php echo base_url();?>signg_in/commentinsertlinks/"+pid+"/"+uid;
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

function photocommentlikefun(pid,uid,count,photoname){
	var posted_by=pid;
	var user_id=uid;
	url="<?php echo base_url();?>signg_in/photocommentinsertlinks/"+pid+"/"+uid+"/"+photoname;
	  $.ajax({
        type: "POST",
        url: url,
        data: { liked_by: pid, like_on : uid} ,
        success: function(html)
        {   
			info = JSON.parse(html);
         if(info.like_status == 'N'){
		 	//$("#like_ajax"+pid).html("Unlike");
			$("#photo_cmt_link_like"+pid).html("Like");
			var newval = info.like_count-1;
			if(newval<=0)
			{$("#photo_cmt_like_count"+pid).html('');}
			else
		    $("#photo_cmt_like_count"+pid).html('<img src="<?php echo base_url(); ?>images/like_myphotos.png" alt="">&nbsp;('+newval+')&nbsp;&nbsp;');

		 }			
		  else{
			//$("#like_ajax"+pid).html("Like");
			$("#photo_cmt_link_like"+pid).html("Unlike");
	        $("#photo_cmt_like_count"+pid).html('<img src="<?php echo base_url(); ?>images/like_myphotos.png" alt="">&nbsp;'+(info.like_count+1)+'&nbsp;&nbsp;');

		  }
        }
       });	
}


function cmplikefun(pid,uid,count){
	var posted_by=pid;
	var user_id=uid;
	url="<?php echo base_url();?>signg_in/insertcmplikes/"+pid+"/"+uid;
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
		    $("#like_count"+pid).html(info.like_count-1);

		 }			
		  else{
			//$("#like_ajax"+pid).html("Like");
			$("#link_like"+pid).html("Unlike");
	        $("#like_count"+pid).html(info.like_count+1);

		  }
        }
       });	
}
// old save as functionality
/*function saveAsFav(pid){
	
	url="<?php echo base_url();?>signg_in/saveasfav/"+pid;
	  $.ajax({
        type: "POST",
        url: url,
        data: { liked_by: pid } ,
        success: function(html)
        {   
			alert('saved favorite successfully');
        }
       });	
}*/


 
    $('#grp_add').click(function(){
        $('#select-from option:selected').each( function() {
                $('#select-to').append("<option value='"+$(this).val()+"'>"+$(this).text()+"</option>");
            $(this).remove();
        });
    });
    $('#grp_remove').click(function(){
        $('#select-to option:selected').each( function() {
            $('#select-from').append("<option value='"+$(this).val()+"'>"+$(this).text()+"</option>");
            $(this).remove();
        });
    });
 

 // ajax call for get friends list on add group button click
/*
	 $('#grp_list').change(function(){
     id = $(this).val();
	 url="<?php echo base_url() ?>profile/get_grp_friends/"+id;
	 $.post( url )
			.done(function( data ) 
			{	
			
			$("#select_frm").html(data);
	    });
			return false;
	});
	
	
	 $(document).ready(function(){
     id = $(this).val();
	 url="<?php echo base_url() ?>profile/get_friends/";
	 $.post( url )
			.done(function( data ) 
			{	
			
			$("#select_frm").html(data);
			$("#select-from").removeAttr("multiple");
	    });
			return false;
	});
*/


//ajax for profile pic upload
/*
$(function() {
	$('#upload_file').submit(function(e) {
		url ="<?php echo base_url(); ?>profile/do_upload/";
		e.preventDefault();
		$.ajaxFileUpload({
			url 			:url, 
			secureuri		:false,
			fileElementId	:'userfile',
			dataType		: 'json',
			data			: {	},
			success	: function (data, status)
			{
				if(data.status != 'error')
				{
					$('#status').html('<p>Reloading files...</p>');
					refresh_files();
				}
				alert(data.msg);
			}
		});
		return false;
	});
});
*/
function acceptFrnd(id)
{
	$("#pend_frnd_accept"+id).html('<img src="<?php echo base_url(); ?>images/addfrnd_loader.gif" />');
		url="<?php echo base_url(); ?>friends/confirmrequest/"+id;
		$.ajax({
        type: "POST",
        url: url,
        success: function(data)
        {   
			$("#pendingReqUl").html(data);
			location.reload();
		},
		cache: false
		});
		
}

function denyFrnd(id)
{
	$("#pend_frnd_deny"+id).html('<img src="<?php echo base_url(); ?>images/follow_loader.gif" />');
		url="<?php echo base_url(); ?>friends/denyrequest/"+id;
		$.ajax({
        type: "POST",
        url: url,
        success: function(data)
        {   
			$("#pendingReqUl").html(data);
			location.reload();
		},
		cache: false
		});
		
}

function blockFrnd(id)
{
	$("#pend_frnd_block"+id).html('<img src="<?php echo base_url(); ?>images/block_loader.gif" />');
		url="<?php echo base_url(); ?>friends/blockrequest/"+id;
		$.ajax({
        type: "POST",
        url: url,
        success: function(data)
        {   
			$("#pendingReqUl").html(data);
			location.reload();
		},
		cache: false
		});
		
}

function addFrnd(id)
{
	$("#sidebar_addfrnd"+id).html('<img src="<?php echo base_url(); ?>images/addfrnd_loader.gif" />');
		url="<?php echo base_url(); ?>friends/addFriend/"+id;
		$.ajax({
        type: "POST",
        url: url,
        success: function(data)
        {   
			$("#add_friends").html(data);
		},
		cache: false
		});
		
}

function addSearchFrnd(id)
{
		url="<?php echo base_url(); ?>friends/addFriendFromSearch/"+id;
		$.ajax({
        type: "POST",
        url: url,
        success: function(data)
        {   
			$('#addFrnd'+id ).text('Request Sent');
		},
		cache: false
		});
		
}

function addFollowerFrnd(id)
{
		url="<?php echo base_url(); ?>friends/addFriendFromFollowers/"+id;
		$.ajax({
        type: "POST",
        url: url,
        success: function(data)
        {   
			$('#addFrnd'+id).text('Request Sent');
		},
		cache: false
		});
		
}

function cmpFollowPage(id)
{
	var value = $('#follow-btn').prop('value');
	var option = $('#follow_option').val();
	urlfollow="<?php echo base_url(); ?>company/cmp_view_follow/"+id+"/"+option;
	urlunfollow="<?php echo base_url(); ?>company/cmp_view_unfollow/"+id+"/"+option;
	if(value == 'Follow')
	{
		$.ajax({
        type: "POST",
        url: urlfollow
		}).done(function(){
		$(this).hide();	
      $('#unfollow-btn').show();
	  $('#followModal').modal('toggle');
	   location.reload();
		});
		
	}else{
		$.ajax({
        type: "POST",
        url: urlunfollow
		}).done(function(){
			
       $('#follow-btn').show();
		location.reload();
		});
		
	}
}



function acceptFollow(user_id,cmp_id)
{
	url="<?php echo base_url(); ?>company/cmp_follow_req_accept/"+user_id+"/"+cmp_id;
		$.ajax({
        type: "POST",
        url: url,
        success: function(data)
        {   
			$("#pendingReqUl").html(data);
		},
		cache: false
		});
}

function denyFollow(user_id,cmp_id)
{
	url="<?php echo base_url(); ?>company/cmp_follow_req_deny/"+user_id+"/"+cmp_id;
		$.ajax({
        type: "POST",
        url: url,
        success: function(data)
        {   
			$("#pendingReqUl").html(data);
		},
		cache: false
		});
}

function cmpFollow(comp_id)
{
		
	 
$("#sidebar_follow"+comp_id).html('<img src="<?php echo base_url(); ?>images/follow_loader.gif" />');
    $('#followModal1').modal('toggle');
	
	$('#follow_modal_btn').click(function()
	{
	
	var option = $('#follow_as').val();
	url="<?php echo base_url(); ?>company/cmp_follow/"+option+"/"+comp_id;
		$.ajax({
        type: "POST",
        url: url,
        success: function(data)
        {  
		$('#followModal1').modal('toggle'); 
	    $("#cmpfollowers").html(data);
		//$("#sidebar_follow").hide();
		},
		cache: false
		});
	});
	
	
	
	$('.btn').click(function()
	{
		if($("#followModal1").is(':visible'))
		 { 
 		 $("#sidebar_follow"+comp_id).text('Follow');
		}else{
		$("#sidebar_follow"+comp_id).html('<img src="<?php echo base_url(); ?>images/follow_loader.gif" />');
		}
	});
	
	
	
	$('.close').click(function()
	{
		if($("#followModal1").is(':visible'))
		 { 
 		 $("#sidebar_follow"+comp_id).text('Follow');
		}else{
		$("#sidebar_follow"+comp_id).html('<img src="<?php echo base_url(); ?>images/follow_loader.gif" />');
		}
	});
	
}




function saveGroup()
{
	var list_of_members ='';
	var name = $('#grpname').val();
	 $('#select-to option').each( function() {
		 	 list_of_members += $(this).val()+",";
        });
		list_of_members = list_of_members.substring(0, list_of_members.length - 1);
		url="<?php echo base_url(); ?>profile/creategroup/";
		$.ajax({
        type: "POST",
        url: url,
		data: { grp_name: name,members: list_of_members} ,
        success: function(data)
        {   
			var redirect_url = "<?php echo base_url(); ?>"+'profile/addgroup';
			window.location.replace(redirect_url);
		},
		cache: false
		});
		
}

function updateGroup(group_id)
{
	var list_of_members ='';
	var name = $('#grpname').val();
	 $('#select-to option').each( function() {
		 	 list_of_members += $(this).val()+",";
        });
		list_of_members = list_of_members.substring(0, list_of_members.length - 1);
		
		url="<?php echo base_url(); ?>profile/updategroup/";
		$.ajax({
        type: "POST",
        url: url,
		data: { grp_name: name,members: list_of_members,group_id:group_id} ,
        success: function(data)
        {   
			var redirect_url = "<?php echo base_url(); ?>"+'profile/groups';
			window.location.replace(redirect_url);
		},
		cache: false
		});
		
}

/*function searchgroups()
{
	alert('hi');
	url="<?php echo base_url(); ?>profile/groups/";
		$.ajax({
        type: "POST",
        url: url,
        success: function(data)
        {   
			alert('hi');
			//var redirect_url = "<?php echo base_url(); ?>"+'profile/groups';
			//window.location.replace(redirect_url);
		},
		cache: false
		});
}*/
function searchformsubmit()
{
	document.getElementById("groupssearchform").submit();
}
function addeducation()
{
	$("input[name=field_of_study]").val('');
	$("input[name=college_institution]").val('');
	$("input[name=degree_certificate]").val('');
	$("textarea[name=special_studies]").val('');						
	$("select[name=year_attended_from]").val(0);
	$("select[name=month_attended_from]").val(0);
	$("select[name=year_attended_to]").val(0);
	$("select[name=month_attended_to]").val(0);
	$("#edu_action").val('add');
	$("#eduformerrors").html('');
}
function addexp()
{
	$("input[name=job_title]").val('');
	$("select[name=year_attended_from]").val(0);
	$("select[name=month_attended_from]").val(0);
	$("select[name=year_attended_to]").val(0);
	$("select[name=month_attended_to]").val(0);
	$("textarea[name=job_description]").val('');
	$("#prof_action").val('add');
	$("#proformerrors").html('');
	
}
function addorg()
{
	$("input[name=org_name]").val('');
	$("input[name=position]").val('');
	$("textarea[name=org_description]").val('');
	$("select[name=year_attended_from]").val(0);
	$("select[name=month_attended_from]").val(0);
	$("select[name=year_attended_to]").val(0);
	$("select[name=month_attended_to]").val(0);
	$("select[name=emp_status]").val('wor');
	$("#org_action").val('add');
	$("#orgformerrors").html('');
}
function addgroup()
{
		$("input[name=group_name]").val('');
		$("input[name=group_type]").val('');
		$("input[name=website_url]").val('');
		$("input[name=city]").val('');
		$("select[name=state]").val(0);
		$("input[name=postal_code]").val('');
		$("textarea[name=additional_info]").val('');
		$("#grp_action").val('add');
		$("#grpformerrors").html('');
}
function validateCompanyForm()
{
	var error_msg ='';
	if(validatefileupload('fileupload'))
	{
	     error_msg +='';
	}
	else 
	{
	 	error_msg +="Please check file format\n";
	}
	if(document.getElementById('cmp_name') != '')
	{
	     error_msg +='';
	}
	else 
	{
	 	error_msg +="Company Name Not Valid\n";
	}
	if(isSelected('cmp_industry'))
	{
	     error_msg +='';
	}
	else 
	{
	 	error_msg +="Please select industry type\n";
	}
	if(isSelected('cmp_estb'))
	{
	     error_msg +='';
	}
	else 
	{
	 	error_msg +="Please select an year when the company is established\n";
	}
	if(isNumber('cmp_colleagues'))
	{
	     error_msg +='';
	}
	else 
	{
	 	error_msg +="Please specify the no of employees in the company\n";
	}
	if(error_msg!='')
	{
	alert(error_msg);
	return false
	}
	else
	return true;
	
}
function validatefileupload(file_id)
{
	var fup = document.getElementById(file_id);
	var fileName = fup.value;
	var ext = fileName.substring(fileName.lastIndexOf('.') + 1);
	if(ext == "gif" || ext == "GIF" || ext == "JPEG" || ext == "jpeg" || ext == "jpg" || ext == "JPG" || ext == "doc")
	{
		return true;
	} 
	else
	{
		return false;
	}
}
function isAlphaNum(field_id)
{
	var value = document.getElementById(field_id).value;
	var Exp = /^[0-9a-z]+$/;
	if(!value.match(Exp))
	return false;
	else
	return true;
}
function isSelected(field_id)
{
	var value = document.getElementById(field_id).value;	
	if(value==0)
	return false;
	else
	return true;
}
function isNumber(field_id)
{
	var value = document.getElementById(field_id).value;	
	if(isNaN(value))
	return false;
	else
	return true;
}

	
	
/*	$("#company_form").submit(function( event ){
     url = "<?php // echo base_url(); ?>company/addcompany/";
  				   $.post(url, { formdata: $(this).serialize() })
					.done(function( data ) {
						   	if(data == false)
							alert("Please Enter Valid Details");
						else
						{
							alert("details are stored");		
						}
					});
					event.preventDefault();
});
});*/
function getconversations(msg_id,sent_by)
{
 url="<?php echo base_url(); ?>message/getconversations/"+msg_id+'/'+sent_by;
  $.ajax({
        type: "POST",
        url: url,
        success: function(data)
        {   
   $("#message_conversation_content").html(data);
  },
  cache: false
  });
}
function getPostComments(post_id,photo_name)
{
 image = "<img width='80px' style='margin-left:150px;' src='<?php echo base_url(); ?>images/loading.gif' />";
 $(".fbphotobox-image-content").html(image);
 url="<?php echo base_url(); ?>customer/getpostcomments/"+post_id+"/"+photo_name;
  $.ajax({
        type: "POST",
        url: url,
        success: function(data)
        {   
		
   $(".fbphotobox-image-content").html(data);
   $(".nano").nanoScroller();
  },
  cache: false
  });
  url="<?php echo base_url(); ?>customer/getpostcontent/"+post_id;
  $.ajax({
        type: "POST",
        url: url,
        success: function(data)
        {   
		
   $(".fbphotobox-container-left-footer").html(data);
  
  },
  cache: false
  });
}
function getPostComments_photospage(post_id,photo_name)
{
 image = "<img width='80px' style='margin-left:150px;' src='<?php echo base_url(); ?>images/loading.gif' />";
 $(".fbphotobox-image-content").html(image);
 url="<?php echo base_url(); ?>customer/getpostcomments/"+post_id+"/"+photo_name;
  $.ajax({
        type: "POST",
        url: url,
        success: function(data)
        {   
		
   $(".fbphotobox-image-content").html(data);
   $(".nano").nanoScroller();
  },
  cache: false
  });
  url="<?php echo base_url(); ?>customer/getpostcontent/"+post_id;
  $.ajax({
        type: "POST",
        url: url,
        success: function(data)
        {   
		
   $(".fbphotobox-container-left-footer").html(data);
  
  },
  cache: false
  });
}




function postComSub(e,post_id,photo_name){
e.preventDefault();

url = "<?php echo base_url(); ?>signg_in/write_photo_comment/"+post_id+"/"+photo_name;
 var formObj = $('form#imgCmtForm')[0];

//$("#message").empty();
//$('#loading').show();
$.ajax({
	 
url: url, // Url to which the request is send
type: "POST",             // Type of request to be send, called as method
data: new FormData(formObj), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
contentType: false,       // The content type used when sending data to the server.
cache: false,             // To unable request pages to be cached
processData:false,        // To send DOMDocument or non processed data file it is set to false
success: function(data)   // A function to be called if request succeeds
{
	if(data==' success'){
	getPostComments_photospage(post_id,photo_name);
	}
	else
	$('.commentBox-error').html(data);
//$('#res_comments'+post_id).append(data);
//$('#write_comment'+post_id).val('');
//var commentboxcont = $('#commentBox'+post_id).html();
//$('#commentBox'+post_id).html('');
//$('#uploadCommentPhotos'+post_id).val('');
//$('#commentBox'+post_id).html(commentboxcont);

}
});


}
/* fuction to mark as read and mark un-read */

function  onchangeMore(){
	var val = [];
        $(':checkbox:checked').each(function(i){
          val[i] = $(this).val();
        });
		var text='';
		for	(index = 0; index < val.length; index++) {
		text += val[index]+'-';
		} 
		var selectedval = $('#more').val();
		if(text!='' && selectedval!=0){
		
		if(selectedval==1)
		url="<?php echo base_url(); ?>message/markasreadselectedmsgs/"+text;
		else if(selectedval == 2)
		url="<?php echo base_url(); ?>message/markasunreadselectedmsgs/"+text;

		  $.ajax({
				type: "POST",
				url: url,
				success: function(data)
				{   
		   	var redirect_url = "<?php echo base_url(); ?>"+'profile/message';
			window.location.replace(redirect_url);
		  },
		  cache: false
		  });
		}
		else{
			alert('Please select the checkbox to apply action')
		}
}
   /*	 
	 $.post( url, { formdata: $(this).serialize() })
     
 .done(function( data ) {
         if(data == false)
       alert("hi");
      else
       $(".comperrormsg").html(data);
       $('#company_form').trigger("reset");
       //$('#orgModal').modal('toggle');
//       organization_edit();*/
      // });  
//}
//function validateEduForm()
//{	
//	if($("#year_attended_from").val()==0 || $("#month_attended_from").val()==0 || $("#year_attended_to").val()==0 || $("#month_attended_to").val()==0 || $("#field_of_study").val()=='' || $("#college_institution").val()=='' || $("#degree_certificate").val()=='')
//	{
//	$("#eduformerrors").html("Fields with '*' are mandatory, Please fill them...");
//	}
//}

 $(function(){
      $('#delmsgbtn').click(function(){
        var val = [];
        $(':checkbox:checked').each(function(i){
          val[i] = $(this).val();
        });
		var text='';
		for	(index = 0; index < val.length; index++) {
		text += val[index]+'-';
		} 
		if(text!=''){
		 url="<?php echo base_url(); ?>message/deleteselectedmsgs/"+text;
		  $.ajax({
				type: "POST",
				url: url,
				success: function(data)
				{   
		   	var redirect_url = "<?php echo base_url(); ?>"+'profile/message';
			window.location.replace(redirect_url);
		  },
		  cache: false
		  });
		}
		else{
		alert('Please select the checkbox you wish to delete')
		}
      });
    });
	 $(function(){
      $('#delsentselect').click(function(){
        var val = [];
        $(':checkbox:checked').each(function(i){
          val[i] = $(this).val();
        });
		var text='';
		for	(index = 0; index < val.length; index++) {
		text += val[index]+'-';
		} 
		 url="<?php echo base_url(); ?>message/deletesentselectedmsgs/"+text;
		  $.ajax({
				type: "POST",
				url: url,
				success: function(data)
				{   
		   	var redirect_url = "<?php echo base_url(); ?>"+'profile/sent';
			window.location.replace(redirect_url);
		  },
		  cache: false
		  });
      });
    });
	 $(function(){
      $('#deletetrash').click(function(){
        var val = [];
        $(':checkbox:checked').each(function(i){
          val[i] = $(this).val();
        });
		var text='';
		for	(index = 0; index < val.length; index++) {
		text += val[index]+'-';
		} 
		 url="<?php echo base_url(); ?>message/deletetrashmsgs/"+text;
		  $.ajax({
				type: "POST",
				url: url,
				success: function(data)
				{   
		   	var redirect_url = "<?php echo base_url(); ?>"+'profile/trash';
			window.location.replace(redirect_url);
		  },
		  cache: false
		  });
      });
    });
</script>
<script type="text/javascript" src="<?php echo base_url(); ?>cropimage/js/jquery.form.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>cropimage/js/jquery.imgareaselect.js"></script>

<script type="text/javascript" >
	// image croping function for profile settings page--> Start
	
	 $(document).ready(function() {
        $('#userpropicbtn').click(function() {
            $("#viewimage").html('');
            $("#loadingimage").html('<img src="<?php echo base_url(); ?>cropimage/images/loading.gif" />');
            $(".ppuploadform").ajaxForm({
            	url: '<?php echo base_url(); ?>profile/upload_thumb',
                success:    showResUser 
            });
        });
    });
  
    function showResUser(responseText, statusText, xhr, $form){
		
	    if(responseText.indexOf('.')>0){
			$("#loadingimage").html('');
			$('.crop_set_preview').show();
			$('.crop_box').height(350);
			$('#thumbviewimage').html('<img src="<?php echo base_url().$upload_path;?>'+responseText.trim()+'"   style="position: relative;" alt="Thumbnail Preview" />');
	    	$('#viewimage').html('<img class="preview" alt="" src="<?php echo base_url().$upload_path; ?>'+responseText.trim()+'"   id="thumbnail" />');
	    	$('#filename').val(responseText.trim()); 
			$('#thumbnail').imgAreaSelect({  aspectRatio: '1:1', handles: true  , onSelectChange: preview });
		}else{
			alert('please select file first');
			$('#thumbviewimage').html(responseText.trim());
	    	$('#viewimage').html(responseText.trim());
		}
    }
	// image croping function for profile settings page--> End
	
    $(document).ready(function() {
        $('#submitbtn').click(function() {
            $("#viewimage").html('');
            $("#loadingimage").html('<img src="<?php echo base_url(); ?>cropimage/images/loading.gif" />');
            $(".uploadform").ajaxForm({
            	url: '<?php echo base_url(); ?>profile/upload_thumb',
                success:    showResponse 
            });
        });
    });
  
    function showResponse(responseText, statusText, xhr, $form){
		
	    if(responseText.indexOf('.')>0){
			$("#loadingimage").html('');
			$('.crop_set_preview').show();
			$('.crop_box').height(350);
			$('#thumbviewimage').html('<img src="<?php echo base_url().$upload_path;?>'+responseText.trim()+'"   style="position: relative;" alt="Thumbnail Preview" />');
	    	$('#viewimage').html('<img class="preview" alt="" src="<?php echo base_url().$upload_path; ?>'+responseText.trim()+'"   id="thumbnail" />');
	    	$('#filename').val(responseText.trim()); 
			$('#thumbnail').imgAreaSelect({  aspectRatio: '1:1', handles: true  , onSelectChange: preview });
		}else{
			alert('please select file first');
			$('#thumbviewimage').html(responseText.trim());
	    	$('#viewimage').html(responseText.trim());
		}
    }
      $(document).ready(function() {
        $('#userfile').change(function() {
			$(".uploadvideoform").ajaxForm({
            	url: '<?php echo base_url(); ?>profile/add_video',
			    success:    showVideoResponse 
            }).submit();
			
        });
    });
	function showVideoResponse(responsetxt)
	{
		if(responsetxt)
		{
		    alert(responsetxt);
		    var redirect_url = "<?php echo base_url(); ?>"+'profile/my_photos';
			window.location.replace(redirect_url);
		}
	}
</script>

<script type="text/javascript">
function preview(img, selection) { 
	var scaleX = <?php echo $thumb_width;?> / selection.width; 
	var scaleY = <?php echo $thumb_height;?> / selection.height; 

	$('#thumbviewimage > img').css({
		width: Math.round(scaleX * img.width) + 'px', 
		height: Math.round(scaleY * img.height) + 'px',
		marginLeft: '-' + Math.round(scaleX * selection.x1) + 'px', 
		marginTop: '-' + Math.round(scaleY * selection.y1) + 'px' 
	});
	
	var x1 = Math.round((img.naturalWidth/img.width)*selection.x1);
	var y1 = Math.round((img.naturalHeight/img.height)*selection.y1);
	var x2 = Math.round(x1+selection.width);
	var y2 = Math.round(y1+selection.height);
	
	$('#x1').val(x1);
	$('#y1').val(y1);
	$('#x2').val(x2);
	$('#y2').val(y2);	
	
	$('#w').val(Math.round((img.naturalWidth/img.width)*selection.width));
	$('#h').val(Math.round((img.naturalHeight/img.height)*selection.height));
	
} 

$(document).ready(function () { 
	$('#save_thumb').click(function() {
		var x1 = $('#x1').val();
		var y1 = $('#y1').val();
		var x2 = $('#x2').val();
		var y2 = $('#y2').val();
		var w = $('#w').val();
		var h = $('#h').val();
		if(x1=="" || y1=="" || x2=="" || y2=="" || w=="" || h==""){
			alert("Please Make a Selection First");
			return false;
		}else{
			return true;
		}
	});
}); 

$('#addJobForm').submit( function( event){
						
					var errors = '';
					if($("#job_title").val()=='' || $("#job_type").val()=="" || $("#job_category").val()==0 || $("#job_salary").val()=='' || $("#salary_basis").val()=='' || $("#job_keywords").val()=='' || $("#job_company_name").val()=='' || $("#cont_name").val()=='' || $("#cont_email").val()=='' || $("#job_desc").val()=='' || $("#req_skills").val()==''  )
					{
						
						$("#jobformerrors").html("Fields with '*' are mandatory, Please fill them...");
					}
					else if(!ValidateEmail($("#cont_email").val()))
					{
						$("#jobformerrors").html("Email you have entered not valid");
					}
					else
					{	
					
					url="<?php echo base_url(); ?>jobs/create_job/";
					$.post( url, { formdata: $(this).serialize()})
					.done(function( data ) {
						if(data == false)
						alert("Please Enter Valid Details");
						else
						$(".joblisting").html(data);
						$('#addJobForm').trigger("reset");
						$( "#canceladdjob" ).trigger( "click" );
					});
					}
					event.preventDefault();
				});
				function ValidateEmail(email) {
        var expr = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
        return expr.test(email);
    };
	
	function movetogroup(userid,selectedvalue)
	{
		if(selectedvalue!=0)
		{
		url="<?php echo base_url(); ?>friends/movefriend/"+userid+'/'+selectedvalue;
					$.post( url )
					.done(function( data ) {
						if(data)
						alert(data);
						
					});
		}
	}
	
$('#pfpic').change(function()
{
	$('#upload_pfpic').submit();
	//$(".cmplogo").html(data);
	//location.reload(true);
});	

$('#event_banner').change(function()
{
	
	$('#upload_event_banner').submit();
	//location.reload(true);
	//$(".cmplogo").html(data);
	//location.reload(true);
});	
</script>

<script language="javascript" type="text/javascript">
// file upload preview while posting

window.onload = function () {
    var fileUpload = document.getElementById("uploadPhotos");
    fileUpload.onchange = function () {
        if (typeof (FileReader) != "undefined") {
            var dvPreview = document.getElementById("uploadPhotosdvPreview");
            dvPreview.innerHTML = "";
            var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.jpg|.jpeg|.gif|.png|.bmp)$/;
            for (var i = 0; i < fileUpload.files.length; i++) {
                var file = fileUpload.files[i];
                if (regex.test(file.name.toLowerCase())) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        var img = document.createElement("IMG");
                        img.height = "110";
                        img.width = "110";
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
};


/*$('#uploadPhotos').change(function(){
  startUpload();
});

function startUpload(){
  $.ajaxFileUpload({
    url:'<?php echo base_url();?>signg_in/temp_upload/',
    secureuri:false,
    fileElementId:'uploadPhotos',
    dataType: 'json',
    success: function(data,status){
		alert(data);
		console.log(data);
        if(typeof(data.error) != 'undefined'){
            if(data.error){
                console.log(data.error);
            }else{
                console.log("Image uploaded")
            }
        }
    },
    error: function(data,status,e){
        console.log(e)
    }
  });
  return false;
}
*/

// share post function START - by vijay on 02-04-15 

function sharePost(post_id){
	url="<?php echo base_url(); ?>profile/get_post_byid/"+post_id;
					$.post( url )
					.done(function( data ) {
						$('#sharePostPopup').html(data);
						
					});
}


function saveAsFav(post_id){
	url="<?php echo base_url(); ?>profile/get_post_byid_for_save_fav/"+post_id;
					$.post( url )
					.done(function( data ) {
						//alert(data);
						$('#save_as_fav_popup').html(data);
						var user_categories = get_user_categories();
						alert(user_categories);
					});
}

function user_categories()
{
	 url="<?php echo base_url();?>profile/get_categories/";
				 $.ajax({
			        url: url,
        			success: function(html)
			        {   
            			if(html == true)
							alert("Information Updated");
						else
							alert("Something went wrong Please try after sometime");
			        }
			       });
}

function shareCmpPost(post_id){
	url="<?php echo base_url(); ?>profile/get_cmp_post_byid/"+post_id;
					$.post( url )
					.done(function( data ) {
						$('#sharePostPopup').html(data);
						
					});
}



	$('#sharePostBtn').click(function() {
		
		document.getElementById('share_form').submit(); return false;
		});


// Share post function END

//cmp_privacy form & email notifications updatte by sp

	$("form[name=about_cmp]").submit(function(event){
		alert("hai");
			   url="<?php echo base_url();?>company/updateabout/<?php echo $this->uri->segment(3,0) ?>";
				 $.ajax({
        			type: "POST",
			        url: url,
			        data: { form_data: $(this).serialize()} ,
        			success: function(html)
			        {   
            			if(html == true)
							alert("Information Updated");
						else
							alert("Something went wrong Please try after sometime");
			        }
			       });			
				event.preventDefault();
			});

$("#cmp_privacy_form").submit(function( event ){
					 url="<?php echo base_url();?>company/updateprivacy/<?php echo $this->uri->segment(3,0); ?>";
					$.post( url, { formdata: $(this).serialize() })
					.done(function( data ) {
					   	if(data == true)
							alert("Information Updated");
						else
							alert("Something Went wrong please try again after sometime");
					  });
					event.preventDefault();
			});
			
	$("#cmp_emailnotification").submit(function( event ){
				url="<?php echo base_url();?>company/updateemailnotification/<?php echo $this->uri->segment(3,0); ?>";
				$.post( url, { formdata: $(this).serialize() })
					.done(function( data ) {
					   	if(data == true)
							alert("Information Updated");
						else
							alert("Something Went wrong please try again after sometime");
					  });
					event.preventDefault();
			});			
$("form[name=cmp_postboard]").submit(function(event){
			   url="<?php echo base_url();?>company/postboard_update/<?php echo $this->uri->segment(3,0); ?>";
				 $.ajax({
        			type: "POST",
			        url: url,
			        data: { form_data: $(this).serialize()} ,
        			success: function(html)
			        {   
            			alert("Information Updated");
						
			        }
			       });			
				event.preventDefault();
			});	
			
			// add field function start
			
			function addField(fieldname)
			{
				var placeholder = fieldname.split('-');
				var placeholdertext = '';
				var h3content = $('#'+fieldname+'-li h3').html();
				for(i=0;i<placeholder.length;i++)
				{ 
					placeholdertext += placeholder[i]+' '; 
				}
				$('#'+fieldname+'-li').html("<form action='javascript:void(0)' onsubmit='addfieldSubmit(&#39;"+fieldname+"&#39;&#44;&#39;"+h3content+"&#39;); return false;' method='post'><input class='form-control' type='text' id='"+fieldname+"' name='"+fieldname+"' placeholder='add "+placeholdertext+"'/>");
			}
			function addWork(fieldname)
			{
				$('.data_fileds').hide();
				$('#'+fieldname+'-li .graphic').show();
				//var placeholder = fieldname.split('-');
//				var placeholdertext = '';
//				var h3content = $('#'+fieldname+'-li h3').html();
//				for(i=0;i<placeholder.length;i++)
//				{ 
//					placeholdertext += placeholder[i]+' '; 
//				}
//				$('#'+fieldname+'-li').html("<form action='javascript:void(0)' onsubmit='addfieldSubmit(&#39;"+fieldname+"&#39;&#44;&#39;"+h3content+"&#39;); return false;' method='post'><input class='form-control' type='text' id='"+fieldname+"' name='"+fieldname+"' placeholder='add "+placeholdertext+"'/>");
			}
			function addfieldSubmit(fieldname,h3content)
			{
				var fieldvalue = $('#'+fieldname).val();
				
				url="<?php echo base_url();?>profile/updatefield/";
				 $.ajax({
        			type: "POST",
			        url: url,
			        data: { field_name:fieldname,field_value: fieldvalue} ,
        			success: function(html)
			        {   
						var data = 
                        "<div class='inner_rights'>"+
                          "<h3>"+h3content+"</h3><p>"+fieldvalue+"<a href='javascript:void(0)' onclick='addField(&#39;"+fieldname+"&#39;)'> edit</a></p></div>"+
                        "<div class='clearfix'></div>";
						$('#'+fieldname+'-li').html(data);
			        }
					
			       });			
				//event.preventDefault();
			}
			// add field function end	
			function addWorkPlace()
			{
				var orgname = $('#org_name').val();
				var position = $('#position').val();
							
				url="<?php echo base_url();?>profile/addworkplace/";
				 $.ajax({
        			type: "POST",
			        url: url,
			        data: { org_name:orgname,position: position} ,
        			success: function(html)
			        {   
						var prev_cont = $('#profession-li .data_fileds').html();
						//var data = "<p>"+position+" at "+orgname+" <a href='javascript:void(0)' onclick='editWorkPlace()' >Edit</a></p>"
                        $('#profession-li .data_fileds').html(prev_cont+html);
						$('#profession-li .graphic').hide();
					    $('#profession-li .data_fileds').show();
			        }
					
			       });			
				//event.preventDefault();
			}
			function editWorkPlace(orgid)
			{				
				url="<?php echo base_url();?>profile/editworkplace/";
				 $.ajax({
        			type: "POST",
			        url: url,
			        data: { org_id:orgid} ,
        			success: function(html)
			        {   
                       
						$('#paragraph'+orgid).html(html);
					    
			        }
					
			       });			
				//event.preventDefault();
			}
			function updateWorkPlace(paragraphid)
			{
				var orgname = $('#org_name').val();
				var position = $('#position').val();
							
				url="<?php echo base_url();?>profile/updateworkplace/";
				 $.ajax({
        			type: "POST",
			        url: url,
			        data: { org_name:orgname,position: position,org_id: paragraphid} ,
        			success: function(html)
			        {   
						//var prev_cont = $('#profession-li .data_fileds').html();
						var data = position+" at "+orgname+" <a href='javascript:void(0)' onclick='editWorkPlace("+paragraphid+")' >edit</a>"
                        $('#paragraph'+paragraphid).html(data);
						/*$('#profession-li .graphic').hide();
					    $('#profession-li .data_fileds').show();*/
			        }
					
			       });			
				//event.preventDefault();
			}
			function canceladdWork(){
				 $('#profession-li .data_fileds').show();
				 $('#profession-li .graphic').hide();
			}
			function canceleditWork(orgname,pos,orgid){
				 var data = pos+" at "+orgname+" <a href='javascript:void(0)' onclick='editWorkPlace("+orgid+")' >edit</a>"
				 $('#paragraph'+orgid).html(data);
			}
			
//search friends functionality by sp on 10-4-2015
$('#search_frnds').keyup(function(){
	var value = $('#search_frnds').val();
	var length = value.length;
	var errors = '';
	if(value == '') 
	{
		$("#error_data").html("Search Field Shouldn't be empty").fadeOut(7000);
		location.reload();
	}
	/*if(length < 1) 
	{
		$("#error_data").html("provide more letters to Search").fadeOut(7000);
		location.reload();
	}*/
	else {
		
	url="<?php echo base_url(); ?>friends/search_frnds/"+value;
		$.ajax({
        type: "POST",
        url: url,
        success: function(data)
        {   
			$(".groupEditBlock").html(data);
		},
		cache: false
		});
		
		
	};

});
// Ghost post functionality start
function addfrndtogostpost(user_id,name){
var cur_content = $('#selectedfriends').html();
var new_content = "<span id='"+user_id+"'>"+name+"<a onclick='removefrnd("+user_id+")'><img class='as_close_btn' src='<?php echo base_url().'images/close_btn.png'; ?>'/></a></span>";
 $('#selectedfriends').html(new_content+cur_content);
 $('#searchfriends').focus();
 $('#autosuggest').hide();
var addedusers = $('#addedusers').val()
if(addedusers!='')
$('#addedusers').val(addedusers+','+user_id)
else
$('#addedusers').val(user_id)

}
function addfrndfortagging(user_id,name){
var cur_content = $('#taggedfriends').html();
var new_content = "<span id='"+user_id+"'>"+name+"<a onclick='removefrndfromtagging("+user_id+")'><img class='as_close_btn' src='<?php echo base_url().'images/close_btn.png'; ?>'/></a></span>";
 $('#taggedfriends').html(new_content+cur_content);
 $('#tagsearchfriends').focus();
 $('#tagautosuggest').hide();
var addedusers = $('#tagaddedusers').val();
if(addedusers!='')
$('#tagaddedusers').val(addedusers+','+user_id)
else
$('#tagaddedusers').val(user_id);

	
	
	var nooftags = $('#tagaddedusers').val();
	
	var countTags = nooftags.split(',').length;
	
	var remains = countTags-2;
	
	if(countTags == 1)
	$("#withTokens").append("<a id='token"+user_id+"' href='<?php echo base_url()."profile/post/"; ?>"+user_id+"'>"+name+"</a>");
	else if(countTags==2)
	$("#withTokens").append(" and <a id='token"+user_id+"' href='<?php echo base_url()."profile/post/"; ?>"+user_id+"'>"+name+"</a>");
	else if(countTags>=3)
	{
	var cur_tokens = $("#withTokens").html();
	var new_cont = cur_tokens.replace(' and',',');
	$("#withTokens").html(new_cont);
	if(countTags>1){ 
	$("#hiddentokens").append(", <a id='token"+user_id+"' href='<?php echo base_url()."profile/post/"; ?>"+user_id+"'>"+name+"</a>");}	
	else{ 
	$("#hiddentokens").append("<a id='token"+user_id+"' href='<?php echo base_url()."profile/post/"; ?>"+user_id+"'>"+name+"</a>");	}
	cur_cont = $("#withTokens").html();
	var req = cur_cont.split(',');
	$("#withTokens").html(req[0]+', '+req[1]+" and "+remains+" others");
	}
	$("#withTokens").show();
}

function removefrndfromtagging(user_id){
	
	
	//var cur_cont = $('#withTokens').html();
//	var new_cont = cur_cont.replace(', ','');
//	new_cont = cur_cont.replace('and ','');
//	if(new_cont.indexOf('<a')===-1)
//	$('#withTokens').hide();
//	$('#withTokens').html(new_cont);
		
	var addedusers = $('#tagaddedusers').val();
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
	$('#tagaddedusers').val(newval);
	$('#'+user_id).remove();
	
	
	$('#token'+user_id).remove();	
	$('#withTokens').hide();
	var nooftags = $('#tagaddedusers').val();	
	if(nooftags=='')
	{ return false;}
	var countTags = nooftags.split(',').length;
	var tags = nooftags.split(',');
	var get_content = ''; var put_content = '';
	if(countTags==1)
	{
	get_content = $("#token"+tags).html();
	put_content = "-With "+"<a id='token"+tags+"' href='<?php echo base_url()."profile/post/"; ?>"+tags+"'>"+get_content+"</a>";
	$('#withTokens').html(put_content);
	$('#withTokens').show();	
	}
	else if(countTags==2){
	
	get_content = $("#token"+tags[0]).html(); get_content2 = $("#token"+tags[1]).html();
	put_content = "-With "+"<a id='token"+tags[0]+"' href='<?php echo base_url()."profile/post/"; ?>"+tags[0]+"'>"+get_content+"</a> and <a id='token"+tags[1]+"' href='<?php echo base_url()."profile/post/"; ?>"+tags[1]+"'>"+get_content2+"</a>";
	$('#withTokens').html(put_content);	
	$('#withTokens').show();
	}
	else if(countTags>=3){
	remains = countTags-2;
	get_content = $("#token"+tags[0]).html(); get_content2 = $("#token"+tags[1]).html();
	put_content = "-With "+"<a id='token"+tags[0]+"' href='<?php echo base_url()."profile/post/"; ?>"+tags[0]+"'>"+get_content+"</a>, <a id='token"+tags[1]+"' href='<?php echo base_url()."profile/post/"; ?>"+tags[1]+"'>"+get_content2+"</a> and "+remains+" others";
	$('#withTokens').html(put_content);	
	$('#withTokens').show();	
	}
	//if(nooftags=='')
//	$("#withTokens").html('--With ');$("#withTokens").hide();
}

function keyupevent(){
	var value = $('#searchfriends').val();
	var addedusers = $('#addedusers').val();
	if(value!='')
	{	
	url="<?php echo base_url(); ?>friends/getfriendsuggestion/"+value+"/"+addedusers;
		$.ajax({
        type: "POST",
        url: url,
        success: function(data)
        {   
			if(data){
			$('#autosuggest').html(data);
			$('#autosuggest').show();
			}
		},
		cache: false
		});
	}
	else{ $('#autosuggest').hide(); }
}
function tagkeyupevent(){
	var value = $('#tagsearchfriends').val();
	var addedusers = $('#tagaddedusers').val();
	if(value!='')
	{	
	url="<?php echo base_url(); ?>friends/getfriendsfortagging/"+value+"/"+addedusers;
		$.ajax({
        type: "POST",
        url: url,
        success: function(data)
        {   
			if(data){
			$('#tagautosuggest').html(data);
			$('#tagautosuggest').show();
			}
		},
		cache: false
		});
	}
	else{ $('#tagautosuggest').hide(); }
}
function showghostinput(){
	$('#taggedfriends').hide(500);
	$('#selectedfriends').toggle();
	$('#searchfriends').focus();
}
function showtaginput(){
	$('#selectedfriends').hide(500);
	$('#taggedfriends').toggle();
	$('#tagsearchfriends').focus();
}

// ghost post functionality end

//business card ghostpost
function keyupevent_bc(){
	var value = $('#search_bc_friends').val();
	var addedusers = $('#added_bc_users_test').val();
	if(value!='')
	{	
	url="<?php echo base_url(); ?>friends/getfriend_bc_suggestion/"+value+"/"+addedusers;
		$.ajax({
        type: "POST",
        url: url,
        success: function(data)
        {   
			if(data){
			$('#auto_bc_suggest').html(data);
			$('#auto_bc_suggest').show();
			}
		},
		cache: false
		});
	}
	else{ $('#auto_bc_suggest').hide(); }
}

function addfrndtobcpost(user_id,name){
var cur_content = $('#selected_bc_friends').html();
var new_content = "<span  class='bc_mail_ids' id='"+user_id+"'>"+name+"<a onclick='removefrnd("+user_id+")'><img class='as_close_btn' src='<?php echo base_url().'images/close_post.png'; ?>'/></a></span>";
 $('#selected_bc_friends').html(new_content+cur_content);
 $('#search_bc_friends').focus();
 $('#auto_bc_suggest').hide();
var addedusers = $('#added_bc_users_test').val()
if(addedusers!='')
$('#added_bc_users_test').val(addedusers+','+user_id)
else
$('#added_bc_users_test').val(user_id)

}

function removefrnd(user_id){
	var addedusers = $('#added_bc_users').val();
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
	$('#added_bc_users').val(newval);
	$('#'+user_id).remove();
}













/*$('#event_form').submit( function( event)
	{
				
		url="<?php // echo base_url(); ?>events/create_event/";
		$.post( url, { formdata: $(this).serialize()})
		.done(function( data ) {
			if(data == false)
			alert("Please Enter Valid Details");
			else
			$(".joblisting").html(data);
			$('#addJobForm').trigger("reset");
			$( "#canceladdjob" ).trigger( "click" );
			});
			event.preventDefault();
		});*/
		
	// password change from profile settings
$('#pwd_change_btn').click( function()
{
		$('#change_pwd').toggle();
		$(this).hide();
});

$('#select_all_msgs').click(function(event)
{
	if(this.checked)
	{
		$('.all_inbox_msgs').each(function(event)
		{
			if($(this).parent().parent().css("display")!="none")
			this.checked = true;
		});
	}else{
		$('.all_inbox_msgs').each(function(event)
		{
			if($(this).parent().parent().css("display")!="none")
			this.checked = false;
	
		});
	}
});	
$('#select_sent_msgs').click(function(event)
{
	if(this.checked)
	{
		$('.all_sent_msgs').each(function(event)
		{
			if($(this).parent().parent().css("display")!="none")
			this.checked = true;
		});
	}else{
		$('.all_sent_msgs').each(function(event)
		{
			if($(this).parent().parent().css("display")!="none")
			this.checked = false;
	
		});
	}
});	
$('#select_trash_msgs').click(function(event)
{
	if(this.checked)
	{
		$('.all_trash_msgs').each(function(event)
		{
			if($(this).parent().parent().css("display")!="none")
			this.checked = true;
		});
	}else{
		$('.all_sent_msgs').each(function(event)
		{
			if($(this).parent().parent().css("display")!="none")
			this.checked = false;
	
		});
	}
});	

 	
// auto complete for company textbox in aboutme page
 /*$("#org_name").autocomplete({
 	minLength: 1,
 	source: function(req, add){
 		$.ajax({
 			url:'<?php //echo base_url(); ?>company/cmp_name_search/', //Controller where search is performed
 			dataType: 'json',
 			type: 'POST',
 			data: req,
 			success: function(data){
 				if(data){
 				 $('#auto_suggest_company').html(data);
				 $('#auto_suggest_company').show();
 				}
 			}
 		});
 	}
 });*/
	
	
function keyupevent_cmp(){
	var value = $('#org_name').val();
		if(value!='')
	{	
	url="<?php echo base_url(); ?>company/cmp_name_search/"+value;
		$.ajax({
        type: "POST",
        url: url,
        success: function(data)
        {   
			if(data){
			$('#auto_suggest_company').html(data);
			$('#auto_suggest_company').show();
			}
		},
		cache: false
		});
	}
	else{ $('#auto_bc_suggest').hide(); }
}

function addtocmpname(cmpname)
{
	$('input[name="org_name"]').val(cmpname);
	$('#auto_suggest_company').hide();
}


	
$('#searchbar_category li').click(function()
{
	   
	  var category = $(this).attr('id');
	  alert(category);
	  if(this.id == '')
	  {
		  category = 'all';
	  }
	 
	  var search_data = $('#cmp_header_searchbar').val();
	  alert(search_data);
	
	/*  $.ajax({
 			url:"<?php //echo base_url(); ?>company/allSearch/"+search_data+"/"+category; 
 			dataType: 'json',
 			type: 'POST',
 			data: req,
 			success: function(data){
 				//if(data.response =='true'){
 				 $('#org_name').html(data);
 				//}
 			}
 		});*/
	});  
	

	
/*
		$("#sidebar_settings").click(function(event){

						url="<?php //echo base_url(); ?>profile/sidebarEdit/";
						$.post( url )
						.done(function( data ) {
							info = JSON.parse(data);
							alert(data);
								$("input[name=pend_frnd_requests]").attr("checked","checked");
								$("input[name=latest_frnds]").attr("checked","checked");
								$("input[name=your_add_one]").attr("checked","checked");
								$("input[name=add_friends]").attr("checked","checked");
								$("input[name=companies_to_follow]").attr("checked","checked");
								$("input[name=user_following_cmps]").attr("checked","checked");
								$("input[name=companies_im_following]").attr("checked","checked");
								$("input[name=my_companies]").attr("checked","checked");
									
							$('#sidebar_modal').modal('toggle');
						});
						return false;
				});*/
				
				
				
/*$('#cmp_header_searchbar').click({
	
	
		$('#searchbar_category li').click(functon() {
			 alert(this.id);
		});
	//alert(cat);
 	//minLength: 1,
 	/*source: function(req, add){
 		$.ajax({
 			url:'<?php // echo base_url(); ?>company/allSearch/', //Controller where search is performed
 			dataType: 'json',
 			type: 'POST',
 			data: req,
 			success: function(data){
 				//if(data.response =='true'){
 				 $('#org_name').html(data);
 				//}
 			}
 		});
 	}
 

	 
});	*/
	/*function sidebar()
				{
					
	//$('#newone').submit(function(){
		document.forms['newone'].submit();
						
						url="<?php // echo base_url(); ?>customer/sidebarSettings/";
					$.post( url, { formdata: $(this).serialize() })
					.done(function( data ) {
					   	if(data == true)
							alert("Information Updated");
						else
							alert("Something Went wrong please try again after sometime");
					  });
					event.preventDefault();
	//	});
				}*/
</script>
<script>


  $(document).ready(function () {
        // number of records per page
        var pageSize = 2;
        // reset current page counter on load
        $("#hdnActivePage").val(1);
        // calculate number of pages
        var numberOfPages = $('#inbox-message tr').length / pageSize;
        numberOfPages = numberOfPages.toFixed();
		if(numberOfPages<1){
			$("a.next").hide();
            $("#next").hide();
		}
        // action on 'next' click
        $("a.next").on('click', function () {
			$('#start').text(parseInt($('#start').text())+pageSize);
			var totalmsgs = $('#totalmsgs').val();
		
			if(parseInt($('#last').text())>totalmsgs)
			var last = totalmsgs;
			else
			var last = parseInt($('#last').text())+1;
			$('#last').text(last);
            // show only the necessary rows based upon activePage and Pagesize
            $("#inbox-message tr:nth-child(-n+" + (($("#hdnActivePage").val() * pageSize) + pageSize) + ")").show();
            $("#inbox-message tr:nth-child(-n+" + $("#hdnActivePage").val() * pageSize + ")").hide();
            var currentPage = Number($("#hdnActivePage").val());
            // update activepage
            $("#hdnActivePage").val(Number($("#hdnActivePage").val()) + 1);
			
            // check if previous page button is necessary (not on first page)
            if ($("#hdnActivePage").val() != "1") {
                $("a.previous").show();
                $("#previous").show();
            }
            // check if next page button is necessary (not on last page)
            if ($("#hdnActivePage").val() == numberOfPages) {
				//$('#last').text(parseInt($('#inbox-message tr').length)- parseInt(pageSize*numberOfPages));
                $("a.next").hide();
                $("#next").hide();
            }
        });
        // action on 'previous' click
        $("a.previous").on('click', function () {
			$('#start').text(parseInt($('#start').text())-pageSize);
			$('#last').text(parseInt($('#last').text())-pageSize);
            var currentPage = Number($("#hdnActivePage").val());
            $("#hdnActivePage").val(currentPage - 1);
            // first hide all rows
            $("#inbox-message tr").hide();
            // and only turn on visibility on necessary rows
            $("#inbox-message tr:nth-child(-n+" + ($("#hdnActivePage").val() * pageSize) + ")").show();
            $("#inbox-message tr:nth-child(-n+" + (($("#hdnActivePage").val() * pageSize) - pageSize) + ")").hide();
            // check if previous button is necessary (not on first page)
            if ($("#hdnActivePage").val() == "1") {
                $("a.previous").hide();
                $("#previous").hide();
            } 
            // check if next button is necessary (not on last page)
            if ($("#hdnActivePage").val() < numberOfPages) {
                $("a.next").show();
                $("#next").show();
            } 
            if ($("#hdnActivePage").val() == 1) {
               $("#previous").hide();
            }
        });
    });    
//]]>  

</script>
</script>
<script type="text/javascript">

/*$(function(){
	$('#swfupload-control').swfupload({
		upload_url: "upload-file.php",
		file_post_name: 'uploadfile',
		file_size_limit : "1024",
		file_types : "*.jpg;*.png;*.gif",
		file_types_description : "Image files",
		file_upload_limit : 5,
		flash_url : "js/swfupload/swfupload.swf",
		button_image_url : 'js/swfupload/wdp_buttons_upload_114x29.png',
		button_width : 114,
		button_height : 29,
		button_placeholder : $('#button')[0],
		debug: false
	})
		.bind('fileQueued', function(event, file){
			var listitem='<li id="'+file.id+'" >'+
				'File: <em>'+file.name+'</em> ('+Math.round(file.size/1024)+' KB) <span class="progressvalue" ></span>'+
				'<div class="progressbar" ><div class="progress" ></div></div>'+
				'<p class="status" >Pending</p>'+
				'<span class="cancel" >&nbsp;</span>'+
				'</li>';
			$('#log').append(listitem);
			$('li#'+file.id+' .cancel').bind('click', function(){
				var swfu = $.swfupload.getInstance('#swfupload-control');
				swfu.cancelUpload(file.id);
				$('li#'+file.id).slideUp('fast');
			});
			// start the upload since it's queued
			$(this).swfupload('startUpload');
		})
		.bind('fileQueueError', function(event, file, errorCode, message){
			alert('Size of the file '+file.name+' is greater than limit');
		})
		.bind('fileDialogComplete', function(event, numFilesSelected, numFilesQueued){
			$('#queuestatus').text('Files Selected: '+numFilesSelected+' / Queued Files: '+numFilesQueued);
		})
		.bind('uploadStart', function(event, file){
			$('#log li#'+file.id).find('p.status').text('Uploading...');
			$('#log li#'+file.id).find('span.progressvalue').text('0%');
			$('#log li#'+file.id).find('span.cancel').hide();
		})
		.bind('uploadProgress', function(event, file, bytesLoaded){
			//Show Progress
			var percentage=Math.round((bytesLoaded/file.size)*100);
			$('#log li#'+file.id).find('div.progress').css('width', percentage+'%');
			$('#log li#'+file.id).find('span.progressvalue').text(percentage+'%');
		})
		.bind('uploadSuccess', function(event, file, serverData){
			var item=$('#log li#'+file.id);
			item.find('div.progress').css('width', '100%');
			item.find('span.progressvalue').text('100%');
			var pathtofile='<a href="uploads/'+file.name+'" target="_blank" >view &raquo;</a>';
			item.addClass('success').find('p.status').html('Done!!! | '+pathtofile);
		})
		.bind('uploadComplete', function(event, file){
			// upload has completed, try the next one in the queue
			$(this).swfupload('startUpload');
		})
	
});	
*/

</script>




<?php /*?>
<style>
.form-mandatory{
color:red;
}
#uploadPhotosdvPreview img{margin-right:5px; }
#sharePostBtn{
	background: #609b34;
  height: 30px;
  font-size: 14px;
  line-height: 30px;
  padding: 0 15px;
  display: inline-block;
  -webkit-border-radius: 2px;
  border-radius: 2px;
  color: #fff;
  font-weight: 300;
}

</style><?php */?>
<script> //current location script

	$('body').delegate('#add_currentcity','click',function()
	{
	$('#add_currentcity2').hide();
	$('#add_currentcity1').hide();
	$('ul.home > #location-li').append($('#currentcity_disp').show());

});



function close_current_city()
 {
	$('#currentcity_disp').hide();
	//$('#hme_town_one').show();
	$('#add_currentcity2').show();
	$('#add_currentcity1').show();
	$('#add_currentcity').show();
	}
	
	
	
function add_current_city()
{
	var currentcity = $('#current_location').val();
	
	url="<?php echo base_url();?>profile/addlocation/";
	 $.ajax({
		type: "POST",
		url: url,
		data: { current_city:currentcity } ,
		success: function(html)
		{   					
			//$('#currentcity_val_disp').show();
			$('#add_currentcity').hide();
			$('ul.home > #location-li').html(html);
		}
		
	   });			
			
	}


function current_city_edit()
	{
		
	$('#currentcity_val_disp').hide();
	$('ul.home > #location-li').append($('#currentcity_disp').show());

	}
	
		
function close_currentcity() {
	$('#currentcity_disp').hide();
	$('#currentcity_val_disp').show();
	
}

function delete_current_city()
{
	
	   if (confirm("Delete Your Current City from Bzzbook") == true) {
		   	url="<?php echo base_url();?>profile/deletelocation/";
	 $.ajax({
		url: url,
		success: function(html)
		{   					
			
			$('ul.home > #location-li').html(html);
			$('#add_currentcity2').show();
			$('#add_currentcity1').show();
			$('#currentcity_val_disp').hide();
		}
		
	   });
       
    } 
	
	
}
</script>
<script> // hometown script
$('body').delegate('#hometown','click',function(){
	$('#hme_town').hide();
	$('#hme_town1').hide();
	$('ul.home > #hometown-li').append($('#hometown_disp').show());

});

function add_home_town()
{
	var hometown = $('#home_town').val();
	url="<?php echo base_url();?>profile/addhometown/";
	 $.ajax({
		type: "POST",
		url: url,
		data: { home_town:hometown } ,
		success: function(html)
		{   					
		//	$('#hometown-li #hometown_disp').hide();
		  // $('#hometown_val_disp').show();
		//	$('#hme_town').hide();
			$('ul.home > #hometown-li').html(html);
		}
		
	   });			
			
	}

	function home_town_edit()
	{
		
	$('#hometown_val_disp').hide();
	$('ul.home > #hometown-li').append($('#hometown_disp').show());

	}
		
function close_home_town() {
	$('#hometown_disp').hide();
	//$('#hme_town_one').show();
	$('#hme_town').show();
	$('#hme_town1').show();
	}
	
function close_home() {
	$('#hometown_disp').hide();
	$('#hometown_val_disp').show();
	
}

function delete_hometown()
{
	
	   if (confirm("Delete Your Hometown from Bzzbook") == true) {
		   	url="<?php echo base_url();?>profile/deletehometown/";
	 $.ajax({
		url: url,
		success: function(html)
		{   					
			
			$('ul.home > #hometown-li').html(html);
			$('#hometown_val_disp').hide();
			$('#hme_town1').show();
			$('#hme_town').show();
		}
		
	   });
       
    } 
	
	
}
</script>
<script> //family member relations script
family_edit();
$('body').delegate('#familymembers','click',function()
{
	$('#tpfam').hide();
	$('#add_f_member').hide();
	$('#add_f_member1').hide();
	$('ul.relations > #familymembers-li:first').prepend($('#family_relation').show());
//	$('#relation').show();
});

$('body').delegate('#add_family_link_disp','click',function()
{
	$(this).hide();
	$('#add_f_member_down1').show();
	$('#add_f_member_down2').show();
});

$('body').delegate('#familymembers_down','click',function()
{
	$('#add_f_member_down1').hide();
	$('#add_f_member_down2').hide();
	$('ul.relations #familymembers-li #family_mem_down_block').append($('#family_relation').show());
	$('#add_family_member').trigger("reset");
	$('#family_action').val('add');
	$('#close_family_btn').hide();
	$('#fam_member_down').show();
	
});

$('body').delegate('#fam_member_down','click',function()
{
	$('#family_relation').hide();
	$('#add_family_link_disp').show();
});

		$('body').delegate('#add_family_member','submit',function( event){
			
					url="<?php echo base_url();?>profile/add_fam_members/";
					$.post( url, { formdata: $(this).serialize() })
					.done(function( data ) {
					   	if(data == false)
							alert("Please Enter Valid Details");
						else
						
						$('#old_fam_members').hide();
						$('#add_f_member').show();
						$('#add_f_member1').show();	
						$('ul.relations > #familymembers-li').html(data);	
						$('#family_relation').hide();
					
					  });
					
				event.preventDefault();
				});	


	
	
	
	function disp_add_member()
	{
		$('#add_fam_member').show();
		$('#add_f_member').show();
	}
	
	function close_family_member()
	{
		$('#family_relation').hide();
		$('#add_f_member').show();
		$('#add_f_member1').show();	
	}
	
	function close_family()
	{
		$('#family_relation').hide();
		$('#add_f_member').show();
		$('#add_f_member1').show();	
	}

function del_fam_member(family_member_id)

{
	
	if (confirm("Delete Your family member from Bzzbook") == true) {
		   	
	url="<?php echo base_url();?>profile/delete_fam_member/";
	 $.ajax({
		type: "POST",
		url: url,
		data: { family_member_id:family_member_id } ,
		success: function(html)
		{  
			$('#add_f_member').show();
			$('#add_f_member1').show();	
			$('ul.relations > #familymembers-li').html(html);
			
		}
		
	   });			
			
	
	
	}
	
}

function family_edit()
{
	

	$('.family_edit').click(function(){
		
		fam_member_id = $(this).attr("id").substr(11);
		
		$("input[name=family_disp_id]").val(fam_member_id)
		url="<?php echo base_url(); ?>profile/familyedit/";
		$.post( url, { fam_member_id: fam_member_id})
		.done(function( data ) {			
			info = JSON.parse(data);			
			$("input[name=family_member]").val(info.member_name);
			$("select[name=family_member_type]").val(info.member_relation);
			$("input[name=family_action]").val("update");
		    $('#family_'+fam_member_id).append($('#family_relation').show());	
			
		});
		return false;

	});
	
	
}


</script>

<script> //about me script
$('body').delegate('#aboutme_a','click',function()
{
	//alert('hai');
	$(this).hide();
	$('ul.details_about > #aboutme-li').append($('#aboutme_disp').show());

});

function close_about_me()
{
	$('#aboutme_disp').hide();
	$('#aboutme_a').show();
}


function add_aboutme()
{
	var aboutme = $('#about_me_data').val();
	
	url="<?php echo base_url();?>profile/addaboutme/";
	 $.ajax({
		type: "POST",
		url: url,
		data: { about_me:aboutme } ,
		success: function(html)
		{   
		
			$('#aboutme_disp').hide();
			$('#about_me_add').show();
			$('ul.details_about > #aboutme-li').html(html);					
			
		}
		
	   });			
			
	}
function about_me_edit()
{
	$(' #aboutme_val_disp').hide();
	$('ul.details_about > #aboutme-li').append($('#aboutme_disp').show());
	
}

function close_aboutme()
{
	$('#aboutme_disp').hide();
	$('#aboutme_val_disp').show();
}

function del_about_me()
{
	
	
	   if(confirm("Delete Abouy You from Bzzbook") == true) {
		url="<?php echo base_url();?>profile/deleteaboutme/";
	 	$.ajax({
		url: url,
		success: function(html)
		{   					
			
			$('ul.details_about > #aboutme-li').html(html);
			$('#aboutme_val_disp').hide();
			$('#about_me_add').show();
		
		}
		
	   });
       
    } 
	
	

}
</script>
<script> //favorite quotes sript

	
$('body').delegate('#fav_quotes','click',function()

	{//alert('hai');
	$(this).hide();
	$('ul.details_about > #favquotes-li').append($('#fav_quotes_disp').show());

});

function close_favquotes()
{
	$('#fav_quotes_disp').hide();
	$('#favquotes_val_disp').show();
	
}


function add_favquotes()
{
	var favquotes = $('#fav_quotes_data').val();
	
	url="<?php echo base_url();?>profile/addfavquotes/";
	 $.ajax({
		type: "POST",
		url: url,
		data: { fav_quotes:favquotes } ,
		success: function(html)
		{   
		
			$('#fav_quotes_disp').hide();
			$('#fav_quotes').hide();
			$('ul.details_about > #favquotes-li').html(html);					
			
		}
		
	   });			
			
	}
function fav_quotes_edit()
{
	$('#favquotes_val_disp').hide();
	$('ul.details_about > #favquotes-li').append($('#fav_quotes_disp').show());
	
}

function close_fav_quotes()
{
	$('#fav_quotes_disp').hide();
	$('#fav_quotes').show();
}

function del_fav_quotes()
{
	
	
	   if (confirm("Delete Your Favorite Quotes from Bzzbook") == true) {
		   	url="<?php echo base_url();?>profile/deletefavquotes/";
	 $.ajax({
		url: url,
		success: function(html)
		{   					
			
			$('ul.details_about > #favquotes-li').html(html);
			$('#favquotes_val_disp').hide();
			$('#add_fav_quotes').show();
			//$('#fav_quotes').show();
			
		}
		
	   });
       
    } 
	
	

}

</script>

<script>

$('#relation_status').click(function()
{
	$('#relation1').hide();
	$('#relation2').hide();
	$('ul.relations > #relation-li').append($('#relation_disp').show());
	
});

function close_relationship()
{
	$('#relation_disp').hide();
	$('#relation1').show();
	$('#relation2').show();
}

function add_relation()
{
	var relation = $('#relation_type').val();
	
	url = "<?php echo base_url(); ?>profile/addrelation/";
	$.ajax({
		type: "POST",
		data: { relation : relation},
		url : url,
		success : function(html)
		{
			$('#relation_disp').hide();
	      	$('ul.relations > #relation-li').html(html);		
		
		
		}
	});
	
}

function edit_relation()
{
	$('#relation').hide();
	$('#relation_disp').show();
}

function close_relation()
{
	$('#relation_disp').hide();
	$('#relation').show();
	
}
</script>
<script>
nick_edit();
$('#nic_oth_names').change(function()
{
	var name = $(this).val();
	var placeholder = "whats your " +name+" ?";
	$('#nic_name').prop('placeholder',placeholder);


});

$('body').delegate('#add_nicname_link_disp','click',function()
{
	$(this).hide();
	$('#other_name_down_view').show();
	
});

$('body').delegate('#oth_name_down','click',function()
{
	$('#other_name_down_view').hide();
	$('ul.details_about > #nic_names-li #nicname_down_block').append($('#other_names').show());
	$('#add_nick_name').trigger("reset");
	$('#nickname_action').val('add');
	$('#nicname_close_btn').hide();
	$('#nicname_down_close').show();
	
});


function nic_name_down_close()
{
	$('#other_names').hide();
	$('#add_nicname_link_disp').show();
}
$('body').delegate('#oth_name','click',function()
{
	$('#oth_name').hide();
	$('#111').hide();
	//$('#other_names').show();
	$('ul.details_about > #nic_names-li').prepend($('#other_names').show());
});

function close_othernames()
{
	$('#other_names').hide();
	$('#oth_name').show();
}



$('body').delegate('#add_nick_name','submit',function( event){

	url="<?php echo base_url();?>profile/add_nicnames/";
	$.post( url, { formdata: $(this).serialize() })
	.done(function( data ) {
		if(data == false)
			alert("Please Enter Valid Details");
		else
		
			
		   	$('#nic_names-li').html(data);
	
	  });
	event.preventDefault();
});	



function close_other_names()
{
	$('#other_names').hide();
	$('#oth_name').show();
	
}



function del_nic_name(nick_name_id)
{
	//alert(nick_name_id)
	
	if (confirm("Delete Your nic name from Bzzbook") == true) {
		   	
	url="<?php echo base_url();?>profile/delete_nic_name/";
	 $.ajax({
		type: "POST",
		url: url,
		data: { nick_name_id:nick_name_id } ,
		success: function(html)
		{   		
			
			$('ul.details_about > #nic_names-li').html(html);
			
		}
		
	   });			
	}
	
}



function nick_edit()
{
	

	$('.nick_edit').click(function(){
		
		nick_name_id = $(this).attr("id").substr(9);
		//alert(nick_name_id);
		$("input[name=nickname_disp_id]").val(nick_name_id)
		url="<?php echo base_url(); ?>profile/nicnameedit/";
		$.post( url, { nick_name_id: nick_name_id})
		.done(function( data ) {			
			info = JSON.parse(data);			
			$("input[name=nic_name]").val(info.nic_name);
			$("select[name=nic_oth_names]").val(info.nic_name_type);
			$("input[name=nickname_action]").val("update");
		    $('#nick_'+nick_name_id).append($('#other_names').show());	
		});
		return false;

	});
	
	
}
</script>
<script>

$('body').delegate('#add_mbl','click',function()

{
	$('#add_mbl_block').hide();
	$('#add_mbl_disp').show();
});

function close_mobile()
{
	$('#add_mbl_disp').hide();
	$('#add_mbl_block').show();
	//$('#mobile_val_display').show();
}

function close_mbl()
{
	$('#add_mbl_disp').hide();
	$('#mobile_val_display').show();
}


/*function add_mbl()
{
	var mobile = $('#mbl_no').val();
		
	url = "<?php // echo base_url(); ?>profile/addmobile/";
	$.ajax({
		type: "POST",
		data: { mobile : mobile},
		url : url,
		success : function(html)
		{
			$('#add_mbl_disp').hide();
	      	$('ul.basic_info > #mobile-li').html(html);		
		
		}
	});
	
	
}
*/ function mbl_edit()
{
	//$('#mobile_val_display').hide();
	//$('#add_mbl_disp').show();
	
	
	$('.mobile_edit').click(function(){
		
		mobile_id = $(this).attr("id").substr(11);
		//alert(organization_id);
		$("input[name=mobile_disp_id]").val(mobile_id)
		url="<?php echo base_url(); ?>profile/mobileEdit/";
		$.post( url, { mobile_id: mobile_id})
		.done(function( data ) {
			info = JSON.parse(data);
			$("input[name=mobile_no]").val(info.mobile_no);
			$("select[name=country_codes]").val(info.country_code);
			$("input[name=mobile_action]").val("update");
			
			$('#mobile_'+mobile_id).append($('#mbl_disp_edit').show());
			
		});
		return false;

		
	});
	
}




del_mobile();
function del_mobile()
{
	$('.mobile_delete').click(function(){
	mbl_id = $(this).attr("id").substr(13);
	//alert(mbl_id);
	if (confirm("Delete Your Mobile No from Bzzbook") == true) {
	url="<?php echo base_url();?>profile/deletemobile/";
	 $.ajax({
		url: url,
		type: "POST",
		data:{ mbl_id:mbl_id },
		success: function(html)
		{   					
			
			$('ul.basic_info > #mobile-li').html(html);

		}
		
	   });
       
    } 
	
});
}






  var imCnt = 0;

        $('body').delegate('#add_mbl_link','click',function() {
			//$('.add_mbl_append old_mobile_fields').hide();
        // alert('wefdwe');
				 
				 if(imCnt <= 4)
				 {
                imCnt = imCnt + 1;

                // ADD TEXTBOX.
                $('.add_mbl_append').append('<div class="col-md-12 mobile mobile_values"><div id="individual_mbl_con'+imCnt+'" class="form-group mobile col-md-3 get_mbl_divs"><label for="exampleInputName2">Mobile Phones</label></div><div class="col-md-3"><select class="con_code" id="country_codes'+imCnt+'"><option>india(+91)</option><option>pak(+92)</option></select></div><div class="col-md-3 box-rig_box"><input type="text" class="phone_no" id="mobile' + imCnt + '" value=""></div><div class="col-md-3 inside_drop" style="display:none;"> <a aria-expanded="false" role="button" data-toggle="dropdown" class="dropdown-toggle" href="#"> <i class="fa fa-fw"></i> <span class="fa fa-angle-down"></span></a></div></div>');
				
				 }else{
				 alert('aaaaaaaaaaaaaaaaaa');
				 }
			});

function get_mbl_values()
{
	i=0;
	$('.mobile_values').each(function()
	{
	
		var value = $(this).attr('id');
		
		var mbl_no = $('#mobile'+i).val();
	var country = $('#country_codes'+i).val();
	
	
			
	url = "<?php echo base_url(); ?>profile/addmobile/";
	$.ajax({
		type: "POST",
		data: { mbl_no : mbl_no,country : country },
		url : url,
		success : function(html)
		{
			$('#add_mbl_disp').hide();
	      	$('ul.basic_info > #mobile-li').html(html);		
		
		}
	});
		
		 	i++;
		
	});
	

}



function edit_mobile_value()
{
	
	var mobile_no = $('#mbl_no').val();
	var con_code = $('#country_code_mbl').val();
	var mobile_id = $('#mobile_no_id').val();	
	url = "<?php  echo base_url(); ?>profile/editmobilebyid/";
	$.ajax({
		type: "POST",
		data: { mobile_no : mobile_no, con_code : con_code, mobile_id : mobile_id },
		url : url,
		success : function(html)
		{
			$('#add_mbl_disp').hide();
	      	$('ul.basic_info > #mobile-li').html(html);		
		
		}
	});
	
	

}


function close_edit_mobile()
{
	
	$('#mbl_disp_edit').hide();
}


</script>
<script>//add_web_site
$('body').delegate('#add_website','click',function()
{
	$('#add_web_site').hide();
	$('#website_disp').show();
});

function close_website()
{
	$('#add_web_site').show();
	$('#website_disp').hide();
}

function add_website()
{
	var website = $('#website_data').val();
	
	url = "<?php echo base_url(); ?>profile/addwebsite/";
	$.ajax({
		type: "POST",
		data: { website : website},
		url : url,
		success : function(html)
		{
			$('#website_disp').hide();
	      	$('ul.basic_info > #website-li').html(html);		
		
		
		}
	});
	
	
}

 function website_edit()
{
	$('#website_val_display').hide();
	$('#website_disp').show();
}

function close_web_site()
{
	$('#website_val_display').show();
	$('#website_disp').hide();
}

function del_website()
{
	   if (confirm("Delete Your Website from Bzzbook") == true) {
		   	url="<?php echo base_url();?>profile/deletewebsite/";
	 $.ajax({
		url: url,
		success: function(html)
		{   					
			
			$('ul.basic_info > #website-li').html(html);
		  
			$('#add_web_site').show();
			$('#website_val_display').hide();
		
		}
		
	   });
       
    } 
	
	
}
</script>
<script>// aboutme address 

$('body').delegate('#add_address','click',function()
{
	$('#address1').hide();
	$('#address_disp').show();
});

function close_address()
{
	
	$('#address1').show();
	$('#address_disp').hide();
}

function add_address()
{

var address = $('#address').val();
var city = $('#ad_city').val();
var zipcode = $('#zip_code').val();
var neighborhood = $('#neighborhood').val();
	
	url = "<?php echo base_url(); ?>profile/addaddress/";
	$.ajax({
		type: "POST",
		data: { address : address, city : city , zipcode : zipcode, neighborhood : neighborhood },
		url : url,
		success : function(html)
		{
			$('#address_disp').hide();
	      	$('ul.basic_info > #address-li').html(html);		
		
		
		}
	});
}


 function address_edit()
{
	$('#address_val_display').hide();
	$('#address_disp').show();
}
	
function close_address_block()
{
	$('#address_val_display').show();
	$('#address_disp').hide();
}

function del_address()
{
	   if (confirm("Delete Your address from Bzzbook") == true) {
		   	url="<?php echo base_url();?>profile/deleteaddress/";
	 $.ajax({
		url: url,
		success: function(html)
		{   					
			
			$('ul.basic_info > #address-li').html(html);
		  	$('#address1').show();
			$('#address_val_display').hide();
		
		}
		
	   });
       
    } 
	
	
}

</script>


<script> // about me workplace
work_edit();
curent_status();
work_delete();
$('body').delegate('#add_workplace','click',function()
{
	$('#work_head1').hide();
	$('#work_head2').hide();
	//$('#work_place').show();
	$('ul.backgrounds > #workplace-li .tophead').append($('#work_place').show());
});


$('body').delegate('#add_workplace_down','click',function()
{
	$('#work_head_down1').hide();
	$('#work_head_down2').hide();
	//$('#work_place').show();
	$('ul.backgrounds > #workplace-li #add_work_place_down').append($('#work_place').show());
	$('#work_action').val('add');
	$('#work_form').trigger("reset");
	$('#work_close_btn').hide();
	$('#work_down_close').show();
});


function close_work_down()
{
	$('#add_work_link_disp').show();
		$('#work_place').hide();
}

$('body').delegate('#add_work_link_disp','click',function()
{
	$(this).hide();
	$('#work_head_down1').show();
	$('#work_head_down2').show();
});

function close_work()
{
	$('#work_place').hide();
	$('#work_head1').show();
	$('#work_head2').show();
	//$('#clearfix').show();
	$('#add_work_link_disp').show();
	$('#work_form').trigger("reset");
	
}


		$('body').delegate('#work_form','submit',function( event){
			
					url="<?php echo base_url();?>profile/add_work/";
					$.post( url, { formdata: $(this).serialize() })
					.done(function( data ) {
					   	if(data == false)
							alert("Please Enter Valid Details");
						else
						
						$('#work_head1').hide();
						$('#work_head2').hide();
						$('ul.backgrounds > #workplace-li').html(data);		
					
					  });
					
				event.preventDefault();
				});	


function work_edit()
{
	$('.work_edit').click(function(){
		
		organization_id = $(this).attr("id").substr(9);
		//alert(organization_id);
		$("input[name=work_disp_id]").val(organization_id)
		url="<?php echo base_url(); ?>profile/orgEdit/";
		$.post( url, { organization_id: organization_id})
		.done(function( data ) {
			info = JSON.parse(data);
			$("input[name=company]").val(info.org_name);
			$("input[name=position]").val(info.position);
			$("textarea[name=description]").val(info.org_desc);
			
			if(info.emp_status == 'wor')
			{
			$("input[type='checkbox']").prop("checked","checked");
			}
			$("ïnput[type=city]").val(info.city);
				
	if(!info.start_date)
			{
				$('#frm_years_link').show();
			}else
		{
			
			from_work_date = info.start_date.split('-')
			if(from_work_date[0])
			{
				$('#add_years').hide();	
			$('#frm_years_link').hide();
			$('#frm_years').show();	
			$("select[name=frm_years]").val(from_work_date[0]);
			}else{
			$('#frm_years_link').show();
			}
			if(from_work_date[1])
			{
				$('#add_years').hide();	
			$('#frm_years_link').hide();
			$('#frm_months').show();	
			$("select[name=frm_months]").val(from_work_date[1]);
			}else{
				$('#frm_months_link').show();
			}
			if(from_work_date[2])
			{
				$('#add_years').hide();	
			$('#frm_years_link').hide();
			$('#frm_days').show();	
			$("select[name=frm_days]").val(from_work_date[2]);
			}else{
				$('#frm_days_link').show();
			}
		}
		
		
		if(!info.end_date)
			{
				$('#to_years_link').show();
			}else
		{
			
			to_work_date = info.end_date.split('-')
			
			if(to_work_date[0])
			{
				
			$('#to_years_link').hide();
			$('#to_years').show();	
			$("select[name=to_years]").val(to_work_date[0]);
			}else{
			$('#to_years_link').show();
			}
			
			if(to_work_date[1])
			{
			
			$('#to_years_link').hide();
			$('#to_months').show();	
			$("select[name=to_months]").val(to_work_date[1]);
			}else{
				$('#to_months_link').show();
			}
			if(to_work_date[2])
			{
				
			$('#to_years_link').hide();
			$('#to_days').show();	
			$("select[name=to_days]").val(to_work_date[2]);
			}else{
				$('#to_days_link').show();
			}
		}
			
			
			
			$("input[name=work_action]").val("update");
			
			$('#work_'+organization_id).append($('#work_place').show());
			
		});
		return false;

		
	});
	
	
}

function work_delete()
{
	$('.work_delete').click(function(){
	org_id = $(this).attr("id").substr(11);
	//alert(org_id);
	   if(confirm("Delete Your Organization from Bzzbook") == true) {
		url="<?php echo base_url();?>profile/delete_org/";
		$.ajax({
		url: url,
		type: "POST",
		data: { org_id:org_id } ,
		success: function(html)
		{   					
			
			$('ul.backgrounds > #workplace-li').html(html);
		
		}
		
	   });
       
    } 
	
	});
}

function add_year()
{
	$('#add_years').hide();
	$('#frm_years').show();
	$('#frm_months_link').show();
	
}


	$('#frm_years').change(function()
	{
		if( $('#frm_years').val() == 0)
		{
		$('#frm_months_link').hide();
		$('#frm_days_link').hide();
		$('#frm_months').hide();
		$('#frm_days').hide();
		//$('#todates_dropdowns').hide();
		$(this).hide();
		$('#add_years').show();
		//$('#to').hide();
		} else {
			
			if($('#frm_months').is(":hidden"))
			{
	$('#frm_months_link').show();
			}
		
		}
		
	});
	
	$('body').delegate('#frm_months_link','click',function()
	{
		
		$(this).hide();
		$('#frm_months').show();
		$('#frm_days_link').show();
	});
	$('body').delegate('#frm_months','change',function()
	{
		//alert($('#frm_months').val());
		if( $('#frm_months').val() == 0)
		{
	//	$('#todates_dropdowns').hide();
		$('#frm_days_link').hide();
		$('#frm_days').hide();
		$('#to_years_link').hide();
		$(this).hide();
		$('#frm_months_link').show();
		//$('#to').hide();
		} else {
			if($('#frm_days').is(":hidden"))
			{
		$('#frm_days_link').show();
			}}
	});
	
	$('body').delegate('#frm_days_link','click',function()
	{
		$(this).hide();
		$('#frm_days').show();
		
		if( $('#curent_status').is(':checked'))
		{
			$('#to_present').show();
			$('#to').hide();
		}else{
			$('#to_present').hide();
			$('#to').show();
			
			 if($('#to_years').is(":hidden"))
			{
				$('#to_years_link').show();
			}
			
		}
		
		
	});
	$('body').delegate('#frm_days','change',function()
	{
		if( $('#frm_days').val() == 0)
		{
		$(this).hide();
		$('#to_years_link').hide();
		//$('#to_years').hide();
		//$('#to').hide();
		//$('#to_months').hide();
	//	$('#to_days').hide();
		$('#frm_days_link').show();
		} else {
			
		
			
			if($('#curent_status').is(':checked'))
			{
				$('#to_present').show();
				$('#to').hide();
				$('#todates_dropdowns').hide();
			}else{
					
					
			if($('#to_years').is(":hidden"))
			{
				$('#to_years_link').show();
			}
				
				
				
				$('#to_present').hide();
				$('#to').show();
				$('#todates_dropdowns').show();
				
			}
			
	//	$('#to').show();
		//$('#to_present').hide();
		
		}
	});
	/*
	function status()
	{
	$('#curent_status').is("checked",function()
	{
		alert('hai');
		$('#to_present').hide();
		
	});
	}*/
	
	
	$('body').delegate('#curent_status','click',function()
   {
	 if( $('#curent_status').is(':checked'))
	 {
		 $('#to_years_link').hide();
		 $('#to_present').show();
		 $('#to').hide();
	   $('#todates_dropdowns').hide();
	 } else
	 {
		 $('#to_present').hide();
		 $('#to').show();
		 $('#todates_dropdowns').show();
		 
		 if($('#to_years').is(":hidden"))
			{
				$('#to_years_link').show();
			}
		 
	 }
	  });
 
	$('body').delegate('#to_years_link','click',function()
	{
		$(this).hide();
		$('#to_years').show();
		$('#to_months_link').show();
		
	});
	
	$('body').delegate('#to_years','change',function()
	{
		if( $('#to_years').val() == 0)
		{
		$('#to_months_link').hide();
		$('#to_months').hide();
		$('#to_days').hide();
		$(this).hide();
		$('#to_years_link').show();
		} else {
			
			if($('#to_months').is(":hidden"))
			{
	$('#to_months_link').show();
			}
		
		}
		
	});
	
	
	$('body').delegate('#to_months_link','click',function()
	{
		
		$(this).hide();
		$('#to_months').show();
		$('#to_days_link').show();
	});
	$('body').delegate('#to_months','change',function()
	{
		//alert($('#frm_months').val());
		if( $('#to_months').val() == 0)
		{
		$('#to_days_link').hide();
		$('#to_days').hide();
		$(this).hide();
		$('#to_months_link').show();
		} else {
			if($('#to_days').is(":hidden"))
			{
		$('#to_days_link').show();
			}}
	});
	
	
	$('body').delegate('#to_days_link','click',function()
	{
		$(this).hide();
		$('#to_days').show();
	});
	
	$('body').delegate('#to_days','change',function()
	{
		if( $('#to_days').val() == 0)
		{
		$(this).hide();
		$('#to_days_link').show();
		} 
	});
	
	function curent_status()
	{
	if($('#curent_status').is(':checked'))
	{
		$('#add_years').show();
		$('#to_present').show();
	}else
	{
		$('#add_years').show();
		$('#to').show();
		$('#to_years_link').show();
	}
	}
</script>

<script> // education in aboutme
college_edit();
college_delete();

$('body').delegate('#add_college','click',function()
{
	$('#college1').hide();
	$('#college2').hide();
	$('ul.backgrounds > #college-li .tophead').append($('#college_disp').show());
});


$('body').delegate('#add_college_link_disp','click',function()
{
	$(this).hide();
	$('#college_down1').show();
	$('#college_down2').show();
});

$('body').delegate('#add_college_down','click',function()
{
	$('#college_down1').hide();
	$('#college_down2').hide();
	$('ul.backgrounds > #college-li #clg_down_block').append($('#college_disp').show());
		$('#college_form').trigger("reset");
		$('#clg_action').val('add');
	$('#clg_close_btn').hide();
	$('#college_down_close').show();
	
});

function close_college_down()
{
	$('#college_disp').hide();
	$('#add_college_link_disp').show();
}
function close_college()
{
	$('#college_disp').hide();
	$('#college1').show();
	$('#college2').show();
	$('#add_college_link_disp').show();
	
}



function college_delete()
{
	$('.college_delete').click(function(){
	clg_id = $(this).attr("id").substr(14);
	//alert(clg_id);
	   if(confirm("Delete Your College Details from Bzzbook") == true) {
		url="<?php echo base_url();?>profile/delete_college/";
		$.ajax({
		url: url,
		type: "POST",
		data: { clg_id:clg_id } ,
		success: function(html)
		{   					
			
			$('ul.backgrounds > #college-li').html(html);
		  	//$('#work_head1').show();
			//$('#work_head2').show();
			//$('#address_val_display').hide();
		
		}
		
	   });
       
    } 
	
	});
}



$('body').delegate('#clg_add_year','click',function()
{
	$(this).hide();
	$('#frm_years_college').show();
	$('#frm_months_clg').show();
});

$('body').delegate('#frm_years_college','change',function()
{
	
	if($('#frm_years_college').val() == 0)
	{
		$(this).hide();
		$('#clg_add_year').show();
		$('#frm_days_clg').hide();
		$('#frm_months_clg').hide();
		$('#frm_months_college').hide();
		$('#frm_days_college').hide();
	}else{
		
		if($('#frm_months_college').is(":hidden"))
			{
	$('#frm_months_clg').show();
			}
	}
});


$('body').delegate('#frm_months_clg','click',function()
{
	$(this).hide();
	$('#frm_months_college').show();
	$('#frm_days_clg').show();
});

$('body').delegate('#frm_months_college','change',function()
{
	
	if($('#frm_months_college').val() == 0)
	{
		$(this).hide();
		$('#frm_months_clg').show();
		$('#frm_days_clg').hide();
	}else{
		
		if($('#frm_days_college').is(":hidden"))
			{
	$('#frm_days_clg').show();
			}
	}
});

$('body').delegate('#frm_days_clg','click',function()
{
	$(this).hide();
	$('#frm_days_college').show();
	
});


$('body').delegate('#frm_days_college','change',function()
{
	
	if($('#frm_days_college').val() == 0)
	{
		$(this).hide();
		$('#frm_days_clg').show();
	
	}
});





	$('body').delegate('#to_years_clg','click',function()
	{
		$(this).hide();
		$('#to_years_college').show();
		$('#to_months_clg').show();
		
	});
	
	
	$('body').delegate('#to_years_college','change',function()
	{
		if( $('#to_years_college').val() == 0)
		{
		$('#to_months_clg').hide();
		$('#to_months_college').hide();
		$('#to_days_clg').hide();
		$('#to_days_college').hide();
		$(this).hide();
		$('#to_years_clg').show();
		} else {
			
			if($('#to_months_college').is(":hidden"))
			{
	$('#to_months_clg').show();
			}
		
		}
		
	});
	
	
	
	$('body').delegate('#to_months_clg','click',function()
	{
		
		$(this).hide();
		$('#to_months_college').show();
		$('#to_days_clg').show();
	});
	
	$('body').delegate('#to_months_college','change',function()
	{
		//alert($('#frm_months').val());
		if( $('#to_months_college').val() == 0)
		{
		$('#to_days_clg').hide();
		$('#to_days_college').hide();
		$(this).hide();
		$('#to_months_clg').show();
		} else {
			if($('#to_days_college').is(":hidden"))
			{
		$('#to_days_clg').show();
			}}
	});
	
		$('body').delegate('#to_days_clg','click',function()
	{
		$(this).hide();
		$('#to_days_college').show();
	});
	
	$('body').delegate('#to_days_college','change',function()
	{
		if( $('#to_days_college').val() == 0)
		{
		$(this).hide();
		$('#to_days_clg').show();
		} 
	});






$('body').delegate('#college_form','submit',function( event){

url="<?php echo base_url();?>profile/add_college/";
$.post( url, { formdata: $(this).serialize() })
.done(function( data ) {
	if(data == false)
		alert("Please Enter Valid Details");
	else
	
	$('#college1').hide();
	$('#college2').hide();
	$('ul.backgrounds > #college-li').html(data);		
	
  });

event.preventDefault();
});	


function college_edit()
{
	$('.college_edit').click(function(){
		
		college_id = $(this).attr("id").substr(12);
		//alert(college_id);
		$("input[name=college_disp_id]").val(college_id)
		
		url="<?php echo base_url(); ?>profile/collegeEdit/";
		$.post( url, { college_id: college_id})
		.done(function( data ) {
			info = JSON.parse(data);
			$("input[name=college_name]").val(info.college_name);
			
			$("textarea[name=description]").val(info.description);
			if(info.edu_status == 'graduate')
			{
			$("input[type='checkbox']").prop("checked","checked");
			}
			$("input[name=concentration1]").val(info.concentration1);
			$("input[name=concentration2]").val(info.concentration2);
			$("input[name=concentration3]").val(info.concentration3);
			
			if(!info.start_date)
			{
				$('#clg_add_year').show();
			}else
		{
			
			from_college_date = info.start_date.split('-')
			
			if(from_college_date[0])
			{
				$('#clg_add_year').hide();
				$('#frm_years_college').show();
				$("select[name=frm_clg_years]").val(from_college_date[0]);
			}else{
				$('#clg_add_year').show();
			}
			
			if(from_college_date[1])
			{
				$('#clg_add_year').hide();
				$('#frm_months_college').show();
				$("select[name=frm_clg_months]").val(from_college_date[1]);
			}else{
					$('#frm_months_clg').show();
			}
			
			if(from_college_date[2])
			{
				$('#clg_add_year').hide();
				$('#frm_days_college').show();
				$("select[name=frm_clg_days]").val(from_college_date[2]);
			}else{
					$('#frm_days_clg').show();
			}
		}
		
			if(!info.end_date)
			{
				$('#to_years_clg').show();
			}else
		{
			
			to_college_date = info.end_date.split('-')
			
			if(to_college_date[0])
			{
				
				$('#to_years_clg').hide();
				$('#to_years_college').show();
				$("select[name=to_clg_years]").val(to_college_date[0]);
			}else{
				$('#to_years_clg').show();
			}
			
				if(to_college_date[1])
			{
				$('#to_months_clg').hide();
				$('#to_months_college').show();
				$("select[name=to_clg_months]").val(to_college_date[1]);
			}else{
				$('#to_months_clg').show();
			}
			
				if(to_college_date[2])
			{
				$('#to_days_clg').hide();
				$('#to_days_college').show();
				$("select[name=to_clg_days]").val(to_college_date[2]);
			}else{
				$('#to_days_clg').show();
			}
		}
			$("input[name=clg_action]").val("update")
		$('#college_disp').show();
		});
		return false;

		
	});
	
	
}


</script>
<script>// aboutme highschool functionality
school_edit();
school_delete();

$('body').delegate('#add_school','click',function()
{
	$('#school1').hide();
	$('#school2').hide();
	$('#highschool').show();
});

$('body').delegate('#add_school_link_disp','click',function()
{
	$(this).hide();
	$('#school_down1').show();
	$('#school_down2').show();
});

$('body').delegate('#add_school_down','click',function()
{
	$('#school_down1').hide();
	$('#school_down2').hide();
	$('ul.backgrounds > #school-li #school_down_block').append($('#highschool').show());
	$('#school_form').trigger("reset");
	$('#sch_action').val('add');
	$('#school_close').hide();
	$('#school_down_close').show();
});

function close_school_down()
{
	$('#highschool').hide();
	$('#add_school_link_disp').show();
	
}
function close_school()
{
	$('#highschool').hide();
	$('#school1').show();
	$('#school2').show();
	$('#add_school_link_disp').show();
	
}




function school_delete()
{
	$('.school_delete').click(function(){
	sch_id = $(this).attr("id").substr(13);
	//alert(sch_id);
	   if(confirm("Delete Your College Details from Bzzbook") == true) {
		url="<?php echo base_url();?>profile/delete_school/";
		$.ajax({
		url: url,
		type: "POST",
		data: { sch_id:sch_id } ,
		success: function(html)
		{   					
			
			$('ul.backgrounds > #school-li').html(html);
		  	//$('#work_head1').show();
			//$('#work_head2').show();
			//$('#address_val_display').hide();
		
		}
		
	   });
       
    } 
	
	});
}





$('body').delegate('#frm_years_sch','click',function()
{
	$(this).hide();
	$('#frm_years_school').show();
	$('#frm_months_sch').show();
});

$('body').delegate('#frm_years_school','change',function()
{
	
	if($('#frm_years_school').val() == 0)
	{
		$(this).hide();
		$('#frm_years_sch').show();
		$('#frm_days_sch').hide();
		$('#frm_months_sch').hide();
		$('#frm_months_school').hide();
		$('#frm_days_school').hide();
	}else{
		
		if($('#frm_months_school').is(":hidden"))
			{
	$('#frm_months_sch').show();
			}
	}
});


$('body').delegate('#frm_months_sch','click',function()
{
	$(this).hide();
	$('#frm_months_school').show();
	$('#frm_days_sch').show();
});

$('body').delegate('#frm_months_school','change',function()
{
	
	if($('#frm_months_school').val() == 0)
	{
		$(this).hide();
		$('#frm_months_sch').show();
		$('#frm_days_sch').hide();
	}else{
		
		if($('#frm_days_school').is(":hidden"))
			{
	$('#frm_days_sch').show();
			}
	}
});

$('body').delegate('#frm_days_sch','click',function()
{
	$(this).hide();
	$('#frm_days_school').show();
	
});


$('body').delegate('#frm_days_school','change',function()
{
	
	if($('#frm_days_school').val() == 0)
	{
		$(this).hide();
		$('#frm_days_sch').show();
	
	}
});





	$('body').delegate('#to_years_sch','click',function()
	{
		$(this).hide();
		$('#to_years_school').show();
		$('#to_months_sch').show();
		
	});
	
	
	$('body').delegate('#to_years_school','change',function()
	{
		if( $('#to_years_school').val() == 0)
		{
		$('#to_months_sch').hide();
		$('#to_months_school').hide();
		$('#to_days_sch').hide();
		$('#to_days_school').hide();
		$(this).hide();
		$('#to_years_sch').show();
		} else {
			
			if($('#to_months_school').is(":hidden"))
			{
	$('#to_months_sch').show();
			}
		
		}
		
	});
	
	
	
	$('body').delegate('#to_months_sch','click',function()
	{
		
		$(this).hide();
		$('#to_months_school').show();
		$('#to_days_sch').show();
	});
	
	$('body').delegate('#to_months_school','change',function()
	{
		//alert($('#frm_months').val());
		if( $('#to_months_school').val() == 0)
		{
		$('#to_days_sch').hide();
		$('#to_days_school').hide();
		$(this).hide();
		$('#to_months_sch').show();
		} else {
			if($('#to_days_school').is(":hidden"))
			{
		$('#to_days_sch').show();
			}}
	});
	
		$('body').delegate('#to_days_sch','click',function ()
	{
		$(this).hide();
		$('#to_days_school').show();
	});
	
	$('body').delegate('#to_days_school','change',function()
	{
		if( $('#to_days_school').val() == 0)
		{
		$(this).hide();
		$('#to_days_sch').show();
		} 
	});


$('body').delegate('#school_form','submit',function( event){

url="<?php echo base_url();?>profile/add_school/";
$.post( url, { formdata: $(this).serialize() })
.done(function( data ) {
	if(data == false)
		alert("Please Enter Valid Details");
	else
	
	$('#school1').hide();
	$('#school2').hide();
	$('ul.backgrounds > #school-li').html(data);		
	
  });

event.preventDefault();
});	



function school_edit()
{
	$('.school_edit').click(function(){
		
		school_id = $(this).attr("id").substr(11);
		//alert(college_id);
		$("input[name=school_disp_id]").val(school_id)
		
		url="<?php echo base_url(); ?>profile/schoolEdit/";
		$.post( url, { school_id: school_id})
		.done(function( data ) {
			info = JSON.parse(data);
			$("input[name=school_name]").val(info.school_name);
			$("textarea[name=description]").val(info.description);
			if(info.sch_status == 'graduate')
			{
			$("input[type='checkbox']").prop("checked","checked");
			}
			
			if(!info.start_date)
			{
				$('#frm_years_sch').show();
			}else
		{
			from_sch_date = info.start_date.split('-')
			if(from_sch_date[0])
			{
				$('#frm_years_sch').hide();
				$('#frm_years_school').show();
				$("select[name=frm_sch_years]").val(from_sch_date[0]);
			}else{
				$('#frm_years_sch').show();
			}
				if(from_sch_date[1])
			{
				$('#frm_months_sch').hide();
				$('#frm_months_school').show();
				$("select[name=frm_sch_months]").val(from_sch_date[1]);
			}else{
				$('#frm_months_sch').show();
			}
				if(from_sch_date[2])
			{
				$('#frm_days_sch').hide();
				$('#frm_days_school').show();
				$("select[name=frm_sch_days]").val(from_sch_date[2]);
			}else{
				$('#frm_days_sch').show();
			}
			
		}
		
			if(!info.end_date)
			{
				$('#to_years_sch').show();
			}else
		{
			to_sch_date = info.end_date.split('-')
			
				if(to_sch_date[0])
			{
				$('#to_years_sch').hide();
				$('#to_years_school').show();
				$("select[name=to_sch_years]").val(to_sch_date[0]);
			}else{
				$('#to_years_sch').show();
			}
				if(to_sch_date[1])
			{
				$('#to_months_sch').hide();
				$('#to_months_school').show();
			$("select[name=to_sch_months]").val(to_sch_date[1]);
			}else{
				$('#to_months_sch').show();
			}
				if(to_sch_date[2])
			{
				$('#to_days_sch').hide();
				$('#to_days_school').show();
				
			$("select[name=to_sch_days]").val(to_sch_date[2]);
			}else{
				$('#to_days_sch').show();
			}
		}
			
			$("input[name=sch_action]").val("update")
		$('#highschool').show();
		});
		return false;

		
	});
	
	
}

</script>

<script> //aboutme languages
//$('#addedlangs').val("");
$('body').delegate('#lang_box','keypress',function(e) {
	
    if(e.which == 32 || e.which == 13) {
	var cur_content = $('#selected_langauges').html();
	
	var language = $.trim($(this).val());

	if(language != '')
	{
	
	var new_content  =  "<span class='bc_mail_ids' id='"+language+"'>"+language+"<a onclick='removelanguage(&#39"+language+"&#39)'><img class='as_close_btn' src='<?php echo base_url().'images/close_post.png'; ?>'/></a></span>";
	$('#selected_langauges').html(new_content+cur_content);
	//var data = $('#addedlangs').val();
	
	//$('#addedlangs').val(data);
	
	
	$('#selected_langauges').show();
	$(this).val('').focus();
	
	 var added_languages = $('#addedlangs').val()
if(added_languages!='')
$('#addedlangs').val(added_languages+','+language)
else
$('#addedlangs').val(language)

    }
	}
});



function removelanguage(language){

	var added_languages = $('#addedlangs').val();
	var len = added_languages.length;
	var newval = '';
	if(len==1)
	{ 
		newval = '';
	}
	else if(added_languages.indexOf(language)==(len-1)){
	newval = added_languages.replace(','+language,'');
	}
	else if(added_languages.indexOf(language)==0){
	if(added_languages.indexOf(',')>1)
	newval = added_languages.replace(language+',','');
	else
	newval = added_languages.replace(language,'');
	}
	else
	newval = added_languages.replace(language+',','');
	$('#addedlangs').val(newval);
	$('#'+language).remove();
}


function add_all_languges()
{
	var lang_data = $('#addedlangs').val();

	url = "<?php echo base_url(); ?>profile/addlanguages/";
	$.ajax({
		type: "POST",
		data: { lang_data : lang_data},
		url : url,
		success : function(html)
		{
			$('#language_disp').hide();
	      	$('ul.basic_info > #language-li').html(html);		
		
		
		}
	});
	
	

}

$('body').delegate('#add_language','click',function()
{
	$('#lang1').hide();
	$('#language_disp').show();
});


function languages_edit()
{
	$('#language_val_display').hide();
	$('#language_disp').show();
}

function close_language()
{
$('#language_disp').hide();
$('#language_val_display').show();
	
}
function close_lang()
{
$('#language_disp').hide();
$('#lang1').show();	
}


function del_language()
{
	   if (confirm("Delete Your Languages from Bzzbook") == true) {
		   	url="<?php echo base_url();?>profile/deletelanguages/";
	 $.ajax({
		url: url,
		success: function(html)
		{   					
			
			$('ul.basic_info > #language-li').html(html);
		  	$('#lang1').show();
			$('#language_val_display').hide();
		
		}
		
	   });
       
    } 
	
	
}

</script>
<script> //about me interest

$('body').delegate('#add_interest','click',function()
{
	$('#interest').hide();
	$('#interest_disp').show();
});

function close_interest()
{
	$('#interest').show();
	$('#interest_disp').hide();
}
function close_interested_in()
{
	$('#interest_val_disp').show();
	$('#interest_disp').hide();
}

function add_interest()
{
	
var interested_in = [];
        $(':checkbox:checked').each(function(i){
          interested_in[i] = $(this).val();
        });


	url="<?php echo base_url();?>profile/addinterest/";
	 $.ajax({
		type: "POST",
		url: url,
		data: { interested_in:interested_in } ,
		success: function(html)
		{   					
			
			$('#interest_disp').hide();
			$('ul.basic_info > #interest-li').html(html);	
		}
		
	   });		
}


function interests_edit()
{
	$('#interest_val_display').hide();
	$('#interest_disp').show();
}




function del_interestedin()
{
	   if (confirm("Delete Your interests from Bzzbook") == true) {
		   	url="<?php echo base_url();?>profile/deleteinterests/";
	 $.ajax({
		url: url,
		success: function(html)
		{   					
			
			$('ul.basic_info > #interest-li').html(html);
		  	$('#interest').show();
			$('#interest_val_disp').hide();
		
		}
		
	   });
       
    } 
	
	
}

</script>
<script>//aboutme political aspects

$('body').delegate('#add_political','click',function()
{
	$('#political').hide();
	$('#political_disp').show();
});

function add_political()
{
	var political = $('#political_belief').val();
	var description = $('#pol_description').val();
	
	url="<?php echo base_url();?>profile/addpolitical/";
	 $.ajax({
		type: "POST",
		url: url,
		data: { political:political , description:description } ,
		success: function(html)
		{   					
			
			$('#political_disp').hide();
			$('ul.basic_info > #political-li').html(html);	
		}
		
	   });	
}

function close_political_belief()
{
	$('#political_val_disp').show();
	$('#political_disp').hide();
}
function close_political()
{
	$('#political').show();
	$('#political_disp').hide();
}

function political_edit()
{
	$('#political_val_disp').hide();
	$('#political_disp').show();
}


function del_political_belief()
{
	   if (confirm("Delete Your political belief from Bzzbook") == true) {
		   	url="<?php echo base_url();?>profile/delete_political_belief/";
	 $.ajax({
		url: url,
		success: function(html)
		{   					
			
			$('ul.basic_info > #political-li').html(html);
		  	$('#political').show();
			$('#political_val_disp').hide();
		
		}
		
	   });
       
    } 
	
}
</script>
<script>//aboutme relegious aspects

$('body').delegate('#add_relegious','click',function()
{
	$('#relegious').hide();
	$('#relegious_disp').show();
});

function add_relegious_belief()
{
	var relegion = $('#rel_belief').val();
	var description = $('#rel_description').val();
	url="<?php echo base_url();?>profile/addrelegious/";
	 $.ajax({
		type: "POST",
		url: url,
		data: { relegion:relegion , description:description } ,
		success: function(html)
		{   					
			
			$('#relegious_disp').hide();
			$('ul.basic_info > #relegion-li').html(html);	
		}
		
	   });	
}

function close_relegious_belief()
{
	$('#relegious').show();
	$('#relegious_disp').hide();
}
function close_relegious()
{
	$('#relegious').show();
	$('#relegious_disp').hide();
}

function relegious_edit()
{
	$('#relegious_val_disp').hide();
	$('#relegious_disp').show();
}


function del_relegion_belief()
{
	   if (confirm("Delete Your political belief from Bzzbook") == true) {
		   	url="<?php echo base_url();?>profile/delete_relegion_belief/";
	 $.ajax({
		url: url,
		success: function(html)
		{   					
			
			$('ul.basic_info > #relegion-li').html(html);
		  	$('#relegious').show();
			$('#relegious_val_disp').hide();
		
		}
		
	   });
       
    } 
	
}

</script>
<script>

$('#add_oth_acc').click( function()
{
	$('#oth_acc').hide();
	$('#other_accounts').show();
});
</script>







<script> //aboutme professional skills

$('body').delegate('#professional_skils','keypress',function(e) {
	
    if(e.which == 32 || e.which == 13) {
	var cur_content = $('#selected_skills').html();
	
	var skill = $.trim($(this).val());

	if(skill != '')
	{
	
	var new_content  =  "<span class='bc_mail_ids' id='"+skill+"'>"+skill+"<a onclick='removeskills(&#39"+skill+"&#39)'><img class='as_close_btn' src='<?php echo base_url().'images/close_post.png'; ?>'/></a></span>";
	$('#selected_skills').html(new_content+cur_content);
	$('#selected_skills').show();
	$(this).val('').focus();
	
	 var added_skills = $('#addedskills').val()
if(added_skills!='')
$('#addedskills').val(added_skills+','+skill)
else
$('#addedskills').val(skill)

    }
	}
});



function removeskills(skill){

	var added_skills = $('#addedskills').val();
	var len = added_skills.length;
	var newval = '';
	if(len==1)
	{ 
		newval = '';
	}
	else if(added_skills.indexOf(skill)==(len-1)){
	newval = added_skills.replace(','+skill,'');
	}
	else if(added_skills.indexOf(skill)==0)
	{
	if(added_skills.indexOf(',')>1)
	newval = added_skills.replace(skill+',','');
	else
	newval = added_skills.replace(skill,'');
	}
	else
	newval = added_skills.replace(skill+',','');
	$('#addedskills').val(newval);
	$('#'+skill).remove();
}


function add_all_skills()
{
	var skill_data = $('#addedskills').val();

	url = "<?php echo base_url(); ?>profile/addpfskills/";
	$.ajax({
		type: "POST",
		data: { skill_data : skill_data},
		url : url,
		success : function(html)
		{
			$('#skills_disp').hide();
	      	$('ul.backgrounds > #pfskills-li').html(html);		
		
		}
	});
	
	

}

function del_pfskills()
{
	   if (confirm("Delete Your Professional skills from Bzzbook") == true) {
		   	url="<?php echo base_url();?>profile/deletepfskills/";
	 $.ajax({
		url: url,
		success: function(html)
		{   					
			
			$('ul.backgrounds > #pfskills-li').html(html);	
		  	$('#prof_skills1').show();
			$('#prof_skills2').show();
			$('#pf_skills_val_display').hide();
		
		}
		
	   });
       
    } 
	
	
}

$('body').delegate('#add_pf_skills','click',function()
{
	$('#prof_skills1').hide();
	$('#prof_skills2').hide();
	$('#skills_disp').show();
});


function pf_skills_edit()
{
	$('#pf_skills_val_display').hide();
	$('#skills_disp').show();
}

function close_pf_skills()
{
$('#skills_disp').hide();
$('#pf_skills_val_display').show();
	
}
function close_pfskills()
{
$('#skills_disp').hide();
$('#prof_skills1').show();
$('#prof_skills2').show();	
}
</script>

<script>
$('#move_to_places').click(function()
{
	$('#overview_tab').removeClass("active");
	$('#overview').removeClass("active");
	$('#place_tab').addClass("active");
	$('#place').addClass("active");
});

function mov_to_work_edu()
{
	$('#overview_tab').removeClass("active");
	$('#overview').removeClass("active");
	$('#education_tab').addClass("active");
	$('#education').addClass("active");
}


function mov_life_events()
{
	$('#overview_tab').removeClass("active");
	$('#overview').removeClass("active");
	$('#life_tab').addClass("active");
	$('#life').addClass("active");
}

$('#move_to_relation').click(function()
{
	$('#overview_tab').removeClass("active");
	$('#overview').removeClass("active");
	$('#family_tab').addClass("active");
	$('#family').addClass("active");
});

$('#move_to_contact').click(function()
{
	$('#overview_tab').removeClass("active");
	$('#overview').removeClass("active");
	$('#contact_tab').addClass("active");
	$('#contact').addClass("active");
});

</script>

<script>// aboutme add other accounts

$('body').delegate('#add_oth_acc','click',function()
{
	$('#add_oth_acc1').hide();
	$('#other_accounts').show();
});

  var iCnt = 0;

        $('body').delegate('#add_another_link','click',function() {
         
				 if(iCnt <= 19)
				 {
                iCnt = iCnt + 1;

                // ADD TEXTBOX.
                $('.other_acc_default').append('<div class="account col-md-12 account_values_div"><div class="form-group col-md-4 individual_ac_divs" id="individual_oth_ac'+iCnt+'"><label for="exampleInputName2">Other Accounts</label></div><div class="col-md-4"><input type="text"  id="account_name' + iCnt + '" value="" /></div><div class="col-md-3"><select id="account_type'+iCnt+'"><option value="facebook">facebook</option><option value="twitter">twitter</option><option value="pinterest">pinterest</option><option value="linked_in">LinkedIn</option></select></div></div>');
				
				 }else{
				 alert('qwefqwef');
				 }
			});
			
		
		
function add_other_accounts()
{
	i=0;
	$('.account_values_div').each(function()
	{
	
		var value = $(this).attr('id');
		
		var acc_name = $('#account_name'+i).val();
	    var acc_type = $('#account_type'+i).val();
	
	
			
	url = "<?php echo base_url(); ?>profile/addaccounts/";
	$.ajax({
		type: "POST",
		data: { acc_name : acc_name,acc_type : acc_type },
		url : url,
		success : function(html)
		{
			$('#other_accounts').hide();
	      	$('ul.basic_info > #oth_accounts-li').html(html);		
		
		}
	});
		
		 	i++;
		
	});
	

}
account_delete();

function account_delete()
{
	
	$('.account_delete').click(function(){
	account_id = $(this).attr("id").substr(14);
	//alert(account_id);
	if (confirm("Delete Your Mobile No from Bzzbook") == true) {
	url="<?php echo base_url();?>profile/deleteothaccount/";
	 $.ajax({
		url: url,
		type: "POST",
		data:{ account_id:account_id },
		success: function(html)
		{   					
			
			$('ul.basic_info > #oth_accounts-li').html(html);

		}
		
	   });
       
    } 
	
});

}


function close_other_accounts()
{
	$('#other_accounts').hide();
	$('#add_oth_acc1').show();
	$('#add_oth_acc').show();
}







accounts_edit();


function accounts_edit()
{
	
	$('.account_edit').click(function(){
		
		account_id = $(this).attr("id").substr(12);
		//alert(account_id);
		$("input[name=account_disp_id]").val(account_id)
		url="<?php echo base_url(); ?>profile/accountEdit/";
		$.post( url, { account_id: account_id})
		.done(function( data ) {
			info = JSON.parse(data);
			$("input[name=account_name]").val(info.account_name);
			$("select[name=account_type]").val(info.account_type);
			$("input[name=account_action]").val("update");
			
			$('#accounts_'+account_id).append($('#accounts_disp_edit').show());
			
		});
		return false;

		
	});
	

}

function close_account_edit()
{
	
	$('#accounts_disp_edit').hide();
}
/*$('#basic_address').hover( function()
{
	$('#move_to_contact').show();
});
$('#basic_address').mouseleave( function()
{
	$('#move_to_contact').hide();
});
*/

function edit_account_values()
{
	
	
	var account_name = $('#account_name').val();
	var account_type = $('#account_type').val();
	var account_id = $('#account_no_id').val();	
	url = "<?php  echo base_url(); ?>profile/editaccountbyid/";
	$.ajax({
		type: "POST",
		data: { account_name : account_name, account_type : account_type, account_id : account_id },
		url : url,
		success : function(html)
		{
			$('#other_accounts').hide();
	      	$('ul.basic_info > #oth_accounts-li').html(html);		
		
		}
	});
	
	


}
function changeSearchPlaceholder(data,search_type){ 
$('#header-search').attr('placeholder',data);
$('#specific-search').val(search_type);
}
</script>
<script>
$(document).ready(function(){
	
	$("#header-search").keyup(function(){
		$('.dropAnimate').removeClass('dropAnimate');
		var search_input = $(this).val();
		var req_url = "<?php  echo base_url(); ?>friends/search_members/"+$(this).val();
		var specific_search = $('#specific-search').val();
		if(specific_search!='')
		req_url += "/"+specific_search;
		if(search_input.trim()!=''){
		$.ajax({
		type: "POST",
		url: req_url,
		beforeSend: function(){
			$("#header-search").css("background","#FFF url(<?php  echo base_url(); ?>images/LoaderIcon.gif) no-repeat 165px");
		},
		success: function(data){
			$("#suggesstion-box").show();
			$("#suggesstion-box").html(data);
			$("#header-search").css("background","#FFF");
		}
		});
		}else{ $("#suggesstion-box").hide(); }
	});
});
$(document).ready(function(){
	$("#nfc-bar").click(showNotifications);
	 });

function showNotifications(){

		//$('.dropAnimate').removeClass('dropAnimate');
		
		var req_url = "<?php  echo base_url(); ?>notifications/getNotifications";
		
		$.ajax({
		type: "POST",
		url: req_url,
		beforeSend: function(){
			$("#notification-box").css("background","#FFF url(<?php  echo base_url(); ?>images/LoaderIcon.gif) no-repeat 165px");
		},
		success: function(data){
			$("#notification-box").show();
			$("#notification-box").html(data);
			$("#notification-box").css("background","#FFF");
			$(".nano").nanoScroller();
			$(".nano-content").css("max-height","300px");
		}
		});
		

	
}


function selectCountry(val) {
$("#header-search").val(val);
$("#suggesstion-box").hide();
}
</script>

<script type="text/javascript">

uploadimages("uploadjobphotos","uploadPhotosnewjob","testingg");
uploadimages("uploadretirementphotos","uploadPhotosretirement","retirement_pics");
uploadimages("uploadanniversarypics","upload_anniversary_pics","anniversary_pics");
uploadimages("uploadstudyabroadpics","upload_study_abroad_pics","study_abroad_pics");
uploadimages("uploadengagementpics","upload_engagement_pics","engagement_pics");
uploadimages("uploadmarriagepics","upload_marriage_pics","marriage_pics");
uploadimages("uploadchildpics","upload_child_pics","child_pics");
uploadimages("uploadmovedphotos","upload_moved_photos","moved_pics");
uploadimages("uploadboughthomephotos","upload_bought_home_photos","bought_home_pics");
uploadimages("uploadvehiclephotos","uploadPhotosnewvehicle","vehicle_pics");
uploadimages("uploadquithabitpics","upload_quit_habit_pics","quit_habit_pics");
uploadimages("uploadnewhabitpics","upload_new_habit_pics","new_habit_pics");
uploadimages("uploadnewglasespics","upload_new_glasses_pics","new_glasses_pics");
uploadimages("uploadnewhobbypics","upload_new_hobby_pics","new_hobby_pics");
uploadimages("uploadvotedpics","upload_voted_pics","new_voted_pics");
uploadimages("uploadtravelpics","upload_travel_pics","new_travel_pics");





function uploadimages(a,b,c){
	
	 var fileUpload = document.getElementById(a);
    fileUpload.onchange = function () {
		//console.log(a+"/"+b);
		$('#'+c).hide();
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

	

</script>
<script>


$('body').delegate('#n_j_employer','keypress',function(e) {
	
	var employer = $.trim($(this).val()).toUpperCase();
	$('#employer_data').text(employer);
	//alert(employer);
	
});

function from_year_disp(add_years_link_id,add_years_select_id,add_months_link_id)
{
	$('#'+add_years_link_id).hide();
	$('#'+add_years_select_id).show();
	$('#'+add_months_link_id).show();
}

function from_month_disp(add_months_link_id,add_months_select_id,add_days_link_id)

	{
		
		$('#'+add_months_link_id).hide();
		$('#'+add_months_select_id).show();
		$('#'+add_days_link_id).show();
	}



function from_day_disp(add_days_link_id,add_days_select_id,curent_status,to,to_presant,add_to_years_select_id,add_to_years_link_id)
{
	    $('#'+add_days_link_id).hide();
		$('#'+add_days_select_id).show();
		
		
		if( $('#'+curent_status).is(':checked'))
		{
			$('#'+to_presant).show();
			$('#'+to).hide();
		}else{
			$('#'+to_presant).hide();
			$('#'+to).show();
			
			 if($('#'+add_to_years_select_id).is(":hidden"))
			{
				$('#'+add_to_year_link_m).show();
			}
		}
		
		
}


function to_year_disp(add_to_years_link_id,add_to_years_select_id,add_to_months_link_id)
{
    	$('#'+add_to_years_link_id).hide();
		$('#'+add_to_years_select_id).show();
		$('#'+add_to_months_link_id).show();
}




function to_month_disp(add_to_months_link_id,add_to_months_select_id,add_to_days_link_id)
	{	
		$('#'+add_to_months_link_id).hide();
		$('#'+add_to_months_select_id).show();
		$('#'+add_to_days_link_id).show();
	}

function to_day_disp(add_to_days_link_id,add_to_days_select_id)
{
	$('#'+add_to_days_link_id).hide();
	$('#'+add_to_days_select_id).show();
}



function status_change(n_j_status,all_n_j_to_dates_dropdown,n_j_to,n_j_to_presant,add_to_year_link_m,n_j_to_years)
{
	
	
	if( $('#'+n_j_status).is(':checked'))
	 {
		 $('#'+n_j_to_years).hide();
		 $('#'+n_j_to_presant).show();
		 $('#'+n_j_to).hide();
		 $('#'+add_to_year_link_m).hide();
	   $('#'+all_n_j_to_dates_dropdown).hide();
	 } else
	 {
		 
		 $('#'+n_j_to_presant).hide();
		 $('#'+n_j_to).show();
		 $('#'+all_n_j_to_dates_dropdown).show();
		 // $('#'+add_to_year_link_m).show();
		  //$('#'+n_j_to_years).show();
		 if($('#'+n_j_to_years).is(":hidden"))
			{
				$('#'+add_to_year_link_m).show();
			}
		 
	 }
	
}



function frm_years_change(n_j_frm_years,add_month_link_m,n_j_frm_months,add_day_link_m,n_j_frm_days,add_year_link_m)
{
	if( $('#'+n_j_frm_years).val() == 0)
		{
		$('#'+add_month_link_m).hide();
		$('#'+add_day_link_m).hide();
		$('#'+n_j_frm_months).hide();
		$('#'+n_j_frm_days).hide();
		//$('#todates_dropdowns').hide();
		$('#'+n_j_frm_years).hide();
		$('#'+add_year_link_m).show();
		//$('#to').hide();
		} else {
			
			if($('#'+n_j_frm_months).is(":hidden"))
			{
	$('#'+add_month_link_m).show();
			}
		
		}
		
	
}

function frm_months_change(add_month_link_m,n_j_frm_months,add_day_link_m,n_j_frm_days,add_year_link_m)
{
			if( $('#'+n_j_frm_months).val() == 0)
		{
	
		$('#'+add_day_link_m).hide();
		$('#'+n_j_frm_days).hide();
		$('#'+add_year_link_m).hide();
		$('#'+n_j_frm_months).hide();
		$('#'+add_month_link_m).show();
		
		} else {
			if($('#'+n_j_frm_days).is(":hidden"))
			{
		$('#'+add_day_link_m).show();
			}}
	
}
	
	function frm_days_change(n_j_frm_days,add_day_link_m,add_to_year_link_m,n_j_to,n_j_to_presant,n_j_status,all_n_j_to_dates_dropdown,n_j_to_years)
	{
	
		if( $('#'+n_j_frm_days).val() == 0)
		{
		$('#'+n_j_frm_days).hide();
		//$('#'+add_to_year_link_m).show();

		$('#'+add_day_link_m).show();
		} else {
			
		
			if($('#'+n_j_status).is(':checked'))
			{
				$('#'+n_j_to_presant).show();
				$('#'+n_j_to).hide();
				$('#'+all_n_j_to_dates_dropdown).hide();
			}else{
		
				
				$('#'+n_j_to_presant).hide();
				$('#'+n_j_to).show();
				//$('#'+all_n_j_to_dates_dropdown).show();
				
			}
	
		
		}
	}



function to_years_change(add_to_year_link_m,n_j_to_years,add_to_month_link_m,n_j_to_months,n_j_to_days)
{
	if( $('#'+n_j_to_years).val() == 0)
		{
		$('#'+add_to_month_link_m).hide();
		$('#'+n_j_to_months).hide();
		$('#'+n_j_to_days).hide();
		$('#'+n_j_to_years).hide();
		$('#'+add_to_year_link_m).show();
		} else {
			
			if($('#'+n_j_to_months).is(":hidden"))
			{
	$('#'+add_to_month_link_m).show();
			}
		
		}
}
	
		
	function to_months_change(n_j_to_months,add_to_month_link_m,add_to_day_link_m,n_j_to_days)
	{
		
		
		if( $('#'+n_j_to_months).val() == 0)
		{
		$('#'+add_to_day_link_m).hide();
		$('#'+n_j_to_days).hide();
		$('#'+n_j_to_months).hide();
		$('#'+add_to_month_link_m).show();
		} else {
			if($('#'+n_j_to_days).is(":hidden"))
			{
		$('#'+add_to_day_link_m).show();
			}}
	}
	
	
	
function to_days_change(add_to_day_link_m,n_j_to_days)
{
		if( $('#'+n_j_to_days).val() == 0)
		{
		$('#'+n_j_to_days).hide();
		$('#'+add_to_day_link_m).show();
		} 
}


$('.life_events_disp').click(function()
{
	//alert('haiiii');
	var id = $(this).attr("id").substr(5);
	
	
	url="<?php echo base_url(); ?>life_events/get_event_by_id/"+id;
	base_url="<?php echo base_url(); ?>";
	$.post( url)
	.done(function( data ) {
		info = JSON.parse(data);
		    
		
		$('#life_event_header').find('div.life_event_loc').remove();
		$('#life_event_date').find('div.life_event_text ').remove();
			$('#life_event_images').find('div.life_event_lefts_img').remove();
			$('#life_event_story').find('div.life_event_lefts').remove();
			$('#life_event_location').find('div.life_event_loc').remove();
			$('#life_event_icon').find('div.alignbox').remove();
		/*
		$('#life_event_with').find('div').remove();
		
		
		
		$('#life_event_date .life_event_text').find('div').remove();
	 */
		
		
		$('#google-maps').modal('toggle');
		
		
			var event_category;
			var event_header;
			switch(info.life_event_type)
			{
				
			case "new_job":
			event_category = "<i class='fa fa-briefcase'></i>";
		    $('#life_event_header').append('<div class="life_event_loc" > Started Work At ' + info.employer + '</div>');
		
			break;
			case "retirement":
			event_category ="<i class='fa fa-apple'></i>";
			$('#life_event_header').append('<div class="life_event_loc" > Retirement ' + info.title + '</div>');
			break;
			case "study_abroad":
			event_category = "<i class='fa fa-pagelines '></i>";
			$('#life_event_header').append('<div class="life_event_loc" >  Studying at ' + info.title + '</div>');
			break;
			case "engagement":
			event_category = "<i class='fa fa-diamond '></i>";
			$('#life_event_header').append('<div class="life_event_loc" >engaged with ' + info.with_or_whom + '</div>');
			break;
			case "marriage":
			event_category = "<i class='fa fa-heart-o'></i>";
			$('#life_event_header').append('<div class="life_event_loc" > marriage with ' + info.with_or_whom + '</div>');
			break;
			case "anniversary":
			event_category = "<i class='fa fa-gift'></i>";
			$('#life_event_header').append('<div class="life_event_loc" > Anniversary with ' + info.with_or_whom + '</div>');
			break;
			case "new_child":
			event_category = "<i class='fa fa-child'></i>";
			$('#life_event_header').append('<div class="life_event_loc" >  Born ' + info.chid_name + '</div>');
			break;
			case "moved":
			event_category = "<i class='fa fa-home'></i>";
			$('#life_event_header').append('<div class="life_event_loc" > Moved with '  + info.with_or_whom + '</div>');
			break;
			case "bought_home":
			event_category = "<i class='fa fa-home'></i>";
			$('#life_event_header').append('<div class="life_event_loc" > Bought with ' + info.with_or_whom + '</div>');
			break;
			case "new_vehicle":
			event_category = "<i class='fa fa-car'></i>";
			$('#life_event_header').append('<div class="life_event_loc" >Bought with ' + info.with_or_whom + '</div>');
			break;
			case "organ_donor":
			event_category = "<i class='fa  fa-heartbeat'></i>";
			$('#life_event_header').append('<div class="life_event_loc" >  Organ Donated</div>');
			break;
			case "quit_habit":
			event_category = "<i class='fa fa-ban'></i>";
			$('#life_event_header').append('<div class="life_event_loc" > quits ' + info.habit + '</div>');
			break;
			case "new_food_habit":
			event_category = "<i class='fa fa-paperclip'></i>";
			$('#life_event_header').append('<div class="life_event_loc" > started '  + info.food_habit + ' as new habit</div>');
			break;
			case "new_hobby":
			event_category = "<i class='fa  fa-leaf'></i>";
			$('#life_event_header').append('<div class="life_event_loc" > started ' + info.hobby + 'as a new hobby</div>');
			break;
			case "new_glasses":
			event_category = "<i class='fa  fa-search'></i>";
			$('#life_event_header').append('<div class="life_event_loc" > started using ' + info.glasses_type + 'of glasses</div>');
			break;
			case "voted":
			event_category ="<i class='fa fa-yelp'></i>";
			$('#life_event_header').append('<div class="life_event_loc" >voted to ' + info.candidate + '</div>');
			break;
			case "travel":
			event_category = "<i class='fa fa-suitcase'></i>";
			$('#life_event_header').append('<div class="life_event_loc" > travelled to ' + info.location + '</div>');
			break;
			default:
			event_category = "<i class='fa fa-fw'></i>";
			$('#life_event_header').append('<div class="life_event_loc" >' + info.title + '</div>');
			}
			
			
			
		if(info.exact_date)
		{
		 var date = info.exact_date
    	 var res = date.split(" ");
		 var da = res[0].split("-");
		 
		 var month;
		 //  alert(da[1]);
		 switch(da[1])
		 {
			case "01":
			month = "January";
			break;
			case "02":
			month = "February";
			break;
			case "03":
			month = "March";
			break;
			case "04":
			month = "April";
			break;
			case "05":
			month = "May";
			break;
			case "06":
			month = "June";
			break;
			case "07":
			month = "July";
			break;
			case "08":
			month = "August";
			break;
			case "09":
			month = "September";
			break;
			case "10":
			month = "October";
			break;
			case "11":
			month = "November";
			break;
			case "12":
			month = "December";
			break;
			default:
			month ="of this month";
		 }
		 
		 var day;
		 
		 switch(da[2])
		 {
			case "01":
			var day1 = da[2].replace(da[2],"1");
			day = day1+"<sup>st</sup>";
			break;
			case "02":
			var day2 = da[2].replace(da[2],"2");
			day = day2+"<sup>nd</sup>";
			break;
			case "03":
			var day3 = da[2].replace(da[2],"3");
			day = day3+"<sup>rd</sup>";
			break;
			case "04":
			var day4 = da[2].replace(da[2],"4");
			day = day4+"<sup>th</sup>";
			break;
			case "05":
			var day5 = da[2].replace(da[2],"5");
			day = day5+"<sup>th</sup>";
			break;
			case "06":
			var day6 = da[2].replace(da[2],"6");
			day = day6+"<sup>th</sup>";
			break;
			case "07":
			var day7 = da[2].replace(da[2],"7");
			day = day7+"<sup>th</sup>";
			break;
			case "08":
			var day8 = da[2].replace(da[2],"8");
			day = day8+"<sup>th</sup>";
			break;
			case "09":
			var day9 = da[2].replace(da[2],"9");
			day = day9+"<sup>th</sup>";
			break;
			default:
			day = da[2]+"<sup>th</sup>"
			
		 }
		 
		 $('#life_event_date').append('<div  class="life_event_text ">  ' + day +' '+  month  + '</div>');
		}
		
		if(info.with_or_whom)
		{
			$('#life_event_date .life_event_text').append('<span> with  ' + info.with_or_whom + '</span>');
		}
		var address_location = info.location;
		if(info.location)
		{
		 codeAddress(address_location);
		 $('#life_event_location').append('<div class="life_event_loc" > at ' + info.location + '</div>');
		}else
		{
			$('#map-canvas').remove();
		}
	
		$('#life_event_icon').append('<div class="alignbox">' + event_category + '</div>');
		
		if(info.uploaded_files)
		{
		 all_images = info.uploaded_files; 
		  var images = all_images.split(",");
		 for (var i = 0; i < images.length; i++) {

		  	$('#life_event_images').append('<div class="life_event_lefts_img"><img src="' + base_url+'uploads/'+images[i] +'"/></div>');
        }
		
		if(info.story)
		{
			$('#life_event_story').append('<div class="life_event_lefts"> ' + info.story + '</div>');
			
		}
		}
	//	$('#bbbb').append('<span>' + images + '</span>');
//$('#bbbb').append('<span>' + info.uploaded_files + '</span>');
			
		//$('#google-maps').trigger("reset");
		//$('#google-maps').html(data);
	});
	return false;
				
	
});
</script>

<script type="text/javascript">
/* search dropdown script */
	$(document).ready(function(){
		var storeVar = "";
		$('.dropBlock li').click(function(){
			$('.active').removeClass('active');
			$(this).addClass('active');
			$(".menuComponent .menuBtn").removeClass(storeVar);
			var catName = $(this).attr('class');
			storeVar = catName;			
			$(".menuComponent .menuBtn").addClass(catName);
			$('.dropBlock').toggleClass("dropAnimate");			
		});
		$('#dropBtn').click(function(){	
				
			$('.dropBlock').toggleClass("dropAnimate");
			});
			
	});
	
	
		$('#drop_down_list_user').click(function(){	
	//	alert('hai');
				
			$('.drop_down_list_user_and_cmp').toggleClass("dropAnimate");
			});
			
	
	
	
function updateGoingStatus(event_id,status)
{
	alert(status);
	if(status==''){ status = document.getElementById('goingsts'+event_id).value; }
	url="<?php echo base_url(); ?>events/change_event_going_sts/"+event_id+"/"+status;
	$.ajax({
		
		type: "POST",
		dataType: 'text',
        url: url
		}).done(function(data){ 
		if(data){
		content = "<label><select  name='goingsts"+event_id+"' id='goingsts"+event_id+"' onChange='updateGoingStatus("+event_id+",this.value)'><option value='1'";
		if(status==1)
		content+="selected='selected'"
		content+=">Going</option><option value='2'";
		if(status==2)
		content+="selected='selected'";
		content+=">Maybe</option><option value='3'";
		if(status==3)
		content+="selected='selected'";
		content+=">Not going</option></select></label>";
		$('.event-btns'+event_id).html(content);
		}
	 
		});
}

/*function updateInviteGoingStatus(event_id,status='')
{
	if(status==''){ status = document.getElementById('invitegoingsts'+event_id).value; }
	url="<?php echo base_url(); ?>events/change_event_going_sts/"+event_id+"/"+status;
	$.ajax({
		
		type: "POST",
		dataType: 'text',
        url: url
		}).done(function(data){ 
		if(data){
		content = "<p></p><label><select  name='invitegoingsts"+event_id+"' id='invitegoingsts"+event_id+"' onChange='inviteupdateGoingStatus("+event_id+")'><option value='1'";
		if(status==1)
		content+="selected='selected'"
		content+=">Going</option><option value='2'";
		if(status==2)
		content+="selected='selected'";
		content+=">Maybe</option><option value='3'";
		if(status==3)
		content+="selected='selected'";
		content+=">Not going</option></select></label>";
		$('.event-btns'+event_id).html();
		}
	 
		});
}*/

</script>


<?php $this->load->view('profile_models'); ?>

<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true"></script>

<script>
 
  var geocoder;
  var map;
  function initialize() {
  
	
    geocoder = new google.maps.Geocoder();
    var latlng = new google.maps.LatLng(-34.397, 150.644);
    var mapOptions = {
      zoom: 8,
      center: latlng
    }
    map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);
  }

	   function codeAddress(address_location) {
   // var address = document.getElementById("address").value;
    geocoder.geocode( { 'address': address_location}, function(results, status) {
      if (status == google.maps.GeocoderStatus.OK) {
        map.setCenter(results[0].geometry.location);
        var marker = new google.maps.Marker({
            map: map,
            position: results[0].geometry.location
        });
      } else {
        alert("Geocode was not successful for the following reason: " + status);
      }
    });
  }
	google.maps.event.addDomListener(window, 'load', initialize);
  
 </script>
<script>
/*function updateInviteGoingStatus(event_id,status='')
{
	if(status==''){ status = document.getElementById('invitegoingsts'+event_id).value; }
	url="<?php // echo base_url(); ?>events/change_event_going_sts/"+event_id+"/"+status;
	$.ajax({
		
		type: "POST",
		dataType: 'text',
        url: url
		}).done(function(data){ 
		if(data){
		content = "<p></p><label><select  name='invitegoingsts"+event_id+"' id='invitegoingsts"+event_id+"' onChange='inviteupdateGoingStatus("+event_id+")'><option value='1'";
		if(status==1)
		content+="selected='selected'"
		content+=">Going</option><option value='2'";
		if(status==2)
		content+="selected='selected'";
		content+=">Maybe</option><option value='3'";
		if(status==3)
		content+="selected='selected'";
		content+=">Not going</option></select></label>";
		$('.event-btns'+event_id).html();
		}
	 
		});
}*/

    $(window).scroll(function(){
   
	var scrollTop = $(window).scrollTop();
	var topheight = 170;
	if(scrollTop<170)
	{
		var newtop = topheight - scrollTop;
	}
	else{
		var newtop = 0;
	}
	$('.wrapper').css({top: newtop}); 
	
	
    });
	

function testclick()
{
		url="<?php echo base_url(); ?>api/customer/cust_sign_up";
		$.ajax({
        type: "POST",
        url: url,
		data: { email: 'vijaykumarss@gmail.com',password: '123456',phone_number:'919700377676',gender:'m',firstname:'vijay',lastname:'s',dob:'15-12-1987'} ,
        success: function(data)
        {   
			alert(data);
		},
		cache: false
		});
		
}
document.addEventListener("click", function(){
    url="<?php echo base_url(); ?>profile/event_log";
		$.ajax({
        url: url,
		success: function(data)
        {   
		},
		cache: false
		});
});
$( window ).load(function() {
	
	showOnlineFriends();
   url="<?php echo base_url(); ?>profile/event_log";
		$.ajax({
        url: url,
		success: function(data)
        {   
		},
		cache: false
		});
});
$(window).on('unload', function(){
		
        url="<?php echo base_url(); ?>profile/remove_event_log";
		$.ajax({
        url: url,
		success: function(data)
        {   
		},
		cache: false
		});
});

window.onbeforeunload = function(){
        url="<?php echo base_url(); ?>profile/remove_event_log";
		$.ajax({
        url: url,
		success: function(data)
        {   
		},
		cache: false
		});
}

function showOnlineFriends(name){
	 
	 if(name)
	 url="<?php echo base_url(); ?>friends/get_online_frnds/"+name;
	 else
	 url="<?php echo base_url(); ?>friends/get_online_frnds/";
	
		$.ajax({
        url: url,
		success: function(data)
        {  
			$('#online-friends').html(data);
		},
		cache: false
		});
}

window.setInterval(function(){
  showOnlineFriends();
  get_unread_messages();

 
},5000);




</script>
<script language="javascript">print_country("con");</script><!--  //for groups   --> 
<script language="javascript">print_country("contries");</script> <!-- //for companies-->

</body>
</html>