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
<script src="<?php echo base_url(); ?>js/jquery.blImageCenter.js"></script> 
<script src="<?php echo base_url(); ?>js/custom.js"></script> 
<script>
		$( document ).ready(function() {
		$('.select').jqTransform({ imgPath: '' });
		});
   $('#email_invite').validate();
   $('#upload_file').validate();
   $('#search_job').validate(); 
   
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
var pass=$('#pwd').val();

   url="<?php echo base_url();?>signg_in/checkpass/"+pass;
   $.ajax({
        type: "POST",
        url: url,
        data: { pass: pass} ,
        success: function(html)
        {   
            if(html=='failure'){
				alert("Please enter valid password");
			}
        }
       });

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
function saveAsFav(pid){
	
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
}

function view_comments(id){
	$('#res_comments'+id).hide();
	$('#res_comments_viewmore'+id).show();
}



 
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
		url="<?php echo base_url(); ?>friends/confirmrequest/"+id;
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

function denyFrnd(id)
{
		url="<?php echo base_url(); ?>friends/denyrequest/"+id;
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

function blockFrnd(id)
{
		url="<?php echo base_url(); ?>friends/blockrequest/"+id;
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

function addFrnd(id)
{
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
			$('#addFrnd').text('Request Sent');
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
    $('#followModal1').modal('toggle');
	
	$('#follow_modal').click(function()
	{
	
	var option = $('#follow_as').val();
	alert(option);
	alert(comp_id);
	url="<?php echo base_url(); ?>company/cmp_follow/"+option+"/"+comp_id;
		$.ajax({
        type: "POST",
        url: url,
        success: function(data)
        {  
		$('#followModal1').modal('toggle'); 
	    $("#cmpfollowers").html(data);
		},
		cache: false
		});
	});
	return false;
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
		   	var redirect_url = "<?php echo base_url(); ?>"+'profile/message';
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
		   	var redirect_url = "<?php echo base_url(); ?>"+'profile/message';
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
	$('#upload_pfpic').ajaxSubmit();
	//$(".cmplogo").html(data);
	location.reload(true);
});	
</script>

<script language="javascript" type="text/javascript">
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

// share post function START - by vijay on 02-04-15 

function sharePost(post_id){
	url="<?php echo base_url(); ?>profile/get_post_byid/"+post_id;
					$.post( url )
					.done(function( data ) {
						$('#sharePostPopup').html(data);
						
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
			
			
			
//search friends functionality by sp on 10-4-2015
$('#search_members').click(function(){
	value = $('#search_frnds').val();
	var errors = '';
	if(value == '')
	{
		$("#error_data").html("Search Field Shouldn't be empty").fadeOut(7000);
		location.reload();
	}
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


$('#event_form').submit( function( event)
	{
				
		url="<?php echo base_url(); ?>events/create_event/";
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
		});
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
<?php $this->load->view('profile_models'); ?>
</body>
</html>