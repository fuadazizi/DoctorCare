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

    <title>Lihat Jadwal Kosong</title>
</head>
<body>
 <table class="table mt-5">
                <thead>
                    <tr>
                        <th class="text-center" scope="col">Username_Dokter</th>
                        <th class="text-center" scope="col">Jam</th>
                        <th class="text-center" scope="col">Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    <tr><?php foreach ($jadwal_kosong as $jt) : ?>
                        <td class="text-center"><?= $jt['Username_Dokter']; ?></td>
                        <td class="text-center"><?= $jt['jam']; ?></td>
                        <td class="text-center"><?= $jt['Tanggal']; ?></td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
 </table>
    <?php 
        $this->load->view('template/back'); 
        $this->load->view('template/footer');?>
</body>
</html>