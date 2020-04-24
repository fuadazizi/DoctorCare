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

    <script src= "https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"> </script> 

    <title> Ubah Jadwal Temu</title>
</head>
<body>
    <div class="container" style="margin-top: 140px; margin-bottom: 70px;">
        <div class="row mt-3">
            <div class="col md-6">
                <div class="card">
                    <div class="card-header text-center" >
                        Form Ubah Jadwal Temu
                    </div>
                    <div class="card-body">
                        <form action="" method="post">
                            <table class="table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Nama Dokter</th>
                                        <th>Jam</th>
                                        <th>Tanggal</th>
                                        <th>Penyakit</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody id="here">

                                </tbody>
                            </table>
                            <input type="hidden" name="id" id="id">
                            <div class="form-group">
                                <label for="nama">Username_Pasien</label>
                                <input type="text" class="form-control" id="Username_Pasien" name="Username_Pasien" disabled value= "<?php echo $this->session->userdata('session_username');?>">
                                <small class="form-text text-danger"><?= form_error('Username_Pasien') ?>.</small>
                            </div>
                            <div class="form-group">
                                <label for="text">Username_Dokter</label>
                                <input type="text" class="form-control" id="Username_Dokter" name="Username_Dokter" disabled>
                                <small class="form-text text-danger"><?= form_error('Username_Dokter') ?>.</small>
                            </div>
                            <div class="form-group">
                                <label for="text">Jam</label>
                                <input type="time" class="form-control" id="jam" name="jam">
                                <small class="form-text text-danger"><?= form_error('jam') ?>.</small>
                            </div>
                            <div class="form-group">
                                <label for="text">Tanggal</label>
                                <input type="date" class="form-control" id="Tanggal" name="Tanggal">
                                <small class="form-text text-danger"><?= form_error('Tanggal') ?>.</small>
                            </div>
                            <div class="form-group">
                                <label for="text">Penyakit</label>
                                <input type="text" class="form-control" id="Penyakit" name="Penyakit">
                                <small class="form-text text-danger"><?= form_error('Penyakit') ?>.</small>
                            </div>
                            <button type="submit" name="tambah" class="btn btn-primary float-right">Ubah Data</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> 

    <script
        src="https://code.jquery.com/jquery-3.5.0.min.js"
        integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ="
        crossorigin="anonymous"></script>
    <script type="text/javascript">
        loadData();
        
        $(document).on("click",".select",function(){
            var id=$(this).attr("id");
            
            $.ajax({
                type : "POST",
                data : "id="+id,
                url : "http://localhost/doctorcare/index.php/C_Pasien/fetchJadwalTemu",
                success: function(result){
                    var resultObj = JSON.parse(result);
                    $("[name='id']").val(resultObj.id);
                    $("[name='Username_Pasien']").val(resultObj.Username_Pasien);
                    $("[name='Username_Dokter']").val(resultObj.Username_Dokter);
                    $("[name='jam']").val(resultObj.jam);
                    $("[name='Tanggal']").val(resultObj.Tanggal);
                    $("[name='Penyakit']").val(resultObj.Penyakit);
                }
            });    
        });
        

        function loadData(){
            var dataHandler = $("#here");
            dataHandler.html("");
            $.ajax({
            type : "GET",
            data : "",
            url : "http://localhost/doctorcare/index.php/C_Pasien/getJadwalTemu",
            success: function(result){
                var resultObj = JSON.parse(result);
                var dataHandler = $("#here");

                $.each(resultObj,function(key,val){

                    var newRow= $("<tr>");
                    newRow.html("<td>"+val.nama+"</td><td>"+val.jam+"</td><td>"+val.Tanggal+"</td><td>"+val.Penyakit+"</td><td><button class='select' type = 'button' id='"+val.id+"'>Select</button></td>");
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