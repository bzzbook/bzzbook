<?php 
	 $result = $this->profile_set->save_settings();
?>
  <div class="tophead">Relationship</div>
  
  <div id="relation_disp" style="display:none;">
                            <div class="relation_box col-md-12">
                              <div class="col-md-9">
                                <form class="form-inline">
                              
                                  <div class="form-group Familys">
                                  <div class="col-md-6 col-md-offset-3">
                                  <label for="exampleInputName2">RelationShip Status</label>
                                  <select name="relation_type" id="relation_type">
                                      <option value="relation">relation</option>
                                      <option value="lover">lover</option>
                                      <option value="frnd">frnd</option>
                                  </select>
                                  </div>
                                  </div>
                                  <div class="box_bottom">
                                    <div class="publics col-md-4">
                                      <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Public <span class="caret"></span></button>
                                    </div>
                                    <div class="col-md-8">
                                   
                                      <div class="btn3 btn-green" onclick="add_relation()">Save Changes</div>
                                      <?php if($result[0]->relationshipstatus) { ?>
                                         <div class="btn3 btn-black" onclick="close_relation()">Cancel</div> 
                                         <?php }else { ?>
                                           <div class="btn3 btn-black" onclick="close_relationship()">Cancel</div>
                                    <?php } ?>
                                    </div>
                                    <div class="clearfix"></div>
                                  </div>
                                </form>
                              </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="graphic"></div>
                          </div>
                          
                          <div id="relation">
                            <div class="relation_box col-md-12">
                              <div class="col-md-8"  style="margin-left:-40px;">
                                <div class="col-md-2 relationss"> <i class="fa fa-heart"></i></div>
                                <div class="col-md-10">
                                  <h3><?php echo $result[0]->relationshipstatus; ?></h3>
                                </div>
                              </div>
                              <div class="col-md-4 rightblock ">
                                <div class="col-md-3 family" style="display:none;"><a href="#"><i class="fa fa-globe"></i></a></div>
                                <div class="col-md-9"> <a href="javascript:void(0)"><i class="fa fa-pencil"></i></a><a href="javascript:void(0)" onclick="edit_relation()"></a> </div>
                              </div>
                            </div>
                            <div class="clearfix"></div>
                          </div>