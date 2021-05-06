<?php
//Ajax Loads -- Posts Page
add_action( 'wp_ajax_nopriv_filter', 'filter_ajax' );
add_action( 'wp_ajax_filter', 'filter_ajax' );

function filter_ajax() {
    
    $data = $_POST['data'];
    
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
    
    $loop = new WP_Query( $get_posts ); 

	if ( $loop->have_posts() ) { ?>

	<div class="row">
		<div class="col text-center">
			<div id="filter-message"></div>
		</div>
	</div>

	<div class="page-wrapper" data-page="1" data-max="<?php echo $loop->max_num_pages ?>" data-category="<?php echo $categories; ?>" data-sort="<?php echo $sort; ?>">
		<div class="row">
			<?php while ( $loop->have_posts() ) { $loop->the_post(); ?>
				<?php get_template_part('template-parts/content', 'single_preview'); ?>
			<?php } ?>
		</div>
	</div>
   
    <?php if (  $loop->max_num_pages > 1 ) : ?>
    <div class="row">
        <div class="col text-center">
            <?php echo '<a href="#" class="btn" id="loadmore">See More</a>'; // you can use <a> as well ?>
        </div>
    </div>
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

    <div class="row">
        <?php if ($loop->have_posts()) : // (3) ?>

        <?php while ( $loop->have_posts() ) { $loop->the_post(); ?>
			<?php get_template_part('template-parts/content', 'single_preview'); ?>
		<?php } 
		endif; ?>
    </div>
<?php
    
    die();
}