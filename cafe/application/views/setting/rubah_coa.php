	
	<?php $this->load->view('layout/header');?>
	
	<!-- AWAL CODE MAIN CONTENT -->
	<section class="clearfix wrapper">
		<?php $this->load->view('layout/side'); ?>
		<div class="col-md-10 main-content">
			<div class="box box-info">
				<div class="box-header">
					<h3>Ubah COA</h3>
				</div>

				<form action="<?php echo base_url(). 'coa/update_coa'; ?>" method="post">
				<div class="box-body">

					<input type="hidden" class="form-control" name="id_coa" value="<?php echo $coa['id_coa'] ?>">
					<div class="form-group">
						<label for="">Code Coa</label>
						<select  id="" class="form-control" value="" disabled>
							<option value="1" <?php echo $coa['code_coa'] == '1' ? 'selected' : '' ?>>1. ASET</option>
							<option value="2" <?php echo $coa['code_coa'] == '2' ? 'selected' : '' ?>>2. UTANG</option>
							<option value="3" <?php echo $coa['code_coa'] == '3' ? 'selected' : '' ?>>3. EKUITAS PEMILIK</option>
							<option value="4" <?php echo $coa['code_coa'] == '4' ? 'selected' : '' ?>>4. PENDAPATAN</option>
							<option value="5" <?php echo $coa['code_coa'] == '5' ? 'selected' : '' ?>>5. BEBAN</option>
							<option value="6" <?php echo $coa['code_coa'] == '6' ? 'selected' : '' ?>>6. PRIVE</option>
						</select>	
						<input type="hidden" name="code_coa" value="<?php echo $coa['code_coa'] ?>">											
					</div>								
					<div class="form-group">
						<label for="">Code Akun</label>								
			             <input class="form-control" type="text" name="code_akun" value="<?php echo $coa['code_akun'] ?>" readonly>
												
			               
	                    
                    </div>
					<div class="form-group">
						<label for="">Nama Akun</label>
						<input type="text" class="form-control" name="nama_akun" value="<?php echo $coa['nama_akun'] ?>">
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
