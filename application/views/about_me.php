<section class="col-lg-6 col-md-6 col-sm-5 col-xs-12 coloumn2 aboutme">
      <h2>About Me</h2>
      <?php foreach($result as $info):?>
      <div class="posts">
      <div class="col-md-5">
        <ul class="nav-tabs" role="tablist" id="myTab">
        <li role="presentation" class="active"><a href="#About" aria-controls="home" role="tab" data-toggle="tab">About</a></li>
        <li role="presentation"><a href="#educational" aria-controls="profile" role="tab" data-toggle="tab">Educational Background </a></li>
        <li role="presentation"><a href="#Contact" aria-controls="messages" role="tab" data-toggle="tab">Contact Details </a></li>
        </ul>
      </div>  
        <div class="tab-content col-md-7">
        <div role="tabpanel" class="tab-pane active" id="About">
        <h4>Overview</h4>
        <p><?php echo $info->about?></p>
        <h4>Interest</h4>
        <p><?php echo $info->intrests;?> </p>
        </div>
        <?php foreach($education_details as $edu): ?>
        <div role="tabpanel" class="tab-pane" id="educational">
        <h4>Institution:</h4>
        <p><?php echo $edu->college_institution; ?></p>
        <h4>Field of Study:</h4>
        <p><?php echo $edu->field_of_study; ?></p>
        <h4>Degree/Certificate:</h4>
        <p><?php echo $edu->degree_certificate; ?></p>
        <h4>Years Attended:</h4>
        <p><?php echo $edu->attended_from; ?> To <?php echo $edu->attended_upto; ?> </p>
        <h4>Specialized Studies:</h4>
        <p><?php echo $edu->specialised_studies; ?></p>
        </div>
        <?php endforeach;?>
        <div role="tabpanel" class="tab-pane" id="Contact">
         <h4>Email:</h4>
        <p><?php echo $info->email;?></p>
         <h4>Phone:</h4>
        <p><?php echo $info->phone_number;?></p>
         <h4>Office:</h4>
        <p><?php echo $info->company_name;?></p>
         <h4>Fax:</h4>
        <p>9696969696</p>
        </div>
        </div>
        <div class="clear"></div>
      </div>
      <?php endforeach;?>
    </section>