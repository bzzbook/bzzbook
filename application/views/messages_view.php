<section class="inbox col-lg-9 col-md-9 pfSettings">
      <div class="posts_inbox">
        <div role="tabpanel"> 
          <!-- Nav tabs -->
          <!--<ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#compose" aria-controls="profile" role="tab" data-toggle="tab">Compose</a></li>
            <li role="presentation"><a href="#inbox" aria-controls="messages" role="tab" data-toggle="tab">Inbox</a></li>
            <li role="presentation"><a href="#sent" aria-controls="settings" role="tab" data-toggle="tab">Sent</a></li>
            <li role="presentation"><a href="#trash" aria-controls="messages" role="tab" data-toggle="tab">Trash</a></li>
          </ul>-->
          
          <!-- Tab panes -->
          <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="compose">
              <table class="table ad_tab">
                <thead>
                  <tr>
                    <div class="col-md-6 deleted"><a href="<?php echo base_url(); ?>profile/message"><i class="fa fa-mail-reply"></i></a></div>
                    <div class="col-md-6 deleted"><!--<a href="#"><i class="fa fa-trash-o"></i></a>--></div>
                    <div class="ad_right" style="margin-left:738px;"><div class="col-md-6 deleted"><a href="<?php echo base_url(); ?>message/deletethismsgs/<?php echo $messages['message'][0]['msg_id'] ?>"><i class="fa fa-trash-o"></i></a></div><!--<a href="#">1-34 of 36</a> <a href="#"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span></a> <a href="#"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></a>--> </div>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th><div class="mod_text"><?php echo $messages['message'][0]['subject']; ?></div>
                      <div class="mod_rights"><!--<a href="#">inbox</a><span><a href="#"><i class="fa fa-times"></i></a></span>--></div></th>
                  </tr>
                  <tr>
                    <th> <div class="col-md-8 deleted ico_ns"><a href="#"><i class="fa fa-user"></i></a></div>
                      <div class="mod_text"><?php echo $messages['user'][0]['user_firstname'] ." ". $messages['user'][0]['user_lastname']; ?><span><a href="#">&lt;<?php echo $messages['user'][0]['user_email']; ?>&gt;</a></span>
                        <div class="tome">To me</div>
                        <!--<div class="rep_lly col-md-9">
                          <button aria-expanded="false" data-toggle="dropdown" class="btn btn-default dropdown-toggle" type="button" id="btnGroupVerticalDrop2"> <span class="caret"></span> </button>
                          <ul aria-labelledby="btnGroupVerticalDrop4" role="menu" class="dropdown-menu">
                            <li><a href="#">Dropdown link</a></li>
                            <li><a href="#">Dropdown link</a></li>
                          </ul>
                        </div>-->
                      </div>
                      <div class="right_side">
                        <div class="deleted replying col-md-6"> <a href="#" onclick="focusComposebox('<?php echo $messages['user'][0]['user_firstname'] ." ". $messages['user'][0]['user_lastname']; ?>','<?php echo $messages['user'][0]['user_id']; ?>')"> <i class="fa fa-mail-reply"></i> </a> 
                        <!--<div class="rep_lly">
                          <button aria-expanded="false" data-toggle="dropdown" class="btn btn-default dropdown-toggle" type="button" id="btnGroupVerticalDrop2"> <span class="caret"></span> </button>
                          <ul aria-labelledby="btnGroupVerticalDrop4" role="menu" class="dropdown-menu">
                            <li><a href="#">Dropdown link</a></li>
                            <li><a href="#">Dropdown link</a></li>
                          </ul>
                        </div>--></div>
                      </div>
                      <div class="right_side"><a href="#"><label style="padding:6px;"><?php echo $messages['message'][0]['sent_date']; ?></label></a></div>
                      <div class="col-md-10 col-md-offset-1 midle_box">
                        <p><?php echo $messages['message'][0]['message']; ?></p>
                        <?php if($messages['message'][0]['uploaded_files']): ?>
                          <div>
                          
                      		<?php $attachments = explode(',',$messages['message'][0]['uploaded_files']);  ?>
                            <p><b><?php echo count($attachments).' Attachments'; ?></b></p>
                            <div class="new_item"><ul>
                            <?php foreach($attachments as $attachment): ?>
                            <li>
                            <div class="buttons_new skyblue">
                            <i class="fa fa-fw"></i><a href="<?php echo base_url().'uploads/'.$attachment; ?>"><?php echo $attachment; ?></a></div>
                            </li><?php endforeach; ?>
                            </ul></div>
                            
                      	  </div>
                          <?php endif; ?>
                      </div>
                    
                      <div class="clearfix"></div>
                      <div class="borderbox"></div>
                      <div class="tab-content">
            <p style="color:green; padding-left:78px;"><?php if($this->session->flashdata('send_msg'))
			 echo $this->session->flashdata('send_msg'); ?></p>
          
              <div class="bott_replys col-md-5 col-md-offset-1">
                        <form action="<?php echo base_url(); ?>message/send_msg/<?php echo $messages['message'][0]['msg_id']; ?>" method="post" enctype="multipart/form-data"> 
                        <div class="adres_box"><label style="float:left; font-weight:normal">To</label><div id="selectedfriends" style="display:block; border:none; padding-left:25px;"><div id="search_frnd_wrapper"><input type="text" name="txtsearch" id="searchfriends" onkeyup="keyupevent();" /><input type="hidden" id="addedusers" name="addedusers" /><div id="autosuggest"></div></div></div></div>
                       
                       
                      </div>
                       
                      <div class="bott_replys ad_box col-md-5 col-md-offset-1">
                      <textarea id="message_content" name="message_content" style="  background-color: transparent;
  resize: none; border:none;"  ></textarea>
 
                      <div id="uploadPhotosdvPreview"></div>
		<input onchange="getFiles();" id="upload" name="upload[]" type="file" multiple style="display:none;">
                      </div>
                      <div class="bott_replys bott_boxcolor col-md-5 col-md-offset-1">
                        <div class="col-md-1">
                         <input type="hidden" name="subject" id="subject" value="<?php echo $messages['message'][0]['subject']; ?>" />
                         <input type="hidden" name="removefiles" id="removefiles" value="" />
                        <button class="btn3 btn-yellow ad_ing" type="submit" name="submit" id="submit" >Send</button>
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
                      
                      
                    </th>
                    <div class="clearfix"></div>
                    
                  </tr>
                </tbody>
              </table>
              <div class="privacys"><a href="#">Terms</a> - <a href="#">Privacy</a>  </div>
            </div>
            <div role="tabpanel" class="tab-pane" id="inbox">
              <div data-example-id="striped-table" class="bs-example">
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="row"> <input type="checkbox" name="btSelectAll">
                      </th>
                      <th scope="row"><div class="move"><span aria-hidden="true" class="glyphicon glyphicon-refresh"></span></div></th>
                      <th scope="row"><select class="move">
                          <option>More</option>
                        </select></th>
                      <th scope="row"><select class="move" >
                          <option>Move to</option>
                        </select></th>
                      <th class="ad_right"><div class="move">1-34 of 36<a href="#"><span aria-hidden="true" class="glyphicon glyphicon-chevron-left"></span></a> <a href="#"><span aria-hidden="true" class="glyphicon glyphicon-chevron-right"></span></a></div></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row"><input type="checkbox" name="btSelectAll"></th>
                      <td><span aria-hidden="true" class="glyphicon glyphicon-star"></span></td>
                      <td>Siva Prasad</td>
                      <td>Lorem ipsum dolor sit amet</td>
                      <td class="ad_right">09:33 AM</td>
                    </tr>
                    <tr>
                      <th scope="row"><input type="checkbox" name="btSelectAll"></th>
                      <td><span aria-hidden="true" class="glyphicon glyphicon-star"></span></td>
                      <td>Siva Prasad</td>
                      <td>Lorem ipsum dolor sit amet</td>
                      <td class="ad_right">09:33 AM</td>
                    </tr>
                    <tr>
                      <th scope="row"><input type="checkbox" name="btSelectItem" data-index="1"></th>
                      <td><span aria-hidden="true" class="glyphicon glyphicon-star"></span></td>
                      <td>Siva Prasad</td>
                      <td>Lorem ipsum dolor sit amet</td>
                      <td class="ad_right">09:33 AM</td>
                    </tr>
                    <tr>
                      <th scope="row"><input type="checkbox" name="btSelectItem" data-index="1"></th>
                      <td><span aria-hidden="true" class="glyphicon glyphicon-star"></span></td>
                      <td>Siva Prasad</td>
                      <td>Lorem ipsum dolor sit amet</td>
                      <td class="ad_right">09:33 AM</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div role="tabpanel" class="tab-pane" id="sent">
              <h4>sent</h4>
            </div>
            <div role="tabpanel" class="tab-pane" id="trash">
              <h4>trash</h4>
            </div>
          </div>
        </div>
      </div>
      <!-- tabs close --> 
      
    </section>
    <script> function focusComposebox(user_name,user_id){
		$('#selectedfriends').prepend('<span id="'+user_id+'">'+user_name+'<a onclick="removefrnd('+user_id+')"><img class="as_close_btn" src="http://localhost/bzzbook/images/close_btn.png"></a></span>');
		$('#addedusers').val(user_id);
		$('#message_content').focus();	
	}
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