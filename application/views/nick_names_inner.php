
		
        <div class="tophead">Other Names</div>
	
<div id="nicnames_val_disp">
   				  <?php 
					    $nick_names = $this->profile_set->get_nick_names();
					   if(!empty($nick_names))
                    {
                        foreach($nick_names as $nicname)
                        { 
						?>
                       <div class="latest_works" id="nick_<?php echo $nicname['nic_name_id']; ?>">
                          <div class="sm_leftbox"></div>
                        <div class="sm_rightbox"><h3><a href="#"><?php echo $nicname['nic_name']; ?></a></h3>
                        <p><?php echo $nicname['nic_name_type']; ?></p>
                        </div>
                        <div class="sm_rightside">
                        <div class="col-md-3 com_le" style="display:none;"><i class="fa fa-globe"></i></div>
                        <div class="col-md-6 com_mid"><a href="javascript:void(0)" onclick="nick_edit()" class="nick_edit" id="nick_edit<?php echo $nicname['nic_name_id']; ?>"><i class="fa fa-pencil"></i></a></div>
                        <div class="col-md-3 com_rig"><a href="javascript:void(0)" onclick="del_nic_name('<?php echo $nicname['nic_name_id']; ?>')"><i class="fa fa-times"></i></a></div>
                         <div class="clearfix"></div>
                        </div>
                        </div>
                         <div class="clearfix"></div>
                         <?php } ?>
						  </div>
						 <?php }else{ ?>		
    <div class="iner_boxleft" id="oth_names" ><a href="javascript:void(0)" id="oth_name"><i class="fa fa-plus"></i>Add a nickname, a birth name...</a></div>

<div class="clearfix"></div> <?php } ?>
           
                       
        
        <div class="inner_rights boxs" id="other_names" style="display:none;">
        
                          <div id="others">
                            <div id="others_place" class="col-md-12">
                              <form class="form-inline" id="add_nick_name">
                                <div class="form-group others">
                                  <label for="exampleInputName2">Name Type</label>
                                  <select id="nic_oth_names" name="nic_oth_names">
                                    <option value="nickname ">Nickname</option>
                                    <option value="firstname ">firstname</option>
                                    <option value="lastname ">lastname</option>
                                    <option value="middlename ">middlename</option>
                                    
                                  </select>
                                </div>
                                <div class="form-group others">
                                  <label for="exampleInputName2">Name</label>
                                  <input type="text" placeholder="" id="nic_name" name="nic_name">
                                </div>
                                   <input type="hidden" name="nickname_action" id="nickname_action" value="add">
                       			  <input type="hidden" value="" name="nickname_disp_id" >
                                <div class="clearfix"></div>
                             
                                <div class="box_bottom">
                                  <div class="publics col-md-2" style="display:none;">
                                    <button aria-expanded="false" data-toggle="dropdown" class="btn btn-default dropdown-toggle" type="button">Public <span class="caret"></span></button>
                                  </div>
                                  <div class="col-md-10 skil_box">
                              
                                    <input type="submit" class="btn3 btn-green" value="Save Changes" />
                <div class="btn3 btn-black" id="nicname_close_btn" onclick="close_othernames()">Cancel</div>
            <div class="btn3 btn-black" id="nicname_down_close" style="display:none;" onclick="nic_name_down_close()">Cancel</div>            
                                  </div>
                                  <div class="clearfix"></div>
                                </div>
                              </form>
                            </div>
                              <div class="clearfix"></div>
                          </div>
                        </div>
                         <?php if(!empty($nick_names)) { ?>
                        <a href="javascript:void(0)" id="add_nicname_link_disp" class="work_edu_side_links">add Nick Name</a>
                        <div id="nicname_down_block">
                        <div class="iner_boxleft othnames" id="other_name_down_view" style="display:none;"><a href="javascript:void(0)" 
                        id="oth_name_down"><i class="fa fa-plus"></i>Add a nickname, a birth name...</a></div>
            <div class="clearfix"></div>
                     </div>
                      
                      <?php } ?>