<?php 
	 $result = $this->profile_set->save_settings();
?>
  
  
  <div class="tophead">Professional Skills</div>
                       
                       <div id="pf_skills_val_display">
                        <div class="sm_leftbox"></div>
                        <div class="sm_rightbox"><h3><a href="javascript:void(0)">
						<?php 
						$data = explode(',',$result[0]->professional_skills);
						foreach($data as $lang)
						{
						 echo $lang." . ";
						}
						?>
                        </a></h3>
                        </div>
                        <div class="sm_rightside">
                        <div class="col-md-3 com_le" style="display:none;"><i class="fa fa-globe"></i></div>
                        <div class="col-md-6 com_mid"><a href="javascript:void(0)" onclick="pf_skills_edit()"><i class="fa fa-pencil"></i></a></div>
                        <div class="col-md-3 com_rig"><a href="#"><i class="fa fa-times"></i></a></div>
                        </div>
                        </div>
                        
                        
                        <div class="clearfix"></div>
                        
                        
                        <div id="skills_disp" style="display:none;">
                            <div id="skil_place" class="workplace col-md-12">
                              <form class="form-inline">
                                <div class="form-group skils">
                                <div id="selected_skills">
							   <?php 
							    if($result[0]->professional_skills){ 
							    $data = explode(',',$result[0]->professional_skills);
								foreach($data as $pf_skill)
								{
								
								?>
								   
								   <span class="bc_mail_ids" id="<?php echo $pf_skill; ?>"><?php echo $lang;?><a onclick="removelanguage('<?php echo $pf_skill; ?>')" ><img class="as_close_btn" src="<?php echo base_url('images/close_post.png'); ?>" /></a></span>
								
                                <?php } } ?>   
								  </div>
                                  <label for="exampleInputName2">Professional Skills</label>
                                  <input type="text" placeholder="" id="professional_skils">
                                  <input type="text" id="addedskills" name="addedskills" value="<?php if($result[0]->professional_skills){ echo $result[0]->professional_skills; } ?>"></input>
                                </div>
                                <div class="clearfix"></div>
                              </form>
                              <div class="box_bottom">
                                <div class="publics col-md-4" style="display:none;">
                                  <button aria-expanded="false" data-toggle="dropdown" class="btn btn-default dropdown-toggle" type="button">Public <span class="caret"></span></button>
                                </div>
                                <div class="col-md-8 skil_box">
                               <div class="btn3 btn-green" onclick="add_all_skills()">Save Changes</div>
                                <?php if($result[0]->professional_skills) { ?>
                              <div class="btn3 btn-black" onclick="close_pf_skills()">Cancel</div>
                              <?php } else { ?>
                              <div class="btn3 btn-black" onclick="close_pfskills()">Cancel</div>
                            <?php } ?>
                                </div>
                                <div class="clearfix"></div>
                              </div>
                            </div>
                          </div>