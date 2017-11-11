<?php 
/*
Author: Jake Larkin  /  @jakelarkin71
Contact: jake@jetrail.co
Date of Edit: 9/1/2016

*/
?>

<?php get_header(); ?>
<div id="work-page">	

	<!-- Dynamic Styling -->
	<style type="text/css">

	</style>	
	
	<!-- Header Text -->
	<div id="hero-text">
		<div class="container">
				<div id="hero-header" class="col-lg-12">
					<p class="big-header"><?php the_field('hero_header'); ?></p>
					<hr>
				</div>
				<div id="hero-content">
					<p class="hero-text col-lg-5 pull-right"><?php the_field('hero_content'); ?></p>
				</div>
		</div>
	</div>

	<!-- Portfolio section -->
	<div class="container slim" id="portfolio">
		
	    <?php
	    //Find all case studies
	    $quote= get_field('featured_quote');
	    $quoted_person = get_field('quoted_person');
	    $args = array(
        'post_type' => 'case',
        'post_status' => 'publish',
        'orderby' => 'menu_order',
      	'order' => 'ASC'
	    );
	    $counter=1;
	    $my_query = null;
	    $my_query = new WP_Query($args);
	    if( $my_query->have_posts() ) {
	      while ($my_query->have_posts()) : $my_query->the_post(); 
	      	$well_image=get_field('featured_image');
			switch ($counter) {
				case 1: ?>
					<div class="case col-lg-6 col-lg-offset-1">
						<a href="<?php echo get_permalink(); ?>"><div class="case-well drift" style="background-image: url(<?php echo $well_image; ?>)">
							<div id="image-filter">
								<ul class="nav navbar-nav"><li class="case-title"><span><?php the_title() ?></span></li></ul>
							</div>
						</div></a>
					</div> <?php $counter=2;
					break;
				case 2; ?>
					<div class="case col-lg-4">
						<a href="<?php echo get_permalink(); ?>"><div class="case-well drift" style="background-image: url(<?php echo $well_image; ?>)">
							<div id="image-filter">
								<ul class="nav navbar-nav"><li class="case-title"><span><?php the_title() ?></span></li></ul>
							</div>
						</div></a>
					</div> <?php $counter=3;
					break;
				case 3; ?>
					<div class="case col-lg-4 col-lg-offset-1">
						<a href="<?php echo get_permalink(); ?>"><div class="case-well drift" style="background-image: url(<?php echo $well_image; ?>)">
							<div id="image-filter">
								<ul class="nav navbar-nav"><li class="case-title"><span><?php the_title() ?></span></li></ul>
							</div>
						</div></a>
					</div> <?php $counter=4;
					break;
				case 4; ?>
					<div class="case col-lg-6">
						<a href="<?php echo get_permalink(); ?>"><div class="case-well drift" style="background-image: url(<?php echo $well_image; ?>)">
							<div id="image-filter">
								<ul class="nav navbar-nav"><li class="case-title"><span><?php the_title() ?></span></li></ul>
							</div>
						</div></a>
					</div> 
					<div class="col-lg-6 col-lg-offset-1">
						<div class="quote-well">
							<div class="quote"><p>"<?php echo $quote; ?>"</p></div>
							<div class="quoted-person"><p>- <?php echo $quoted_person; ?></p></div>
						</div>
					</div><?php $counter=5;
					break;
				case 5; ?>
					<div class="case col-lg-4">
						<a href="<?php echo get_permalink(); ?>"><div class="case-well drift" style="background-image: url(<?php echo $well_image; ?>)">
							<div id="image-filter">
								<ul class="nav navbar-nav"><li class="case-title"><span><?php the_title() ?></span></li></ul>
							</div>
						</div></a>
					</div> <?php $counter=6;
					break;
				case 6: ?>
					<div class="case col-lg-4 col-lg-offset-1">
						<a href="<?php echo get_permalink(); ?>"><div class="case-well drift" style="background-image: url(<?php echo $well_image; ?>)">
							<div id="image-filter">
								<ul class="nav navbar-nav"><li class="case-title"><span><?php the_title() ?></span></li></ul>
							</div>
						</div></a>
					</div> <?php $counter=7;
					break;
				case 7; ?>
					<div class="case col-lg-6">
						<a href="<?php echo get_permalink(); ?>"><div class="case-well drift" style="background-image: url(<?php echo $well_image; ?>)">
							<div id="image-filter">
								<ul class="nav navbar-nav"><li class="case-title"><span><?php the_title() ?></span></li></ul>
							</div>
						</div></a>
					</div> <?php $counter=1;
					break;
			} ?>
		<?php endwhile; } ?>
		<?php wp_reset_query();  // Restore global post data stomped by the_post().?>

	</div>
</div>
<script type="text/javascript">
	jQuery(document).ready(function($){

         $(window).on('scroll', function() {
                var y_scroll_pos = window.pageYOffset;
                var act_1 = 280;
                var act_2 = 350;
                var act_3 = 560;
                var act_4 = 600;  
                var act_6 = 1100;  
                var act_7 = 1600;  
                var act_8 = 1600;  

                if(y_scroll_pos > act_1 ) {
                    $('.case:nth-of-type(1)').find('.case-well').removeClass('drift');
                }
                if(y_scroll_pos > act_2 ) {
                    $('.case:nth-of-type(2)').find('.case-well').removeClass('drift');
                }
                if(y_scroll_pos > act_3 ) {
                    $('.case:nth-of-type(3)').find('.case-well').removeClass('drift');
                }
                if(y_scroll_pos > act_4 ) {
                    $('.case:nth-of-type(4)').find('.case-well').removeClass('drift');
                }
                if(y_scroll_pos > act_6 ) {
                    $('.case:nth-of-type(6)').find('.case-well').removeClass('drift');
                }
                if(y_scroll_pos > act_7 ) {
                    $('.case:nth-of-type(7)').find('.case-well').removeClass('drift');
                }
                if(y_scroll_pos > act_8 ) {
                    $('.case:nth-of-type(8)').find('.case-well').removeClass('drift');
                }

        });

    })
</script>
	




<?php get_footer(); ?>