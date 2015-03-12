<section class="midbody container">
  <div class="row">
	<?php $this->load->view('left-bar.php'); ?>
    <?php $this->load->view($content); ?>
    <?php $this->load->view('right-bar.php'); ?>
  </div>   
</section>
