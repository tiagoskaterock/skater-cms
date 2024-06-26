<?php require APPROOT . '/views/inc/header.php' ?>

<div class="row">
	<div class="col-md-6 mx-auto">
		<div class="card card-body bg-light">
			<h2>Create an Account</h2>

			<p>Please fill out this form to register with us</p>

			<form action="<?php echo URLROOT ?>/users/register" method="POST">

				<!-- name -->
				<div class="form-group mb-3">
					<label for="name">Name: <sup>*</sup></label>
					<input 
						type="text" 
						name="name" 
						id="name" 
						class="form-control form-control-lg <?php echo !empty($data['name_error']) ? 'is-invalid' : null ?>"
						value="<?php echo $data['name'] ?>">
						<span class="invalid-feedback"><?php echo $data['name_error'] ?></span>
				</div>

				<!-- email -->
				<div class="form-group mb-3">
					<label for="email">Email: <sup>*</sup></label>
					<input 
						type="email" 
						name="email" 
						id="email" 
						class="form-control form-control-lg <?php echo !empty($data['email_error']) ? 'is-invalid' : null ?>"
						value="<?php echo $data['email'] ?>">
						<span class="invalid-feedback"><?php echo $data['email_error'] ?></span>
				</div>

				<!-- password -->
				<div class="form-group mb-3">
					<label for="password">Password: <sup>*</sup></label>
					<input 
						type="password" 
						name="password" 
						id="password" 
						class="form-control form-control-lg <?php echo !empty($data['password_error']) ? 'is-invalid' : null ?>"
						value="<?php echo $data['password'] ?>">
						<span class="invalid-feedback"><?php echo $data['password_error'] ?></span>
				</div>

				<!-- confirm_password -->
				<div class="form-group mb-3">
					<label for="confirm_password">Confirm Password: <sup>*</sup></label>
					<input 
						type="password" 
						name="confirm_password" 
						id="confirm_password" 
						class="form-control form-control-lg <?php echo !empty($data['confirm_password_error']) ? 'is-invalid' : null ?>"
						value="<?php echo $data['confirm_password'] ?>">
						<span class="invalid-feedback"><?php echo $data['confirm_password_error'] ?></span>
				</div>

				<!-- submit -->
				<div class="row">
					<div class="col">
						<input type="submit" value="Register" name="Register" class="btn btn-success btn-block">
					</div>

					<div class="col">
						<a href="<?php echo URLROOT ?>/users/login" class="btn btn-light btn-block">
							Have an account? Login
						</a>
					</div>
				</div>

			</form>

		</div>
		<!-- card-body -->

	</div>
	<!-- col-md-6 -->

</div>
<!-- row -->

<?php require APPROOT . '/views/inc/footer.php' ?>
