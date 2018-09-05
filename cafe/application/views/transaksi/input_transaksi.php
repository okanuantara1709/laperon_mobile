	
	<?php $this->load->view('layout/header');?>
	
	<!-- AWAL CODE MAIN CONTENT -->
	<section class="clearfix wrapper">
		<?php $this->load->view('layout/side'); ?>
		<div class="col-md-10 main-content">
			<div class="box box-info">
				<div class="box-header">
					<h3>Tambah Transaksi </h3> 
				</div>



				<div class="transaksi_clone" style="display: none">
								
					
				</div>
				<form action="<?php echo base_url(). 'transaksi/tambah_transaksi'; ?>" method="post">
					<div class="box-body">
						<div class="form-group">
							<div>
								<span class="no-transaksi">No. Transaksi : <?php echo $id ?></span>
								<input type="hidden" name="id_transaksi" value="<?php echo $id ?>">
								<label form="" class="">Tanggal</label>
							</div>								
							<div class="input-group date tgl" data-provide="datepicker">
							    <input type="text" class="form-control date" name="tgl">
							    <div class="input-group-addon">
							        <span class="glyphicon glyphicon-th"></span>
							    </div>
							</div>					
						</div>
						<div class="form-group">
							<label for="">Keterangan Transaksi</label>
							<input type="text" name="keterangan" class="form-control">
						</div>
						<div class="transaksi_group">							
							<div class="transaksi_list">
								<div class="form-group input-transaksi">
									<label form="" class="">COA</label>	
									<select name="code_akun[]" class="form-control selectbox" id="">									
										<?php foreach ($coa_list as $key => $value) {
										?>
											<option value="<?php echo $value['code_akun'] ?>"><?php echo $value['code_akun']." ".$value['nama_akun'] ?></option>
										<?php
										} ?>
									</select>	
								</div>
							
								
								<div class="form-group input-transaksi">	
									<label form="" class="">Debet</label>										
									<input type="text" class="form-control debit_val" name="debit[]">
								</div>
								<div class="form-group input-transaksi">
									<label form="" class="">Kredit</label>
									
									<input type="text" class="form-control kredit_val" name="kredit[]">
								</div>
								
							</div>
							<div class="transaksi_list">
								<div class="form-group input-transaksi">
									<label form="" class="">COA</label>	
									<select name="code_akun[]" class="form-control selectbox" id="">									
										<?php foreach ($coa_list as $key => $value) {
										?>
											<option value="<?php echo $value['code_akun'] ?>"><?php echo $value['code_akun']." ".$value['nama_akun'] ?></option>
										<?php
										} ?>
									</select>	
								</div>	
								<div class="form-group input-transaksi">	
									<label form="" class="">Debet</label>										
									<input type="text" class="form-control debit_val" name="debit[]">
								</div>
								<div class="form-group input-transaksi">
									<label form="" class="">Kredit</label>									
									<input type="text" class="form-control kredit_val" name="kredit[]">
								</div>
								
							</div>
						</div> <!-- traksaksi_group -->
					<!-- 	<div class="tambah">			
								<a class="btn btn-success">Tambah</a>					
						</div>
						 -->
					
						<div class="box-footer">
							<button class="btn btn-success">Save</button>
							<a href="<?php echo base_url() ?>transaksi/data_transaksi" class="btn btn-default">Cancel</a>
						</div>
					</div>				
				</div>
			</form>
			
		</div>
	</section>
	<!-- AKIR CODE MAIN KONTENT -->
	

	<?php $this->load->view('layout/footer'); ?>