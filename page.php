<?php
//The default page template
get_header();
$bg_color = get_field( 'background_color' );
?>

<main class="global-main <?php if($bg_color === "grey"):?>global-main--grey <?php endif; ?>">
    <?php if(get_the_content() || has_post_thumbnail() ) :?>
    <div class="hero">
        <div class="container">
            <?php the_content();?>
        </div>
        <?php if(has_post_thumbnail()) : ?>
        <div class="hero__banner" style="background-image:url('<?php echo the_post_thumbnail_url();?>');"></div>
        <?php endif;?>
    </div>
    <?php endif;?>

    <?php if ( have_rows( 'modular_content' ) ): ?>
    <?php include get_theme_file_path( 'flex/modular-content.php' ); ?>
    <? endif; ?>

</main>

<?php get_footer(); ?>