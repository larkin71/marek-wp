<?php 
/*
Author: Jake Larkin  /  @jakelarkin71
Contact: jake@jetrail.co
Date of Edit: 9/1/2016

*/
?>

<?php get_header('member'); ?>
<div id="single-member-page">	
	
	<script type="text/javascript">
		jQuery( function( $ ) {
			$("#menu-item-963").addClass("current-menu-item");
			if($(window).width() > 768){
				$('.navbar-brand').find('.leg1').attr('src','<?php echo get_stylesheet_directory_uri(); ?>/images/logo-leg-1-white.svg');
				$('.navbar-brand').find('.leg2').attr('src','<?php echo get_stylesheet_directory_uri(); ?>/images/logo-leg-2-white.svg');
				$('.navbar-brand').find('.leg3').attr('src','<?php echo get_stylesheet_directory_uri(); ?>/images/logo-leg-3-white.svg');
				var scroll = $('#hero-text').height();
				$(window).on('scroll', function() {
	                var y_scroll_pos = window.pageYOffset;
	                if(y_scroll_pos > scroll) {
	                    $('.navbar-brand').find('.menu-text').addClass('dark');
	                    $('.navbar-brand').find('.leg1').attr('src','<?php echo get_stylesheet_directory_uri(); ?>/images/logo-leg-1.svg');
						$('.navbar-brand').find('.leg2').attr('src','<?php echo get_stylesheet_directory_uri(); ?>/images/logo-leg-2.svg');
						$('.navbar-brand').find('.leg3').attr('src','<?php echo get_stylesheet_directory_uri(); ?>/images/logo-leg-3.svg');
	                }else{
	                	$('.navbar-brand').find('.menu-text').removeClass('dark');
	                	$('.navbar-brand').find('.leg1').attr('src','<?php echo get_stylesheet_directory_uri(); ?>/images/logo-leg-1-white.svg');
						$('.navbar-brand').find('.leg2').attr('src','<?php echo get_stylesheet_directory_uri(); ?>/images/logo-leg-2-white.svg');
						$('.navbar-brand').find('.leg3').attr('src','<?php echo get_stylesheet_directory_uri(); ?>/images/logo-leg-3-white.svg');
	                }
	        	});
			}else{
				$('.navbar-toggle').find('.leg1').attr('src','<?php echo get_stylesheet_directory_uri(); ?>/images/logo-leg-1-white.svg');
				$('.navbar-toggle').find('.leg2').attr('src','<?php echo get_stylesheet_directory_uri(); ?>/images/logo-leg-2-white.svg');
				$('.navbar-toggle').find('.leg3').attr('src','<?php echo get_stylesheet_directory_uri(); ?>/images/logo-leg-3-white.svg');
			}
			// $('#lightbox-button').click(function() {
	  //       	$('#play-button img').addClass('expanded');
	  //     	});
	      	// $('.pp_overlay').click(function() {
	       //  	$('#hero-text').toggleClass('expanded');
	       //  	$('#image-filter').toggleClass('expanded');
	      	// });
		});
	</script>
	<!-- Dynamic Styling -->
	<style type="text/css">
		#hero-text{
			background-image: url(<?php the_field('hero_image'); ?>);
			transition: all 0.3s ease;
		}
		#navigation .nav.navbar-left li a{
			color: white;
		}
		#navigation .nav.navbar-left li.current-menu-item:before {
			background-color: white;
		}
		#navigation .nav.navbar-left li:hover:before{
			background-color: white;
		}
		#navbar-open .menu-text{
			color: white;
		}
		a.navbar-brand:hover{
			opacity: 1;
		}
		div.pp_default .pp_close{
			background-image: url("<?php echo get_stylesheet_directory_uri(); ?>/images/close-button.svg");
		}	
		#navigation .navbar-brand .menu-text{
			color: white;
		}
		.expanded{
			height: 40px;
		}
	</style>	
	
	<!-- Header Text -->
	<div id="hero-text">
		<div id="image-filter">
			<div class="container">
				<div id="hero-header" class="col-lg-12">
					<p class="big-header"><?php the_title() ?></p>
					<?php if(get_field('video_link')) { ?>
						<a id="lightbox-button" rel="wp-video-lightbox" href="<?php the_field('video_link');?>">
							<span id="play-button">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/play_video.svg"  height="45px"><span id="play-video">Play Video</span>
							</span>
						</a>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>

	<!-- Interview section -->
	<div class="container slim" id="interview">
		<div class="col-lg-12">
			<p class="hero-text"><?php the_field('hero_content'); ?></p>
		</div>
		<div class="questions col-lg-8 col-lg-offset-2">
		<?php if( have_rows('questions') ) {

		 	// loop through the questions
		    while ( have_rows('questions') ) : the_row(); ?>
			<div class="each-question">
		        <p class="question"><?php the_sub_field('question'); ?></p>
		        <?php the_sub_field('answer'); ?>
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
					$prev_post = new WP_Query('post_type=member&posts_per_page=1&order=DESC'); $prev_post->the_post();
					$prev_post_title = get_the_title();
					$prev_post_link = get_permalink();
				  	wp_reset_query();
				}
				if(get_next_post()) { 
					$next_post = get_next_post();
					$next_post_title = $next_post->post_title;
					$next_post_link = get_permalink( $next_post->ID );
				}else{
					$next_post = new WP_Query('post_type=member&posts_per_page=1&order=ASC'); $next_post->the_post();
					$next_post_title = get_the_title();
					$next_post_link = get_permalink();
				  	wp_reset_query();
				} 
			?>
			<div class="col-lg-4 previous text-right col-xs-6">
				<a href="<?php echo $prev_post_link; ?>">
					<span class="link" style="margin-right:-7px;"><span class="prev-fix">Prev Team</span> Member</span><br>
					<span class="title hidden-xs"><?php echo $prev_post_title; ?></span>
				</a>
			</div>
			<div class="col-lg-4 return text-center hidden-xs">
				<a class="link" href="<?php echo get_permalink(961); ?>">Back To About</a>
			</div> 
			<div class="col-lg-4 next text-left col-xs-6">
				<a href="<?php echo $next_post_link; ?>">
					<span class="link">Next Team Member</span><br>
					<span class="title hidden-xs"><?php echo $next_post_title; ?></span>
				</a>
			</div>

		</div>
	</div>
</div>



<?php get_footer(); ?>