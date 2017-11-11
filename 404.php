<?php 
/*
Author: Jake Larkin  /  @jakelarkin71
Contact: jake@jetrail.co
Date of Edit: 9/1/2016

*/
?>


<?php get_header(); ?>
<div id="lost-page">	
	<div id="hero-tri"></div>
	<!-- Dynamic Styling -->
	<style type="text/css">
		footer{
			min-height: 0px;
			background-color: transparent;
		}
		footer .footer-left-nav li, 
		footer .footer-left-nav a, 
		footer .socialLinks a{
			color: #202020;
		}
	</style>	
	
	<!-- Header Text -->
	<div id="hero-text">
		<div class="container">
				<div id="hero-header" class="col-lg-12 hidden-xs">
					<p class="big-header-1">40</p>
					<div class="col-lg-3" style="padding-top:90px;"><hr></div>
					<div class="col-lg-3"><p class="big-header-2">4</p></div>
					<div class="col-lg-4 col-lg-offset-1"><p class="hero-text"><?php the_field('text', 'options'); ?></p></div>
				</div>
				<div class="mobile visible-xs col-xs-12">
					<p>404</p>
					<div><p class="hero-text"><?php the_field('text', 'options'); ?></p></div>
				</div>
				<div id="hero-content" class="col-lg-12 text-center">
					<a class="exit-link" href="<?php the_field('link','options'); ?>"><?php the_field('link_text'); ?></a>
				</div>
		</div>
	</div>

<?php get_footer(); ?>
