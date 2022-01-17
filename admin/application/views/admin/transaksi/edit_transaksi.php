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

						<a href="<?php echo site_url('admin/transaksi/') ?>"><i class="fas fa-arrow-left"></i>
							Back</a>
					</div>
					<div class="card-body">

						<form action="<?php base_url(" admin/transaksi/edit") ?>" method="post"
							enctype="multipart/form-data" >

							<input type="hidden" name="id" value="<?php echo $transaksi->id?>" />

							<div class="form-group">
								<label for="name">name*</label>
								<input class="form-control <?php echo form_error('name') ? 'is-invalid':'' ?>"
								 type="text" name="name" placeholder="transaksi name" value="<?php echo $transaksi->name ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('name') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="phone">phone</label>
								<input class="form-control <?php echo form_error('phone') ? 'is-invalid':'' ?>"
								 type="number" name="phone" min="0" placeholder="transaksi phone" value="<?php echo $transaksi->phone ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('phone') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="email">email*</label>
								<input class="form-control <?php echo form_error('email') ? 'is-invalid':'' ?>"
								 type="text" name="email" placeholder="masukan id email" value="<?php echo $transaksi->email ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('email') ?>
								</div>
							</div>
							
							<div class="form-group">
								<label for="address">address*</label>
								<input class="form-control <?php echo form_error('address') ? 'is-invalid':'' ?>"
								 type="text" name="address" placeholder="masukan address" value="<?php echo $transaksi->address ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('address') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="order_list">list transaksi*</label>
								<input class="form-control <?php echo form_error('order_list') ? 'is-invalid':'' ?>"
								 type="text" name="order_list" placeholder="masukan transaksi" value="<?php echo $transaksi->order_list ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('order_list') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="order_total">transaksi total*</label>
								<input class="form-control <?php echo form_error('order_total') ? 'is-invalid':'' ?>"
								 type="text" name="order_total" placeholder="masukan address" value="<?php echo $transaksi->order_total ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('order_total') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="date_time">date_time*</label>
								<input class="form-control <?php echo form_error('date_time') ? 'is-invalid':'' ?>"
								 type="text" name="date_time" placeholder="date time" value="<?php echo $transaksi->date_time ?>"/>
								<div class="invalid-feedback">
									<?php echo form_error('date_time') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="name">comment*</label>
								<textarea class="form-control <?php echo form_error('comment') ? 'is-invalid':'' ?>"
								 name="comment" placeholder="transaksi comment..."><?php echo $transaksi->comment ?></textarea>
								<div class="invalid-feedback">
									<?php echo form_error('comment') ?>
								</div>
							</div>

							<input class="btn btn-success" type="submit" name="btn" value="Save" />
						</form>

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
