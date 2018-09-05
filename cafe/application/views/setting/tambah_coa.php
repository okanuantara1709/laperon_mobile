	
	<?php $this->load->view('layout/header');?>
	
	<!-- AWAL CODE MAIN CONTENT -->
	<section class="clearfix wrapper">
		<?php $this->load->view('layout/side'); ?>
		<div class="col-md-10 main-content">
			<div class="box box-info">
				<div class="box-header">
					<h3>Tambah COA</h3>
				</div>
				
				<form action="<?php echo base_url(). 'coa/tambah_coa'; ?>" method="post">
				<?php if(!empty($_GET['status'])): ?>
					<div class="clearfix"></div>
					<div class="alert alert-danger alert-dismissible" role="alert">
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					  <strong>Gagal</strong> Code Akun sudah ada
					</div>
				<?php endif; ?>
				<div class="box-body">
					<div class="form-group">
						<label for="">Code Coa</label>
						<select name="code_coa" id=""  class="form-control code_coa_js" value="">
							<option value="1">1. HARTA</option>
							<option value="2">2. HUTANG</option>
							<option value="3">3. MODAL</option>
							<option value="4">4. PENDAPATAN</option>
							<option value="5">5. BEBAN</option>
							<option value="6">6. PRIVE</option>
						</select>												
					</div>								
					<div class="form-group">
						<label for="">Code Akun</label>									
						<div class="form-group input-group">						
			                <span class="input-group-addon cod_akun_addon">1.</span>
			                <input class="form-control" type="text" class="code_akun_js" name="code_akun">
	                    </div>
                    </div>
					<div class="form-group">
						<label for="">Nama Akun</label>
						<input type="text" class="form-control" name="nama_akun">
					</div>								
				</div>
				<div class="box-footer">
					<button class="btn btn-success">Save</button>
					<a href="<?php echo base_url() ?>coa/data_coa" class="btn btn-default">Cancel</a>
				</div>
			</div>
			</form>
			
		</div>
	</section>
	<!-- AKIR CODE MAIN KONTENT -->
	

	<?php $this->load->view('layout/footer'); ?>
