<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>DoctorCare</title>


    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/bootstrap/css/bootstrap.css'?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/datatables/css/jquery.dataTables.css'?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/datatables/css/dataTables.bootstrap4.css'?>">
</head>
<body>
<div class="container">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-12">
            <div class="col-md-12">
                <h1>Kelola Akun
                    <small>Dokter</small>
                    <div class="float-right"><a href="javascript:void(0);" class="btn btn-primary" data-toggle="modal" data-target="#Modal_Add"><span class="fa fa-plus"></span> Lengkapi Data</a></div>
                </h1>
            </div>
             
            <table class="table table-striped" id="mydata">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Alamat</th>
                        <th>Spesialis</th>
                        <th>Email</th>
                        <th>Telepon</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th style="text-align: right;">Actions</th>
                    </tr>
                </thead>
                <tbody id="show_data">
                     
                </tbody>
            </table>
        </div>
    </div>
         
</div>
 
        <!-- MODAL ADD -->
            <form>
            <div class="modal fade" id="Modal_Add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Lengkapi Data Dokter</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Nama</label>
                            <div class="col-md-10">
                              <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama Lengkap">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Jenis Kelamin</label>
                            <div class="col-md-10">
                              <input type="text" name="jeniskelamin" id="jeniskelamin" class="form-control" placeholder="ex: laki-laki">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Alamat</label>
                            <div class="col-md-10">
                              <input type="text" name="alamat" id="alamat" class="form-control" placeholder="Alamat Lengkap">
                            </div>
                        </div>
                         <div class="form-group row">
                            <label class="col-md-2 col-form-label">Spesialis</label>
                            <div class="col-md-10">
                              <input type="text" name="spesialis" id="spesialis" class="form-control" placeholder="ex: Dokter Jantung">
                            </div>
                        </div>
                         <div class="form-group row">
                            <label class="col-md-2 col-form-label">Email</label>
                            <div class="col-md-10">
                              <input type="text" name="email" id="email" class="form-control" placeholder="example@gmail.com">
                            </div>
                        </div>
                         <div class="form-group row">
                            <label class="col-md-2 col-form-label">Telepon</label>
                            <div class="col-md-10">
                              <input type="text" name="telp" id="telp" class="form-control" placeholder="ex: 089999999999">
                            </div>
                        </div>
                         <div class="form-group row">
                            <label class="col-md-2 col-form-label">Username</label>
                            <div class="col-md-10">
                              <input type="text" name="username" id="username" class="form-control" placeholder="username">
                            </div>
                        </div>
                         <div class="form-group row">
                            <label class="col-md-2 col-form-label">Password</label>
                            <div class="col-md-10">
                              <input type="text" name="password" id="password" class="form-control" placeholder="password">
                            </div>
                        </div>

                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" type="submit" id="btn_save" class="btn btn-primary">Save</button>
                  </div>
                </div>
              </div>
            </div>
            </form>
        <!--END MODAL ADD-->
 
        <!-- MODAL EDIT -->
        <form>
            <div class="modal fade" id="Modal_Edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data Dokter</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Nama</label>
                            <div class="col-md-10">
                              <input type="text" name="nama_edit" id="nama_edit" class="form-control" placeholder="Nama Lengkap" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Jenis Kelamin</label>
                            <div class="col-md-10">
                              <input type="text" name="jeniskelamin_edit" id="jeniskelamin_edit" class="form-control" placeholder="ex: laki-laki">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Alamat</label>
                            <div class="col-md-10">
                              <input type="text" name="alamat_edit" id="alamat_edit" class="form-control" placeholder="Alamat Lengkap">
                            </div>
                        </div>
                         <div class="form-group row">
                            <label class="col-md-2 col-form-label">Spesialis</label>
                            <div class="col-md-10">
                              <input type="text" name="spesialis_edit" id="spesialis_edit" class="form-control" placeholder="ex: Dokter Jantung">
                            </div>
                        </div>
                         <div class="form-group row">
                            <label class="col-md-2 col-form-label">Email</label>
                            <div class="col-md-10">
                              <input type="text" name="email_edit" id="email_edit" class="form-control" placeholder="example@gmail.com">
                            </div>
                        </div>
                         <div class="form-group row">
                            <label class="col-md-2 col-form-label">Telepon</label>
                            <div class="col-md-10">
                              <input type="text" name="telp_edit" id="telp_edit" class="form-control" placeholder="ex: 089999999999">
                            </div>
                        </div>
                         <div class="form-group row">
                            <label class="col-md-2 col-form-label">Username</label>
                            <div class="col-md-10">
                              <input type="text" name="username_edit" id="username_edit" class="form-control" placeholder="username">
                            </div>
                        </div>
                         <div class="form-group row">
                            <label class="col-md-2 col-form-label">Password</label>
                            <div class="col-md-10">
                              <input type="text" name="password_edit" id="password_edit" class="form-control" placeholder="Password">
                            </div>
                        </div>

                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" type="submit" id="btn_update" class="btn btn-primary">Update</button>
                  </div>
                </div>
              </div>
            </div>
            </form>
        <!--END MODAL EDIT-->
 
        <!--MODAL DELETE-->
         <form>
            <div class="modal fade" id="Modal_Delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Data Akun</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                       <strong>Apakah kamu yakin data ingin delete?</strong>
                  </div>
                  <div class="modal-footer">
                    <input type="hidden" name="username_delete" id="username_delete" class="form-control">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    <button type="button" type="submit" id="btn_delete" class="btn btn-primary">Yes</button>
                  </div>
                </div>
              </div>
            </div>
            </form>
    <?php 
        $this->load->view('template/navbar'); 
        $this->load->view('template/back');
        $this->load->view('template/footer'); ?>
        <!--END MODAL DELETE-->
 
