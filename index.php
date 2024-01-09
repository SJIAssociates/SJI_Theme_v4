<?php
//The default template
get_header();
?>

<main class="global-main">

    <div class="hero">
        <div class="container">
            <h1><?php the_archive_title();?></h1>
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