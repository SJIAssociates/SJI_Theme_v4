<? 
//Home page template file

get_header(); ?>

<main class="global-main">
    <div id="hero-video-container" class="hero hero--big video-open">
        <i id="close-icon" class="fa-regular fa-xmark"></i>
        <div class="hero__video-wrap">
            <div id="video-player" class="hero__video">
                <video id="hero-video" autoplay muted playsinline>
                    <source src="<?php echo get_template_directory_uri()?>/assets/vid/SJI-Opening.mp4" type="video/mp4">
                </video>
            </div>
        </div>
        <?php if(get_the_content()) :?>
        <div class="hero">
            <div class="container">
                <?php the_content();?>
            </div>
        </div>
        <?php endif;?>
    </div>
    <?php if ( have_rows( 'modular_content' ) ): ?>
    <?php include get_theme_file_path( 'flex/modular-content.php' ); ?>
    <? endif; ?>

    <!--</?php get_template_part( 'includes/footer-cta');?>-->
</main>

<?php get_footer(); ?>