<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view("admin/_partials/head.php") ?>
</head>

<body id="page-top">

	<?php $this->load->view("admin/_partials/navbar.php") ?>
	<div id="wrapper">

		<?php $this->load->view("admin/_partials/sidebar.php") ?>

		<div id="content-wrapper">

			<div class="container-fluid">

				<?php $this->load->view("admin/_partials/breadcrumb.php") ?>

				<!-- DataTables -->
				<div class="card mb-3">
					<div class="card-header">
						
					</div>
					<div class="card-body">

						<div class="table-responsive">
							<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										
										<th>Nama Pembeli</th>
										<th>Nomor Telepon</th>
										<th>Alamat</th>
										<th>Tanggal Pembatalan</th>
										<th>Total Harga</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($batal_pembelian as $batal_pembelian): ?>
									<tr>
										
										<td>
											<?php echo $batal_pembelian->username ?>
										</td>
										<td>
											<?php echo $batal_pembelian->phone ?>
										</td>
										<td>
											<?php echo $batal_pembelian->alamat ?>
										</td>
										
										<td>
											<?php echo $batal_pembelian->tanggal_pembelian ?>
										</td>

										<td>
											Rp.<?php echo number_format($batal_pembelian->total_pembelian,0,',','.') ?>
										</td>

										<td width="184">
											<a href="<?php echo site_url('admin/batal_pembelian/detail/'.$batal_pembelian->id_pembelian) ?>"
											 class="btn btn-small"><i class="fas fa-search"></i> Detail</a>
											<a onclick="deleteConfirm('<?php echo site_url('admin/batal_pembelian/delete/'.$batal_pembelian->id_pembelian) ?>')"
											 href="#!" class="btn btn-small text-danger"><i class="fas fa-check"></i> Konfirmasi</a>
										</td>
									</tr>
									<?php endforeach; ?>

								</tbody>
							</table>
						</div>
					</div>
				</div>

			</div>
			<!-- /.container-fluid -->

			<!-- Sticky Footer -->
			<?php $this->load->view("admin/_partials/footer.php") ?>

		</div>
		<!-- /.content-wrapper -->

	</div>
	<!-- /#wrapper -->


	<?php $this->load->view("admin/_partials/scrolltop.php") ?>
	<?php $this->load->view("admin/_partials/modal.php") ?>

	<?php $this->load->view("admin/_partials/js.php") ?>

	<script>
	function deleteConfirm(url){
		$('#btn-delete8').attr('href', url);
		$('#batalpembelian').modal();
	}
	</script>
</body>

</html>
