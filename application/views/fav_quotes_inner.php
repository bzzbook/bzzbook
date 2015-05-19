<?php 
	 $result = $this->profile_set->save_settings();
?>
   <div class="tophead">Favorite Quotes</div>
   <div id="favquotes_val_disp">
                      
                        <div class="sm_rightbox"><h3><a href="#"><?php echo $result[0]->favquotes ; ?></a></h3>
                       
                        </div>
                        <div class="sm_rightside">
                        <div class="col-md-3 com_le"><i class="fa fa-globe"></i></div>
                        <div class="col-md-6 com_mid"><a href="javascript:void(0)" onclick="fav_quotes_edit()"><i class="fa fa-pencil"></i> Edit</a></div>
                        <div class="col-md-3 com_rig"><a href="#"><i class="fa fa-times"></i></a></div>
                        </div>
                        <div class="clearfix"></div>
                        </div>
                        
                        
                        
                        <div class="inner_rights boxs" style="display:none" id="fav_quotes_disp">
                          <div id="favorite">
                            <div id="favorite_place" class="col-md-12">
                              <form class="form-inline ">
                                <div class="form-group favorite">
                                  <label for="exampleInputName2">Favorite Quotes</label>
                                  <textarea rows="4" name="fav_quotes_data" id="fav_quotes_data"><?php if($result[0]->favquotes) { echo $result[0]->favquotes; } ?></textarea>
                                </div>
                                <div class="clearfix"></div>
                                <div class="box_bottom">
                                  <div class="publics col-md-2">
                                    <button aria-expanded="false" data-toggle="dropdown" class="btn btn-default dropdown-toggle" type="button">Public <span class="caret"></span></button>
                                  </div>
                                  <div class="col-md-10 skil_box">
                                     <div class="btn3 btn-green" onclick="add_favquotes()">Save Changes</div>
                               <?php if($result[0]->favquotes) { ?>
                                 
                                    <div class="btn3 btn-black" onclick="close_favquotes()">Cancel</div>
                                    <?php }else { ?>
                                    <div class="btn3 btn-black" onclick="close_fav_quotes()">Cancel</div>
                                    <?php } ?>
                                  </div>
                                  <div class="clearfix"></div>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>