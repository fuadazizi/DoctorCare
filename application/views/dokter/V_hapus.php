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
    <title> Ubah Jadwal Temu</title>
</head>
<body>
    <?php $this->load->view('template/navbar'); ?>
    <div class="container" style="position: relative; top: 130px;">
    <h1 class="text-center" style="margin: 10px;"> Hapus Jadwal </h1>
    <div class="container"  style="margin-top: 100px; margin-bottom: 40px;">
        <div class="row mt-3">
            <div class="col md-6">
                <div class="card">
                    <div class="card-header text-center" > 
                        Form Hapus Jadwal Kosong
                    </div>
                    <div class="card-body">
                        <table>
                            <thead>
                                <tr>
                                    <th>Username Dokter</th>
                                    <th>Jam</th>
                                    <th>Tanggal</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody id="here">
                                
                            </tbody>
                        </table>
                        <table>
                             <tr>
                                <td><input type="text" name="idjadwal" hidden></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td id="error"></td>
                            </tr>
                        </table>
                       <script
                        src="https://code.jquery.com/jquery-3.5.0.min.js"
                        integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ="
                        crossorigin="anonymous"></script>

                        <script type="text/javascript">
                            
                            loadData();    

                            $(document).on("click",".hapus",function(){
                                var idjadwal=$(this).attr("id");
                                $.ajax({
                                    type : "POST",
                                    data : "idjadwal="+idjadwal,
                                    url : "http://localhost/doctorcare/index.php/C_Dokter/deleteData",
                                    success: function(result){
                                        var resultObj = JSON.parse(result);
                                        $("#error").html(resultObj.message);
                                        loadData();
                                    }
                                });
                            });
                           
                            

                            function loadData(){
                                var dataHandler = $("#here");
                                dataHandler.html("");
                                $.ajax({
                                type : "GET",
                                data : "",
                                url : "http://localhost/doctorcare/index.php/C_Dokter/getData",
                                success: function(result){
                                    var resultObj = JSON.parse(result);
                                    var dataHandler = $("#here");

                                    $.each(resultObj,function(key,val){

                                        var newRow= $("<tr>");
                                        newRow.html("<td>"+val.Username_Dokter+"</td><td>"+val.jam+"</td><td>"+val.Tanggal+"</td><td><button class='hapus' id='"+val.idjadwal+"'>Hapus Data</button></td>");

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
        $this->load->view('template/footer'); ?>
</body>
</html>