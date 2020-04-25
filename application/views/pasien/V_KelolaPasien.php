<!DOCTYPE html>
<html>
<head>
	<title>DoctorCare</title>

	<link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ;?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/datatables/css/dataTables.bootstrap.css') ;?>">

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
	 
</head>
<body>


	<div class="container">
		<center><h1>Kelola Akun Pasien</h1></center>
		<br> <br>
		<img src="<?= base_url(); ?>/assets/datatables/images/pasien1.jpg">
		<br> <br> <br>
		<h3>Akun Pasien</h3>

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

	<div class="modal fade right" id="modal_form" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
      aria-hidden="true">

      <!-- Add class .modal-full-height and then add class .modal-right (or other classes from list above) to set a position to the modal -->
      <div class="modal-dialog modal-full-height modal-right" role="document">


        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title w-100" id="myModalLabel">Modal title</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            ...
          </div>
          <div class="modal-footer justify-content-center">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </div>
	
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
</body>
</html>