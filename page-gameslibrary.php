<?php
/* Template Name: Games Library */
  
get_header(); 
 
?>


<?php while ( have_posts() ) : the_post(); ?> <!--queries the projects-page.php-->

<?php the_content() ?> <!--Grabs any content added to the Editor-->
<?php endwhile; // end of the loop. ?>




<div class="footer">
<?php get_footer(); ?>
</div>