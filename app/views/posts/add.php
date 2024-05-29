<?php require APPROOT . '/views/inc/header.php' ?>

<div class="row">
	<div class="col-md-6 mx-auto">

		<a 
			title="Back"
			href="<?php echo URLROOT ?>/posts" 
			class="btn btn-primary btn-sm mb-3">
			<i class="fas fa-backward"></i>
			Back
		</a>

		<div class="card card-body bg-light">
			<h2>Create a new Post</h2>

			<form 
				action="<?php echo URLROOT ?>/posts/add" 
				method="POST">

				<!-- title -->
				<div class="form-group mb-3">
					<label for="title">Title: <sup>*</sup></label>
					<input 
						type="text" 
						name="title" 
						id="title" 
						class="form-control form-control-lg <?php echo !empty($data['title_error']) ? 'is-invalid' : null ?>"
						value="<?php echo $data['title'] ?>">
						<span class="invalid-feedback"><?php echo $data['title_error'] ?></span>
				</div>

				<!-- content -->
				<div class="form-group mb-3">
					<label for="content">content: <sup>*</sup></label>

					<textarea
						type="content" 
						name="content" 
						id="content" 
						class="form-control form-control-lg 
						<?php echo ! empty($data['content_error']) ? 'is-invalid' : null ?>"
						><?php echo $data['content'] ?></textarea>
						<span class="invalid-feedback"><?php echo $data['content_error'] ?></span>
				</div>

				<!-- submit -->
				<div class="row">
					<div class="col">
						<input type="submit" value="Save" name="Save" class="btn btn-success btn-block">
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
