
	<?php $this->load->view('layout/header');?>

	<!-- AWAL CODE MAIN CONTENT -->
	<section class="clearfix wrapper">
		<?php $this->load->view('layout/side'); ?>
		<div class="col-md-10 main-content">
			<div class="box box-info">
				<div class="box-header">
					<h3>Tambah Data</h3>
				</div>
				<div class="box-body">															
					<div class="form-group">
						<label for="">Tgl</label>
						<input type="tgl" class="form-control" name="">
					</div>
					<div class="form-group">
						<label for="">Keterangan</label>
						<input type="keterangan" class="form-control" name="">
					</div>		
					<div class="form-group">
						<label for="">Ref</label>
						<input type="ref" class="form-control" name="">
					</div>
					<div class="form-group">
						<label for="">Debet</label>
						<input type="debet" class="form-control" name="">
					</div>		
					<div class="form-group">
						<label for="">Kredit</label>
						<input type="kredit" class="form-control" name="">
					</div>		
					<div class="form-group">
						<label for="">Saldo</label>
						<input type="saldo" class="form-control" name="">
					</div>								
				</div>
				<div class="box-footer">
					<button class="btn btn-success">Save</button>
				</div>
			</div>
			
		</div>
	</section>
	<!-- AKIR CODE MAIN KONTENT -->
	

	<?php $this->load->view('layout/footer'); ?>
