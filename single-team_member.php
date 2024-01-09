<?php
//Team Member post template 
get_header(); ?>

<?php $collage_images = get_field( 'collage' ); ?>

<main class="global-main">
    <div class="hero">
        <div class="container">
            <h1><?php the_title();?></h1>
            <p class="hero__title"><?php the_field( 'title' ); ?></p>
        </div>
    </div>

    <div class="team-collage">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 team-collage__thumbnail">
                    <?php the_post_thumbnail();?>
                </div>
                <?php if ( $collage_images ) :  ?>
                <div class="col-lg-6 team-collage__grid">
                    <?php foreach ( $collage_images as $collage_image ): ?>
                    <div class="team-collage__item">
                        <img src="<?php echo esc_url( $collage_image['sizes']['large'] ); ?>"
                            alt="<?php echo esc_attr( $collage_image['alt'] ); ?>" />
                    </div>
                    <?php endforeach; ?>
                    <div class="team-collage__item">
                        <?php the_content();?>
                    </div>
                </div>
                <?php endif;?>
            </div>
        </div>
    </div>

    <?php if ( have_rows( 'modular_content' ) ): ?>
    <?php include get_theme_file_path( 'flex/modular-content.php' ); ?>
    <? endif; ?>

    <?php get_template_part( 'includes/footer-cta');?>
</main>

<?php get_footer(); ?>