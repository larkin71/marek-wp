<?php 
/*
Author: Jake Larkin  /  @jakelarkin71
Contact: jake@jetrail.co
Date of Edit: 9/1/2016

*/
?>
<?php get_header(); ?>
<div id="notes-page">

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
	<div class="container">
		<div class="blog-feed" id="ajax-posts">
			<?php
			$num_posts = get_field('number_posts');
		    $args=array(
		    	'post_type' => 'post',
		    	'showposts' => $num_posts
		    );
		    $my_query = null;
		    $counter=1;
		    $my_query = new WP_Query($args);
		    if( $my_query->have_posts() ) {
		      while ($my_query->have_posts()) : $my_query->the_post(); ?>

		      	<?php $feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
		      	<?php $url = get_permalink(); ?>
		      	<?php $title = get_the_title(); ?>

		      	<div class="each-post col-lg-12" <?php if($counter==3){ echo "style='border-bottom:none;'"; } ?>>
					<a href="<?php echo $url; ?>" id="post-<?php echo $post->ID; ?>" class="post-image">
						<div class="col-lg-8 col-lg-offset-2">
							<p class="title"><?php echo $title; ?></p>
						</div>
						<div class="col-lg-10 col-lg-offset-1">	
							<?php if($feat_image) { ?><img src="<?php echo $feat_image; ?>"> <?php } ?>
						</div>
						<div class="col-lg-8 col-lg-offset-2 post-content">
							<p class="author">Written by <?php echo get_the_author(); ?><span class="date hidden-xs">  <span style="padding-left:5px;padding-right: 5px;">|</span>  <?php echo get_the_date('m/d/Y'); ?></span></p>
							<p class="date visible-xs"><?php echo get_the_date('m/d/Y'); ?></p>
							<p class="excerpt"><?php echo wp_trim_words( get_the_excerpt(), 120); ?></p>
						</div>
					</a>
				</div>
				<?php $counter++; ?>
				
			<?php endwhile; } ?>
			<?php wp_reset_query(); 
				wp_reset_postdata(); ?>
		</div> 
		<div class="see-more-posts text-center row col-lg-12">
			<div id="more_posts"><?php the_field('button_text'); ?></div>
		</div>
	</div>
</div>
<script type="text/javascript">
	jQuery(document).ready(function() {
		var ppp = 3 // Post per page
		var pageNumber = 1;
		function load_posts(){
		pageNumber++;
		var str = '&pageNumber=' + pageNumber + '&ppp=' + ppp + '&action=more_post_ajax';
		jQuery.ajax({
		    type: "POST",
		    dataType: "html",
		    url: ajax_posts.ajaxurl,
		    data: str,
		    success: function(data){
		        var $data = jQuery(data);
		        if($data.length){
		            jQuery("#ajax-posts").append($data);
		            jQuery(".new-post").css({ opacity: 0 }).fadeTo(500,1,"linear");
		            jQuery("#more_posts").attr("disabled",false);
		        } else{
		            jQuery("#more_posts").attr("disabled",true);
		            jQuery("#more_posts").html("No More Posts");
		        }
		    },
		    error : function(jqXHR, textStatus, errorThrown) {
		        $loader.html(jqXHR + " :: " + textStatus + " :: " + errorThrown);
		    }

		});
		return false;
		}

		jQuery("#more_posts").on("click",function(){ // When btn is pressed.
		    // jQuery("#more_posts").attr("disabled",true); // Disable the button, temp.
		    load_posts();
		});
	});
</script>



<?php get_footer(); ?>