<?php 
/*
Author: Jake Larkin  /  @jakelarkin71
Contact: jake@jetrail.co
Date of Edit: 8/28/2016
Purpose: Default Header with Nav

*/
?>

<head>
    <meta charset="utf-8">
    <title><?php echo get_post_meta(get_the_ID(), '_yoast_wpseo_title', true); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo get_bloginfo('description'); ?>">

    <!-- Stylesheets -->
    <link href="<?php bloginfo('stylesheet_url');?>" rel="stylesheet">

    <!-- Using a Mobile Editing CSS for Editing Clarity -->
    <link href="<?php echo get_stylesheet_directory_uri(); ?>/css/mobilize.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <?php wp_enqueue_script("jquery"); ?>
    <?php wp_head(); ?>
</head>
<body>
  <header>
    <nav class="navbar" role="navigation">
       <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
             <span class="sr-only">Toggle navigation</span>
             <span class="icon-bar"></span>
             <span class="icon-bar"></span>
             <span class="icon-bar"></span>
          </button>
       </div>

       <div class="collapse navbar-collapse  navbar-ex1-collapse">
          <ul class="nav navbar-nav">
             <?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>
          </ul>
          <a href="/"><span id="logo-block"><img src="<?php the_field('logo','option'); ?>"></span></a>
      </div>
    </nav>
  </header>
<script>

    jQuery(document).ready(function($) {
      $('a[href*=#]:not([href=#])').click(function() {
        if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
          var target = $(this.hash);
          var headerHeight = $("#navigation").height()+10;
          target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
          if (target.length) {
            $('html,body').animate({
              scrollTop: target.offset().top - headerHeight
            }, 1000);
            return false;
          }
        }
      });
    });

</script>

<!-- Dynamic Styling -->
<style type="text/css">

  
</style>

