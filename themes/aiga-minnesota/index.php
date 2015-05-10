<?php include_once('header.php'); ?>

<?php while ( have_posts() ) : the_post(); ?>
	<div class='container'>
		<h1>
			<a href="<?php the_permalink(); ?>">
				<?php the_title(); ?>
			</a>
		</h1>

		<?php the_excerpt() ?>
	</div>
<?php endwhile; ?>

<?php include_once('footer.php'); ?>