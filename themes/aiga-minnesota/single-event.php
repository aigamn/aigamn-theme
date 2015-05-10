
<?php include_once('header.php'); ?>

	<?php while ( have_posts() ) : the_post(); ?>

	<!-- Determine if event occurs in the past or future -->
	<?php
		$eventDate = get_field('start_time');
		if ($eventDate < time()) {
			$isPastEvent = true;
		}
	?>

	<!-- Handle recurring events -->
	<?php
		$recurringTerms = get_the_terms($post->ID, 'recurring');
		foreach($recurringTerms as $event) {
			$slug = $event->slug;
			$name = $event->name;
		}
		$today = getDate();
		$args = array(
			'post_type'=>'event',
			'tax_query'=>array(
				array(
					'taxonomy'=>'recurring',
					'field'=>'slug',
					'terms'=>$slug,
				),
			),
		);
		$query = new WP_Query($args);
		$returnedPosts = $query->posts;
		foreach($returnedPosts as $returnedPost) {
			$returnedStartTime = get_field('start_time', $returnedPost->ID);
			if($returnedStartTime > time()) {
				$futureEventLink = get_permalink($returnedPost->ID);
				break;
			}
		}
	?>

	<div class="background"> <!--temporary solution to show blue background at top of page --></div>

	<article class="container single">

		<header class="cta-header">

			<h1><?php the_title(); ?></h1>

			<div class="main-image visible-xs">
				<img src="http://placehold.it/1024x576/94deff/84CeEf" class="img-responsive" alt="place holder image" />
				<a href="#">
					<img src="images/pin-it.png" class="pin-it" alt="pin it place holder" />
				</a>
			</div>

			<h2>
				<?php
					if($isPastEvent) {
						echo "Happened " . date("F jS, o", get_field('end_time'));
					}
					else {
						echo date("l, F jS, g:ia", get_field('start_time')); ?> until <?php echo date("g:ia", get_field('end_time'));
					}
				?>
			</h2>
			<h3>
				<a target='_blank' href="<?php echo get_field('location_link'); ?>">
					<?php echo get_field('location'); ?>
				</a>
			</h3>

			<?php
				$wrapUpLink = get_field('wrap_up_link');
				if($isPastEvent) {
					if($wrapUpLink != "") {
						echo "<a href='".$wrapUpLink."' class='btn btn-default cta' target='_blank'>View the Wrap up</a>";
					}
				}
				else {
					$registrationLink = get_field('registration_link');
					echo "<a href='".$registrationLink."' class='btn btn-default cta' target='_blank'>Register</a>";
				}
			?>

		</header>

		<section class="col-md-10 col-md-offset-1">

			<div class='reveal'>
				<button class='btn btn-info visible-xs' data-toggle-parent='.reveal' data-toggle-class='expanded'>
					<span class'icon-calendar icon'></span>
					Add to Calendar
				</button>

				<div class='reveal-content'>
					<ul class="actions left xs-halves list-inline">
						<li class='hidden-xs'>
							<span class="icon-calendar icon"></span>
						</li>
						<li class='xs-first'>
							<a href="#">
								iCal
							</a>
						</li>
						<li>
							<a href="#">
								Google Calendar
							</a>
						</li>
					</ul>
				</div>
			</div>

			<div class="clearfix visible-xs"></div>

			<div class='reveal'>
				<button class='btn btn-info visible-xs' data-toggle-parent='.reveal' data-toggle-class='expanded'>
					<span class="glyphicon glyphicon-share icon"></span>
					Share It
				</button>

				<div class='reveal-content'>
					<ul class="right actions xs-fourths list-inline">
						<li class='hidden-xs'>
							<small class="text-uppercase">share it:</small>
						</li>
						<li class='xs-first'>
							<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo the_permalink(); ?>" class='no-border'>
								<span class='icon-facebook icon'></span>
							</a>
						</li>
						<li>
							<a href="https://twitter.com/home?status=<?php echo the_permalink(); ?>">
								<span class='icon-twitter icon'></span>
							</a>
						</li>
						<!-- <li>
							<a href='#'>
								<span class='icon-instagram icon'></span>
							</a>
						</li> -->
						<li>
							<a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo the_permalink(); ?>&title=AIGA%20Minnesota%20Event&summary=&source=">
								<span class='icon-linkedin icon'></span>
							</a>
						</li>
					</ul>
				</div>
			</div>

			<div class="clearfix"></div>

			<div class="main-image hidden-xs">
				<?php the_post_thumbnail('large', array('class'=>'img-responsive')) ?>
				<a href="#">
					<img src="images/pin-it.png" class="pin-it" alt="pin it place holder" />
				</a>
			</div>
			<div class="main-text">
				<?php the_content(); ?>
				<?php
					if($isPastEvent) {
						echo "<a href='".$futureEventLink."' class='btn btn-default cta' target='_blank'>View the Next ".$name."</a>";
					}
				?>
			</div>
			<p>Thanks to our sponsors</p>
			<div class="sponsors col-md-12">
				<?php
					$sponsors = get_field('sponsors');
					foreach($sponsors as $sponsor) {
						$sponsor_thumbnail = get_the_post_thumbnail($sponsor->ID);
						$sponsor_post = get_post($sponsor->ID);
						$sponsor_url = $sponsor_post->website;
						echo "<div class='sponsor col-md-4'><a href=".$sponsor_url." target='_blank'>".$sponsor_thumbnail."</a>";
						echo "<br>";
						echo "<p>".$sponsor_post->post_content."</p></div>";
					}
				?>
			</div>
		</section>

	</article>

	<?php endwhile; ?>

<?php include_once('footer.php'); ?>
