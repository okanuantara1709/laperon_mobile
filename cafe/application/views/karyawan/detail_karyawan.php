
	<?php $this->load->view('layout/header');?>
	
	<section class="clearfix wrapper">
		<?php $this->load->view('layout/side'); ?>
		<div class="col-md-10 main-content">
			<div class="box box-info">
				<div class="box-header">
					<h3>Detail Karyawan</h3>				
					
				</div>
				<div class="box-body">
					<table class="table" width="100%">						
						<tbody>	

							<tr>
								<td width="400px"><b>NIK</b></td>
								<td>:</td>
								<td><?php echo $karyawan['nik'] ?></td>														
							</tr>
							<tr>
								<td><b>Nama Karyawan</b></td>
								<td>:</td>
								<td><?php echo $karyawan['nama_karyawan'] ?></td>														
							</tr>
							<tr>
								<td><b>Alamat</b></td>
								<td width="30px">:</td>
								<td><?php echo $karyawan['alamat'] ?></td>																
							</tr>
							<tr>
								<td><b>Tanggal Lahir</b></td>
								<td>:</td>
								<td><?php echo $karyawan['tgl'] ?></td>																
							</tr>
							<tr>
								<td><b>No Telpon</b></td>
								<td>:</td>
								<td><?php echo $karyawan['no_tlp'] ?></td>																
							</tr>
							<tr>
								<td><b>Jabatan</b></td>
								<td>:</td>
								<td><?php echo $karyawan['jabatan'] ?></td>																
							</tr>
							<tr>
								<td><b>Status</b></td>
								<td>:</td>
								<td><?php echo $karyawan['status'] ?></td>																	
							</tr>						

						</tbody>
					</table>

					<div class="box-footer">
						<a href="<?php echo base_url() ?>karyawan/data_karyawan" class="btn btn-default">Back</a>
					</div>
				</div>
				
			</div>
			
		</div>
	</section>
	<!-- AKIR CODE MAIN KONTENT -->
	
	<?php $this->load->view('layout/footer'); ?>
