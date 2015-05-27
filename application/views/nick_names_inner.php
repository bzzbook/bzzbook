
		
        <div class="tophead">Other Names</div>
			<div class="clearfix"></div>
    <div class="iner_boxleft" ><a href="javascript:void(0)" id="oth_name"><i class="fa fa-plus"></i>Add a nickname, a birth name...</a></div>



<?php
 $response = $this->profile_set->save_settings();
if($response[0]->nickname)
{ 

 $result = rtrim($response[0]->nickname,' ');
	//echo $result;
	 //echo $result[0]->familymembers;
	$result = explode(' ',$result);
	$data = array();
	foreach($result as $result)
	{
		$result = explode('-',$result);
		$data[] = $result;
	}
	//print_r($data);
	if($data)
	{
	foreach($data as $data)
	{
	?>

     
                     <li>   <!--<div class="tophead">All comman Headings styles</div>-->
                        <div class="sm_leftbox"></div>
                        <div class="sm_rightbox"><h3><a href="#"><?php echo $data[0]; ?> </a></h3>
                        <p><?php echo $data[1]; ?></p>
                        </div>
                        <div class="sm_rightside">
                        <div class="col-md-3 com_le"><i class="fa fa-globe"></i></div>
                        <div class="col-md-6 com_mid"><a href="javascript:void(0)"><i class="fa fa-pencil"></i> Edit</a></div>
                        <div class="col-md-3 com_rig"><a href="javascript:void(0)" onclick="del_oth_names('<?php echo $data[0]."-".$data[1]." "; ?>')"><i class="fa fa-times"></i></a></div>
                        </div>
                        
                        <div class="clearfix"></div>
                     </li>
        
        
        <?php }} } ?>
        
        
        
        <div class="inner_rights boxs" id="other_names" style="display:none;">
                          <div id="others">
                            <div id="others_place" class="col-md-12">
                              <form class="form-inline ">
                                <div class="form-group others">
                                  <label for="exampleInputName2">Name Type</label>
                                  <select id="nic_oth_names">
                                    <option value="nickname ">Nickname</option>
                                    <option value="firstname ">firstname</option>
                                    <option value="lastname ">lastname</option>
                                    <option value="middlename ">middlename</option>
                                    
                                  </select>
                                </div>
                                <div class="form-group others">
                                  <label for="exampleInputName2">Name</label>
                                  <input type="text" placeholder="" id="nic_name">
                                </div>
                                <div class="clearfix"></div>
                                <div class="form-group show_prof">
                                  <label for="exampleInputName2"></label>
                                  <input type="checkbox" class="outside">
                                  Show at top of profile </div>
                                <div class="col-md-9 col-md-offset-3 profil_sho">
                                  <p>Other names are always public and help people find you on Facebook.</p>
                                </div>
                                <div class="clearfix"></div>
                                <div class="box_bottom">
                                  <div class="publics col-md-2">
                                    <button aria-expanded="false" data-toggle="dropdown" class="btn btn-default dropdown-toggle" type="button">Public <span class="caret"></span></button>
                                  </div>
                                  <div class="col-md-10 skil_box">
                              
                                    <div class="btn3 btn-green" onclick="add_othernames()">Save Changes</div>
                                    <?php if($result[0]->nickname) { ?>
                                          <div class="btn3 btn-black" onclick="close_othernames()">Cancel</div>
                                           <?php }else { ?>
                                           <div class="btn3 btn-black" onclick="close_other_names()">Cancel</div>
                                           <?php } ?>
                                  </div>
                                  <div class="clearfix"></div>
                                </div>
                              </form>
                            </div>
                          </div>
                          <div class="clearfix"></div>
                        </div>