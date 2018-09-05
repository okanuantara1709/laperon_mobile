	
	<?php $this->load->view('owner/layout/header');?>
		
	<!-- AWAL CODE MAIN CONTENT -->
	<section class="clearfix wrapper">
		<?php $this->load->view('owner/layout/side'); ?>
		<div class="col-md-10 main-content">
			<div class="box box-info">
				<div class="box-header">
					<h3>Lihat Gaji Karyawan</h3>
				</div>

				<form action="<?php echo base_url(). 'gaji/tambah_gaji'; ?>" method="post">
					<div class="box-body">
						<!-- <form>						
							<div class="form-group nik">
								<label for="">ID Karyawan</label>
								<input type="text" class="form-control" name="nik" value="<?php echo $karyawan['nik'] ?>" readonly>
								<input type="hidden" class="form-control" name="id_karyawan" value="<?php echo $karyawan['id_karyawan'] ?>">
							</div>	
							<div class="form-group nik">
								<label for="">Nama Karyawan</label>
								<input type="text" class="form-control" name="nama_karyawan" value="<?php echo $karyawan['nama_karyawan'] ?>" readonly>
							</div>						
							<div class="filter-bln form-group no-pad">
								<label for="">Bulan</label>						
								<select class="form-control" name="bln">
								<?php $bln = array("Juanuari","Pebruari","Maret","April","Mei","Juni","Juli","Agustus","September","October","Nopember","Desember"); ?>
								<?php for($i=0;$i<12;$i++): ?>
									<option value="<?php echo $bln[$i]; ?>"><?php echo $bln[$i]; ?> </option>
								<?php endfor; ?>
								</select>				
							</div>													
							<div class="form-group filter-bln">								
								<label for="">Tanggal Bayar</label>						
								<div class="input-group date " data-provide="datepicker">						
								    <input type="text" class="form-control date" name="tgl_bayar">
								    <div class="input-group-addon">
								        <span class="glyphicon glyphicon-th"></span>
								    </div>
								</div><br>
							</div>
							<div class="form-group nik">
								<label for="">Total Gaji</label>
								<input type="text" class="form-control" name="total_gaji">
							</div>								
							<div class="box-footer">
								<input type="submit" class="btn btn-success" value="Bayar Gaji">
								<a href="<?php echo base_url() ?>gaji/data_gaji" class="btn btn-default">Cancel</a>
							</div>
						</form>	 -->
						<table class="table table-bordered">
							<thead>
								<tr>
									<th>Tanggal Bayar</th>
									<th>Gaji Bulan</th>
									<th>Total Gaji</th>
								</tr>
							</thead>
							<tbody>
							
							<?php foreach ($list_bayar as $key => $value):?>
								<tr>
									<td><?php echo $value['tanggal_bayar'] ?></td>
									<td><?php echo $value['gaji_bulan'] ?></td>
									<td>Rp. <?php echo number_format($value['total_gaji'] )?></td>
								</tr>
							<?php endforeach; ?>
							</tbody>
						</table>
					</div>
				</form>

		</div>
	</section>
	<!-- AKIR CODE MAIN KONTENT -->
	

	<?php $this->load->view('layout/footer'); ?>
