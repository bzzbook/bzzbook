<section class="midbody container">
<div class="row">
<?php $this->load->view('cmp_content_top.php'); ?>
</div>
  <div class="row">
	<?php $this->load->view('cmp_left_bar.php'); ?>
    <?php $this->load->view($content); ?>
    <?php $this->load->view('cmp_right_bar.php'); ?>
  </div>   
</section>
