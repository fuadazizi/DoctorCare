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
        <div class="row mt-3">
            <div class="col md-6">
                <div class="card">
                    <div class="card-header text-center" > 
                        Form Ubah Jadwal Temu
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
                        <h2>Ubah Data</h2>
                        <table>
                             <tr>
                                <td><input type="text" name="idjadwal" hidden=""></td>
                            </tr>
                            <tr>
                                <td>Jam</td>
                                <td>:</td>
                                <td><input type="time" class="form-control" id="jam" name="jam"></td>
                            </tr>
                            <tr>
                                <td>Tanggal</td>
                                <td>:</td>
                                <td><input type="date" class="form-control" id="Tanggal"name="Tanggal"></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td><button onclick="uj()">Update Jadwal</button></td>
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
                            function uj(){
                                var idjadwal = $("[name=idjadwal]").val();
                                var jam = $("[name='jam']").val();
                                var Tangga = $("[name='Tanggal']").val();
                                console.log(Tangga); 
                                $.ajax({
                                    type : "POST",
                                    data : "idjadwal="+idjadwal+"&jam="+jam+"&Tangga="+Tangga,
                                    url : "http://localhost/doctorcare/index.php/C_Dokter/doUpdateData",
                                    success: function(result){
                                        var resultObj = JSON.parse(result);
                                        $("#error").html(resultObj.message);

                                        loadData();
                                    }
                                });
                             }

                            
                            $(document).on("click",".select",function(){
                                var idjadwal=$(this).attr("id");
                                
                                $.ajax({
                                    type : "POST",
                                    data : "idjadwal="+idjadwal,
                                    url : "http://localhost/doctorcare/index.php/C_Dokter/updateData",
                                    success: function(result){
                                        var resultObj = JSON.parse(result);

                                        $("[name='idjadwal']").val(resultObj.idjadwal);
                                        $("[name='jam']").val(resultObj.jam);
                                        $("[name='Tanggal']").val(resultObj.Tanggal);
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
                                        newRow.html("<td>"+val.Username_Dokter+"</td><td>"+val.jam+"</td><td>"+val.Tanggal+"</td><td><button class='select' id='"+val.idjadwal+"'>Select</button></td>");

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