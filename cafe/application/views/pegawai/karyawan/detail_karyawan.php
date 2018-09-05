
	<?php $this->load->view('pegawai/layout/header');?>
	
	<section class="clearfix wrapper">
		<?php $this->load->view('pegawai/layout/side'); ?>
		<div class="col-md-10 main-content">
			<div class="box box-info">
				<div class="box-header">
					<h3>Informasi Personal</h3>				
					
				</div>
				<div class="box-body">
					<table class="table" width="100%">						
						<tbody>

						<?php 
						$no = 1;
						foreach($karyawan as $list){ 
						?>	

							<tr>
								<td width="400px"><b>NIK</b></td>
								<td>:</td>
								<td><?php echo $list['nik'] ?></td>													
							</tr>
							<tr>
								<td><b>Nama Karyawan</b></td>
								<td>:</td>
								<td><?php echo $list['nama_karyawan'] ?></td>										
							</tr>
							<tr>
								<td><b>Alamat</b></td>
								<td width="30px">:</td>
								<td><?php echo $list['alamat'] ?></td>													
							</tr>
							<tr>
								<td><b>Tanggal Lahir</b></td>
								<td>:</td>
								<td><?php echo $list['tgl'] ?></td>													
							</tr>
							<tr>
								<td><b>No Telpon</b></td>
								<td>:</td>
								<td><?php echo $list['no_tlp'] ?></td>												
							</tr>
							<tr>
								<td><b>Jabatan</b></td>
								<td>:</td>
								<td><?php echo $list['jabatan'] ?></td>														
							</tr>
							<tr>
								<td><b>Status</b></td>
								<td>:</td>
								<td><?php echo $list['status'] ?></td>														
							</tr>

						<?php } ?>


						</tbody>
					</table>					
					
					<a href="<?php echo base_url() ?>pegawai/karyawan/rubah" class="btn btn-default">Ubah</a>

				</div>				
			</div>
			
		</div>
	</section>
	<!-- AKIR CODE MAIN KONTENT -->
	
	<?php $this->load->view('layout/footer'); ?>
