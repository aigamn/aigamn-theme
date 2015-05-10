<?php include_once('header.php'); ?>
<?php while ( have_posts() ) : the_post(); ?>
	<div class='container list communities'>
		<h1><?php the_title() ?></h1>
		<p class='lead'>
			<?php the_content() ?>
		</p>
		
		<?php
			$communities = new WP_Query( 
	            array(
	                'post_type' => 'community'
	            ) 
	        );
	        $groups = [];
        ?>
		
		<!-- get communitees into groups -->
        <?php foreach($communities->posts as $community): ?>
			<?php
				$group = get_field('focus_area', $community->ID);
				if(!array_key_exists($group, $groups)){
					$groups[$group] = [];
				}
				array_push($groups[$group], $community);
			?>
    	<?php endforeach ?>

    	<?php foreach($groups as $groupName=>$communities): ?>
    		<section>
				<h2><?php echo $groupName ?></h2>
				<ul class='list-unstyled row'>
					<?php foreach($communities as $community): ?>
						<li class='col-sm-4'>
							<div class='border'>
								<h3><?php echo $community->post_title ?></h3>
								<?php echo get_the_post_thumbnail( $community->ID, 'thumbnail', array('class'=>'img-responsive') ); ?>
								<div class='copy'>
									<?php echo $community->post_excerpt ?>
									<p class='text-right'>
										<a href='<?php echo get_permalink($community->ID) ?>'>More Info</a>
									</p>
								</div>
							</div>
						</li>
					<?php endforeach ?>
				</ul>
			</section>
		<?php endforeach ?>
		
<?php endwhile; ?>

<?php include_once('footer.php'); ?>
