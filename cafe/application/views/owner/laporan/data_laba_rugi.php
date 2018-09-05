
	<?php $this->load->view('owner/layout/header');?>
	
	<section class="clearfix wrapper">
		<?php $this->load->view('owner/layout/side'); ?>
		<div class="col-md-10 main-content">
			<div class="box box-info">
				<div class="box-header">
					<h3>Laporan Laba Rugi</h3>					
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
							<th colspan="3" class="judul-laba-rugi">
							Rosetta Coffee Shop<br>
							Laporan Laba Rugi<br>
							Untuk Tahun yang Berakhir 31 Desember <?php echo $tahun ?>
							</th>													
						</thead>
						<tbody>						
							<tr>								
								<td><u>Pendapatan :</u></td>
								<td></td>
								<td></td>								
							</tr>

							<?php 
								$tot_pendapatan=0;
								foreach ($pendapatan as $key => $value) :
							?>						
								<tr>								
									<td><?php echo $value['nama_akun'] ?></td>
									<td>Rp. <?php echo number_format( $value['kredit']) ?></td>
									<td></td>								
								</tr>	
							<?php
								$tot_pendapatan += $value['kredit'];
								endforeach;
							?>	
										
							<tr>								
								<td><span class="total">Total Pendapatan</span></td>
								<td></td>
								<td style="text-decoration: underline;">Rp. <?php echo number_format($tot_pendapatan)?></td>								
							</tr>
								
							<tr>								
								<td><u>Beban :</u></td>
								<td></td>
								<td></td>								
							</tr>						
							<?php 
								$tot_beban=0;
								foreach ($beban as $key => $value) :
							?>						
								<tr>								
									<td><?php echo $value['nama_akun'] ?></td>
									<td>Rp. <?php echo number_format($value['debit']) ?></td>
									<td></td>								
								</tr>	
							<?php
								$tot_beban += $value['debit'];
								endforeach;
							?>	
							<tr>								
								<td><span class="total">Total beban</span></td>
								<td></td>
								<td><u>Rp. <?php echo number_format($tot_beban) ?></u></td>								
							</tr>
							<tr>								
								<td>Laba Bersih</td>
								<td></td>
								<td><u>Rp. <?php echo number_format($tot_pendapatan-$tot_beban)  ?></u></td>								
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
