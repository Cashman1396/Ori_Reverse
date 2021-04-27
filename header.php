<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Document</title>
    <?php wp_head(); ?>
</head>
<body>

<div class="container">
    <ul>
        <li>
<!--- Nav ---->
<?php wp_nav_menu( array(
					'theme_location'  => 'header-menu'));  ?>
        </li>
    </ul>

</div>


<header> 


    <h1><?php print get_the_title(); ?></h1>