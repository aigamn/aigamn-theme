<?php include_once('header.php'); ?>

<?php while ( have_posts() ) : the_post(); ?>
	<div class='container'>
		<h1><?php the_title(); ?></h1>

		<?php the_content() ?>
	</div>
<?php endwhile; ?>

<?php include_once('footer.php'); ?>