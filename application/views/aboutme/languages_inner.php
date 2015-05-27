<?php 
	 $result = $this->profile_set->save_settings();
?>
  
  
  <div class="tophead">Languages</div>
                       
                       <div id="language_val_display">
                        <div class="sm_leftbox"></div>
                        <div class="sm_rightbox"><h3><a href="#">
						<?php 
						$data = explode(',',$result[0]->languages);
						foreach($data as $lang)
						{
						 echo $lang." . ";
						}
						?>
                        </a></h3>
                        </div>
                        <div class="sm_rightside">
                        <div class="col-md-3 com_le"><i class="fa fa-globe"></i></div>
                        <div class="col-md-6 com_mid"><a href="javascript:void(0)" onclick="languages_edit()"><i class="fa fa-pencil"></i> Edit</a></div>
                        <div class="col-md-3 com_rig"><a href="#"><i class="fa fa-times"></i></a></div>
                        </div>
                        </div>
                        
                        
                        <div class="clearfix"></div>
                        
                        
                        <div class="inner_rights boxs" id="language_disp" style="display:none;">
                         
                          <div class="birth birt_bottom col-md-12">
                            <form class="form-inline ">
                              <div class="form-group birth_ins">
                               <div id="selected_langauges">
							   <?php 
							    if($result[0]->languages){ 
							    $data = explode(',',$result[0]->languages);
								foreach($data as $lang)
								{
								
								?>
								   
								   <span class="bc_mail_ids" id="<?php echo $lang; ?>"><?php echo $lang;?><a onclick="removelanguage('<?php echo $lang; ?>')" ><img class="as_close_btn" src="<?php echo base_url('images/close_post.png'); ?>" /></a></span>
								
                                <?php } } ?>   
								  </div>
                                <label for="exampleInputName2">Languages</label>
                                <input type="text" id="lang_box" />
                                <input type="text" id="addedlangs" name="addedlangs" value="<?php if($result[0]->languages){ echo $result[0]->languages; } ?>"></input>
                              </div>
                              <div class="clearfix"></div>
                            </form>
                          </div>
                          <div class="box_bottom">
                            <div class="publics col-md-3">
                              <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Public <span class="caret"></span></button>
                            </div>
                            <div class="col-md-8 skil_box">
                              
                              <div class="btn3 btn-green" onclick="add_all_languges()">Save Changes</div>
                              <?php if($result[0]->languages) { ?>
                              <div class="btn3 btn-black" onclick="close_language()">Cancel</div>
                              <?php } else { ?>
                              <div class="btn3 btn-black" onclick="close_lang()">Cancel</div>
                            <?php } ?>
                            </div>
                            <div class="clearfix"></div>
                          </div>
                        </div>