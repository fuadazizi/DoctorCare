 <!DOCTYPE html>
 <html> 
 <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

    <!-- MY CSS -->

    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/style.css">

    <title>Tambah Jadwal Temu</title>

    <script src= "https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"> 
    </script> 
</head>
<body>
    <?php $this->load->view('template/navbar');?>
    <div class="container">
        <div class="row mt-3">
            <div class="col">
                <div class="card">
                    <div class="card-header text-center">
                        Form Tambah Jadwal Temu
                    </div>
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="nama">Username_Pasien</label>
                                <input type="text" class="form-control" id="Username_Pasien" name="Username_Pasien" disabled>
                                <small class="form-text text-danger"><?= form_error('Username_Pasien') ?>.</small>
                                <script type="text/javascript">
                                    $(document).ready(function(e) {
                                        var username = <?php echo $this->session->userdata('session_nama');?>;
                                        document.getElementById("USername_Pasien").value = "username";
                                    });
                                </script>
                            </div>
                            <div class="form-group">
                                <label for="nim">Username_Dokter</label>
                                <input type="text" class="form-control" id="Username_Dokter" name="Username_Dokter">
                                <small class="form-text text-danger"><?= form_error('Username_Dokter') ?>.</small>
                            </div>
                            <div class="form-group">
                                <label for="text">Jam</label>
                                <input type="text" class="form-control" id="jam" name="jam">
                                <small class="form-text text-danger"><?= form_error('jam') ?>.</small>
                            </div>
                            <div class="form-group">
                                <label for="text">Tanggal</label>
                                <input type="text" class="form-control" id="Tanggal" name="Tanggal">
                                <small class="form-text text-danger"><?= form_error('Tanggal') ?>.</small>
                            </div>
                            <div class="form-group">
                                <label for="text">Penyakit</label>
                                <input type="text" class="form-control" id="Penyakit" name="Penyakit">
                                <small class="form-text text-danger"><?= form_error('Penyakit') ?>.</small>
                            </div>
                            <button type="submit" name="tambah" class="btn btn-primary float-right">Tambah Data</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> 

    <?php 
        $this->load->view('template/back'); 
        $this->load->view('template/footer');?>
</body>
</html>