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
    
    <title> Ubah Jadwal Temu</title>
</head>
<body>
    <?php $this->load->view('template/navbar'); ?>
    <h1 class="text-center" style="margin: 10px;"> Hapus Jadwal </h1>
    <div class="container"  style="margin-top: 100px; margin-bottom: 40px;">
        <div class="row mt-3">
            <div class="col md-6">
                <div class="card">
                    <div class="card-header text-center">
                        Form Hapus Jadwal Temu
                    </div>
                    <div class="card-body">
                        <table>
                            <thead>
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
                        <h2>Ubah Data</h2>
                        <table>
                            <tr>
                                <td>Jam</td>
                                <td>:</td>
                                <td><input type="text" name="jam"></td>
                            </tr>
                            <tr>
                                <td>Tanggal</td>
                                <td>:</td>
                                <td><input type="text" name="Tanggal"></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td><button onclick="hj()">Hapus Jadwal</button></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td id="error"></td>
                            </tr>
                        </table>
                       <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
                        <script type="text/javascript">

                            loadData();
                           
                            function hj(){
                                var idjadwal = $("[name='idjadwal']").val();
                                var jam = $("[name='jam']").val();
                                var Tanggal = $("[name='Tanggal']").val();

                                $.ajax({
                                    type : "POST",
                                    data : "idjadwal="+idjadwal+"jam="+jam+"TAnggal="+Tanggal,
                                    url : "http://localhost/doctorcare/index.php/C_Dokter/getData"
                                });
                             }
                            
                            function douj(){
                                $.ajax({
                                        type : "GET",
                                        data : "",
                                        url : "http://localhost/doctorcare/index.php/C_Dokter/getData",
                                        success: function(result){
                                            var resultObj = JSON.parse(result);

                                            $("[name='idjadwal']").val(resultObj.idjadwal);
                                            $("[name='Username_Dokter']").val(resultObj.Username_Dokter);
                                            $("[name='jam']").val(resultObj.jam);
                                            $("[name='Tanggal']").val(resultObj.Tanggal);
                                        }
                                });
                            }

                            $(document).on("click",".submit",function(){
                                    var idjadwal=$(this).attr("id");
                                    
                                    douj();   
                            });
                            function loadData(){
                                $.ajax({
                                    type : "GET",
                                    data : "",
                                    url : "http://localhost/doctorcare/index.php/C_Dokter/getData",
                                    success: function(result){
                                        var resultObj = JSON.parse(result);
                                        var dataHandler = $("#here");

                                        $.each(resultObj,function(key,val){

                                            var newRow= $("<tr>");
                                            newRow.html("<td>"+val.Username_Dokter+"</td><td>"+val.jam+"</td><td>"+val.Tanggal+"</td><td><button class='submit' id='"+val.idjadwal+"'>Select</button></td>");

                                        dataHandler.append(newRow);
                                        })
                                    
                                    }
                                });    
                            }
                            

                        </script>
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