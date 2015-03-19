<section class="col-lg-6 col-md-6 col-sm-5 col-xs-12 coloumn2 messageSt">
<p style="color:green"><?php if($this->session->flashdata('send_msg'))
			 echo $this->session->flashdata('send_msg'); ?></p>
      <h2>Messages</h2>
      <div class="posts">
        <div role="tabpanel"> 
          <!-- Nav tabs -->
          <ul class="nav nav-tabs" role="tablist">
            <li role="presentation"><a href="#compose" aria-controls="profile" role="tab" data-toggle="tab">Compose Message</a></li>
            <li role="presentation" class="active"><a href="#inbox" aria-controls="messages" role="tab" data-toggle="tab">Inbox</a></li>
            <li role="presentation"><a href="#sent" aria-controls="settings" role="tab" data-toggle="tab">Sent</a></li>
<!--            <li role="presentation"><a href="#archive" aria-controls="messages" role="tab" data-toggle="tab">Archived</a></li>
-->            <li role="presentation"><a href="#trash" aria-controls="settings" role="tab" data-toggle="tab">Trash</a></li>
          </ul>
          
          <!-- Tab panes -->
          <div class="tab-content">
            <div role="tabpanel" class="tab-pane" id="compose">
             <div class="form-group col-md-6">
             
             <form action="<?php echo base_url(); ?>message/send_msg" method="post">
             	<select name="friendsList" id="friendsList" class="form-control">
                <?php $friends = $this->friendsmodel->getfriends();
				  foreach($friends as $friend)
				  {
             	  echo " <option value='".$friend['id']."'>".$friend['name']."</option>";
				  }
				  ?>
             	</select>
             </div>
             <div class="clear"></div>
             <div class="form-group col-md-12">
<textarea name="message_content" id="message_content" cols="" rows="" class="form-control"></textarea>

