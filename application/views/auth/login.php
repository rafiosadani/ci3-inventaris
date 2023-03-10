<div class="limiter">	
	<div class="container-login100" style="background-image: url('<?= base_url('assets/login/images/img-01.jpg'); ?>');">
		<div class="wrap-login100 p-t-190 p-b-30">
			<form class="login100-form validate-form" action="<?= base_url('auth'); ?>" method="post">
				<div class="login100-form-avatar">
					<img src="<?= base_url('assets/login/images/user.png'); ?>" alt="AVATAR">
				</div>

				<span class="login100-form-title p-t-20 p-b-45">
					SIGN IN
				</span>

				<div class="wrap-input100">
					<?= $this->session->flashdata('message'); ?>
				</div>

				<div class="wrap-input100 validate-input m-b-10" data-validate = "Username is required">
					<input class="input100" type="text" name="email" placeholder="Email" value="<?= set_value('email'); ?>">
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
					<input class="input100" type="password" name="password" placeholder="Password">
					<span class="focus-input100"></span>
					<span class="symbol-input100">
						<i class="fa fa-lock"></i>
					</span>
				</div>

				<div class="wrap-input100">
					<?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
				</div>

				<div class="container-login100-form-btn p-t-10">
					<button class="login100-form-btn" type="submit">
						Login
					</button>
				</div>

				<div class="text-center w-full p-t-25 p-b-230">
					<a href="#" class="txt1">
						Forgot Username / Password?
					</a>
				</div>

				<div class="text-center w-full">
					<a class="txt1" href="<?= base_url('auth/registration'); ?>">
						Create new account
						<i class="fa fa-long-arrow-right"></i>
					</a>
				</div>
			</form>
		</div>
	</div>
</div>