
	<?php $this->load->view('layout/header');?>
	
	<section class="clearfix wrapper">
		<?php $this->load->view('layout/side'); ?>
		<div class="col-md-10 main-content">
			<div class="box box-info">
				<div class="box-header">
					<h3>Laporan Buku Besar</h3>					
										
					<form action="" method="get">						
						<div class="form-group filter-bulan">

							<select name="coa" id="" class="form-control">
								<?php foreach ($coa_list as $key => $value) {
									$select = '';
									if($value['code_akun'] == $_GET['coa']){
										$select = 'selected="selected"';
									}
								?>
									<option value="<?php echo $value['code_akun'] ?>" <?php echo $select ?>><?php echo $value['code_akun']." ".$value['nama_akun'] ?></option>
								<?php
								} ?>
							</select>
						</div>
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
				<div class="box-body" style="overflow: auto; height: 450px">
							
					<h4><?php echo $coa." ".$nama_coa ?></h4>
					<table class="table table-bordered" width="100%">
						<thead>
							<tr>
								<th rowspan="1" class="midle">Tanggal</th>
								<th rowspan="1" class="midle">Keterangan</th>
								<th rowspan="1" class="midle">Coa</th>
								<th rowspan="1" class="midle">Debet</th>
								<th rowspan="1" class="midle">Kredit</th>
								<th colspan="1" class="text-center">Saldo</th>								
							</tr>
								
							</tr>
						</thead>
						<tbody>
							<tr>	
							
								<td><?php echo date('01-m-Y') ?></td>
								<td><?php echo "Saldo Awal" ?></td>								
								<td><?php echo $coa." ".$nama_coa ?></td>
								<td>Rp. <?php echo  number_format(intval($saldo_awal['debit'])) ?></td>	
								<td>Rp. <?php echo  number_format(intval($saldo_awal['kredit']))  ?></td>	
								<td>Rp. <?php echo number_format(intval($saldo_awal['debit']) - intval($saldo_awal['kredit'])) ?></td>	
										
							</tr>	
						<?php 
							$saldo = $saldo_awal['debit'] - $saldo_awal['kredit'];
							foreach ($buku_besar as $key => $value) : 	
							$saldo += $value['debit'];
							$saldo -= $value['kredit'];						
						?>	
							<tr>	
							
								<td><?php echo $value['tgl'] ?></td>
								<td><?php echo $value['keterangan'] ?></td>								
								<td><?php echo $value['code_akun']." ".$value['nama_akun'] ?></td>
								<td>Rp. <?php echo number_format($value['debit']) ?></td>	
								<td>Rp. <?php echo number_format($value['kredit']) ?></td>	
								<td>Rp. <?php echo number_format($saldo) ?></td>															
							</tr>						
						<?php

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
