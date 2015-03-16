<section class="col-lg-6 col-md-6 col-sm-5 col-xs-12 coloumn2 messageSt">
      <h2>Messages</h2>
      <div class="posts">
        <div role="tabpanel"> 
          <!-- Nav tabs -->
          <ul class="nav nav-tabs" role="tablist">
           <li role="presentation" class="active"><a href="#compose" aria-controls="profile" role="tab" data-toggle="tab">Compose Message</a></li>
            <li role="presentation"><a href="#inbox" aria-controls="messages" role="tab" data-toggle="tab">Inbox</a></li>
            <li role="presentation"><a href="#sent" aria-controls="settings" role="tab" data-toggle="tab">Sent</a></li>
            <li role="presentation"><a href="#archive" aria-controls="messages" role="tab" data-toggle="tab">Archived</a></li>
            <li role="presentation"><a href="#trash" aria-controls="settings" role="tab" data-toggle="tab">Trash</a></li>
          </ul>
          
          <!-- Tab panes -->
          <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="compose">
             <?php 
	if($this->session->flashdata('send_msg'))
	{
		echo "<h2>".$this->session->flashdata('send_msg')."</h2>";
	}
	?>
            <form method="post" action="<?php echo base_url(); ?>message/send_msg" >
             <div class="form-group col-md-6">
             	<select name="group_id" class="form-control" id="grp_list_msg">
             	  <option value="-1">select group</option>
					<?php $data = $this->profile_set->get_groups(); ?>
    				 <?php foreach($data as $grp) { ?>
                 <option value="<?php echo $grp->grpinfo_id ?>"><?php echo $grp->grp_name ?></option>
                 <?php } ?> 
             	</select>
             </div>
             <div class="form-group col-md-6 test">
             	  <span id="select_frm" class=""select_frm"><select name="select-from" id="select-from" class="form-control">
     
   			 </select>
             </span>
             </div>
             <div class="clear"></div>
             <div class="form-group col-md-12">
<textarea name="message_content" cols="" rows="" class="form-control"></textarea>
</div>
              <div class="form-group">
                <input type="submit" class="btn btn-info pull-right" value="send">
                </div>
              <div class="clear"></div>
              
              </form>
            </div>
            <div role="tabpanel" class="tab-pane" id="inbox">
              <h4 class="clear">Total Inbox Messages (1)  <a href="#" class="btn btn-info pull-right">Delete Selected</a> <span class="clearfix"></span> </h4>
              
            	 <div class="messages form-group">
                	<input name="" type="checkbox" value=""><span class="sub unread">Message 01</span> <span class="mail">Message 01</span>
                </div>
                 <div class="messages form-group">
                	<input name="" type="checkbox" value=""><span class="sub">Message 01</span> <span class="mail">Message 01</span>
                </div>
               
              <div class="clear"></div>
            </div> 
            
            <div role="tabpanel" class="tab-pane" id="sent">
                <h4 class="clear">Sent Messages <a href="#" class="btn btn-info pull-right">Delete Selected</a></h4>
            	 <div class="messages form-group">
                	<input name="" type="checkbox" value=""><span class="sub unread">Message 01</span> <span class="mail">Message 01</span>
                </div>
                 <div class="messages form-group">
                	<input name="" type="checkbox" value=""><span class="sub">Message 01</span> <span class="mail">Message 01</span>
                </div>
              <div class="clear"></div>
            </div>            
            
            <div role="tabpanel" class="tab-pane" id="archive">
                <h4 class="clear">Archived Messages <a href="#" class="btn btn-info pull-right">Delete Selected</a></h4>
                 <div class="messages form-group">
                    <input name="" type="checkbox" value=""><span class="sub unread">Message 01</span> <span class="mail">Message 01</span>
                 </div>
                 <div class="messages form-group">
                    <input name="" type="checkbox" value=""><span class="sub">Message 01</span> <span class="mail">Message 01</span>
                </div>
                <div class="clear"></div>
            </div>
            <div role="tabpanel" class="tab-pane" id="trash">
               <h4 class="clear">Trash Messages <a href="#" class="btn btn-info pull-right">Delete Selected</a></h4>
                 <div class="messages form-group">
                    <input name="" type="checkbox" value=""><span class="sub unread">Message 01</span> <span class="mail">Message 01</span>
                 </div>
                 <div class="messages form-group">
                    <input name="" type="checkbox" value=""><span class="sub">Message 01</span> <span class="mail">Message 01</span>
                </div>
                <div class="clear"></div>
            </div>
          </div>
        </div>
      </div>
    </section>