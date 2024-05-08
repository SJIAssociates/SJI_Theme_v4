<?php
//The default Archive template
get_header();
require_once('functions.php');
?>

<main class="global-main">

    <div class="hero">
        <div class="container">
        <h1><?php single_term_title();?></h1>
        </div>
    </div>

    <?php 
    if ( have_posts() ) : 
        get_template_part( 'includes/post-grid'); ?>
    <?php else : 
        get_template_part( 'includes/no-posts'); 
    endif;?>

</main><!-- #main -->

<?php
get_footer();