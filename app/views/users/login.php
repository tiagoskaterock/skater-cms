<?php require APPROOT . '/views/inc/header.php' ?>

<div class="row" style="margin: 80px 0;">
	<div class="col-md-6 mx-auto">
		<div class="card card-body bg-light">

			<?php flash('register_success') ?>

			<h2>Login</h2>

			<p>Please fill in your credentials to log in</p>

			<form action="<?php echo URLROOT ?>/users/login" method="POST">

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

				<!-- submit -->
				<div class="row">
					<div class="col">
						<input type="submit" value="Login" name="login" class="btn btn-success btn-block">
					</div>

					<div class="col">
						<a href="<?php echo URLROOT ?>/users/register" class="btn btn-light btn-block">
							No account? Register
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
