<!DOCTYPE html>
<html>
<head>
	<title>DoctorCare</title>

	<link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ;?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/datatables/css/dataTables.bootstrap.css') ;?>">
	 
</head>
<body>

<<<<<<< Updated upstream
=======
  	<div class="container" style="height: 120vh; position: relative; margin-top: 110px;">
    		<center><h1> Kelola Akun Pasien</h1></center>
    		<br> <br>
    		<img src="<?= base_url(); ?>/assets/datatables/images/pasien1.jpg">
    		<br> <br>
    		<h3>Akun Pasien</h3>

    		<button class="btn btn-success" onclick="show_edit()"><i class="glyphicon glyphicon-plus"></i>Edit Data</button>
    		<br>
    		<br> 

    		<table id="table_id" class="table table-bordered table table-hover">

      			<tbody>
          			<?php
          			foreach ($pasien as $Pasien) {
          				  if ($Pasien->username == $this->session->userdata('session_username')) {
          			?>
          			<tr>
            				<th width="600px">Nama</th>
            				<th><?php echo $Pasien->nama ;?></th>
          			</tr>
          			<tr>
            				<th>Jenis Kelamin</th>
            				<th><?php echo $Pasien->jeniskelamin ;?></th>
          			</tr>
          			<tr>
            				<th>Alamat</th>
            				<th><?php echo $Pasien->alamat ;?></th>
          			</tr>
          			<tr>
            				<th>Email</th>
            				<th><?php echo $Pasien->email ;?></th> 
          			</tr>
          			<tr>
            				<th>Telepon</th>
            				<th><?php echo $Pasien->telp ;?></th>
          			</tr>
          			<?php
    					         }
          				  }
          			?>
      		  </tbody>
  		  </table>
   	<center> 
        <button type="button" class="btn btn-danger" onclick="show_delete()">  HAPUS AKUN ANDA </button>
    </center>
  	</div>
  	<?php 
    		$this->load->view('template/navbar');
    		$this->load->view('template/back');
    		$this->load->view('template/footer');
  	?>

    <!-- MODAL EDIT -->
    <form>
        <div class="modal fade" id="Modal_Edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered mw-100 w-75" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Data Pasien</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span> </button>
                    </div>
                    <div class="modal-body">
                      <div class="form-group row">
                          <label class="col-md-2 col-form-label">Nama</label>
                          <div class="col-md-10">
                              <input type="text" name="nama_edit" id="nama_edit" class="form-control" placeholder="Nama Lengkap" value="<?php echo $this->session->userdata('session_nama'); ?>">
                          </div>
                      </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label"> Jenis Kelamin</label>
                        <input type="radio" id="Laki-laki" name="jeniskelamin" value="Laki-laki">
                        <label for="Laki-laki">Laki-Laki</label>
                        <input type="radio" id="Perempuan" name="jeniskelamin" value="Perempuan">
                        <label for="Perempuan">Perempuan</label>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Alamat</label>
                        <div class="col-md-10">
                            <input type="text" name="alamat_edit" id="alamat_edit" class="form-control" placeholder="Alamat Lengkap">
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
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete Data Akun</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <center> <strong>Apakah anda yakin ingin menghapus akun?</strong>
                        <p> Tindakan ini tidak akan bisa dibatalkan </br> 
                        Anda juga akan menghapus seluruh jadwal temu yang sudah anda buat </p> </center>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-primary" data-dismiss="modal">No</button>
                        <button type="button" type="submit" id="btn_delete" class="btn btn-danger">Yes</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!--END MODAL DELETE-->

    <!--MODAL EXITTING-->
    <form>
        <div class="modal fade" id="Modal_Exitting" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete Successful</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <center> <strong>Akun anda telah dihapus</strong>
                        <p> Anda akan dikembalikan ke halaman Login </p> </center>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="username_delete" id="username_delete" class="form-control">
                        <center> <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button> </center>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!--END MODAL EXITTING-->
 
<script type="text/javascript" src="<?php echo base_url().'assets/jquery/jquery-3.5.0.min.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/bootstrap/js/bootstrap.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/datatables/js/jquery.dataTables.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/datatables/js/dataTables.bootstrap4.js'?>"></script>
 
<script type="text/javascript">
    function show_edit() {
        $('#Modal_Edit').modal('show');
    }
>>>>>>> Stashed changes

	<div class="container">
		<center><h1>Kelola Akun Pasien</h1></center>
		<br> <br>
		<img src="<?= base_url(); ?>/assets/datatables/images/pasien1.jpg">
		<br> <br> <br>
		<h3>Akun Pasien</h3>

