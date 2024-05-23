<?php require APPROOT . '/views/inc/header.php' ?>

<div class="row mb-4">
	<div class="col-md-6">
		<h1>Posts</h1>
	</div>

	<div class="col-md-6">
		<a 
			href="<?php echo URLROOT ?>/posts/add" 
			class="btn btn-primary pull-right">
			<i class="fas fa-plus"></i>
			Add Post
		</a>
	</div>
</div>

<div class="row">
	
	<?php foreach ($data['posts'] as $post): ?>
		<div class="col-md-6 p-3">

			<div class="card card-body mb-4 p-4">
				<h2>
					<a href="<?php echo URLROOT ?>/posts/show/<?php echo $post->id ?>">
						<?php echo $post->title ?> 	
					</a>					
				</h2>

				<div class="bg-light p-3">
					Written by <?php echo $post->writer ?>, 
					<?php echo $post->created_at ?>					
				</div>
			</div>
			
		</div>
	<?php endforeach ?>

</div>


<?php require APPROOT . '/views/inc/footer.php' ?>
