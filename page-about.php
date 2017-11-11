<?php 
/*
Author: Jake Larkin  /  @jakelarkin71
Contact: jake@jetrail.co
Date of Edit: 9/1/2016

*/
?>

<?php get_header(); ?>
<div id="about-page">	

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

	<!-- Team section -->
	<div class="container slim" id="team">
		
	    <?php
	    //Find all team members
	    $careers_header = get_field('careers_header');
	    $careers_text = get_field('careers_text');
	    $cta_text = get_field('careers_cta_text');
	    $cta_link = get_field('careers_cta_link');
	    $args = array(
        'post_type' => 'member',
        'post_status' => 'publish',
        'orderby' => 'menu_order',
      	'order' => 'ASC'
	    );
	    $counter=1;
	    $my_query = null;
	    $my_query = new WP_Query($args);
	    if( $my_query->have_posts() ) {
	      while ($my_query->have_posts()) : $my_query->the_post(); 
	      	$image=get_field('hero_image');
			switch ($counter) {
				case 1: ?>
					<div class="case col-lg-5 col-lg-offset-1">
						<a href="<?php echo get_permalink(); ?>"><div class="case-well drift" style="background-image: url(<?php echo $image; ?>)">
							<div id="image-filter">
								<ul class="nav navbar-nav"><li class="case-title"><span><?php the_title() ?></span></li></ul>
							</div>
						</div></a>
					</div> <?php $counter=2;
					break;
				case 2; ?>
					<div class="case col-lg-5">
						<a href="<?php echo get_permalink(); ?>"><div class="case-well drift" style="background-image: url(<?php echo $image; ?>)">
							<div id="image-filter">
								<ul class="nav navbar-nav"><li class="case-title"><span><?php the_title() ?></span></li></ul>
							</div>
						</div></a>
					</div> <?php $counter=1;
					break;
			} ?>
		<?php endwhile; } ?>
		<?php wp_reset_query();  // Restore global post data stomped by the_post().?>
		
		<div class="careers-blurb col-lg-6 col-lg-offset-5 text-right">
			<p class="header"><?php echo $careers_header; ?></p>
			<p class="text"><?php echo $careers_text; ?></p>
			<a href="<?php echo $cta_link ?>"><?php echo $cta_text; ?></a>
		</div>
	</div>
</div>
<script type="text/javascript">
	jQuery(document).ready(function($){

         $(window).on('scroll', function() {
                var y_scroll_pos = window.pageYOffset;
                var act_1 = 280;
                var act_2 = 350;
                var act_3 = 660;
                var act_4 = 700;  

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

        });

    })
</script>


<?php get_footer(); ?>