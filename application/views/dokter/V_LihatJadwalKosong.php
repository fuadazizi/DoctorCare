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

    <style type="text/css">
        #view {
            margin: auto;
            width: 80%;
            height: 500px; 
            padding:20px;
        }
    </style>

    <title>Jadwal Kosong</title>
</head>
<body>
    <?php $this->load->view('template/navbar'); ?>
    <h1 class="text-center" style="margin: 10px;"> Lihat Jadwal Kosong </h1>
    <div id="view">
        <?php 
            //untuk mengecek apakah dokter punya jadwal kosong
            if(!array_filter($jadwal_kosong)) { ?>
                <div style="height: 65vh">
                    <div class="flex-center flex-column">
                        <img style="width: 20%;" src='http://localhost/doctorcare/assets/pic/kosong.png'>
                        <h5 class="animated fadeIn mb-3">Anda belum mengatur jadwal kosong. Silahkan menambahkan jadwal kosong dari halaman utama</h5>
                    </div>
                </div>
            <?php 
            } else { ?>
                <h1 class="text-center" style="margin: 10px;"> Lihat Jadwal Kosong </h1>
                <table class="table mt-5">
                    <thead class="thead-dark">
                        <tr>
                            <th class="text-center" scope="col">Nama Dokter</th>
                            <th class="text-center" scope="col">Jam</th>
                            <th class="text-center" scope="col">Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr><?php foreach ($jadwal_kosong as $jt) {
                                //echo $this->session->userdata('session_username');
                            if ($jt['Username_Dokter'] == $this->session->userdata('session_username')) { ?>
                                <td class="text-center"><?= $jt['nama']; ?></td>
                                <td class="text-center"><?= $jt['jam']; ?></td>
                                <td class="text-center"><?= $jt['Tanggal']; ?></td>
                        </tr>
                        <?php
                                } // endif
                            }    //endforeach
                        ?> 
                    </tbody>
                </table>
            <?php  
            } //endif
            ?>
    </div>
    <?php 
        $this->load->view('template/back');
        $this->load->view('template/footer');?>
</body>
</html>