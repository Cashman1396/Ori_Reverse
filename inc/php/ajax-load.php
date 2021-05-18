<?php
//Ajax Loads -- Posts Page
add_action( 'wp_ajax_nopriv_filter', 'filter_ajax' );
add_action( 'wp_ajax_filter', 'filter_ajax' );

function filter_ajax() {
    
    $data = $_POST['data'];
    
    $categories = $_POST['category'];
	$sort = $_POST['sort'];

    $get_posts = array( 
        'post_type' => 'projects',
		'posts_per_page' => 4
	);
    
    if ($categories != '') {
        $get_posts['category_name'] = $categories;
    }
	
	if ($sort) {
        $get_posts['order'] = $sort;
    }
    
    $loop = new WP_Query( $get_posts ); 


    
	if ( $loop->have_posts() ) { ?>

    <div id="category" class="row" data-category="<?php echo $categories?>">
		<div class="col text-center">
			<div id="filter-message"></div>
		</div>
	</div>


    <?php while ( $loop->have_posts() ) : $loop->the_post();  ?>

                                     
        <?php echo '<div class="project col-sm-6 col-md-3">';?>
        
            <a href="<?php print get_permalink($post->ID) ?>">
                <?php echo the_post_thumbnail(); ?></a>
                <h4><?php print get_the_title(); ?></h4>
                <?php print get_the_excerpt(); ?><br />
                <a class="btn btn-default" href="<?php print get_permalink($post->ID) ?>">Details</a>
        </div> <!-- End individual project col -->
        <?php endwhile; ?> 

        
   
    <?php if (  $loop->max_num_pages > 1 ) : ?>
    <!---
    <div class="row">
        <div class="col text-center">
            <?php echo '<a href="#" class="btn" id="loadmore">See More</a>'; // you can use <a> as well ?>
        </div>
    </div>
    --->
    <?php endif;
    

	 } else {
		echo 'No Posts found.';
	}
	/* Restore original Post Data */
	wp_reset_postdata(); 
	
    die();

}


add_action( 'wp_ajax_nopriv_load_more', 'load_more_ajax' );
add_action( 'wp_ajax_load_more', 'load_more_ajax' );

function load_more_ajax() {
    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
    
    $next_page = $_POST['current_page'] + 1;
    $categories = $_POST['category'];
    $sort = $_POST['sort'];
    
    $get_posts = array( 
        'post_type' => 'post',
		'posts_per_page' => 3
	);
    
   if ($categories != '') {
        $get_posts['category_name'] = $categories;
    }
	
	if ($sort) {
        $get_posts['order'] = $sort;
    }
    
    $get_posts['paged'] = $next_page;
    
    $loop = new WP_Query( $get_posts ); 
?>


        <?php if ($loop->have_posts()) : // (3) ?>

        <?php while ( $loop->have_posts() ) { $loop->the_post(); ?>
			<?php get_template_part('template-parts/content', 'single_preview'); ?>
		<?php } 
		endif; ?>
   
<?php
    
    die();
}



add_action('wp_ajax_nopriv_more_post_ajax', 'more_post_ajax');
add_action('wp_ajax_more_post_ajax', 'more_post_ajax');


function more_post_ajax(){

    $ppp = (isset($_POST["ppp"])) ? $_POST["ppp"] : 4;
    $page = (isset($_POST['pageNumber'])) ? $_POST['pageNumber'] : 0;
    $categories = $_POST['trying'];

    header("Content-Type: text/html");

    $args = array(
        'suppress_filters' => true,
        'post_type' => 'projects',
        'posts_per_page' => $ppp,
        'paged'    => $page,
    );

    if ($categories != '') {
        $args['category_name'] = $categories;
    }

    $loop = new WP_Query($args);


    if ($loop -> have_posts()) : echo "<div class='row'>";  while ($loop -> have_posts()) : $loop -> the_post();
     echo '<div class="project col-sm-6 col-md-3">';?>
    <?php echo $categories ?>
    <a href="<?php print get_permalink($post->ID) ?>">
        <?php echo the_post_thumbnail(); ?></a>
        <h4><?php print get_the_title(); ?></h4>
        <?php print get_the_excerpt(); ?><br />
        <a class="btn btn-default" href="<?php print get_permalink($post->ID) ?>">Details</a>
</div> 
<?php

    endwhile;
    echo "</div>";
    endif;
    wp_reset_postdata();
    die($out);
}

