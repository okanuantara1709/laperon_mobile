	
	<?php $this->load->view('layout/header');?>
		
	<!-- AWAL CODE MAIN CONTENT -->
	<section class="clearfix wrapper">
		<?php $this->load->view('layout/side'); ?>
		<div class="col-md-10 main-content">
			<div class="box box-info">
				<div class="box-header">
					<h3>Tambah Karyawan</h3>
				</div>

				<form action="<?php echo base_url(). 'karyawan/tambah_karyawan'; ?>" method="post">
					<div class="box-body">
						<div class="form-group">
							<label for="">NIK</label>
							<input type="text" class="form-control" name="nik">
						</div>
						<div class="form-group">
							<label for="">Nama Karyawan</label>
							<input type="text" class="form-control" name="nama_karyawan">
						</div>
						<div class="form-group">
							<label for="">Alamat</label>
							<input type="text" class="form-control" name="alamat">
						</div>						
						<div class="form-group">
							<div>								
								<label form="" class="">Tanggal</label>
							</div>								
							<div class="input-group date" data-provide="datepicker">
							    <input class="form-control date" name="tgl" type="text">
							    <div class="input-group-addon">
							        <span class="glyphicon glyphicon-th"></span>
							    </div>
							</div>					
						</div>

						<div class="form-group">
							<label for="">No Telpon</label>
							<input type="text" class="form-control" name="no_tlp">
						</div>
						<div class="form-group">
							<label for="">Jabatan</label>
							<select name="jabatan" id="" class="form-control">
								<option value="Manager">Manager</option>
								<option value="Chef">Chef</option>
								<option value="Kitchen">Kitchen</option>
								<option value="Waiter">Waiter</option>
								<option value="Waitress">Waitress</option>
								<option value="Cashier">Cashier</option>
								<option value="Trainee">Trainee</option>
							</select>												
						</div>
						<div class="form-group">
							<label for="">Status</label>
							<select name="status" id="" class="form-control">
								<option value="Aktif">Aktif</option>
								<option value="Tidak Aktif">Tidak Aktif</option>
							</select>												
						</div>
						<div class="form-group">
							<label for="">Password</label>
							<input type="password" class="form-control" name="password">
						</div>
						<div class="box-footer">
							<input type="submit" class="btn btn-success" value="Save">
							<a href="<?php echo base_url() ?>karyawan/data_karyawan" class="btn btn-default">Cancel</a>
						</div>
					</div>
				</form>

		</div>
	</section>
	<!-- AKIR CODE MAIN KONTENT -->
	

	<?php $this->load->view('layout/footer'); ?>
