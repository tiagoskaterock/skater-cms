<?php $post = $data['post'] ?>

<?php require APPROOT . '/views/inc/header.php' ?>

<?php flash('post_message') ?>

<div class="row mb-4">
	<div class="col-md-12 text-center mt-4 mb-4">
		<h1><?= $post->title ?></h1>
	</div>

</div>

<div class="row">

	<div class="col-md-12">

		<div class="card card-body mb-4 p-4">			

			<div class="bg-light p-4">

				<p><?= $post->content ?></p>

				Written by <?= $post->writter ?>, <?= $post->created_at ?>

			</div>

		</div>

	</div>

</div>

<?php require APPROOT . '/views/inc/footer.php' ?>
