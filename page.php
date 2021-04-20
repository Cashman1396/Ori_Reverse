<?php 

get_header(); 
?>


<?php while ( have_posts() ) : the_post(); ?> <!--queries the projects-page.php-->
	
<div class="excerpt">
     <?php the_content() ?> <!--Grabs any content added to the Editor-->
    <?php endwhile; // end of the loop. ?>
</div>



<?php get_footer() ?>