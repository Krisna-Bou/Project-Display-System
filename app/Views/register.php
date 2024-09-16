<div class="register-container">
	<div class="register-card">
		<title>Register</title>
		<div class="col-4 offset-4">
			<?php echo form_open(base_url() . 'register/check_register'); ?>
			<h1 class="text-center">Register</h1>
			<div class="form-group">
				<?php echo $error; ?>
			</div>
			<input type="text" class="text-in" placeholder="Email" required="required" name="email">
			<input type="text" class="text-in" placeholder="First Name" required="required" name="firstname">
			<input type="text" class="text-in" placeholder="Last Name" required="required" name="lastname">
			<input type="password" class="text-in" placeholder="Password" required="required" name="password">
			<button type="submit" class="submit-btn">SUBMIT</button>
				<?php echo form_close(); ?>
		</div>
	</div>
</div>
