
	<?php $this->load->view('layout/header');?>
	
	<section class="clearfix wrapper">
		<?php $this->load->view('layout/side'); ?>
		<div class="col-md-10 main-content">
			<div class="box box-info">
				<div class="box-header">
					<h3>Setting COA</h3>
					
					<div class="button-container">
						<a href="<?php echo base_url() ?>coa/tambah" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Coa</a>
					</div>
				</div>
				<div class="box-body">
					<table class="table table-bordered" width="100%">						
						</thead>
						<tbody>	

						<tr>								
							<td><b>1. Aset</b></td>															
							<td width="400px"></td>
						</tr>
						<?php 
						$no = 1;
						foreach($aset as $list){
						?>								
							
							<tr>								
								<td><span class="coa"><?php echo $list['code_akun'] ?> <?php echo $list['nama_akun'] ?></span></td>															
								<td width="400px">									
									<a href="<?php echo base_url();?>coa/rubah/<?php echo $list['id_coa'] ?>" class="btn  btn-xs btn-success">Ubah</a>
									<a href="<?php echo base_url();?>coa/hapus/<?php echo $list['id_coa'] ?>" class="btn  btn-xs btn-danger">Hapus</a>
								</td>
							</tr>
						<?php } ?>

						<tr>								
							<td><b>2. Utang</b></td>															
							<td width="400px"></td>
						</tr>
						<?php 
						$no = 1;
						foreach($utang as $list){
						?>								
							
							<tr>								
								<td><span class="coa"><?php echo $list['code_akun'] ?> <?php echo $list['nama_akun'] ?></span></td>															
								<td width="400px">									
									<a href="<?php echo base_url();?>coa/rubah/<?php echo $list['id_coa'] ?>" class="btn  btn-xs btn-success">Ubah</a>
									<a href="<?php echo base_url();?>coa/hapus/<?php echo $list['id_coa'] ?>" class="btn  btn-xs btn-danger">Hapus</a>
								</td>
							</tr>
						<?php } ?>

						<tr>								
							<td><b>3. Ekuitas Pemilik</b></td>															
							<td width="400px"></td>
						</tr>
						<?php 
						$no = 1;
						foreach($ekuitas as $list){
						?>								
							
							<tr>								
								<td><span class="coa"><?php echo $list['code_akun'] ?> <?php echo $list['nama_akun'] ?></span></td>															
								<td width="400px">									
									<a href="<?php echo base_url();?>coa/rubah/<?php echo $list['id_coa'] ?>" class="btn  btn-xs btn-success">Ubah</a>
									<a href="<?php echo base_url();?>coa/hapus/<?php echo $list['id_coa'] ?>" class="btn  btn-xs btn-danger">Hapus</a>
								</td>
							</tr>
						<?php } ?>

						<tr>								
							<td><b>4. Pendapatan</b></td>															
							<td width="400px"></td>
						</tr>
						<?php 
						$no = 1;
						foreach($pendapatan as $list){
						?>								
							
							<tr>								
								<td><span class="coa"><?php echo $list['code_akun'] ?> <?php echo $list['nama_akun'] ?></span></td>															
								<td width="400px">									
									<a href="<?php echo base_url();?>coa/rubah/<?php echo $list['id_coa'] ?>" class="btn  btn-xs btn-success">Ubah</a>
									<a href="<?php echo base_url();?>coa/hapus/<?php echo $list['id_coa'] ?>" class="btn  btn-xs btn-danger">Hapus</a>
								</td>
							</tr>
						<?php } ?>

						<tr>								
							<td><b>5. Beban</b></td>															
							<td width="400px"></td>
						</tr>
						<?php 
						$no = 1;
						foreach($beban as $list){
						?>								
							
							<tr>								
								<td><span class="coa"><?php echo $list['code_akun'] ?> <?php echo $list['nama_akun'] ?></span></td>															
								<td width="400px">									
									<a href="<?php echo base_url();?>coa/rubah/<?php echo $list['id_coa'] ?>" class="btn  btn-xs btn-success">Ubah</a>
									<a href="<?php echo base_url();?>coa/hapus/<?php echo $list['id_coa'] ?>" class="btn  btn-xs btn-danger">Hapus</a>
								</td>
							</tr>
						<?php } ?>
						<tr>								
							<td><b>6. Prive</b></td>															
							<td width="400px"></td>
						</tr>
						<?php 
						$no = 1;
						foreach($prive as $list){
						?>								
							
							<tr>								
								<td><span class="coa"><?php echo $list['code_akun'] ?> <?php echo $list['nama_akun'] ?></span></td>															
								<td width="400px">									
									<a href="<?php echo base_url();?>coa/rubah/<?php echo $list['id_coa'] ?>" class="btn  btn-xs btn-success">Ubah</a>
									<a href="<?php echo base_url();?>coa/hapus/<?php echo $list['id_coa'] ?>" class="btn  btn-xs btn-danger">Hapus</a>
								</td>
							</tr>
						<?php } ?>

						</tbody>
					</table>
				</div>
				
			</div>
			
		</div>
	</section>
	<!-- AKIR CODE MAIN KONTENT -->
	
	<?php $this->load->view('layout/footer'); ?>
