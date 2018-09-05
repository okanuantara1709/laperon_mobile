	
	<?php $this->load->view('pegawai/layout/header');?>
		
	<!-- AWAL CODE MAIN CONTENT -->
	<section class="clearfix wrapper">
		<?php $this->load->view('pegawai/layout/side'); ?>
		<div class="col-md-10 main-content">
			<div class="box box-info">
				<div class="box-header text-center">
					<h3 style="display: none;">SLIP GAJI</h3>
					<img src="<?php echo base_url() ?>/assets/images/logo.png" width="150px">							
				</div>				
				<div class="box-body">	
					<div class="col-md-12 text-center">
						<h3><strong>SLIP GAJI</strong></h3>
						<br>
					</div>					
					<table class="table">
						<thead>
							<tr>
								<th  style="width: 100px"></th>
								<th style="width: 10px"></th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>Nama</td>
								<td>:</td>
								<td><?php echo $gaji['nama_karyawan'] ?></td>
							</tr>
							<tr>
								<td>NIK</td>
								<td>:</td>
								<td><?php echo $gaji['nik'] ?></td>
							</tr>
							<tr>
								<td>Jabatan</td>
								<td>:</td>
								<td><?php echo $gaji['jabatan'] ?></td>
							</tr>
							<tr>
								<td>Status</td>
								<td>:</td>
								<td><?php echo $gaji['status'] ?></td>
							</tr>
							<tr>
								<td>Periode</td>
								<td>:</td>
								<td><?php echo $gaji['gaji_bulan'] ?></td>
							</tr>
							<tr>
								<td>Tanggal Bayar</td>
								<td>:</td>
								<td><?php echo $gaji['tanggal_bayar'] ?></td>
							</tr>
						</tbody>
					</table>
					<table class="table">
						<thead>
							<tr>
								<th>Keterangan</th>
								<th>Jumlah</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>Total Gaji</td>
								<td>Rp. <?php echo number_format($gaji['total_gaji']) ?></td>
							</tr>
						</tbody>
					</table>
				</div>	
				<div class="box-footer">
					<button class="btn btn-default" id="create_pdf">Print</button>
				</div>			

		</div>
	</section>
	<!-- AKIR CODE MAIN KONTENT -->
	

	<?php $this->load->view('layout/footer'); ?>
