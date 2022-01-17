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

				<?php if ($this->session->flashdata('success')): ?>
				<div class="alert alert-success" role="alert">
					<?php echo $this->session->flashdata('success'); ?>
				</div>
				<?php endif; ?>

				<!-- Card  -->
				<div class="card mb-3">
					<div class="card-header">

						<a href="<?php echo site_url('admin/pembelian/') ?>"><i class="fas fa-arrow-left"></i>
							Kembali</a>
					</div>

					<div class="card-body">

						<div class="table-responsive">
							<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										
										<th>id produk</th>
										<th>nama produk</th>
										<th>Gambar</th>
										<th>jumlah pesanan</th>
										<th>harga satuan</th>
										<th>sub total</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$total = 0;
									foreach ($pembelian_produk as $pembelian_produk):
										$subtotal = $pembelian_produk->jumlah * $pembelian_produk->harga;
										$total += $subtotal;
									?>

									<tr>
										<td><?php echo $pembelian_produk->id_produk ?></td>
										<td><?php echo $pembelian_produk->nama ?></td>
										<td>
											<img src="<?php echo base_url('upload/product/'.$pembelian_produk->foto) ?>" width="64" />
										</td>
										<td><?php echo $pembelian_produk->jumlah ?></td>
										<td><?php echo number_format($pembelian_produk->harga,0,',','.') ?></td>
										<td><?php echo number_format($subtotal,0,',','.') ?></td>
									</tr>
									
									<?php endforeach; ?>

									<tr>
										<td colspan="5" align="right"><b>Total</b></td>
										<td align="right"><b>Rp. <?php echo number_format($total,0,',','.') ?></b></td>
									</tr>

								</tbody>
							</table>
						</div>
					</div>

					<div class="card-footer small text-muted">
						* required fields
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

		<?php $this->load->view("admin/_partials/js.php") ?>

</body>

</html>
