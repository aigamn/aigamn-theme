<?php include_once('header.php'); ?>

<?php while ( have_posts() ) : the_post(); ?>
	<div class='background'>
		<?php the_post_thumbnail('large', array('class'=>'img-responsive')) ?>
	</div>


	<article class='container single'>

		<header class='cta-header'>

			<h1><?php the_title() ?></h1>
			
			<div class='main-image visible-xs'>
				<?php the_post_thumbnail('medium', array('class'=>'img-responsive')) ?>
			</div>

			<a href='mailto:<?php echo get_the_author_meta( 'user_email' ); ?>' class='btn btn-default cta'>
				Contact
				<br>
				<small>
					<?php echo get_the_author_meta( 'user_email' ); ?>
				</small>
			</a>

		</header>

		<div class='col-md-10 col-md-offset-1'>

			<div class='main-image hidden-xs'>
				<?php the_post_thumbnail('large', array('class'=>'img-responsive')) ?>
				<a href='#'>
					<img src='images/pin-it.png' class='pin-it' alt='pin it place holder' />
				</a>
			</div>
			<div class='main-text'>
				<?php the_content() ?>
			</div> <!-- end .main-text -->
		</div>

	</article>

<?php endwhile; ?>

<?php include_once('footer.php'); ?>