<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

	<link rel="icon" href="<?= base_url(); ?>/assets/pic/favicon.png" type="image/png">

	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/assets/css/style.css">

	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
	<!-- Bootstrap core CSS -->
	<link href="<?= base_url(); ?>assets/MDBootstrap/css/bootstrap.min.css" rel="stylesheet">
	<!-- Material Design Bootstrap -->
	<link href="<?= base_url(); ?>assets/MDBootstrap/css/mdb.min.css" rel="stylesheet">
	<!-- Your custom styles (optional) -->
	<link href="<?= base_url(); ?>assets/MDBootstrap/css/style.css" rel="stylesheet">

	<script type="text/javascript" src="<?= base_url(); ?>assets/MDBootstrap/js/jquery-3.4.1.min.js"></script>
	<!-- Bootstrap tooltips -->
	<script type="text/javascript" src="<?= base_url(); ?>assets/MDBootstrap/js/popper.min.js"></script>
	<!-- Bootstrap core JavaScript -->
	<script type="text/javascript" src="<?= base_url(); ?>assets/MDBootstrap/js/bootstrap.min.js"></script>
	<!-- MDB core JavaScript -->
	<script type="text/javascript" src="<?= base_url(); ?>assets/MDBootstrap/js/mdb.min.js"></script> 

	<script src="<?php echo base_url('assets/jquery/jquery-3.5.0.min.js') ;?>"></script>
    <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js') ;?>"></script>
    <script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js') ;?>"></script>
    <script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.js') ;?>"></script>

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
			top: 150px;
			margin: auto;
			width: 90%;
		}

		#viewjd{
            position: fixed;
            right: 320px;
            top:23px;
        }

	</style>

	<title> Selamat Datang di Doctor Care </title>
</head>
<body>
	<div style="height: 120vh;">
		
		<div style="position: relative; top: 89px;"> 
		<?php 
			$data['person'] = "dokter";
			//$this->load->view('template/welcomebar',$data);
			$this->load->view('template/slider',$data); 
			$this->load->view('template/navbar');
		?>
		</div>

		<div id="viewjd">
            <button type="button" class="btn btn-outline-info waves-effect btn-sm" onclick="window.location.href='<?= site_url('C_Pasien/V_LihatJadwalTemu/'); ?>'"> Lihat Jadwal Temu Anda </button>
        </div>

		<div class="card-deck" id="group">
			<a href="<?= site_url('C_Dokter/V_Tambah/'); ?>"> <div class="card bg-dark text-black" id="pict">
				<img src="<?= base_url(); ?>/assets/pic/doctor-buat.jpg" class="card-img" alt="..." >
				<div class="card-img-overlay" >
					<h4 class="card-title">Buat jadwal kosong</h4>
					<p class="card-text" id="desc"> Buat jadwal kosong sendiri untuk menyesuaikan dengan jadwal anda </p>
				</div>
			</div> </a>

			<a href="<?= site_url('C_Dokter/V_Ubah/'); ?>"> <div class="card bg-dark text-black" id="pict">
				<img src="<?= base_url(); ?>/assets/pic/doctor-edit.jpg" class="card-img" alt="..." >
				<div class="card-img-overlay">
					<h4 class="card-title"> Edit jadwal kosong </h4>
					<p class="card-text" id="desc"> Edit jadwal kosong anda yang telah dibuat </p>
				</div>
			</div> </a>

			<a href="<?= site_url('C_Dokter/V_LihatJadwalKosong/'); ?>"> <div class="card bg-dark text-black" id="pict">
				<img src="<?= base_url(); ?>/assets/pic/doctor-lihat.jpeg" class="card-img" alt="..." >
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

<!-- 			 <a href="<?= site_url('C_Pasien/V_LihatJadwalTemu/'); ?>"> <div class="card bg-dark text-black" id="pict">
                <img src="<?= base_url(); ?>/assets/pic/doctor-lihatjadwal.jpg" class="card-img" alt="..." >
                <div class="card-img-overlay">
                    <h4 class="card-title">Lihat jadwal dengan pasien</h4>
                    <p class="card-text" id="desc"> Lihat jadwal temu dengan dokter yang telah dibuat </p>
                </div>
            </div> </a> -->
		</div>
	</div>
	<?php $this->load->view('template/footer'); ?>
</body>
</html>