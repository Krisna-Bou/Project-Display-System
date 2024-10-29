<div class="register-container">
	<div class="register-card">
		<title>Create Project</title>
		<div class="col-4 offset-4">
			<?php echo form_open(base_url() . 'project/create_project/check_project'); ?>
			<h1 class="text-center">Create Project</h1>
			<div class="form-group">
				<?php echo $error; ?>
			</div>
			<input type="text" class="text-in" placeholder="Title" required="required" name="title">
			<select name="faculty">
                        <option value="x"> </option>
                        <option value="Faculty of Engineering, Architecture and Information Technology">Engineering, Architecture and Information Technology</option>
                        <option value="Faculty of Business, Economics and Law">Business, Economics and Law</option>
                        <option value="Faculty of Health and Behavioural Sciences">Health and Behavioural Sciences</option>
                        <option value="Faculty of Humanities, Arts and Social Sciences">Humanities, Arts and Social Sciences</option>
                        <option value="Faculty of Medicine">Medicine</option>
                        <option value="Faculty of Science">Science</option>
                    </select>
			<input type="text" class="text-in" placeholder="Field" required="required" name="field">

			<input type="text" class="text-in" placeholder="Bio" required="required" name="bio">
			<input type="text" class="text-in" placeholder="Body" required="required" name="body">
			<label for="start">Start Date</label><br>
			<input type="date" class="text-in" id="start" required="required" name="start_date">
			<label for="finish">Finish Date</label><br>
			<input type="date" class="text-in" id="finish" name="finish_date">

			<button type="submit" class="submit-btn">SUBMIT</button>
				<?php echo form_close(); ?>
		</div>
	</div>
</div>
