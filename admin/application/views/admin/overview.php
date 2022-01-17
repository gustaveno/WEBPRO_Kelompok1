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

        <!-- 
        karena ini halaman overview (home), kita matikan partial breadcrumb.
        Jika anda ingin mengampilkan breadcrumb di halaman overview,
        silahkan hilangkan komentar (//) di tag PHP di bawah.
        -->
		<?php //$this->load->view("admin/_partials/breadcrumb.php") ?>

		<!-- Icon Cards-->
		<div class="row">
			<div class="col-xl-3 col-sm-6 mb-3">
			<div class="card text-white bg-primary o-hidden h-100">
				<div class="card-body">
				<div class="card-body-icon">
					<i class="fas fa-fw fa-boxes"></i>
				</div>
				<div class="mr-5"><?php echo $this->db->count_all('products'); ?> Produk</div>
				</div>
				<a class="card-footer text-white clearfix small z-1" href="<?php echo site_url('admin/products') ?>">
				<span class="float-left">Lihat Detail</span>
				<span class="float-right">
					<i class="fas fa-angle-right"></i>
				</span>
				</a>
			</div>
			</div>
			<div class="col-xl-3 col-sm-6 mb-3">
			<div class="card text-white bg-warning o-hidden h-100">
				<div class="card-body">
				<div class="card-body-icon">
					<i class="fas fa-fw fa-list"></i>
				</div>
				<div class="mr-5"><?php echo $this->db->count_all('kategori'); ?> Kategori</div>
				</div>
				<a class="card-footer text-white clearfix small z-1" href="<?php echo site_url('admin/kategori') ?>">
				<span class="float-left">Lihat Detail</span>
				<span class="float-right">
					<i class="fas fa-angle-right"></i>
				</span>
				</a>
			</div>
			</div>
			<div class="col-xl-3 col-sm-6 mb-3">
			<div class="card text-white bg-success o-hidden h-100">
				<div class="card-body">
				<div class="card-body-icon">
					<i class="fas fa-fw fa-shopping-cart"></i>
				</div>
				<div class="mr-5"><?php echo $this->db->count_all('pembelian'); ?> pembelian</div>
				</div>
				<a class="card-footer text-white clearfix small z-1" href="<?php echo site_url('admin/pembelian') ?>">
				<span class="float-left">Lihat Detail</span>
				<span class="float-right">
					<i class="fas fa-angle-right"></i>
				</span>
				</a>
			</div>
			</div>
			<div class="col-xl-3 col-sm-6 mb-3">
			<div class="card text-white bg-danger o-hidden h-100">
				<div class="card-body">
				<div class="card-body-icon">
					<i class="fas fa-fw fa-times-circle"></i>
				</div>
				<div class="mr-5"><?php echo $this->db->count_all('batal_pembelian'); ?> Batal Pembelian</div>
				</div>
				<a class="card-footer text-white clearfix small z-1" href="<?php echo site_url('admin/batal_pembelian') ?>">
				<span class="float-left">Lihat Detail</span>
				<span class="float-right">
					<i class="fas fa-angle-right"></i>
				</span>
				</a>
			</div>
			</div>
		</div>

		<!-- area tabel pembelian -->

		<div class="card mb-3">
					<div class="card-header">
						<a href="<?php echo site_url('admin/pembelian') ?>"><i class="fas fa-shopping-cart"></i> Lihat Detail pembelian</a>
					</div>
					<div class="card-body">

						<div class="table-responsive">
							<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>Nama Pelanggan</th>
										<th>Tanggal Pembelian</th>
										<th>Total Harga</th>
										
									</tr>
								</thead>
								<tbody>
									<?php foreach ($pembelian as $pembelian): ?>
									<tr>
										<td>
											<?php echo $pembelian->username ?>
										</td>
										<td>
											<?php echo $pembelian->tanggal_pembelian ?>
										</td>
										<td>
											Rp.<?php echo number_format($pembelian->total_pembelian,0,',','.') ?>
										</td>
										
									</tr>
									<?php endforeach; ?>

								</tbody>
							</table>
						</div>
					</div>
				</div>

		<!-- Area Chart Example-->
		<!-- <div class="card mb-3">
			<div class="card-header">
			<i class="fas fa-chart-area"></i>
			Visitor Stats</div>
			<div class="card-body">
			<canvas id="myAreaChart" width="100%" height="30"></canvas>
			</div>
			<div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
		</div> -->

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
    
</body>
</html>
