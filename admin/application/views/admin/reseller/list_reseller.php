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
						<a href="<?php echo site_url('admin/reseller/add') ?>"><i class="fas fa-plus"></i> Tambah Reseller</a>
					</div>
					<div class="card-body">

						<div class="table-responsive">
							<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>Nama</th>
										<th>Phone</th>
										<th>Email</th>
										<th>Photo</th>
										<th>Alamat</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($reseller as $reseller): ?>
									<tr>
										<td width="150">
											<?php echo $reseller->username ?>
										</td>
										<td>
											<?php echo $reseller->phone ?>
										</td>
										<td>
											<?php echo $reseller->email ?>
										</td>
										<td>
											<img src="<?php echo base_url('upload/foto_reseller/'.$reseller->photo) ?>" width="64" />
										</td>
										<td class="small">
											<?php echo substr($reseller->alamat, 0, 120) ?>...</td>
										<td width="250">
											<a href="<?php echo site_url('admin/reseller/edit/'.$reseller->reseller_id) ?>"
											 class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
											<a onclick="deleteConfirm('<?php echo site_url('admin/reseller/delete/'.$reseller->reseller_id) ?>')"
											 href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a>
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
		$('#btn-delete6').attr('href', url);
		$('#deleteReseller').modal();
	}
	</script>
</body>

</html>
