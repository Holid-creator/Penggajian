<body class="bg-gradient-primary">

	<div class="container">

		<!-- Outer Row -->
		<div class="row justify-content-center">

			<div class="col-lg-5">

				<div class="card o-hidden border-0 shadow-lg" style="margin-top: 30%;">
					<div class="card-body p-0">
						<!-- Nested Row within Card Body -->
						<div class="row">
							<div class="col-lg-12">
								<div class="p-5">
									<div class="text-center">
										<img src="assets/logo/logo.png" width="350px" class="mb-3">
									</div>
									<?= $this->session->flashdata('pesan') ?>
									<form method="post" action="<?= base_url('form_login') ?>" class="user">
										<div class="form-group">
											<input type="text" class="form-control form-control-user" name="username" aria-describedby="emailHelp" placeholder="Masukkan Username Anda...">
											<?= form_error('username', '<div class="text-danger text-small ml-2">', '</div>') ?>
										</div>
										<div class="form-group">
											<input type="password" class="form-control form-control-user" name="password" placeholder="Password">
											<?= form_error('password', '<div class="text-danger text-small ml-2">', '</div>') ?>
										</div>
										<hr>
										<button type="submit" class="btn btn-primary btn-user btn-block">Login</button>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>

	</div>

	</div>

	<!-- Bootstrap core JavaScript-->
	<script src="<?= base_url('assets/') ?>vendor/jquery/jquery.min.js"></script>
	<script src="<?= base_url('assets/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

	<!-- Core plugin JavaScript-->
	<script src="<?= base_url('assets/') ?>vendor/jquery-easing/jquery.easing.min.js"></script>

	<!-- Custom scripts for all pages-->
	<script src="<?= base_url('assets/') ?>js/sb-admin-2.min.js"></script>

</body>

</html>