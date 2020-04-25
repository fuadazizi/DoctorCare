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

        #docicon{
            width: 5%;
            
        }

        #viewdoc{
            position: fixed;
            right: 400px;
            top:15px;
            width: 20%;
        }

	</style>

	<title> Selamat Datang di Doctor Care </title>
</head>
<body>
	<div style="height: 120vh;">

        <div style="position: relative; top: 89px;"> 
        <?php 
            $data['person'] = "pasien";
            $this->load->view('template/welcomebar',$data);
            $this->load->view('template/slider'); 
            $this->load->view('template/navbar');
        ?>
        </div>

        <div id="viewdoc">
            <button class="btn btn-default btn-sm" style=""> <img src="<?= base_url(); ?>/assets/pic/doctor-siluet.png" id="docicon"> Lihat Tim dokter kami </button>
        </div>

        <div class="card-deck" id="group">
            <a href="<?= site_url('C_Pasien/V_tambah/'); ?>"> <div class="card bg-dark text-black" id="pict">
                <img src="<?= base_url(); ?>/assets/pic/doctor-buat.jpg" class="card-img" alt="..." >
                <div class="card-img-overlay">
                    <h4 class="card-title">Buat jadwal dengan dokter</h4>
                    <p class="card-text" id="desc"> Buat jadwal temu sendiri dengan doktermu untuk memeriksakan kesehatanmu kali ini lebih mudah</p>
                </div>
            </div> </a>

            <a href="<?= site_url('C_Pasien/V_ubah/');?>"> <div class="card bg-dark text-black" id="pict">
                <img src="<?= base_url(); ?>/assets/pic/doctor-edit.jpg" class="card-img" alt="..." >
                <div class="card-img-overlay">
                    <h4 class="card-title">Edit jadwal dengan dokter</h4>
                    <p class="card-text" id="desc"> Edit jadwal temu dengan dokter yang telah dibuat </p>
                </div>
            </div> </a>

            <a href="<?= site_url('C_Pasien/V_LihatJadwalTemu/'); ?>"> <div class="card bg-dark text-black" id="pict">
                <img src="<?= base_url(); ?>/assets/pic/doctor-lihat.jpeg" class="card-img" alt="..." >
                <div class="card-img-overlay">
                    <h4 class="card-title">Lihat jadwal dengan dokter</h4>
                    <p class="card-text" id="desc"> Lihat jadwal temu dengan dokter yang telah dibuat </p>
                </div>
            </div> </a>

            <a href="<?= site_url('C_Pasien/V_hapus/'); ?>"> <div class="card bg-dark text-black" id="pict">
                <img src="<?= base_url(); ?>/assets/pic/doctor-delete.jpg" class="card-img" alt="..." >
                <div class="card-img-overlay">
                    <h4 class="card-title">Hapus jadwal dengan dokter</h4>
                    <p class="card-text" id="desc"> Menghapus jadwal temu dengan dokter yang telah dibuat </p>
                </div>
            </div> </a>
        </div>
    </div>
    <?php $this->load->view('template/footer') ?>
</body>
</html>