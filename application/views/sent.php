<section class="inbox col-lg-9 col-md-9 pfSettings">
      <div class="posts_inbox">
        <div role="tabpanel"> 
          <!-- Nav tabs -->
          <ul class="nav nav-tabs" role="tablist">
            <li role="presentation"><a href="<?php echo base_url(); ?>profile/compose" >Compose</a></li>
            <li role="presentation"><a href="<?php echo base_url(); ?>profile/message">Inbox</a></li>
            <li role="presentation" class="active"><a href="<?php echo base_url(); ?>profile/sent">Sent</a></li>
            <li role="presentation"><a href="<?php echo base_url(); ?>profile/trash">Trash</a></li>
          </ul>
          
          <!-- Tab panes -->
          <div class="tab-content">
                    
            
            <div role="tabpanel" class="tab-pane active" id="sent">
               <?php  $messages = $this->messages->getSentMessages();?>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="row"> <input type="checkbox" name="btSelectAll" id="select_sent_msgs">
                    </th>
                    <th scope="row"><div class="move"><a href="<?php echo base_url().'profile/message' ?>"><span aria-hidden="true" class="glyphicon glyphicon-refresh"></span></a></div></th><th scope="row"><a id='delsentselect' href="javascript:void(0);"><i class="fa fa-trash-o"></i></a>
                    </th>
                    <th scope="row"><select class="move" id="more">
                        <option value="0">More</option>
                        <option value="1">Mark as read</option>
                        <option value="2">Mark as unread</option>
                      </select></th>
                   <!-- <th scope="row"><select class="move" id="move" onchange="selectedChangeMove();">
                        <option value="0">Move to</option>
                        <option value="1">Move to trash</option>
                        <option value="2">Delete from trash </option>
                      </select></th>-->
                    <th class="ad_right"><div class="move"><?php /*?><span id="start">1</span>-<span id="last">2</span> of <?php echo count($messages); ?><?php */?><a class='previous'><span aria-hidden="true" class="glyphicon glyphicon-chevron-left" id="previous"></span></a> <a class='next'><span id="next" aria-hidden="true" class="glyphicon glyphicon-chevron-right"></span></a></div></th>
                  </tr>
                </thead>
                </table>
                <table id="inbox-message" class="table">
                 <tbody>
                  <?php if($messages){ foreach($messages as $message): ?>
                  <tr>
                   
                    <th scope="row"><input type="checkbox" name="btSelectAll" class="all_sent_msgs" value="<?php echo $message['msg_id']; ?>"></th>
                    
                    <td><span aria-hidden="true" class="glyphicon glyphicon-star"></span></td>
                    <td> <a href="<?php echo base_url("profile/messageview/".$message['msg_id']); ?>"><?php echo $message['name']; ?></a></td>
                    <td> <?php echo substr($message['subject'],0,50).'...'; ?></td>
                    <td class="ad_right"> <?php echo $message['sent_date']; ?></td>
                   
                  </tr>
                  <?php endforeach; } else echo "Inbox Empty"?>
                </tbody>
                
              </table>
              <input type="hidden" id="hdnActivePage" value="1" />
            </div>
            
          </div>
        </div>
      </div>
      <!-- tabs close --> 
      
    </section>



