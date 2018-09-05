	
	<?php $this->load->view('gaji/layout/header');?>
		
	<!-- AWAL CODE MAIN CONTENT -->
	<section class="clearfix wrapper">
		<?php $this->load->view('gaji/layout/side'); ?>
		<div class="col-md-10 main-content">
			<div class="box box-info">
				<div class="box-header">
					<h3>Data Gaji Karyawan</h3>
				</div>
				
					<div class="box-body">						
						<table class="table table-bordered">
							<thead>
								<tr>
									<th>Tanggal Bayar</th>
									<th>Gaji Bulan</th>
									<th>Total Gaji</th>
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
								</tr>
							<?php } ?>

							</tbody>
						</table>
					</div>				

		</div>
	</section>
	<!-- AKIR CODE MAIN KONTENT -->
	

	<?php $this->load->view('layout/footer'); ?>
