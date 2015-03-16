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
<script src="<?php echo base_url(); ?>js/animate-plus.min.js"></script> 
<script src="<?php echo base_url(); ?>js/custom.js"></script>
<script src="<?php echo base_url(); ?>js/jquery.validate.min.js"></script>
<script src="<?php echo base_url(); ?>js/additional-methods.js"></script>
<script src="<?php echo base_url(); ?>js/countries.js"></script>
<script src="<?php echo base_url(); ?>js/usa_states.js"></script>
<script language="javascript">print_country("country");</script> 
<script src="<?php echo base_url(); ?>js/lightbox.min.js"></script>
<script language="javascript">print_usa_states("usa_states");</script>  

<script type="text/javascript">
   $('#email_invite').validate();
   $('#upload_file').validate(); 
 /*  //modal education form validation
   function edu_form() {
    $("#education_form").validate({
  
  // Specify the validation rules

		rules: {
            field_of_study: "required",
            college_institution: "required",
			degree_certificate: "required",
			year_attended_from: "required",
			month_attended_from: "required",
			year_attended_to: "required",
			month_attended_to: "required",
            special_studies: "required"
        },
        
        // Specify the validation error messages
        messages: {
			field_of_study: "Please enter your Educaton",
            college_institution: "Please enter your Institution Name",
			degree_certificate: "Please enter your Graduation",
			year_attended_from: "Please enter Year",
			month_attended_from: "Please enter Month",
			year_attended_to: "Please enter Year",
			month_attended_to: "Please enter Month",
            special_studies: "Please enter about your Studies"
        },
        
        submitHandler: function(form) {
            form.submit();
			
        }
    });

  }
 */
   /*$('#profile').validate();
   $('#group_form').validate();
   $('#organization_form').validate();
   $('#profession_form').validate();
   $('#education_form').validate();*/
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
            			if(html == true)
							alert("Information Updated");
						else
							alert("Something went wrong Please try after sometime");
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
							$("input[name=group_name]").val(info.grp_name);
							$("input[name=group_type]").val(info.grp_type);
							$("input[name=website_url]").val(info.web_url);
							$("input[name=city]").val(info.city);
							$("select[name=usa_states]").val(info.state);
							$("input[name=postal_code]").val(info.postal_code);
							$("textarea[name=additional_info]").val(info.additional_info);
							$("input[name=grp_action]").val("update")
							$('#grpModal').modal('toggle');
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
	$('#des'+cid).show();
	$('#msg'+cid).hide();

}
function likefun(pid,uid,status){
	
	alert(status);
	var posted_by=pid;
	var account_id=uid;
	url="<?php echo base_url();?>signg_in/insertlinks/"+pid+"/"+uid;
	  $.ajax({
        type: "POST",
        url: url,
        data: { posted_by: pid, account_id : uid} ,
        success: function(html)
        {   
			
         if(status == 'like')
		 	//$("#like_ajax"+pid).html("Unlike");
			$("#link_like"+pid).html("Unlike");
		  else
			//$("#like_ajax"+pid).html("Like");
			$("#link_like"+pid).html("Like");
        }
       });	
}
function view_comments(id){
	$('#res_comments'+id).hide();
	$('#res_comments_viewmore'+id).show();
}


$(document).ready(function() {
 
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
 
});

// ajax call for get friends list on add group button click

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
	$("select[name=emp_status]").val('working');
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
//function validateEduForm()
//{	
//	if($("#year_attended_from").val()==0 || $("#month_attended_from").val()==0 || $("#year_attended_to").val()==0 || $("#month_attended_to").val()==0 || $("#field_of_study").val()=='' || $("#college_institution").val()=='' || $("#degree_certificate").val()=='')
//	{
//	$("#eduformerrors").html("Fields with '*' are mandatory, Please fill them...");
//	}
//}
</script>
<style>
.form-mandatory{
color:red;
}
</style>
<?php $this->load->view('profile_models'); ?>
</body>
</html>