	
	<?php $this->load->view('pegawai/layout/header');?>
		
	<!-- AWAL CODE MAIN CONTENT -->
	<section class="clearfix wrapper">
		<?php $this->load->view('pegawai/layout/side'); ?>
		<div class="col-md-10 main-content">
			<div class="box box-info">
				<div class="box-header">
					<h3>Informasi Gaji Personal</h3>
				</div>
				
					<div class="box-body">						
						<table class="table table-bordered">
							<thead>
								<tr>
									<th>Tanggal Bayar</th>
									<th>Gaji Bulan</th>
									<th>Total Gaji</th>
									<th></th>
								</tr>
							</thead>
							<tbody>

							<?php 
							$no = 1;
							foreach($gaji as $list){ 
							?>							
								<tr>
									<td><?php echo $list['tanggal_bayar'] ?></td>
									<td><?php echo $list['gaji_bulan'] ?></td>
									<td>Rp. <?php echo number_format($list['total_gaji']) ?></td>
									<td>
										<a href="<?php echo base_url() ?>pegawai/gaji_karyawan/slip_gaji/<?php  echo $list['id_gaji']?>" class="btn btn-info btn-xs">Slip Gaji</a>
									</td>
								</tr>
							<?php } ?>

							</tbody>
						</table>
					</div>				

		</div>
	</section>
	<!-- AKIR CODE MAIN KONTENT -->
	

	<?php $this->load->view('layout/footer'); ?>
