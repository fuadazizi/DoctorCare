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
    <script type="text/javascript" src="doctorcare/assets/jquery/jquery-3.5.0.min.js"></script>
    <title> Ubah Jadwal Temu</title>
</head>
<body>
    <div class="container">
        <div class="row mt-3">
            <div class="col md-6">
                <div class="card">
                    <div class="card-header text-center">
                        Form Ubah Jadwal Temu
                    </div>
                    <div class="card-body">
                        <form action="" method="post">
                            <input type="hidden" name="id" value="<?= $jadwal_kosong['id'] ?>">
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
                            <button type="submit" name="tambah" class="btn btn-primary float-right">Ubah Data</button>
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