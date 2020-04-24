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
                                <label for="nama">Username_Pasien</label>
                                <input type="text" class="form-control" id="Username_Pasien" name="Username_Pasien" disabled value= "<?php echo $this->session->userdata('session_username');?>">
                                <small class="form-text text-danger"><?= form_error('Username_Pasien') ?>.</small>
                            </div>

                            <div class="form-group">
                                <label for="jadwal">Jadwal kosong tersedia</label>
                                <select id="jadwal" name="jadwal"> asdasdsa
                                    <?php 
                                        foreach ($jadwalkosong as $data) { ?>
                                            <option value = "<?=$data['idjadwal']?>">
                                            <?= $data['nama']."-".$data['Tanggal']."-".$data['jam']; ?>
                                            </option>
                                        <?php } ?>
                                    ?>
                                </select>
                                <small class="form-text text-danger"><?= form_error('jadwal') ?>.</small>
                            </div>

                            <div class="form-group">
                                <label for="nim">Username_Dokter</label>
                                <input type="text" class="form-control" id="Username_Dokter" name="Username_Dokter"disabled value= "<?php echo $this->session->userdata('session_username');?>">
                                <small class="form-text text-danger"><?= form_error('Username_Dokter') ?>.</small>
                            </div>
                            <div class="form-group">
                                <label for="text"> Waktu </label>
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