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
    <div style="position: relative; top: 110px;"> 
        <?php 
            $this->load->view('template/navbar');
        ?>
    </div>
    <div class="container">
        <div class="row mt-3">
            <div class="col">
                <div class="card" style="position: relative; top: 90px;">
                    <div class="card-header text-center">
                        Form Tambah Jadwal Temu
                    </div>
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="nama">Username Pasien</label>
                                <input type="text" class="form-control" id="Username_Pasien" name="Username_Pasien" disabled value= "<?php echo $this->session->userdata('session_username');?>">
                                <small class="form-text text-danger"><?= form_error('Username_Pasien') ?>.</small>
                            </div>
                            <div class="form-group">
                                <label for="nim">Pilih Dokter</label>
                                <select class= "form-control" id="jadwal" name="jadwal">
                                    <?php 
                                        foreach ($jadwalkosong as $data) { ?>
                                            <option name = "<?=$data['idjadwal']?>">
                                            <?= $data['Username_Dokter']; ?>
                                            </option>
                                        <?php } ?>
                                    ?>
                                </select>
                                <small class="form-text text-danger"><?= form_error('Username_Dokter') ?>.</small>
                            </div>
                            <div class="form-group">
                                <label for="jadwal">Jadwal kosong tersedia </label> <br>
                                <select class= "form-control" id="jadwal" name="jadwal">
                                    <?php 
                                        foreach ($jadwalkosong as $data) { ?>
                                            <option name = "<?=$data['idjadwal']?>">
                                            <?= $data['tanggal']." pukul ".$data['jam']. " oleh dr. ".$data['nama'];  ?>
                                            </option>
                                        <?php } ?>
                                    ?>
                                </select>
                                <small class="form-text text-danger"><?= form_error('jadwal') ?>.</small>
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