<?php
/* Template Name: Projects Portfolio */
  
get_header(); 
 
?>
<!-- ============ CONTENT START ============ -->
<div class="container">
    <div class="row">
        <div id="content-projects" class="page-wrap">
            <div class="col-sm-12 content-wrapper">
                <?php while ( have_posts() ) : the_post(); ?> <!--queries the projects-page.php-->
                  <?php the_content() ?> <!--Grabs any content added to the Editor-->
                    <?php endwhile; // end of the loop. ?>
            </div><!-- End intro/descriptive copy column-->
        </div> <!-- End intro/descriptive copy container-->
    </div>
         
    <div id="projects" class="row">        
    <!-- Start projects Loop -->
        <?php
        /* 
        Query the post 
        */
        $args = array( 'post_type' => 'projects', 'posts_per_page' => -1 );
        $loop = new WP_Query( $args );
        while ( $loop->have_posts() ) : $loop->the_post(); 
        ?>

                                     
        <?php echo '<div class="project col-sm-6 col-md-3">';?>
        
            <a href="<?php print get_permalink($post->ID) ?>">
                <?php echo the_post_thumbnail(); ?></a>
                <h4><?php print get_the_title(); ?></h4>
                <?php print get_the_excerpt(); ?><br />
                <a class="btn btn-default" href="<?php print get_permalink($post->ID) ?>">Details</a>
        </div> <!-- End individual project col -->
        <?php endwhile; ?> 
    </div><!-- End Projects Row -->
</div><!-- End Container --> 
<!-- ============ CONTENT END ============ -->
 
<div class="footer">
<?php get_footer(); ?>
</div>