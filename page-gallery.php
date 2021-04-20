<?php
/*Template Name: Image gallery
*/

get_header();
?>


<?php while ( have_posts() ) : the_post(); ?> <!--queries the projects-page.php-->

<?php 
$images = get_field('gallery');
if( $images ): ?>
    <ul>
        <?php foreach( $images as $image_ID ): ?>
            <li>
                <?= wp_get_attachment_image($image_ID, "full") ?>
                
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

     <?php the_content() ?> <!--Grabs any content added to the Editor-->
    <?php endwhile; // end of the loop. ?>



<?php get_footer(); 
?>