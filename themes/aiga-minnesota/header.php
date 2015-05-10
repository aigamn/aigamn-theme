<!DOCTYPE html>
<html lang='en'>
<head>
	<meta charset='UTF-8'>
	<title>AIGA Minnesota Redesign</title>

	<link rel='stylesheet' href='//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css'>
	<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,300,600,700,400italic,700italic,600italic' rel='stylesheet' type='text/css'>
	<link rel='stylesheet' href="<?php echo get_template_directory_uri(); ?>/icomoon/style.css">
	<link rel='stylesheet' href="<?php echo get_template_directory_uri(); ?>/style.css">

	<script src='http://code.jquery.com/jquery-2.1.3.js'></script>
	<script src='//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.js'></script>
	<script src="<?php echo get_template_directory_uri(); ?>/js/shared.js"></script>

</head>
<body>

	<header class='site-header'>
		<a href="<?php echo home_url(); ?>">
			<img class='logo' src='http://placehold.it/60x42/94deff/94deff' alt='logo'>
		</a>

		<ul class='list-unstyled list-inline pull-right hidden-xs'>
			<li>
				<a href='<?php echo home_url(); ?>/event'>Events</a>
			</li>
			<li>
				<a href="<?php echo home_url(); ?>/communities">Communities</a>
			</li>
			<li>
				<a href='<?php echo home_url(); ?>/membership'>Membership</a>
			</li>
			<li>
				<a href='<?php echo home_url(); ?>/volunteer'>Volunteer</a>
			</li>
			<li>
				<a href='<?php echo home_url(); ?>/sponsorship'>Sponsorship</a>
			</li>
			<li>
				<a href='<?php echo home_url(); ?>/about'>About</a>
			</li>
			<li>
				<a href='<?php echo home_url(); ?>/blog'>Blog</a>
			</li>
			<li class='dropdown pull-right'>
				<a id='search-dropdown-label' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
					<span class='icon-search'></span>
				</a>

				<ul class='dropdown-menu' role='menu' aria-labelledby='search-dropdown-label'>
					<li class='form-control'>
						<label>
							<form enctype='multpart/form-data' method='get'>
								<input name='s' id='s' placeholder='search AIGA Minnesota'>
								<button>
									Go
								</button>
							</form>
						</label>
					</li>
				</ul>
			</li>
		</ul>

		<ul class='list-unstyled list-inline pull-right visible-xs'>
			<li>
				<a href='<?php echo home_url(); ?>/event'>Events</a>
			</li>
			<li>
				<a href="<?php echo home_url(); ?>/communities">Communities</a>
			</li>
			<li class='dropdown pull-right'>
				<a data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
					<span class='icon icon-search hidden-xs'></span>
					<span class='icon icon-list visible-xs'></span>
				</a>

				<ul class='dropdown-menu' role='menu'>
					<li class='form-control'>
						<label>
							<form enctype='multpart/form-data' method='get'>
								<input name='s' id='s' placeholder='search'>
								<button>
									Go
								</button>
							</form>
						</label>
					</li>
					<li>
						<a href='<?php echo home_url(); ?>/membership'>Membership</a>
					</li>
					<li>
						<a href='<?php echo home_url(); ?>/volunteer'>Volunteer</a>
					</li>
					<li>
						<a href='<?php echo home_url(); ?>/sponsorship'>Sponsorship</a>
					</li>
					<li>
						<a href='<?php echo home_url(); ?>/about'>About</a>
					</li>
					<li>
						<a href='<?php echo home_url(); ?>/blog'>Blog</a>
					</li>
				</ul>
			</li>

		</ul>
	</header>
