<section class="inbox col-lg-9 col-md-9 pfSettings">
      <div class="posts_inbox">
        <div role="tabpanel"> 
          <!-- Nav tabs -->
          <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#compose" aria-controls="profile" role="tab" data-toggle="tab">Compose</a></li>
            <li role="presentation"><a href="#inbox" aria-controls="messages" role="tab" data-toggle="tab">Inbox</a></li>
            <li role="presentation"><a href="#sent" aria-controls="settings" role="tab" data-toggle="tab">Sent</a></li>
            <li role="presentation"><a href="#trash" aria-controls="messages" role="tab" data-toggle="tab">Trash</a></li>
          </ul>
          
          <!-- Tab panes -->
          <div class="tab-content">
            
            <div role="tabpanel" class="tab-pane active" id="compose">
              <div class="bott_replys col-md-5 col-md-offset-1">
                        <div class="bott_top"><a href="#"><i class="fa fa-mail-reply"></i></a>
                          <button id="btnGroupVerticalDrop2" type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> <span class="caret"></span> </button>
                          <ul class="dropdown-menu" role="menu" aria-labelledby="btnGroupVerticalDrop4">
                            <li><a href="#">Dropdown link</a></li>
                            <li><a href="#">Dropdown link</a></li>
                          </ul>
                        </div>
                        <div class="adres_box">To</div>
                        <div class="adres_right"><a href="#">Cc</a> <a href="#">Bcc</a></div>
                      </div>
                      <div class="bott_replys ad_box col-md-5 col-md-offset-1">
                        <div class="commentss"><img src="<?php echo base_url(); ?>images/commenting.png" alt=""></div>
                      </div>
                      <div class="bott_replys bott_boxcolor col-md-5 col-md-offset-1">
                        <div class="col-md-1">
                          <div class="btn3 btn-yellow ad_ing">Sent</div>
                        </div>
                        <div class="adres_box"><img src="<?php echo base_url(); ?>images/paper_clip.png" alt=""></span></div>
                        <div class="adres_right_ad">
                          <div class="ad_lefts">
                            <div class="bott_top">
                              <button id="btnGroupVerticalDrop2" type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> 
                              <span class="caret"></span> </button>
                            </div>
                          </div>
                          <div class="ad_lefts ri_ght"><a href="#"><i class="fa fa-trash-o"></i></a></div>
                          <div class="ad_lefts"><a href="#">Saved</a></div>
                        </div>
                      </div>
            </div>
            <div role="tabpanel" class="tab-pane" id="inbox">
            <?php  $messages = $this->messages->getRecievedMessages();?>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="row"> <input type="checkbox" name="btSelectAll" id="select_all_msgs">
                    </th>
                    <th scope="row"><div class="move"><span aria-hidden="true" class="glyphicon glyphicon-refresh"></span></div></th>
                    <th scope="row"><select class="move">
                        <option>More</option>
                      </select></th>
                    <th scope="row"><select class="move" >
                        <option>Move to</option>
                      </select></th>
                    <th class="ad_right"><div class="move">1-34 of <?php echo count($messages); ?><a href="#"><span aria-hidden="true" class="glyphicon glyphicon-chevron-left"></span></a> <a href="#"><span aria-hidden="true" class="glyphicon glyphicon-chevron-right"></span></a></div></th>
                  </tr>
                </thead>
                 <tbody>
                  <?php if($messages){ foreach($messages as $message): ?>
                  <tr>
                    <th scope="row"><input type="checkbox" name="btSelectAll" class="all_inbox_msgs"></th>
                    <td><span aria-hidden="true" class="glyphicon glyphicon-star"></span></td>
                    <td><?php echo $message['name']; ?></td>
                    <td> <?php echo $message['content']; ?></td>
                    <td class="ad_right"> <?php echo $message['sent_date']; ?></td>
                  </tr>
                  <?php endforeach; } else echo "Inbox Empty"?>
                </tbody>
                
              </table>
            </div>
            <div role="tabpanel" class="tab-pane" id="sent">
              <h4>sent</h4>
            </div>
            <div role="tabpanel" class="tab-pane" id="trash">
              <h4>trash</h4>
            </div>
          </div>
        </div>
      </div>
      <!-- tabs close --> 
      
    </section>



