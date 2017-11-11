<?php 
/*
Author: Jake Larkin  /  @jakelarkin71
Contact: jake@jetrail.co
Date of Edit: 9/1/2016

*/
?>

<?php get_header(); ?>
<div id="careers-page">	
	
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

	<!-- Description section -->
	<div class="container" id="description">
		
	<?php if( have_rows('details') ) {

	 	// loop through the details
	    while ( have_rows('details') ) : the_row(); 
	    $side = get_sub_field('image_side');
	    $media = get_sub_field('media');
	    if($media=="Image") { 
	    	$media_link=get_sub_field('image'); 
	    }else {
	    	$media_link=get_sub_field('video_link'); 
	    } ?>
		<div class="each-detail row">
			<div class="col-lg-6 detail-media <?php if($side=="Right"){echo "pull-right";} ?>">
		        <?php if ($media == 'Image') { ?>
					<img src="<?php echo $media_link; ?>">
				<?php } elseif ($media == "Video") { 
					echo wp_oembed_get( $media_link );
				} ?>
		    </div>
	    	<div class="col-lg-6 detail-text <?php if($side=="Right"){echo "text-right";} ?>">
	        	<p><?php the_sub_field('content'); ?></p>
	        </div>
		</div>
	    <?php endwhile; } ?>
	</div>

	<div class="container" id="job-postings">
		<div class="postings-header col-lg-8 col-lg-offset-2">
			<p class="header-text"><?php the_field('postings_header'); ?></p><br>
			<p class="header-content"><?php the_field('postings_content'); ?></p>
		</div>
		
		<?php
	    //Find all job postings
	    $args = array(
        'post_type' => 'job',
        'post_status' => 'publish',
        'orderby' => 'menu_order',
      	'order' => 'ASC'
	    );
	    $my_query = null;
	    $my_query = new WP_Query($args);
	    if( $my_query->have_posts() ) {
	      while ($my_query->have_posts()) : $my_query->the_post(); ?>

	      	<button class="accordion">
	      		<span class="col-lg-8 col-xs-11 col-lg-offset-2"><?php the_title(); ?></span>
	      		<span class="more pull-right" style="background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/plus.svg);"></span>

	      	</button>
			<div class="panel col-lg-8 col-lg-offset-2">
			  <?php the_field('job_description'); ?>
			  <?php if(get_field('include_typ_instr')) { ?>
			  	<p style="text-transform:uppercase;margin-top:20px;margin-bottom:0px;font-weight:600;opacity:0.6;">Ready To Join Wilbur?</p>
			  	<p><a href="<?php echo get_permalink(952); ?>">Send us</a> your favorite GIF so we know it’s real. Or if you’re really an overachiever, figure out your own creative way to get our attention and the job is yours.</p>
			  	<?php } else {
			  		the_field('custom_instructions'); 
			  	} ?>
			  	<button class="close-well-button pull-right">
			  		<span class="close-well" style="background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/plus.svg);"></span>
			  	</button>
			</div>

		<?php endwhile; } ?>
		<hr>
		<?php wp_reset_query();  // Restore global post data stomped by the_post().?>

	</div>
</div>

<script type="text/javascript">
	jQuery( function( $ ) {
		var acc = document.getElementsByClassName("accordion");
		var i;

		for (i = 0; i < acc.length; i++) {
		    acc[i].onclick = function(){
		        this.classList.toggle("active");
		        this.nextElementSibling.classList.toggle("show");
		        $(this).find('span.more').toggleClass('rotate');
		    }
		}
		var acc = document.getElementsByClassName("close-well-button");
		var i;
		for (i = 0; i < acc.length; i++) {
		    acc[i].onclick = function(){
		        $(this).parent().toggleClass("show");
		        $(this).parent().prev().find('span.more').toggleClass('rotate');
		    }
		}
	});
</script>
	




<?php get_footer(); ?>