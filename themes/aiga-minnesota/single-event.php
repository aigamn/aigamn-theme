
<?php include_once('header.php'); ?>

	<?php while ( have_posts() ) : the_post(); ?>

	<div class="background"> <!--temporary solution to show blue background at top of page -->

		<article class="container single">

			<header class="cta-header">

				<h1><?php the_title(); ?></h1>

				<div class="main-image visible-xs">
					<img src="http://placehold.it/1024x576/94deff/84CeEf" class="img-responsive" alt="place holder image" />
					<a href="#">
						<img src="images/pin-it.png" class="pin-it" alt="pin it place holder" />
					</a>
				</div>

				<h2><?php echo date("l, F jS, g:ia", get_field('start_time')); ?> until <?php echo date("g:ia", get_field('end_time')); ?></h2>
				<h3>
					<a target='_blank' href="<?php echo get_field('location_url'); ?>">
						<?php echo get_field('location_name'); ?>
					</a>
				</h3>

				<a href="<?php echo get_field('registration_link'); ?>" class="btn btn-default cta" target="_blank">
					Register
					<br>
					<!-- <small>
						10 seats left
					</small> -->
				</a>

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
					<img src="http://placehold.it/1024x576/94deff/84CeEf" class="img-responsive" alt="place holder image" />
					<a href="#">
						<img src="images/pin-it.png" class="pin-it" alt="pin it place holder" />
					</a>
				</div>
				<div class="main-text">
					<?php the_content(); ?>
				</div>
			</section>

		</article>

	</div>

	<?php endwhile; ?>

<?php include_once('footer.php'); ?>
