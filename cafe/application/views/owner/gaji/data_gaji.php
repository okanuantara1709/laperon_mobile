
	<?php $this->load->view('owner/layout/header');?>
	
	<section class="clearfix wrapper">
		<?php $this->load->view('owner/layout/side'); ?>
		<div class="col-md-10 main-content">
			<div class="box box-info">
				<div class="box-header">
					<h3>Gaji Karyawan</h3>
				</div>
				<div class="box-body">
					<table class="table" width="100%">
						<thead>
							<th>NIK</th>
							<th>Nama</th>
							<th>Jabatan</th>
							<th>Status</th>
							<th></th>
						</thead>
						<tbody>

						<?php 
						$no = 1;
						foreach($karyawan as $list){ 
						?>						
							<tr>
								<td><?php echo $list['nik'] ?></td>
								<td><?php echo $list['nama_karyawan'] ?></td>
								<td><?php echo $list['jabatan'] ?></td>
								<td><?php echo $list['status'] ?></td>
								<td width="200px">
									<a href="<?php echo base_url();?>owner/gaji/bayar_gaji/<?php echo $list['id_karyawan'] ?>" class="btn  btn-xs btn-info">Lihat detail</a>							
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
