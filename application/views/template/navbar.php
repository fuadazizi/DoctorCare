<nav class="navbar navbar-expand-lg" id="Fixednavbar">
  	<img src="<?= base_url(); ?>/assets/pic/logodc.png" id="logodc">
  	<div class="collapse navbar-collapse" id="navbarNav" >
		<ul class="navbar-nav" style="position: absolute; right: 0px;">
			<li> <button onclick="window.location.href='<?php 
															if($this->session->userdata('session_status')=='dokter') {
																echo site_url('dokter/index/');
															} else if($this->session->userdata('session_status')=='pasien') {
																echo site_url('pasien/index/');
															}; ?>'" type="button" class="btn btn-primary btn-sm"> Kelola akun </button> </li>
			<li> <button onclick="window.location.href='<?php echo base_url().'index.php/login/logout'?>'" class="btn btn-dark btn-sm"> Logout </button> </li>
		</ul>
	</div>
</nav>