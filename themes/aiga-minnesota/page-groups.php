<?php include_once('header.php'); ?>
<?php while ( have_posts() ) : the_post(); ?>
	<div class='container list groups'>
		<h1><?php the_title() ?></h1>
		<p class='lead'>
			<?php the_content() ?>
		</p>
		
		<?php
			$groups = new WP_Query( 
	            array(
	                'post_type' => 'group'
	            ) 
	        );
        ?>

		<section>
			<ul class='list-unstyled row'>
				<?php foreach($groups->posts as $group): ?>
					<li class='col-sm-4'>
						<div class='border'>
							<h3><?php echo $group->post_title ?></h3>
							<?php echo get_the_post_thumbnail( $group->ID, 'medium', array('class'=>'img-responsive') ); ?>
							<div class='copy'>
								<?php echo $group->post_excerpt ?>
								<p class='text-right'>
									<a href='<?php echo get_permalink($group->ID) ?>'>More Info</a>
								</p>
							</div>
						</div>
					</li>
				<?php endforeach ?>
			</ul>
		</section>
		
<?php endwhile; ?>

<?php include_once('footer.php'); ?>
