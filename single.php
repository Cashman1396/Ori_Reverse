<?php
 
/* This is the template for displaying Single Project details */
 
get_header(); ?>




<div id="main-content" class="main-content">

    <div id="primary" class="content-area">
        <div id="content" class="site-content" role="main">
            <?php
                // Start the Loop.
                while ( have_posts() ) : the_post();

					echo get_relative_thumb( 'medium' );
                    // Include the page content template.
                    get_template_part( 'content', 'page' );

                endwhile;
            ?>
        </div><!-- #content -->
    </div><!-- #primary -->
</div><!-- #main-content -->








<?php get_footer(); ?>