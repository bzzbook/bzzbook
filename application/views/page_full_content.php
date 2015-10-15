<section class="midbody container">
  <div class="row">
    <section class="col-lg-10 col-md-10 nopad">
		<?php $this->load->view('page_header.php'); ?>
        <?php $this->load->view($content); ?>
    </section>
    <?php $this->load->view('page_right_bar.php'); ?>
  </div>   
</section>
