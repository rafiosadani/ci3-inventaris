<div class="limiter">	
	<div class="container-login100" style="background-image: url('<?= base_url('assets/login/images/img-01.jpg'); ?>');">
		<div class="wrap-login100 p-t-10 p-b-30">
			<form class="login100-form validate-form" action="<?= base_url('auth/registration'); ?>" method="post" enctype="multipart/form-data">
				<div class="login100-form-avatar">
					<img src="<?= base_url('assets/login/images/user.png'); ?>" alt="AVATAR">
				</div>

				<span class="login100-form-title p-t-20 p-b-45">
					User Registration
				</span>

				<div class="wrap-input100">
					<?= $this->session->flashdata('message'); ?>
				</div>

				<div class="wrap-input100 validate-input m-b-10" data-validate = "Username is required">
					<input class="input100" type="text" name="fullname" placeholder="Full name">
					<span class="focus-input100"></span>
					<span class="symbol-input100">
						<i class="fa fa-user"></i>
					</span>
				</div>

				<div class="wrap-input100">
					<?= form_error('fullname', '<small class="text-danger pl-3">', '</small>'); ?>							
				</div>

				<div class="wrap-input100 mb-2"></div>

				<div class="wrap-input100 validate-input m-b-10" data-validate = "Username is required">
					<input class="input100" type="text" name="email" placeholder="Email">
					<span class="focus-input100"></span>
					<span class="symbol-input100">
						<i class="fa fa-user"></i>
					</span>
				</div>

				<div class="wrap-input100">
					<?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>							
				</div>

				<div class="wrap-input100 mb-2"></div>

				<div class="wrap-input100 validate-input m-b-10" data-validate = "Password is required">
					<input class="input100" type="password" name="password1" placeholder="Password">
					<span class="focus-input100"></span>
					<span class="symbol-input100">
						<i class="fa fa-lock"></i>
					</span>
				</div>

				<div class="wrap-input100">
					<?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
				</div>

				<div class="wrap-input100 mb-2"></div>

				<div class="wrap-input100 validate-input m-b-10" data-validate = "Password is required">
					<input class="input100" type="password" name="password2" placeholder="Konfirmasi Password">
					<span class="focus-input100"></span>
					<span class="symbol-input100">
						<i class="fa fa-lock"></i>
					</span>
				</div>

				<div class="wrap-input100">
					<?= form_error('password2', '<small class="text-danger pl-3">', '</small>'); ?>
				</div>

				<div class="wrap-input100 mb-2"></div>

				<div class="wrap-input100 validate-input m-b-10 ml-4" data-validate = "Password is required">
					<h6 class="mb-2 text-white"><b>Gambar : </b></h6>
					<input type="file" name="image">
				</div>

				<!-- <div class="wrap-input100">
					<?= form_error('image', '<small class="text-danger pl-3">', '</small>'); ?>
				</div> -->

				<div class="container-login100-form-btn p-t-10">
					<button class="login100-form-btn" type="submit">
						Register Account
					</button>
				</div>

				<div class="text-center w-full p-t-25 p-b-230">
					<a href="#" class="txt1">
						Forgot Username / Password?
					</a>
				</div>

				<div class="text-center w-full">
					<a class="txt1" href="<?= base_url('auth/login'); ?>">
						Already	have an account? Login!
						<i class="fa fa-long-arrow-right"></i>
					</a>
				</div>
			</form>
		</div>
	</div>
</div>