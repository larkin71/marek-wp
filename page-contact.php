<?php 
/*
Author: Jake Larkin  /  @jakelarkin71
Contact: jake@jetrail.co
Date of Edit: 9/1/2016

*/
?>
<?php get_header(); ?>
<div id="contact-page">
	
	<!-- Dynamic Styling -->
	<style type="text/css">
		div.pp_default .pp_close{
			background-image: url("<?php echo get_stylesheet_directory_uri(); ?>/images/close-button.svg");
		}
	</style>	
	
	<!-- Header Text -->
	<div id="hero-text">
		<div class="container slim">
			<div id="hero-header" class="col-lg-12">
				<p class="big-header"><?php the_field('hero_header'); ?></p>
			</div>
			<div id="hero-content" class="col-lg-12">
				<?php if(get_field('include_email')){ ?>
					<a class="email" href="mailto:<?php the_field('contact_email','option'); ?>"><?php the_field('contact_email','option'); ?></a><br>
				<?php }if(get_field('include_phone')){ ?>
					<?php $phoneNo = get_field('phone_number','option');
	                    $string1=array("-", "(", ")",".", " ");
	                    $string2=array("", "", "","", "");
	                  ?>
					<a class="phone" href="tel:<?php echo str_replace($string1,$string2,$phoneNo);?>"><?php the_field('phone_number','option'); ?></a>
				<?php } ?>
			</div>
			<div class="col-lg-12 text-center cincy-image">
				<div class="hidden-xs">
					<a rel="wp-video-lightbox" href="<?php the_field('video_link');?>">
						<span>Made In</span><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/cincy.svg" alt="Made In Cincinnati" height="88px"><span>Cincinnati</span>
					</a>
				</div>
				<div class="visible-xs">
					<a rel="wp-video-lightbox" href="<?php the_field('video_link');?>">
						<span class="col-xs-offset-1 col-xs-3 text-right" style="padding:0px;padding-top:25px;">Made In</span><img class="col-xs-4 no-padding" src="<?php echo get_stylesheet_directory_uri(); ?>/images/cincy.svg" alt="Made In Cincinnati" height="88px"><span class="col-xs-3" style="padding:0px;padding-top:25px;">Cincinnati</span>
					</a>
				</div>
			</div>
		</div>
	</div>
</div>


<?php get_footer(); ?>