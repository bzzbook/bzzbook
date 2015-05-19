<section class="inbox col-lg-9 col-md-9 pfSettings">
      <div class="posts_inbox">
        <div role="tabpanel"> 
          <!-- Nav tabs -->
          <!--<ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#compose" aria-controls="profile" role="tab" data-toggle="tab">Compose</a></li>
            <li role="presentation"><a href="#inbox" aria-controls="messages" role="tab" data-toggle="tab">Inbox</a></li>
            <li role="presentation"><a href="#sent" aria-controls="settings" role="tab" data-toggle="tab">Sent</a></li>
            <li role="presentation"><a href="#trash" aria-controls="messages" role="tab" data-toggle="tab">Trash</a></li>
          </ul>-->
          
          <!-- Tab panes -->
          <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="compose">
              <table class="table ad_tab">
                <thead>
                  <tr>
                    <div class="col-md-6 deleted"><a href="#"><i class="fa fa-mail-reply"></i></a></div>
                    <div class="col-md-6 deleted"><a href="#"><i class="fa fa-trash-o"></i></a></div>
                    <div class="ad_right"><a href="#">1-34 of 36</a> <a href="#"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span></a> <a href="#"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></a> </div>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th><div class="mod_text"><?php echo $messages['message'][0]['subject']; ?></div>
                      <div class="mod_rights"><a href="#">inbox</a><span><a href="#"><i class="fa fa-times"></i></a></span></div></th>
                  </tr>
                  <tr>
                    <th> <div class="col-md-8 deleted ico_ns"><a href="#"><i class="fa fa-user"></i></a></div>
                      <div class="mod_text"><?php echo $messages['user'][0]['user_firstname'] ." ". $messages['user'][0]['user_lastname']; ?><span><a href="#">&lt;<?php echo $messages['user'][0]['user_email']; ?>&gt;</a> <a href="#">UnSubScribe</a> </span>
                        <div class="tome">To me</div>
                        <!--<div class="rep_lly col-md-9">
                          <button aria-expanded="false" data-toggle="dropdown" class="btn btn-default dropdown-toggle" type="button" id="btnGroupVerticalDrop2"> <span class="caret"></span> </button>
                          <ul aria-labelledby="btnGroupVerticalDrop4" role="menu" class="dropdown-menu">
                            <li><a href="#">Dropdown link</a></li>
                            <li><a href="#">Dropdown link</a></li>
                          </ul>
                        </div>-->
                      </div>
                      <div class="right_side">
                        <div class="deleted replying col-md-6"> <a href="#"> <i class="fa fa-mail-reply"></i> </a> 
                        <!--<div class="rep_lly">
                          <button aria-expanded="false" data-toggle="dropdown" class="btn btn-default dropdown-toggle" type="button" id="btnGroupVerticalDrop2"> <span class="caret"></span> </button>
                          <ul aria-labelledby="btnGroupVerticalDrop4" role="menu" class="dropdown-menu">
                            <li><a href="#">Dropdown link</a></li>
                            <li><a href="#">Dropdown link</a></li>
                          </ul>
                        </div>--></div>
                      </div>
                      <div class="right_side"><a href="#"><?php echo $messages['message'][0]['sent_date']; ?></a><span><a href="#"><i class="fa fa-star-o"></i></a></span></div>
                      <div class="col-md-8 col-md-offset-1 midle_box">
                        <p><?php echo $messages['message'][0]['message']; ?></p>
                      </div>
                      <div class="clearfix"></div>
                      <div class="borderbox"></div>
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
                    </th>
                    <div class="clearfix"></div>
                    
                  </tr>
                </tbody>
              </table>
              <div class="privacys"><a href="#">Terms</a> - <a href="#">Privacy</a>  </div>
            </div>
            <div role="tabpanel" class="tab-pane" id="inbox">
              <div data-example-id="striped-table" class="bs-example">
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="row"> <input type="checkbox" name="btSelectAll">
                      </th>
                      <th scope="row"><div class="move"><span aria-hidden="true" class="glyphicon glyphicon-refresh"></span></div></th>
                      <th scope="row"><select class="move">
                          <option>More</option>
                        </select></th>
                      <th scope="row"><select class="move" >
                          <option>Move to</option>
                        </select></th>
                      <th class="ad_right"><div class="move">1-34 of 36<a href="#"><span aria-hidden="true" class="glyphicon glyphicon-chevron-left"></span></a> <a href="#"><span aria-hidden="true" class="glyphicon glyphicon-chevron-right"></span></a></div></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row"><input type="checkbox" name="btSelectAll"></th>
                      <td><span aria-hidden="true" class="glyphicon glyphicon-star"></span></td>
                      <td>Siva Prasad</td>
                      <td>Lorem ipsum dolor sit amet</td>
                      <td class="ad_right">09:33 AM</td>
                    </tr>
                    <tr>
                      <th scope="row"><input type="checkbox" name="btSelectAll"></th>
                      <td><span aria-hidden="true" class="glyphicon glyphicon-star"></span></td>
                      <td>Siva Prasad</td>
                      <td>Lorem ipsum dolor sit amet</td>
                      <td class="ad_right">09:33 AM</td>
                    </tr>
                    <tr>
                      <th scope="row"><input type="checkbox" name="btSelectItem" data-index="1"></th>
                      <td><span aria-hidden="true" class="glyphicon glyphicon-star"></span></td>
                      <td>Siva Prasad</td>
                      <td>Lorem ipsum dolor sit amet</td>
                      <td class="ad_right">09:33 AM</td>
                    </tr>
                    <tr>
                      <th scope="row"><input type="checkbox" name="btSelectItem" data-index="1"></th>
                      <td><span aria-hidden="true" class="glyphicon glyphicon-star"></span></td>
                      <td>Siva Prasad</td>
                      <td>Lorem ipsum dolor sit amet</td>
                      <td class="ad_right">09:33 AM</td>
                    </tr>
                  </tbody>
                </table>
              </div>
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