<?php 
/*
Author: Jake Larkin  /  @jakelarkin71
Contact: jake@jetrail.co
Date of Edit: 9/1/2016

*/
?>

<?php get_header('member'); ?>
<div id="single-case-page">	
	
	<script type="text/javascript">
		jQuery( function( $ ) {
			$("#menu-item-960").addClass("current-menu-item");
		});
	</script>

	<!-- Dynamic Styling -->
	<style type="text/css">
		@media (min-width: 768px) {
			#navigation .nav.navbar-left li:first-child a{
				margin-left: 0px;
			}
		}
	</style>	
	
	<!-- Header Text -->
	<div id="hero-text">
		<div class="container">
				<div id="hero-header" class="col-lg-12">
					<p class="big-header"><?php the_title(); ?></p>
					<hr>
				</div>
				<div id="hero-content">
					<p class="hero-text col-lg-5 col-lg-offset-6">
					<?php if(get_field('hero_header')!=''){ ?><span><?php the_field('hero_header'); ?></span><?php } ?>
					<?php if(get_field('hero_text')!=''){ ?><?php the_field('hero_text'); ?><?php } ?>
					</p>
				</div>
		</div>
	</div>

	<!-- Details section -->
	<div class="container" id="details">
		<div>
		<?php if( have_rows('details') ) {

		 	// loop through the details
		    while ( have_rows('details') ) : the_row(); ?>
			<div class="each-detail row">
				<?php $type = get_sub_field('type');

				if($type == "Full Media") { ?>
					<div class="col-lg-10 col-lg-offset-1 full-media">
						<?php if(get_sub_field('media_type')=='Image') { ?>
							<img src="<?php the_sub_field('full_image'); ?>">
						<?php } elseif (get_sub_field('media_type')=='Video') { 
							echo wp_oembed_get( get_sub_field('full_video_link') );
						} ?>
					</div>
				<?php }
				elseif($type == "Split Images") { ?>
					<?php 
					$left='';
					$right='';
					$split=get_sub_field('image_split');
					if($split=="small") { 
						$left="col-lg-4 col-lg-offset-1"; 
						$right="col-lg-6"; 
					}elseif($split=="half") { 
						$left="col-lg-5 col-lg-offset-1"; 
						$right="col-lg-5"; 
					}else{
						$left="col-lg-6 col-lg-offset-1"; 
						$right="col-lg-4";
					} ?>
					<div class="<?php echo $left; ?> split-images">
						<img src="<?php the_sub_field('left_image'); ?>">
					</div>
					<div class="<?php echo $right; ?> split-images">
						<img src="<?php the_sub_field('right_image'); ?>">
					</div>
				<?php }
				elseif($type == "Full Quote") { ?>
					<div class="col-lg-10 col-lg-offset-1">
						<div class="quote-well">
							<div class="quote"><p>"<?php the_sub_field('quote'); ?>"</p></div>
							<div class="quoted-person"><p>- <?php the_sub_field('quoted_person'); ?></p></div>
						</div>
					</div>
					
				<?php }
				elseif($type == "Split Quote") { ?>
					<?php $quote_side=get_sub_field('quote_side'); 
					if($quote_side=="Left") { ?>
						<div class="col-lg-6 col-lg-offset-1">
							<div class="quote-well">
								<div class="quote"><p>"<?php the_sub_field('split_quote'); ?>"</p></div>
								<div class="quoted-person"><p>- <?php the_sub_field('split_quoted_person'); ?></p></div>
							</div>
						</div>
						<div class="col-lg-4">
							<img src="<?php the_sub_field('split_image'); ?>">
						</div>
					<?php }else{ ?>
						<div class="col-lg-4 col-lg-offset-1">
							<img src="<?php the_sub_field('split_image'); ?>">
						</div>
						<div class="col-lg-6">
							<div class="quote-well">
								<div class="quote"><p>"<?php the_sub_field('split_quote'); ?>"</p></div>
								<div class="quoted-person"><p>- <?php the_sub_field('split_quoted_person'); ?></p></div>
							</div>
						</div>
					<?php } ?>
				<?php } else { ?>
					<div class="col-lg-6 col-lg-offset-1 text row">
						<p class="text-header"><?php the_sub_field('text_header'); ?></p>
						<p class="text-content"><?php the_sub_field('text_content'); ?></p>
					</div>
				<?php } ?>
			</div>
		    <?php endwhile;
		} ?>
		</div>


		<div id="pagination" class="col-lg-12">
			<?php 
				if(get_previous_post()) { 
					$prev_post = get_previous_post();
					$prev_post_title = $prev_post->post_title;
					$prev_post_link = get_permalink( $prev_post->ID );
				}else{
					$prev_post = new WP_Query('post_type=case&posts_per_page=1&order=DESC'); $prev_post->the_post();
					$prev_post_title = get_the_title();
					$prev_post_link = get_permalink();
				  	wp_reset_query();
				}
				if(get_next_post()) { 
					$next_post = get_next_post();
					$next_post_title = $next_post->post_title;
					$next_post_link = get_permalink( $next_post->ID );
				}else{
					$next_post = new WP_Query('post_type=case&posts_per_page=1&order=ASC'); $next_post->the_post();
					$next_post_title = get_the_title();
					$next_post_link = get_permalink();
				  	wp_reset_query();
				} 
			?>
			<div class="col-lg-4 previous text-right col-xs-6">
				<a href="<?php echo $prev_post_link; ?>">
					<span class="link" style="margin-right:-7px;"><span class="prev-fix">Prev</span> Project</span><br>
					<span class="title hidden-xs"><?php echo $prev_post_title; ?></span>
				</a>
			</div>
			<div class="col-lg-4 return text-center hidden-xs">
				<a class="link" href="<?php echo get_permalink(954); ?>">Back To Work</a>
			</div> 
			<div class="col-lg-4 next text-left col-xs-6">
				<a href="<?php echo $next_post_link; ?>">
					<span class="link">Next Project</span><br>
					<span class="title hidden-xs"><?php echo $next_post_title; ?></span>
				</a>
			</div>
		</div>
	</div>
</div>



<?php get_footer(); ?>