 <div class="tophead">Family Members</div>
  <div class="iner_lefts" id="add_f_member1"><i class="fa fa-plus"></i></div>
                        <div class="inner_rights boxs" id="add_f_member">
                          <a href="javascript:void(0)"  id="familymembers"> <h3>Add a family member</h3></a>
                        </div>
                        <div class="clearfix"></div>
                        
                        
                        <div id="family_val_disp">
   				
        <?php    
		  $result = $this->profile_set->get_family_members();
		
		if(!empty($result))
		{
			foreach($result as $family)
			{
	
       ?>
                      <div class="latest_works" id="family_<?php echo $family['fam_member_id']; ?>">
                          <div class="sm_leftbox"></div>
                        <div class="sm_rightbox"><h3><a href="#"><?php echo $family['member_name']; ?> </a></h3>
                        <p><?php echo $family['member_relation']; ?></p>
                        </div>
                        <div class="sm_rightside">
                        <div class="col-md-3 com_le"><i class="fa fa-globe"></i></div>
                        <div class="col-md-6 com_mid"><a href="javascript:void(0)" class="family_edit" id="family_edit<?php echo $family['fam_member_id']; ?>"><i class="fa fa-pencil"></i> Edit</a></div>
                        <div class="col-md-3 com_rig"><a  href="javascript:void(0)" onclick="del_fam_member('<?php echo $family['fam_member_id']; ?>')"><i class="fa fa-times"></i></a></div>
                        </div>
                        </div>
                         <div class="clearfix"></div>
                         <?php } }?>
           
                        </div>
                        
        
                              <div id="family_relation" style="display:none;">
                     <!-- <div class="tophead">Family Members</div> -->
                            <div class="relation_box col-md-12">
                              <div class="col-md-9">
                                <form class="form-inline" id="add_family_member">
                                  <div class="form-group Familys">
                                    <label for="exampleInputName2">Family Member</label>
                                    <input class="boderbox" type="text" name="family_member" id="family_member">
                                  </div>
                                  <div class="form-group Familys">
                                  <div class="col-md-6 col-md-offset-3">
                                  <select name="family_member_type" id="family_member_type">
                                      <option value="relation">relation</option>
                                      <option value="lover">lover</option>
                                      <option value="frnd">frnd</option>
                                  </select>
                                  <input type="hidden" name="family_action" id="family_action" value="add">
                       			  <input type="hidden" value="" name="family_disp_id" >
                                  </div>
                                  </div>
                                  <div class="box_bottom">
                                    <div class="publics col-md-4">
                                      <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Public <span class="caret"></span></button>
                                    </div>
                                    <div class="col-md-8">
                                      
                                      <input type="submit" class="btn3 btn-green" value="Save Changes" />
                                      <?php if($result) { ?>
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