<<<<<<< Updated upstream
		<button class="btn btn-success" onclick="add_pasien()"><i class="glyphicon glyphicon-plus"></i>Lengkapi Data</button>
		<br>
		<br> 

		<table id="table_id" class="table table-stripped table-bordered">

			<tbody>
			<?php
			foreach ($pasien as $Pasien) {
				if ($Pasien->username == $this->session->userdata('session_username')) {
			?>

			<tr>
				<th width="300px">Nama</th>
				<th><?php echo $Pasien->nama ;?></th>
				 	<td>
						<button class="btn btn-warning" onclick="edit_pasien(<?php echo $Pasien->nama; ?>)"><i class="glyphicon glyphicon-pencil"></i></button>
						<button class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i></button>
					</td>
			</tr>

			<tr>
				<th>Jenis Kelamin</th>
				<th><?php echo $Pasien->jeniskelamin ;?></th>
				 	<td>
						<button class="btn btn-warning" onclick="edit_dokter(<?php echo $Pasien->jeniskelamin; ?>)"><i class="glyphicon glyphicon-pencil"></i></button>
						<button class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i></button>
					</td> 
			</tr>
			<tr>
				<th>Alamat</th>
				<th><?php echo $Pasien->alamat ;?></th>
					<td>
						<button class="btn btn-warning" onclick="edit_dokter(<?php echo $Pasien->alamat; ?>)"><i class="glyphicon glyphicon-pencil"></i></button>
						<button class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i></button>
					</td> 
			</tr>
			<tr>
				<th>Email</th>
				<th><?php echo $Pasien->email ;?></th>
					<td>
						<button class="btn btn-warning" onclick="edit_dokter(<?php echo $Pasien->email; ?>)"><i class="glyphicon glyphicon-pencil"></i></button>
						<button class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i></button>
					</td> 
			</tr>
			<tr>
				<th>Telepon</th>
				<th><?php echo $Pasien->telp ;?></th>
					<td>
						<button class="btn btn-warning" onclick="edit_dokter(<?php echo $Pasien->telp; ?>)"><i class="glyphicon glyphicon-pencil"></i></button>
						<button class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i></button>
					</td>
			</tr>

			<?php
					}
				}
			?>

		</tbody>

		<tr>
				<th>Username</th>
				<th>login</th>
				<td>
					<button class="btn btn-warning"><i class="glyphicon glyphicon-pencil"></i></button>
					<button class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i></button>
				</td>
			</tr>
			<tr>
				<th>Password</th>
				<th>login</th>
				<td>
					<button class="btn btn-warning"><i class="glyphicon glyphicon-pencil"></i></button>
					<button class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i></button>
				</td>
			</tr>

		</table>
=======
    $(document).ready(function(){
        //$('#mydata').dataTable();
 
        //Save product
        /*$('#btn_save').on('click',function(){
            var nama         = $('#nama').val();
            var jeniskelamin = $('#jeniskelamin').val();
            var alamat       = $('#alamat').val();
            var email        = $('#email').val();
            var telp         = $('#telp').val();
            var username     = $('#username').val();
            var password     = $('#password').val();

            $.ajax({
                type : "POST",
                url  : "<?php echo site_url('pasien/save')?>",
                dataType : "JSON",
                data : {nama:nama , jeniskelamin:jeniskelamin, alamat:alamat, email:email, telp:telp, username:username, password:password},
                success: function(data){
                    $('[name="nama"]').val("");
                    $('[name="jeniskelamin"]').val("");
                    $('[name="alamat"]').val("");
                    $('[name="email"]').val("");
                    $('[name="telp"]').val("");
                    $('[name="username"]').val("");
                    $('[name="password"]').val("");
                    $('#Modal_Add').modal('hide');
                    show_pasien();
                }
            });
            return false;
        });*/
 
        //get data for update record
        $('#show_data').on('click','.item_edit',function(){
            var nama         = $(this).data('nama');
            var jeniskelamin = $(this).data('jeniskelamin');
            var alamat       = $(this).data('alamat');
            var email        = $(this).data('email');
            var telp         = $(this).data('telp');
            var username     = $(this).data('username');
            var password     = $(this).data('password');
            

            $('#Modal_Edit').modal('show');
            $('[name="nama_edit"]').val(nama);
            $('[name="jeniskelamin_edit"]').val(jeniskelamin);
            $('[name="alamat_edit"]').val(alamat);
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
            var email        = $('#email_edit').val();
            var telp         = $('#telp_edit').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo site_url('pasien/update')?>",
                dataType : "JSON",
                data : {nama:nama , jeniskelamin:jeniskelamin, alamat:alamat, email:email, telp:telp},
                success: function(data){
                    $('[name="nama_edit"]').val("");
                    $('[name="jeniskelamin_edit"]').val("");
                    $('[name="alamat_edit"]').val("");
                    $('[name="email_edit"]').val("");
                    $('[name="telp_edit"]').val("");
                    $('#Modal_Edit').modal('hide');
                    location.reload();
                }
            });
            return false;
        });
 
        //get data for delete record
        $('#show_data').on('click','.item_delete',function(){
            var username = $(this).data('username');
             
            $('#Modal_Delete').modal('show');
            $('[name="username_delete"]').val(username);
        });
 
        //delete record to database
         $('#btn_delete').on('click',function(){
            $.ajax({
                type : "POST",
                url  : "<?php echo site_url('pasien/delete')?>",
                dataType : "JSON",
                success: function(result){
                    $('#Modal_Delete').modal('hide');
                    $('#Exitting_Modal').modal('show');
                    var url = "http://localhost/doctorcare/index.php/login/logout";
                    window.location = url;
                }
            });
            return false;
        });
 
    });