</div>
              <div class="form-group">
                <button class="btn btn-info pull-right" type="submit">Send</button>
                </form>
                </div>
              <div class="clear"></div>
            </div>
            <?php  $messages = $this->messages->getRecievedMessages(); 
			
			?>
            
            <div role="tabpanel" class="tab-pane active" id="inbox">
              <h4 class="clear">Total Inbox Messages (<?php echo count($messages); ?>)  <a href="#" class="btn btn-black pull-right">Delete Selected</a> <span class="clearfix"></span> </h4>       
            <div class="messages form-group">
            <?php foreach($messages as $message): ?>
             <div class="message">
                 <h3 class="unread"><?php echo $message['name']; ?> Sent You a Message , <?php echo $message['sent_date']; ?></h3>
                 <img src="<?php echo base_url(); ?>uploads/<?php echo $message['user_image'];?>" width="55" height="60" alt="">                	
                	<span class="sub">
                    <h5><?php echo $message['name']; ?></h5>
                    <span><?php echo $message['content']; ?></span> 
                    </span><input name="deletemsg" type="checkbox" value="<?php echo $message['sent_by']; ?>">
                    <div class="clear"></div>
                    <div class="button"><a href="<?php echo base_url()."message/deletemsg/".$message['msg_id'];?>" class="btn btn-black pull-right small-text">Delete</a> <a href="<?php echo base_url()."message/viewconversation/".$message['msg_id'];?>" class="small-text btn btn-success pull-right" data-toggle="modal" data-target="#msg" onclick="getconversations(<?php echo $message['msg_id'].','.$message['sent_by']; ?>);">View Conversation</a> <a class="small-text btn btn-warning pull-right" data-toggle="collapse" data-parent="#inbox" href="#msgReply<?php echo $message['msg_id']; ?>">Reply</a></div>
                    <div class="clear"></div>
                     <div id="msgReply<?php echo $message['msg_id']; ?>" class="panel-collapse form-group collapse">         
                        <div class="replyBlock">
                        <form action="<?php echo base_url()."message/replymessage"?>" method="post">
                        <textarea class="form-control" name="message_content" cols="" rows="" placeholder="Write your Reply Here.."></textarea>
                        <input type="hidden" name="recieved_by" id="recieved_by" value="<?php echo $message['sent_by']; ?>" />
                        <button class="small-text btn btn-warning" type="submit">Send</button>
                        </form>
                        </div>
                    </div>
              <div class="clearfix"></div> 
              </div>
              <?php endforeach;?>
              
              <!--<div class="message">
                 <h3>Ramesh Kuppili Sent You a Message , Tuesday 10,2015 at 11:39 am</h3>
                 <img src="<?php echo base_url(); ?>images/p1.png" width="55" height="60" alt="">                	
                	<span class="sub">
                    <h5>Ramesh Kuppili</h5>
                    <span>Whats up?</span> 
                    </span><input name="" type="checkbox" value="">
                    <div class="clear"></div>
                    <div class="button"><a href="#" class="btn btn-black pull-right small-text">Delete</a> <a href="#" class="small-text btn btn-success pull-right" data-toggle="modal" data-target="#msg02">View Conversation</a> <a class="small-text btn btn-warning pull-right" data-toggle="collapse" data-parent="#inbox" href="#msgReply02">Reply</a></div>
              <div class="clearfix"></div> 
               <div class="clear"></div>
                    <div id="msgReply02" class="panel-collapse form-group collapse">         
                        <div class="replyBlock">
                        <textarea class="form-control" name="" cols="" rows="" placeholder="Write your Reply Here.."></textarea>
                        <button class="small-text btn btn-warning ">Send</button>
                        </div>
                    </div>
              </div>-->
              
              
              </div>  
                                
              <div class="clear"></div>
       
            </div> 
            <?php  $sentMessages = $this->messages->getSentMessages(); 
			
			?>
            <div role="tabpanel" class="tab-pane" id="sent">
                <h4 class="clear">Sent Messages<a href="#" class="btn btn-black pull-right">Delete Selected</a></h4>
            	<div class="messages form-group">            
                 <?php foreach($sentMessages as $sentMessage):?>   
              <div class="message">
                 <h3>Sent to <?php echo $sentMessage['name']." , ".$sentMessage['sent_date']; ?></h3>
                 <img src="<?php echo base_url()."uploads/".$sentMessage['user_image']; ?>" width="55" height="60" alt="">                	
                	<span class="sub">
                    <h5><?php echo $sentMessage['name']; ?></h5>
                    <span><?php echo $sentMessage['content']; ?></span> 
                    </span><input name="" type="checkbox" value="">
                    <div class="clear"></div>
                    <div class="button"><a href="<?php echo base_url()."message/deletesentmsg/".$sentMessage['msg_id'];?>" class="btn btn-black pull-right small-text">Delete</a> <a href="#" class="small-text btn btn-success pull-right" data-toggle="modal" data-target="#msg02">View Conversation</a> </div>
              <div class="clearfix"></div> 
               <div class="clear"></div>
                    
              </div>
              <?php endforeach; ?>
              
              </div>
              <div class="clear"></div>
            </div>            
            
            <div role="tabpanel" class="tab-pane" id="archive">
                <h4 class="clear">Archived Messages <a href="#" class="btn btn-black pull-right">Delete Selected</a></h4>
                <div class="messages form-group">            
             <div class="message">
                 <h3>Janet Sent You a Message , Tuesday 10,2015 at 11:39 am</h3>
                 <img src="<?php echo base_url(); ?>images/p2.png" width="55" height="60" alt="">                	
                	<span class="sub">
                    <h5>Janet</h5>
                    <span>Whats up?</span> 
                    </span><input name="" type="checkbox" value="">
                    <div class="clear"></div>
                    <div class="button"><a href="#" class="btn btn-black pull-right small-text">Delete</a> <a href="#" class="small-text btn btn-success pull-right" data-toggle="modal" data-target="#msg01">View Conversation</a></div>
                    <div class="clear"></div>
                     
              </div>
              
              
              <div class="message">
                 <h3>Ramesh Kuppili Sent You a Message , Tuesday 10,2015 at 11:39 am</h3>
                 <img src="<?php echo base_url(); ?>images/p1.png" width="55" height="60" alt="">                	
                	<span class="sub">
                    <h5>Ramesh Kuppili</h5>
                    <span>Whats up?</span> 
                    </span><input name="" type="checkbox" value="">
                    <div class="clear"></div>
                    <div class="button"><a href="#" class="btn btn-black pull-right small-text">Delete</a> <a href="#" class="small-text btn btn-success pull-right" data-toggle="modal" data-target="#msg02">View Conversation</a> </div>
              <div class="clearfix"></div> 
               <div class="clear"></div>
                    
              </div>
              
              
              </div>
                <div class="clear"></div>
            </div>
             <?php  $trashmessages = $this->messages->getTrashMessages(); 
			
			?>
            <div role="tabpanel" class="tab-pane" id="trash">
               <h4 class="clear">Trash Messages <a href="#" class="btn btn-black pull-right">Delete Selected</a></h4>
                 <div class="messages form-group">  
                    
                 <?php if($trashmessages){ foreach($trashmessages as $trashmessage): ?>       
             <div class="message">
                 <h3><?php echo $trashmessage['name']; ?> Sent You a Message , <?php echo $trashmessage['sent_date']; ?></h3>
                 <img src="<?php echo base_url()."uploads/".$trashmessage['user_image']; ?>" width="55" height="60" alt="">                	
                	<span class="sub">
                    <h5><?php echo $trashmessage['name']; ?></h5>
                    <span><?php echo $trashmessage['content']; ?></span> 
                    </span><input name="" type="checkbox" value="">
                    <div class="clear"></div>
                    <div class="button"><a href="<?php echo base_url()."message/deletefromtrash/".$trashmessage['msg_id']; ?>" class="btn btn-black pull-right small-text">Delete</a> <a href="#" class="small-text btn btn-success pull-right" data-toggle="modal" data-target="#msg01">View Conversation</a></div>
                    <div class="clear"></div>
                     
              </div>
              
              <?php endforeach; } else echo "Trash is empty"; ?>
              
              
              
              </div>
                <div class="clear"></div>
            </div>
          </div>
        </div>
      </div>
    </section>