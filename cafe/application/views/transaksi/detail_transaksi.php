
	<?php $this->load->view('layout/header');?>
	
	<section class="clearfix wrapper">
		<?php $this->load->view('layout/side'); ?>
		<div class="col-md-10 main-content">
			<div class="box box-info">
				<div class="box-header">
					<h3>Detail Transaksi</h3>					
				</div>
				<div class="box-body">
					<div class="col-md-12 no-pad">
						<table class="table ">
							<tr>
								<td style="width: 150px;"><strong>No.Transaksi</strong></td>
								<td style="width: 20px">:</td>
								<td><?php echo $transaksi['id_transaksi'] ?></td>								
							</tr>
							<tr>
								<td style="width: 150px;"><strong>Tanggal</strong></td>
								<td style="width: 20px">:</td>
								<td><?php echo $transaksi['tgl'] ?></td>								
							</tr>
							<tr>
								<td style="width: 150px;"><strong>Keterangan</strong></td>
								<td style="width: 20px">:</td>
								<td><?php echo $transaksi['keterangan'] ?></td>								
							</tr>
						</table>
					</div>
					<table class="table" width="100%">
						<thead>
							<th>Coa</th>							
							<th>Debet</th>
							<th>Kredit</th>							
						</thead>
						<tbody>		
							<?php 
								foreach ($dtl_transaksi as $key => $value) {
							?>
								<tr>
									<td><?php echo $value['code_akun'] ?></td>
									<td>Rp. <?php echo number_format($value['debit']) ?></td>
									<td>Rp. <?php echo number_format($value['kredit']) ?></td>									
								</tr>	
							<?php	
								}
							 ?>					
							
												
						</tbody>
					</table>
					<div class="box-footer">
					<a href="javascript:history.go(-1)" class="btn btn-default">Back</a>
					</div>
				</div>
				
			</div>
			
		</div>
	</section>
	<!-- AKIR CODE MAIN KONTENT -->
	
	<?php $this->load->view('layout/footer'); ?>
