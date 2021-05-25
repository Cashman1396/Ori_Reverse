<?php 

/* Template Name: About */

get_header(); 
?>

<div class="your-class">
    <div>First </div>
    <div>Second </div>
    <div>It works!</div>
  </div>


<?php while ( have_posts() ) : the_post(); ?> <!--queries the projects-page.php-->
	
     <?php the_content() ?> <!--Grabs any content added to the Editor-->
    <?php endwhile; // end of the loop. ?>



<div class="footer">
<?php get_footer(); ?>
</div>