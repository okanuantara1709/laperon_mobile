
	<?php $this->load->view('owner/layout/header');?>
	
	<section class="clearfix wrapper">
		<?php $this->load->view('owner/layout/side'); ?>
		<div class="col-md-10 main-content">
			<div class="box box-info">
				<div class="box-header">
					<h3>Laporan Perubahan Modal</h3>
					
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
				<div class="box-body">
					<table class="table table-bordered" width="100%">
						<thead>
							<th colspan="3" class="judul-perubahan-modal">
							Rosetta Coffee Shop<br>
							Laporan Perubahan Modal<br>
							Per 31 Desember <?php  echo !empty($_GET['tahun']) ? $_GET['tahun'] : date('Y') ?>
							</th>													
						</thead>
						<tbody>						
							<tr>								
								<td>Modal Awal 1 Januari <?php  echo !empty($_GET['tahun']) ? $_GET['tahun'] : date('Y') ?></td>
								<td></td>
								<td>Rp. <?php  echo number_format($modal_awal) ?></td>								
							</tr>						
							<tr>								
								<td>Laba Bersih</td>
								<td>Rp. <?php echo number_format($laba_bersih) ?></td>
								<td></td>								
							</tr>
							<tr>								
								<td>Pengambilan Prive</td>
								<td><u>Rp. <?php  echo number_format($prive) ?></u></td>
								<td></td>								
							</tr>
							<tr>								
								<td>Penambahan Modal</td>
								<td></td>
								<td><u>Rp. <?php echo  number_format($penambahan_modal = $laba_bersih - $prive) ?></u></td>								
							</tr>
							<tr>								
								<td>Modal Akhir 31 Desember <?php  echo !empty($_GET['tahun']) ? $_GET['tahun'] : date('Y') ?></td>
								<td></td>
								<td>Rp. <?php  echo number_format($modal_awal + $penambahan_modal) ?></td>								
							</tr>							
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
