
	<?php $this->load->view('layout/header');?>
	
	<section class="clearfix wrapper">
		<?php $this->load->view('layout/side'); ?>
		<div class="col-md-10 main-content">
			<div class="box box-info">
				<div class="box-header">
					<h3>Laporan Jurnal Umum</h3>	
					<form action="" method="get">						
						<div class="filter-bulan no-pad">
							<select class="form-control" name="bulan">
								<?php 
								if(empty($_GET['bulan']) && empty($_GET['tahun'])){
									$bulan = date('m');
									$tahun = date('Y');
								}else{
									$bulan = $_GET['bulan'];
									$tahun = $_GET['tahun'];
								}
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
								for($i=$tahun_sekarang;$i>=2013;$i--){ 
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
						<button class="btn btn-default">Cari</button>
					</form>				
					
				</div>
				<div class="box-body" style="overflow: auto; height: 425px">
					<table class="table table-bordered" width="100%">

						<thead>
							<th>Tanggal</th>
							<th>Keterangan</th>
							<th>Coa</th>
							<th>Debet</th>
							<th>Kredit</th>		
						</thead>
						<tbody>		
						<?php 
							$id_transaksi = 'awal';
							foreach ($jurnal_umum as $key => $value) : 							
						?>	
							<tr>	
								<?php if($id_transaksi == 'awal' || $id_transaksi != $value['id_transaksi']): ?>
									<td rowspan="2" class="midle"><?php echo $value['tgl'] ?></td>
									<td rowspan="2" class="midle"><?php echo $value['keterangan'] ?></td>
								<?php endif; ?>
								<?php 
									if($value['kredit'] != 0){
										$tab = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
									}else{
										$tab = "";
									}
								?>
								<td><?php echo $tab.$value['code_akun']." ".$value['nama_akun'] ?></td>
								<td>Rp. <?php echo $value['debit'] ?></td>	
								<td>Rp. <?php echo $value['kredit'] ?></td>									
							</tr>						
						<?php
							$id_transaksi = $value['id_transaksi'];
							endforeach; 
						?>
							
						</tbody>
					</table>
				</div>
				
				<div class="box-footer button-toolbar">
					<div class="btn btn-default" id="create_pdf">Print PDF</div>
				</div>
			</div>
			
		</div>
	</section>
	<!-- AKIR CODE MAIN KONTENT -->
	
	<?php $this->load->view('layout/footer'); ?>
