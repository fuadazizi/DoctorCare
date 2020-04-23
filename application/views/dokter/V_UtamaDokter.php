<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

	<link rel="icon" href="<?= base_url(); ?>/assets/pic/favicon.png" type="image/png">

	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/assets/css/style.css">

	<style type="text/css">
		h4{
			text-align: center;
			position: relative;
			margin: 10px auto;
			color: white;
		}	

		img{
			filter: brightness(60%);
		}	

		li{
			padding: 1px;
			margin-right: 15px;
		}

		#desc{
			text-align: center;
			color: white;
		}

		#group{
			position: relative;
			margin: auto;
			width: 90%;
		}

	</style>

	<title> Selamat Datang di Doctor Care </title>
</head>
<body >
	<?php 
		$this->load->view('template/navbar');
	?>
	<div>
		<div id="header">
			<h2 style="margin: 0px 0px 40px 90px; padding: 10px;"> Selamat datang, <?php echo $this->session->userdata('session_username');?></h2>
			<p style="margin: 0px 0px 40px 100px;"> Anda masuk sebagai dokter 
			<br> Semoga hari anda menyenangkan </p>
		</div>

		<div class="card-deck" id="group">
			<a href="<?= site_url('C_Dokter/V_Tambah/'); ?>"> <div class="card bg-dark text-black" id="pict">
				<img src="<?= base_url(); ?>/assets/pic/doctor-buat.jpg" class="card-img" alt="..." >
				<div class="card-img-overlay" >
					<h4 class="card-title">Buat jadwal kosong</h4>
					<p class="card-text" id="desc"> Buat jadwal kosong sendiri untuk menyesuaikan dengan jadwal anda </p>
				</div>
			</div> </a>

			<a href="<?= site_url('C_Dokter/V_ubah/'); ?>"> <div class="card bg-dark text-black" id="pict">
				<img src="<?= base_url(); ?>/assets/pic/doctor-edit.jpg" class="card-img" alt="..." >
				<div class="card-img-overlay">
					<h4 class="card-title"> Edit jadwal kosong </h4>
					<p class="card-text" id="desc"> Edit jadwal kosong anda yang telah dibuat </p>
				</div>
			</div> </a>

			<a href="<?= site_url('C_Dokter/V_LihatJadwalKosong/'); ?>"> <div class="card bg-dark text-black" id="pict">
				<img src="<?= base_url(); ?>/assets/pic/doctor-delete.jpg" class="card-img" alt="..." >
				<div class="card-img-overlay">
					<h4 class="card-title">Lihat jadwal kosong </h4>
					<p class="card-text" id="desc"> Melihat jadwal kosong yang telah anda buat </p>
				</div>
            </div> </a>

            <a href="<?= site_url('C_Dokter/V_hapus/'); ?>"> <div class="card bg-dark text-black" id="pict">
                <img src="<?= base_url(); ?>/assets/pic/doctor-delete.jpg" class="card-img" alt="..." >
                <div class="card-img-overlay">
                    <h4 class="card-title">Hapus jadwal dokter</h4>
                    <p class="card-text" id="desc"> Menghapus jadwal kosong dokter yang telah dibuat </p>
                </div>
			</div> </a>
		</div>
	</div>
	<?php $this->load->view('template/slider'); ?>
</body>
</html>