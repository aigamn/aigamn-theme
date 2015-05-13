
<?php include_once('header.php'); ?>

	<?php while ( have_posts() ) : the_post(); ?>

	<!-- Set all the needed variables and call all needed functions -->
	<?php
		$eventDate = get_field('start_time');
		$startTime = get_field('start_time');
		$endTime = get_field('end_time');
		$location = get_field('location');

		$googleCalStart = date("Ymd\THis\Z", strtotime('+5 hours', $startTime));
		$googleCalEnd = ($endTime && $endTime != '') ? date("Ymd\THis\Z", strtotime('+5 hours', $endTime)) : $googleCalEnd;
		$googleCalLink = 'https://www.google.com/calendar/render?action=TEMPLATE&text=' . get_the_title() . '&dates=' . $googleCalStart .'/' . $googleCalEnd . '&details=' . get_the_excerpt() . '--%20More%20Info:' . get_permalink() . '&location=' . $location;

		$wrapUpLink = get_field('wrap_up_link');
		$registrationLink = get_field('registration_link');
		$isPastEvent = isPastEvent($eventDate);
		$isRecurringEvent = isRecurringEvent($post->ID);
		
		$showNextEventLink = ($isPastEvent && $isRecurringEvent) ? true : false;
		if($showNextEventLink){
			$nextRecurringEventLink = getNextRecurringEventLink($post->ID, $eventDate);
			$name = getRecurringEventName($post->ID);
		}

		$showWrapUpLink = ($isPastEvent && $wrapUpLink != "") ? true : false;
		$showRegistrationLink = (!$isPastEvent && $registrationLink != '') ? true : false;
		$sponsors = get_field('sponsors');
		$post_footer = get_field('post_footer');
		//die(var_dump($footer));
	?>

	<div class='background'>
		<?php the_post_thumbnail('large', array('class'=>'img-responsive')) ?>
	</div>

	<article class="container single">

		<header class="cta-header">

			<h1><?php the_title(); ?></h1>

			<h2>
				<?php if($isPastEvent): ?>
					Happened <?php echo date("F jS, o", $endTime) ?>
				<?php else: ?>
					<?php echo date("l, F jS, g:ia", $startTime); ?> 
					until 
					<?php echo date("g:ia", $endTime);?>
				<?php endif ?>
			</h2>
			<h3>
				<a target='_blank' href="https://www.google.com/maps?q=<?php echo $location; ?>">
					<?php echo $location; ?>
				</a>
			</h3>
			
			<div class='cta'>
				<?php if ($showWrapUpLink): ?>
					<a href='<?php echo $wrapUpLink ?>' class='btn btn-default' target='_blank'>Event Wrap up</a>
				<?php endif ?>

				<?php if ($showRegistrationLink): ?>
					<a href='<?php echo $registrationLink ?>' class='btn btn-default' target='_blank'>Register</a>
				<?php endif ?>

				<?php if($showNextEventLink): ?>
					<a href='<?php echo $nextRecurringEventLink ?>' class='btn btn-default'>
						Next <?php echo $name ?>
					</a>
				<?php endif ?>
			</div>

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
							<a href='<?php echo $googleCalLink ?>' target='_blank'>
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
							<a target='_blank' href="https://www.facebook.com/sharer/sharer.php?u=<?php echo the_permalink(); ?>" class='no-border'>
								<span class='icon-facebook icon'></span>
							</a>
						</li>
						<li>
							<a target='_blank' href="https://twitter.com/home?status=<?php echo the_permalink(); ?>">
								<span class='icon-twitter icon'></span>
							</a>
						</li>
						<li>
							<a target='_blank' href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo the_permalink(); ?>&title=AIGA%20Minnesota%20Event&summary=&source=">
								<span class='icon-linkedin icon'></span>
							</a>
						</li>
					</ul>
				</div>
			</div>

			<div class="clearfix"></div>

			<div class="main-image hidden-xs">
				<?php the_post_thumbnail('large', array('class'=>'img-responsive')) ?>
				<span class='pin-it'>
					<a href="//www.pinterest.com/pin/create/button/" data-pin-do="buttonBookmark"  data-pin-color="red">
						<img src="//assets.pinterest.com/images/pidgets/pinit_fg_en_rect_red_20.png" />
					</a>
				</span>
			</div>
			<div class="main-text">
				<?php the_content(); ?>
				<?php if($showNextEventLink): ?>
					<a href='<?php echo $nextRecurringEventLink ?>' class='btn btn-default cta'>
						Next <?php echo $name ?>
					</a>
				<?php endif ?>
				<?php if($post_footer): ?> 
					<p class='well'>
						<?php echo do_shortcode($post_footer->post_content) ?>
					</p>
				<?php endif ?>
			</div>
				

			<p>Thanks to our sponsors</p>
			<div class="sponsors col-md-12">`
				<?php foreach($sponsors as $sponsor): ?>
					<?php 
						$sponsor_thumbnail = get_the_post_thumbnail($sponsor->ID);
						$sponsor_post = get_post($sponsor->ID);
						$sponsor_url = $sponsor_post->website_url;
					?>
					<div class='sponsor col-md-4'>
						<a href='<?php echo $sponsor_url ?>' target='_blank'>
							<?php echo $sponsor_thumbnail ?>
						</a>
						<br>
						<p>
							<?php echo $sponsor_post->post_content ?>
						</p>
					</div>
				<?php endforeach ?>
			</div>
			<br>
			<br>
			<br>
			<?php comments_template(); ?>
		</section>
	</article>

	<?php endwhile; ?>

<?php include_once('footer.php'); ?>
