<?php
 
/* This is the template for displaying Single Project details */
 
get_header(); ?>


<div id="main-content" class="main-content">

    <div id="primary" class="content-area">
        <div id="content" class="site-content" role="main">
			<img src= "<?php echo get_relative_thumb( 'medium' ); ?>">
            <?php
                // Start the Loop.
				
				 
                the_content(); 
            ?>
        </div><!-- #content -->
    </div><!-- #primary -->
</div><!-- #main-content -->



<?php get_footer(); ?>