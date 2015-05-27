<section class="inbox col-lg-9 col-md-9 pfSettings">
      <div class="posts_inbox">
        <div role="tabpanel"> 
          <!-- Nav tabs -->
          <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="<?php echo base_url(); ?>profile/compose" >Compose</a></li>
            <li role="presentation"><a href="<?php echo base_url(); ?>profile/message">Inbox</a></li>
            <li role="presentation"><a href="<?php echo base_url(); ?>profile/sent">Sent</a></li>
            <li role="presentation"><a href="<?php echo base_url(); ?>profile/trash">Trash</a></li>
          </ul>
          
          <!-- Tab panes -->
          <div class="tab-content">
            <p style="color:green; padding-left:78px;"><?php if($this->session->flashdata('send_msg'))
			 echo $this->session->flashdata('send_msg'); ?></p>
          
              <div class="bott_replys col-md-5 col-md-offset-1">
                        <form action="<?php echo base_url(); ?>message/send_msg" method="post" enctype="multipart/form-data"> 
                        <div class="adres_box"><label style="float:left; font-weight:normal">To</label><div id="selectedfriends" style="display:block; border:none; padding-left:25px;"><div id="search_frnd_wrapper"><input type="text" name="txtsearch" id="searchfriends" onkeyup="keyupevent();" /><input type="hidden" id="addedusers" name="addedusers" /><div id="autosuggest"></div></div></div></div>
                       
                       
                      </div>
                       <div class="bott_replys col-md-5 col-md-offset-1" style="border: 1px solid #d7d7d7;"><input style="border:none;" type="text" name="subject" placeholder="Subject" /></div>
                      <div class="bott_replys ad_box col-md-5 col-md-offset-1">
                      <textarea name="message_content" name="message_content" style="  background-color: transparent;
  resize: none; border:none;"  ></textarea>
                      <div id="uploadPhotosdvPreview"></div>
		<input id="upload" name="upload[]" type="file" multiple style="display:none;" onchange="getFiles();">
                      </div>
                      <div class="bott_replys bott_boxcolor col-md-5 col-md-offset-1">
                        <div class="col-md-1">
                        <button class="btn3 btn-yellow ad_ing" type="submit" name="submit" id="submit" >Sent</button>
                        </div>
                        </form>
                        <div class="adres_box"><img onclick="document.getElementById('upload').click();" id='file_select' src="<?php echo base_url(); ?>images/paper_clip.png" alt=""></span></div>
                        <div class="adres_right_ad">
                          <div class="ad_lefts">
                            <div class="bott_top">
                              <button id="btnGroupVerticalDrop2" type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> 
                              <span class="caret"></span> </button>
                            </div>
                          </div>
                          <div class="ad_lefts ri_ght"><a href="#"><i class="fa fa-trash-o"></i></a></div>
                          <div class="ad_lefts"><a href="#">Saved</a></div>
                        </div>
                      </div>
           
            
            
            
          </div>
        </div>
      </div>
      <!-- tabs close --> 
      
    </section>
    <script>
	function getFiles(){
	var files = $('input[type="file"]').get(0).files;
	var text = '';
// Loop through files
	for (var i=0; file = files[i]; i++) {
	
		// File size, in bytes
		var filesize = file.size;
		var filename = file.name;
		filesize = ((filesize/1024)/1024);
		filesize = filesize.toFixed(2);
		text += "<div id='selectedfile"+i+"' style='background:#f5f5f5; width:100%; height:30px;padding:5px;margin-bottom:3px;' ><div style='float:left; color:#15c;'>"+filename+" ("+filesize+" MB)</div><div style='float:right;'><a href='#' onclick='removeselected(&#39;"+i+"&#39;,&#39;"+filename+"&#39;)'>remove</a></div></div>";
		
	}
	$('#uploadPhotosdvPreview').html(text);	
	}
	function removeselected(id,filename){
		$('#selectedfile'+id).hide();
		var current = $('#removefiles').val();
		if(current!='')
		$('#removefiles').val(current+','+filename);
		else
		$('#removefiles').val(filename);
	}
	</script>
   