>>>>>>> Stashed changes
 
	</div>
	<?php 
		$this->load->view('template/back');
		$this->load->view('template/footer');
	?>



	<script src="<?php echo base_url('assets/jquery/jquery-3.5.0.min.js') ;?>"></script>
	<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js') ;?>"></script>
	<script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js') ;?>"></script>
	<script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.js') ;?>"></script>



	 
	<script type="text/javascript">
		$(document).ready(function(){
			$('#table_id').DataTable();
		});

		var save_method;
		var table;

		function add_pasien() {
			save_method = 'add';
			$('#form')[0].reset();
			$('#modal_form').modal('show');
		}

		function save() {
			var url;

			if (save_method == 'add') {
				url = '<?php echo site_url('index.php/pasien/pasien_add') ;?>';	
			}else {
				url = '<?php echo site_url('index.php/pasien/pasien_update') ;?>';
			}

			$.ajax({
				url: url,
				type: "POST",
				data: $('#form').serialize(),
				dataType: "JSON",
				success: function(data) {
					$('#modal_form').modal('hide');
					location.reload();
				}
				
				
			});
		}


		function edit_pasien(username) {
			save_method = 'update';
			$('#form')[0].reset();

			$.ajax({
				url: "<?php echo site_url('index.php/pasien/ajax_edit'); ?>/"+username,
				type: "GET",
				dataType: "JSON",
				success: function(data) {
					$('[nama="nama"]').val(data.nama);
					$('[nama="jeniskelamin"]').val(data.jeniskelamin);
					$('[nama="alamat"]').val(data.alamat);
					$('[nama="email"]').val(data.emmail);
					$('[nama="telp"]').val(data.telp);
					$('[nama="username"]').val(data.username);
					$('[nama="password"]').val(data.password);
					$('$modal_form').modal('show');
					$('.modal_title').text('Edit Dokter');
				},
				error: function(jqxhr, textStatus, errorThrown) {
					alert('Error Data');
				}
			});
		}
	</script>


	<div class="modal fade" id="modal_form" role="dialog">
    	<div class="modal-dialog" role="document">
    		<div class="modal-content">
      			<div class="modal-header">
        			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        			<h4 class="modal-title">Lengkapi Data Diri</h4>
      			</div>
      			<div class="modal-body form">
      			<form action="#" id="form" class="form-horizontal">
      				 <input type="hidden" value="" name="username">

 					 <div class="form-body">
		      			<div class="form-group">
		      				<label class="control-label col-md-3">Nama</label>
		      				<div class="col-md-9">
		      					<input type="text" name="nama" placeholder="Nama Lengkap" class="form-control">
		      				</div>
		      			</div>
		      		</div>     

		      		<div class="form-body">
		      			<div class="form-group">
		      				<label class="control-label col-md-3">Jenis Kelamin</label>
		      				<div class="col-md-9">
		      					<input type="text" name="jeniskelamin" placeholder="jenis kelamin" class="form-control">
		      				</div>
		      			</div>
		      		</div>     


		      		<div class="form-body">
      					<div class="form-group">
      						<label class="control-label col-md-3">Alamat</label>
      						<div class="col-md-9">
      							<input type="text" name="alamat" placeholder="Alamat Lengkap" class="form-control">
      						</div>
      					</div>
      				</div>


      				<div class="form-body">
      					<div class="form-group">
      						<label class="control-label col-md-3">Email</label>
      						<div class="col-md-9">
      							<input type="text" name="email" placeholder="Email" class="form-control">
      						</div>
      					</div>
      				</div>



      				<div class="form-body">
      					<div class="form-group">
      						<label class="control-label col-md-3">Telepon</label>
      						<div class="col-md-9">
      							<input type="text" name="telp" placeholder="Telepon" class="form-control">
      						</div>
      					</div>
      				</div>

      		    	<div class="form-body">
      					<div class="form-group">
      						<label class="control-label col-md-3">Username</label>
      						<div class="col-md-9">
      							<input type="text" name="username" placeholder="username" class="form-control">
      						</div>
      					</div>
      				</div>

      				<div class="form-body">
      					<div class="form-group">
      						<label class="control-label col-md-3">Password</label>
      						<div class="col-md-9">
      							<input type="text" name="password" placeholder="password" class="form-control">
      						</div>
      					</div>
      				</div> 

      			</form>
      			</div>

      			<div class="modal-footer">
        			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        			<button type="button" onclick="save()" class="btn btn-primary">Submit</button>
        		</div>
        	</div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal  --> 
    <?php 
    	$this->load->view('template/back'); 
    	$this->load->view('template/footer'); 
    ?>
</body>
</html>