<?php /*?><!--<section class="col-lg-6 col-md-6 col-sm-5 col-xs-12 coloumn2 messageSt">
<p style="color:green"><?php if($this->session->flashdata('send_msg'))
			 echo $this->session->flashdata('send_msg'); ?></p>
      <h2>Messages</h2>
      <div class="posts">
        <div role="tabpanel"> 
           Nav tabs 
          <ul class="nav nav-tabs" role="tablist">
            <li role="presentation"><a href="#compose" aria-controls="profile" role="tab" data-toggle="tab">Compose Message</a></li>
            <li role="presentation" class="active"><a href="#inbox" aria-controls="messages" role="tab" data-toggle="tab">Inbox</a></li>
            <li role="presentation"><a href="#sent" aria-controls="settings" role="tab" data-toggle="tab">Sent</a></li>
            <li role="presentation"><a href="#archive" aria-controls="messages" role="tab" data-toggle="tab">Archived</a></li>
            <li role="presentation"><a href="#trash" aria-controls="settings" role="tab" data-toggle="tab">Trash</a></li>
          </ul>
          
           Tab panes 
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
              <h4 class="clear">Total Inbox Messages (<?php echo count($messages); ?>)  <a id="delmsgbtn" href="javascript:void(0);" class="btn btn-black pull-right">Delete Selected</a> <span class="clearfix"></span> </h4>       
            <div class="messages form-group">
            <?php if($messages){ foreach($messages as $message): ?>
             <div class="message">
                 <h3 class="unread"><?php echo $message['name']; ?> Sent You a Message , <?php echo $message['sent_date']; ?></h3>
                 <img src="<?php echo base_url(); ?>uploads/<?php echo $message['user_image'];?>" width="55" height="60" alt="">                	
                	<span class="sub">
                    <h5><?php echo $message['name']; ?></h5>
                    <span><?php echo $message['content']; ?></span> 
                    </span><input name="deletemsg" type="checkbox" value="<?php echo $message['msg_id']; ?>">
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
              <?php endforeach; } else echo "Inbox Empty"?>
              
              <div class="message">
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
              </div>
              
              
              </div>  
                                
              <div class="clear"></div>
       
            </div> 
            <?php  $sentMessages = $this->messages->getSentMessages(); 
			
			?>
            <div role="tabpanel" class="tab-pane" id="sent">
                <h4 class="clear">Sent Messages<a href="javascript:void(0);" id="delsentselect" class="btn btn-black pull-right">Delete Selected</a></h4>
            	<div class="messages form-group">            
                 <?php if($sentMessages) { foreach($sentMessages as $sentMessage):?>   
              <div class="message">
                 <h3>Sent to <?php echo $sentMessage['name']." , ".$sentMessage['sent_date']; ?></h3>
                 <img src="<?php echo base_url()."uploads/".$sentMessage['user_image']; ?>" width="55" height="60" alt="">                	
                	<span class="sub">
                    <h5><?php echo $sentMessage['name']; ?></h5>
                    <span><?php echo $sentMessage['content']; ?></span> 
                    </span><input name="" type="checkbox" value="<?php echo $sentMessage['msg_id']; ?>">
                    <div class="clear"></div>
                    <div class="button"><a href="<?php echo base_url()."message/deletesentmsg/".$sentMessage['msg_id'];?>" class="btn btn-black pull-right small-text">Delete</a> </div>
              <div class="clearfix"></div> 
               <div class="clear"></div>
                    
              </div>
              <?php endforeach; } else echo "Sent Box Empty" ?>
              
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
               <h4 class="clear">Trash Messages <a href="javascript:void(0);" id="deletetrash" class="btn btn-black pull-right">Delete Selected</a></h4>
                 <div class="messages form-group">  
                    
                 <?php if($trashmessages){ foreach($trashmessages as $trashmessage): ?>       
             <div class="message">
                 <h3><?php echo $trashmessage['name']; ?> Sent You a Message , <?php echo $trashmessage['sent_date']; ?></h3>
                 <img src="<?php echo base_url()."uploads/".$trashmessage['user_image']; ?>" width="55" height="60" alt="">                	
                	<span class="sub">
                    <h5><?php echo $trashmessage['name']; ?></h5>
                    <span><?php echo $trashmessage['content']; ?></span> 
                    </span><input name="" type="checkbox" value="<?php echo $trashmessage['msg_id']; ?>">
                    <div class="clear"></div>
                    <div class="button"><a href="<?php echo base_url()."message/deletefromtrash/".$trashmessage['msg_id']; ?>" class="btn btn-black pull-right small-text">Delete</a>  <a href="#" class="small-text btn btn-success pull-right" data-toggle="modal" data-target="#msg01">View Conversation</a> --></div>
                    <div class="clear"></div>
                     
              </div>
              
              <?php endforeach; } else echo "Trash is empty"; ?>
              
              
              
              </div>
                <div class="clear"></div>
            </div>
          </div>
        </div>
      </div>
    </section><?php */?>