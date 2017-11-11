<?php 
/*
Author: Jake Larkin  /  @jakelarkin71
Contact: jake@jetrail.co
Date of Edit: 10/28/2016
Purpose: Front Page or Home Page

*/
?>

<?php get_header(); ?>

<div id="front-page">	
	
	<!-- Dynamic Styling From Page Setup -->
	<style type="text/css">

	</style>
	
	<!-- Hero Image and Header Text -->
	<div id="hero-text" style="background-image: url(<?php echo get_field('hero_image'); ?>)">
		<div id="hero-filter">
		</div>
		<div id="hero-content">
				<div id="hero-header" class="col-lg-12 text-center">
					<p class="big-header"><?php the_field('header'); ?></p>
					<p class="hero-text"><?php the_field('header_sub_text'); ?></p>
				</div>
			</div>
			<div class="social-links">
				<?php if(get_field('facebook')==true) { ?><a href="https://facebook.com/<?php the_field('facebook','option'); ?>"><img class="scale-10" src="<?php echo get_stylesheet_directory_uri(); ?>/images/fb.svg"></a><?php }?>
				<?php if(get_field('twitter')==true) { ?><a href="https://twitter.com/<?php the_field('twitter','option'); ?>"><img class="scale-10" src="<?php echo get_stylesheet_directory_uri(); ?>/images/twitter.svg"></a><?php }?>
				<?php if(get_field('linkedin')==true) { ?><a href="https://linkedin.com/<?php the_field('linkedin','option'); ?>"><img class="scale-10" src="<?php echo get_stylesheet_directory_uri(); ?>/images/linkedin.svg"></a><?php }?>
				<?php if(get_field('instagram')==true) { ?><a href="https://instagram.com/<?php the_field('instagram','option'); ?>"><img class="scale-10" src="<?php echo get_stylesheet_directory_uri(); ?>/images/instagram.svg"></a><?php }?>
			</div>
	</div>
	<!-- Quote Section -->
	<div class="container" id="quote">
		<div class="row text-center">
			<div class="quote"><?php echo get_field('quote'); ?></div>
			<p class="quoted-person text-right col-lg-11">-<?php the_field('quoted_person'); ?></p>
		</div>
		<hr class="quote-line">
	</div>

	<!-- About Section -->
	<div class="container" id="about">
		<div class="content-padding">
			<p class="content-header"><?php the_field('about_header'); ?></p>
			<div class="content-text"><?php the_field('about_text'); ?></div>
			<?php if( have_rows('detail_columns') ):

			 	// loop through the rows of data
			    while ( have_rows('detail_columns') ) : the_row(); ?>
					
			        <div class="col-lg-4 skill-col">
						<img src="<?php the_sub_field('icon'); ?>">
						<p class="skill-heading"><?php the_sub_field('list_heading'); ?></p>
						<div class="skill-list"><?php the_sub_field('list'); ?></div>
					</div>

			    <?php endwhile; endif; ?>

		</div>
	</div>

	<!-- Second Section -->
	<div id="second-image" style="background-image: url(<?php echo get_field('second_image'); ?>)">
		<div class="image-filter">
		</div>
	</div>
	<div class="container">
		<div class="content-padding">
			<p class="content-header"><?php the_field('second_header'); ?></p>
			<div class="content-text"><?php the_field('second_text'); ?></div>
		</div>
	</div>

	<!-- Third Section -->
	<div id="second-image" style="background-image: url(<?php echo get_field('third_image'); ?>)">
		<div class="image-filter">
		</div>
	</div>
	<div class="container" id="resume">
		<div class="content-padding">
			<p class="content-header"><?php the_field('third_header'); ?></p>
			<div class="content-text"><?php the_field('third_text'); ?></div>
			<div class="buttons">
				<?php if(get_field('resume_button')==true) { ?><a class="resume" href="<?php the_field('resume'); ?>">Resume</a><?php } ?>
			</div>
		</div>
	</div>

	<!-- Projects Section -->
	<div id="portfolio">
		<div class="container">
			<p class="project-header"><?php the_field('projects_header'); ?></p>
			<?php
		    //Find all portfolio
		    $args = array(
	        'post_type' => 'project',
	        'post_status' => 'publish',
	        'orderby' => 'menu_order',
	      	'order' => 'ASC'
		    );
		    $my_query = null;
		    $my_query = new WP_Query($args);
		    if( $my_query->have_posts() ) {
		      while ($my_query->have_posts()) : $my_query->the_post(); 
		      	$well_image=get_field('image'); ?>
				<div class="col-lg-4 text-center">
					<div class="project-well">
						<img src="<?php echo $well_image; ?>">
					</div>
				</div>
				<?php endwhile; } wp_reset_query();  // Restore global post data stomped by the_post().?>
			<a href="https://behance.net/<?php the_field('behance','option'); ?>">See more on <span><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/behance.svg"></span></a>
		</div>
	</div>

	<!-- Contact Me -->
	<div id="contact">
		<div class="container">
			<div class="col-lg-10 col-lg-offset-1" id="contact-form">
				<p class="project-header"><?php the_field('contact_header'); ?></p>
				<?php echo do_shortcode('[contact-form-7 id="4" title="Contact Form"]'); ?>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	jQuery( document ).ready( function( $ ) {
		$(window).load(function() {
			var width = $("div#hero-content").width();
			console.log("Width: ", width);
			width = width / 2 * (-1);
			$("div#hero-content").css('margin-left', width);
		});
	});
</script>

<?php get_footer(); ?>