<?php
/*Template Name: Image gallery
*/

get_header();
?>


<?php while ( have_posts() ) : the_post(); ?> <!--queries the projects-page.php-->


     <?php the_content() ?> <!--Grabs any content added to the Editor-->
    <?php endwhile; // end of the loop. ?>



<?php get_footer(); 
?>