<?php require APPROOT . '/views/inc/header.php' ?>

<div class="row">
	<div class="col-md-6 mx-auto">

		<a 
			href="<?= URLROOT ?>/posts/show/<?= $data['id'] ?>"
			title="Back"
			class="btn btn-primary btn-sm mb-3">
			<i class="fas fa-backward"></i>
			Back
		</a>

		<div class="card card-body bg-light">
			<h2>Edit Post</h2>

			<form 
				action="<?= URLROOT ?>/posts/edit/<?= $data['id'] ?>" 
				method="POST">

				<!-- title -->
				<div class="form-group mb-3">
					<label for="title">Title: <sup>*</sup></label>
					<input 
						type="text" 
						name="title" 
						id="title" 
						class="form-control form-control-lg <?= !empty($data['title_error']) ? 'is-invalid' : null ?>"
						value="<?= $data['title'] ?>">
						<span class="invalid-feedback"><?= $data['title_error'] ?></span>
				</div>

				<!-- content -->
				<div class="form-group mb-3">
					<label for="content">Content: <sup>*</sup></label>

					<textarea
						type="content" 
						name="content" 
						id="content" 
						class="form-control form-control-lg 
						<?= ! empty($data['content_error']) ? 'is-invalid' : null ?>"
						><?= $data['content'] ?></textarea>
						<span class="invalid-feedback"><?= $data['content_error'] ?></span>
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