<script type="text/javascript" src="<?php echo base_url().'assets/jquery/jquery-3.5.0.min.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/bootstrap/js/bootstrap.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/datatables/js/jquery.dataTables.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/datatables/js/dataTables.bootstrap4.js'?>"></script>
 
<script type="text/javascript">
    $(document).ready(function(){
        show_dokter(); //call function show all product
         
        $('#mydata').dataTable();
          
        //function show all product
        function show_dokter(){
            $.ajax({
                type  : 'ajax',
                url   : '<?php echo site_url('dokter/akun_data')?>',
                async : true,
                dataType : 'json',
                success : function(data){
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<tr>'+
                                '<td>'+data[i].nama+'</td>'+
                                '<td>'+data[i].jeniskelamin+'</td>'+
                                '<td>'+data[i].alamat+'</td>'+
                                '<td>'+data[i].spesialis+'</td>'+
                                '<td>'+data[i].email+'</td>'+
                                '<td>'+data[i].telp+'</td>'+
                                '<td>'+data[i].username+'</td>'+
                                '<td>'+data[i].password+'</td>'+

                                '<td style="text-align:right;">'+
                                    '<a href="javascript:void(0);" class="btn btn-info btn-sm item_edit" data-nama="'+data[i].nama+'" data-jeniskelamin="'+data[i].jeniskelamin+'" data-alamat="'+data[i].alamat+'" data-spesialis="'+data[i].spesialis+'" data-email="'+data[i].email+'" data-telp="'+data[i].telp+'" data-username="'+data[i].username+'" data-password="'+data[i].password+'" >Edit</a>'+' '+
                                    '<a href="javascript:void(0);" class="btn btn-danger btn-sm item_delete" data-nama="'+data[i].nama+'">Delete</a>'+
                                '</td>'+
                                '</tr>';
                    }
                    $('#show_data').html(html);
                }
 
            });
        }
 
        //Save product
        $('#btn_save').on('click',function(){
            var nama         = $('#nama').val();
            var jeniskelamin = $('#jeniskelamin').val();
            var alamat       = $('#alamat').val();
            var spesialis    = $('#spesialis').val();
            var email        = $('#email').val();
            var telp         = $('#telp').val();
            var username     = $('#username').val();
            var password     = $('#password').val();

            $.ajax({
                type : "POST",
                url  : "<?php echo site_url('dokter/save')?>",
                dataType : "JSON",
                data : {nama:nama , jeniskelamin:jeniskelamin, alamat:alamat, spesialis:spesialis, email:email, telp:telp, username:username, password:password},
                success: function(data){
                    $('[name="nama"]').val("");
                    $('[name="jeniskelamin"]').val("");
                    $('[name="alamat"]').val("");
                    $('[name="spesialis"]').val("");
                    $('[name="email"]').val("");
                    $('[name="telp"]').val("");
                    $('[name="username"]').val("");
                    $('[name="password"]').val("");
                    $('#Modal_Add').modal('hide');
                    show_dokter();
                }
            });
            return false;
        });
 
        //get data for update record
        $('#show_data').on('click','.item_edit',function(){
            var nama         = $(this).data('nama');
            var jeniskelamin = $(this).data('jeniskelamin');
            var alamat       = $(this).data('alamat');
            var spesialis    = $(this).data('spesialis');
            var email        = $(this).data('email');
            var telp         = $(this).data('telp');
            var username     = $(this).data('username');
            var password     = $(this).data('password');
            

            $('#Modal_Edit').modal('show');
            $('[name="nama_edit"]').val(nama);
            $('[name="jeniskelamin_edit"]').val(jeniskelamin);
            $('[name="alamat_edit"]').val(alamat);
            $('[name="spesialis_edit"]').val(spesialis);
            $('[name="email_edit"]').val(email);
            $('[name="telp_edit"]').val(telp);
            $('[name="username_edit"]').val(username);
            $('[name="password_edit"]').val(password);

        });
 
        //update record to database
         $('#btn_update').on('click',function(){
            var nama         = $('#nama_edit').val();
            var jeniskelamin = $('#jeniskelamin_edit').val();
            var alamat       = $('#alamat_edit').val();
            var spesialis    = $('#spesialis_edit').val();
            var email        = $('#email_edit').val();
            var telp         = $('#telp_edit').val();
            var username     = $('#username_edit').val();
            var password     = $('#password_edit').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo site_url('dokter/update')?>",
                dataType : "JSON",
                data : {nama:nama , jeniskelamin:jeniskelamin, alamat:alamat, spesialis:spesialis, email:email, telp:telp, username:username, password:password},
                success: function(data){
                    $('[name="nama_edit"]').val("");
                    $('[name="jeniskelamin_edit"]').val("");
                    $('[name="alamat_edit"]').val("");
                    $('[name="spesialis_edit"]').val("");
                    $('[name="email_edit"]').val("");
                    $('[name="telp_edit"]').val("");
                    $('[name="username_edit"]').val("");
                    $('[name="password_edit"]').val("");
                    $('#Modal_Edit').modal('hide');
                    show_dokter();
                }
            });
            return false;
        });
 
        //get data for delete record
        $('#show_data').on('click','.item_delete',function(){
            var nama = $(this).data('nama');
             
            $('#Modal_Delete').modal('show');
            $('[name="nama_delete"]').val(nama);
        });
 
        //delete record to database
         $('#btn_delete').on('click',function(){
            var nama = $('#nama_delete').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo site_url('dokter/delete')?>",
                dataType : "JSON",
                data : {nama:nama},
                success: function(data){
                    $('[name="nama_delete"]').val("");
                    $('#Modal_Delete').modal('hide');
                    show_dokter();
                }
            });
            return false;
        });
 
    });
 
</script>
</body>
</html>