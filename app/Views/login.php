<div class="register-container">
	<div class="register-card">
		<title>Register</title>
		<div class="col-4 offset-4">
			<?php echo form_open(base_url() . 'login/check_login'); ?>
			<h1 class="text-center">Login</h1>
			<div class="form-group">
				<?php echo $error; ?>
			</div>
			<input type="text" class="text-in" placeholder="Email" required="required" name="email">
			<input type="password" class="text-in" placeholder="Password" required="required" name="password">
			<button type="submit" class="submit-btn">SUBMIT</button>
			<label class="float-left form-check-label"><input type="checkbox" name = "remember"> Remember me</label>
				<?php echo form_close(); ?>
		</div>
	</div>
</div>
