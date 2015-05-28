 <div class="tophead">Family Members</div>
  <div class="iner_lefts" id="add_f_member1"><i class="fa fa-plus"></i></div>
                        <div class="inner_rights boxs" id="add_f_member">
                          <a href="javascript:void(0)"  id="familymembers"> <h3>Add a family member</h3></a>
                        </div>
 
        <?php    
		  $result = $this->profile_set->get_family_members();
		
		 
       ?>
                     <li>
                        <!-- <div class="tophead">All comman Headings styles</div>-->
                        <div class="sm_leftbox"></div>
                        <div class="sm_rightbox">
                        <h3><a href="#"><?php if($data[0]) { echo $data[0]; }?> </a></h3>
                        <p><?php if($data[1]) {echo $data[1]; }?></p>
                        </div>
                        <div class="sm_rightside">
                        <div class="col-md-3 com_le"><i class="fa fa-globe"></i></div>
                        <div class="col-md-6 com_mid"><a href="javascript:void(0)" onclick="edit_fam_member('<?php echo $data[0]."-".$data[1].","; ?>')"><i class="fa fa-pencil"></i> Edit</a></div>
                        <div class="col-md-3 com_rig"><a  href="javascript:void(0)" onclick="del_fam_member('<?php echo $data[0]."-".$data[1].","; ?>')"><i class="fa fa-times"></i></a></div>
                        </div>
                        
                        <div class="clearfix"></div>
                      </li>
                      <?php } }?>
                     
        
        
        
        <div id="family_relation" style="display:none;">
                            <div class="relation_box col-md-12">
                              <div class="col-md-9">
                                <form class="form-inline">
                                  <div class="form-group Familys">
                                    <label for="exampleInputName2">Family Member</label>
                                    <input class="boderbox" type="text" name="family_member" id="family_member">
                                  </div>
                                  <div class="form-group Familys">
                                  <div class="col-md-6 col-md-offset-3">
                                  <select name="family_member_type" id="family_member_type">
                                      <option value="relation,">relation</option>
                                      <option value="lover,">lover</option>
                                      <option value="frnd,">frnd</option>
                                  </select>
                                  </div>
                                  </div>
                                  <div class="box_bottom">
                                    <div class="publics col-md-4">
                                      <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Public <span class="caret"></span></button>
                                    </div>
                                    <div class="col-md-8">
                                      
                                      <div class="btn3 btn-green" onclick="add_fam_member()">Save Changes</div>
                                      <?php if($result[0]->familymembers) {?>
                                      <div class="btn3 btn-black" onclick="close_family()">Cancel</div>
                                      <?php } else { ?>
                                      <div class="btn3 btn-black" onclick="close_family_member()">Cancel</div>
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