<?php
//Template Name: Contact Us
get_header(); ?>

<main class="global-main contact">
    <div class="hero">
        <div class="container">
            <h1 class="h2">Let's Chat!</h1>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-5 contact-form">
                <?php echo do_shortcode('[formidable id=1]'); ?>
            </div>
            <div class="col-lg-3">
                <div class="contact__info">
                    <div class="contact__info__copy">
                        <?php the_content();?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="slider-container">
        <div class="js-slick-contact">
            <?php $images = get_field('images'); if ( $images ) : foreach ( $images as $images ): ?>
                <div>
                    <img src="<?php echo esc_url( $images['sizes']['large'] ); ?>"
                        alt="<?php echo esc_attr( $images['alt'] ); ?>" />
                </div>
            <?php endforeach; endif; ?>
        </div>
    </div>
</main>

<?php get_footer(); ?>