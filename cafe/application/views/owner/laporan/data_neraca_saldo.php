
	<?php $this->load->view('owner/layout/header');?>
	
	<section class="clearfix wrapper">
		<?php $this->load->view('owner/layout/side'); ?>
		<div class="col-md-10 main-content">
			<div class="box box-info">
				<div class="box-header">
					<h3>Laporan Neraca Saldo</h3>					
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
										if($bulan == ($i)){
											$selected = 'selected="selected"';
										}else{
											$selected = '';
										}
								?>
									<option value="<?php echo $i ?>" <?php echo $selected ?>><?php echo $bln[$i]; ?> </option>
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
					<h4>
					Rosetta Coffee Shop<br>
					Neraca Saldo<br>
					<?php 
						$bulan = intval($bulan);
					 ?>
					<?php echo $bln[$bulan]." ".$tahun ?> 
					</h4>
					<table class="table" width="100%">
						<thead>
							<th>Kode Akun</th>
							<th>Nama Akun</th>
							<th>Debet</th>
							<th>Kredit</th>																		
							
						</thead>
						<tbody>
						<?php 
							$debit = 0;
							$kredit = 0;							
							foreach($neraca_saldo as $key => $value): 
						?>
							<tr>
								<td><?php echo $value['code_akun']; ?></td>
								<td><?php echo $value['nama_akun']; ?></td>
								<td>Rp. <?php echo number_format($value['debit']); ?></td>	
								<td>Rp. <?php echo number_format($value['kredit']); ?></td>														
								
							</tr>							
						<?php 
							$debit += intval($value['debit']);
							$kredit += intval($value['kredit']);
							endforeach; 

						?>							
						</tbody>
							<tr>
								<td></td>
								<td></td>
								<td><b>Rp. <?php echo number_format($debit) ?></b></td>
								<td><b>Rp. <?php echo number_format($kredit) ?></b></td>							
							</tr>
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
