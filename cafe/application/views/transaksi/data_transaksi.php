
	<?php $this->load->view('layout/header');?>
	
	<section class="clearfix wrapper">
		<?php $this->load->view('layout/side'); ?>
		<div class="col-md-10 main-content">
			<div class="box box-info">
				<div class="box-header">
					<h3>Transaksi</h3>
					
					<div class="button-container">
						<a href="<?php echo base_url() ?>transaksi/tambah" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Transaksi</a>
					</div>
					<br>
					<form action="" method="GET">						
						<div class="filter-bulan form-group no-pad">
							<select class="form-control" name="bulan">

							<?php 							
							$bln = array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"); ?>
							<?php 
								for($i=0;$i<12;$i++){ 
									if($bulan == ($i+1)){
										$selected = 'selected="selected"';
									}else{
										$selected = '';
									}
							?>
								<option value="<?php echo $i+1 ?>" <?php echo $selected ?>><?php echo $bln[$i]; ?> </option>
							<?php } ?>
							</select>
								
													
						</div>
						<div class="filter-tahun" >
							<select class="form-control" name="tahun">						
							<?php 
								$tahun_sekarang = date('Y'); 
								for($i=$tahun_sekarang;$i>=$tahun_sekarang-4;$i--){ 
									if($tahun == $i){
										$selected = 'selected="selected"';
									}else{
										$selected = '';
									}
							?>
										<option value="<?php echo $i ?>" <?php echo $selected ?>> <?php echo $i ?> </option>
							<?php } ?>
							</select>
						</div>
						<div class="col-md-1">
							<button type="submit" class="btn btn-default ">Cek</button>
						</div>
					</form>
				</div>
				<div class="box-body" style="overflow: auto;height: 460px;">
					<table class="table" width="100%">
						<thead>
							<th>No Transaksi</th>
							<th>Tanggal</th>							
							<th>Keterangan</th>
							<th>Total</th>								
							<th></th>
							<th></th>
						</thead>
						<tbody>

						<?php 
						$no = 1;
						$total = 0;
						foreach($transaksi as $list){ 
							$total += $list['total'];
						?>		
							<tr>
								<td><?php echo $list['id_transaksi'] ?></td>
								<td><?php echo $list['tgl'] ?></td>
								<td><?php echo $list['keterangan'] ?></td>	
								<td>Rp. <?php echo number_format($list['total']) ?></td>								
								<td></td>								
								<td width="200px">	
									<a href="<?php echo base_url();?>transaksi/detail_transaksi/<?php echo $list['id_transaksi'] ?>" class="btn  btn-xs btn-info">Lihat detail</a>								
									<a href="<?php echo base_url();?>transaksi/rubah/<?php echo $list['id_transaksi'] ?>" class="btn  btn-xs btn-success">Ubah</a>
									<a href="<?php echo base_url();?>transaksi/hapus/<?php echo $list['id_transaksi'] ?>" class="btn  btn-xs btn-danger" onclick="return confirm('Hapus data karyawan ? ');">Hapus</a>
								</td>
							</tr>
						<?php } ?>
						<tr>
							<td colspan="3" ><strong>Total</strong></td>
							<td colspan="2">Rp. <?php echo number_format($total) ?></td>
							<td colspan="2"></td>
						</tr>

						</tbody>
					</table>
				</div>
				
			</div>
			
		</div>
	</section>
	<!-- AKIR CODE MAIN KONTENT -->
	
	<?php $this->load->view('layout/footer'); ?>
