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
                            <table class="table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Nama Dokter</th>
                                        <th>Jam</th>
                                        <th>Tanggal</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody id="here">
                                    
                                </tbody>
                            </table>

                            <div class="form-group">
                                <label for="nama">Username Pasien </label>
                                <input type="text" class="form-control" id="Username_Pasien" name="Username_Pasien" disabled value= "<?php echo $this->session->userdata('session_username');?>">
                            </div>
                            <div class="form-group">
                                <label for="nama"> Nama Dokter </label>
                                <input type="text" class="form-control" id="nama" name="nama" disabled="">
                                <label for="nama"> Username Dokter </label>
                                <input type="text" class="form-control" id="username" name="username">
                            </div>
                            <div class="form-group">
                                <label for="nama"> Jam </label>
                                <input type="time" class="form-control" id="jam" name="jam">
                            </div>
                            <div class="form-group">
                                <label for="text"> Tanggal </label>
                                <input type="date" class="form-control" id="Tanggal" name="Tanggal">
                            </div>

                            <!--<div class="form-group">
                                <label for="nim">Pilih Dokter</label>
                                <select class= "form-control" id="Nama_Dokter" name="Nama_Dokter">
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
                                <select class= "form-control" id="Jadwal_Kosong" name="Jadwal_Kosong">
                                    <?php 
                                        foreach ($jadwalkosong as $data) { ?>
                                            <option name = "<?=$data['idjadwal']?>">
                                            <?= $data['tanggal']." pukul ".$data['jam']. " oleh dr. ".$data['nama'];  ?>
                                            </option>
                                        <?php } ?>
                                    ?>
                                </select>
                                <small class="form-text text-danger"><?= form_error('jadwal') ?>.</small>
                            </div>-->
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

    <script type="text/javascript">
        loadData();
        
        $(document).on("click",".select",function(){
            var idjadwal=$(this).attr("id");
            
            $.ajax({
                type : "POST",
                data : "idjadwal="+idjadwal,
                url : "http://localhost/doctorcare/index.php/C_Pasien/fetchJadwalKosong",
                success: function(result){
                    var resultObj = JSON.parse(result);
                    $("[name='idjadwal']").val(resultObj.idjadwal);
                    $("[name='nama']").val(resultObj.nama);
                    $("[name='username']").val(resultObj.Username_Dokter);
                    $("[name='jam']").val(resultObj.jam);
                    $("[name='Tanggal']").val(resultObj.tanggal);
                }
            });    
        });
        

        function loadData(){
            var dataHandler = $("#here");
            dataHandler.html("");
            $.ajax({
            type : "GET",
            data : "",
            url : "http://localhost/doctorcare/index.php/C_Pasien/getJadwalKosong",
            success: function(result){
                var resultObj = JSON.parse(result);
                var dataHandler = $("#here");

                $.each(resultObj,function(key,val){

                    var newRow= $("<tr>");
                    newRow.html("<td>"+val.nama+"</td><td>"+val.jam+"</td><td>"+val.tanggal+"</td><td><button class='select' type = 'button' id='"+val.idjadwal+"'>Select</button></td>");
                    dataHandler.append(newRow);
                })
            }
            });
        }
    </script>

    <?php 
        $this->load->view('template/navbar');
        $this->load->view('template/back'); 
        $this->load->view('template/footer');?>
</body>
</html>