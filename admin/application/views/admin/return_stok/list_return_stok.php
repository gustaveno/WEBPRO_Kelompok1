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
									<?php foreach ($return_stok as $return_stok): ?>
									<tr>
										
										<td>
											<?php echo $return_stok->username ?>
										</td>
										<td>
											<?php echo $return_stok->phone ?>
										</td>
										<td>
											<?php echo $return_stok->alamat ?>
										</td>
										
										<td>
											<?php echo $return_stok->tanggal_pembelian ?>
										</td>

										<td>
											Rp.<?php echo number_format($return_stok->total_pembelian,0,',','.') ?>
										</td>

										<td width="184">
											<a href="<?php echo site_url('admin/return_stok/detail/'.$return_stok->id_pembelian) ?>"
											 class="btn btn-small"><i class="fas fa-search"></i> Detail</a>
											<a onclick="deleteConfirm('<?php echo site_url('admin/return_stok/delete/'.$return_stok->id_pembelian) ?>')"
											 href="#!" class="btn btn-small text-danger"><i class="fas fa-retweet"></i> Re to Order</a>
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
		$('#btn-delete9').attr('href', url);
		$('#returnstok').modal();
	}
	</script>
</body>

</html>
