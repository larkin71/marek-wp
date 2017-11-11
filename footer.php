<?php 
/*
Author: Jake Larkin  /  @jakelarkin71
Contact: jake@jetrail.co
Date of Edit: 9/1/2016

*/
?>  
    <!-- Dynamic Styling -->
    <style type="text/css">

    </style>
    <footer>

      	<div class="container">
      		<div class="row">
            <hr>
      			<div class="col-lg-6 col-lg-offset-3">
              <div class="footer-text"><?php the_field('footer_text','option'); ?></div>
      			</div>
      		</div>
      	</div>
    </footer>

  	<?php wp_footer(); ?>

  </body>
</html>