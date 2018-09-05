
	<?php $this->load->view('owner/layout/header');?>
	
	<section class="clearfix wrapper">
		<?php $this->load->view('owner/layout/side'); ?>
		<div class="col-md-10 main-content">
			<div class="box box-info">
				<div class="box-header">
					<h3>Laporan Keuangan</h3>				
				</div>
				<div class="box-body menu-laporan">
					<div class="col-md-12 text-center">
						<div class="col-md-4">
							<a href="<?php echo base_url() ?>owner/laporan/data_jurnal_umum">
								<button>
									<div class="col-md-12"><i class="fa fa-list-alt"></i></div>
								</button>
								<div class="col-md-12 text-lp">JURNAL UMUM</div>
							</a>
						</div>
						<div class="col-md-4">
							<a href="<?php echo base_url() ?>owner/laporan/data_buku_besar">
								<button>
									<div class="col-md-12"><i class="fa fa-book"></i></div>
								</button>
								<div class="col-md-12 text-lp">BUKU BESAR</div>
							</a>
						</div>
						<div class="col-md-4">
							<a href="<?php echo base_url() ?>owner/laporan/data_neraca_saldo">
								<button>
									<div class="col-md-12"><i class="fa fa-balance-scale"></i></div>
								</button>
								<div class="col-md-12 text-lp">NERACA SALDO</div>
							</a>
						</div>	
					</div>
					
					<div class="col-md-12 text-center">
						<div class="col-md-4">
							<a href="<?php echo base_url() ?>owner/laporan/data_laba_rugi">
								<button>
									<div class="col-md-12"><i class="fa fa-line-chart"></i></div>
								</button>
								<div class="col-md-12 text-lp">LABA RUGI</div>
							</a>
						</div>
						<div class="col-md-4">
							<a href="<?php echo base_url() ?>owner/laporan/data_perubahan_modal">
								<button>
									<div class="col-md-12"><i class="fa fa-dollar"></i></div>
								</button>
								<div class="col-md-12 text-lp">PERUBAHAN MODAL</div>
							</a>
						</div>
							
					</div>
				</div>
				
			</div>
			
		</div>
	</section>
	<!-- AKIR CODE MAIN KONTENT -->
	
	<?php $this->load->view('layout/footer'); ?>
