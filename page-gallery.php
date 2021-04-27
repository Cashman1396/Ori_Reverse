<?php
/*Template Name: Image gallery
*/

get_header();
?>


<div class="your-class">
    <div>First </div>
    <div>Second </div>
    <div>It works!</div>
  </div>

<?php while ( have_posts() ) : the_post(); ?> <!--queries the projects-page.php-->

<?php //echo do_shortcode('[sp_wpcarousel id="86"]'); ?>

<?php 
$images = get_field('gallery');
if( $images ): ?>
    <div class="slider-for">
        <?php foreach( $images as $image_ID ): ?>
            <div>
                <?= wp_get_attachment_image($image_ID, "full") ?>
                
        </div>
        <?php endforeach; ?>
        </div>
<?php endif; ?>

<?php if( $images ): ?>
    <div class="slider-nav">
        <?php foreach( $images as $image_ID ): ?>
            <div>
                <?= wp_get_attachment_image($image_ID, "full") ?>
                
        </div>
        <?php endforeach; ?>
        </div>
<?php endif; ?>
     <?php the_content() ?> <!--Grabs any content added to the Editor-->
    <?php endwhile; // end of the loop. ?>



<?php get_footer(); 
?>