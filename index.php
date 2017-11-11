<?php 
/*
Author: Jake Larkin  /  @jakelarkin71
Contact: jake@jetrail.co
Date of Edit: 9/1/2016

*/
?>


<?php get_header(); ?>
<div id="post-page">
	
	<script type="text/javascript">
		jQuery( function( $ ) {
			$("#menu-item-958").addClass("current-menu-item");
		});
	</script>
	<!-- Dynamic Styling -->
	<style type="text/css">

	</style>
	
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	  <div class="container blog-feed slim">
		<div class="col-lg-12 single-post" id="post-<?php echo $post->ID; ?>">
				<a href="<?php echo get_permalink('948'); ?>"><span class="close-post pull-right" style="background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/close-post.svg);"></span></a>
				<?php if ( has_post_thumbnail() ) : ?><img id="thumb" src="<?php echo wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) ); ?>"/><?php endif; ?>
				<div class="col-lg-8 col-lg-offset-2 post-content">
					<p class="title"><?php the_title(); ?></p>
					<p class="author">Written by <?php echo get_the_author(); ?></p>
					<p class="date"><?php echo get_the_date('m/d/Y'); ?></p>
					<div class="content"><?php the_content(); ?></div>
				</div>
			</a>
		</div>

		<?php endwhile; else : ?>
		<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
		<?php endif; ?>
		<?php wp_reset_query();  // Restore global post data stomped by the_post().?>
		<?php wp_reset_postdata();  // Restore global post data stomped by the_post().?>
	    <div class="see-more-posts text-center row col-lg-12">
			<a href="<?php echo get_permalink('948'); ?>">Back To Notes</a>
		</div>

	  </div>
</div>
<?php get_footer(); ?>
