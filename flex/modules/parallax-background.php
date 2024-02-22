<div class="parallax-background js-gsap-parallax">
    <div class="parallax-background__wrap">
        <div class="container">
            <h2><?php the_sub_field( 'parallax_heading' ); ?></h2>

            <?php $parallax_desktop_image = get_sub_field( 'parallax_desktop_image' ); ?>
            <?php $parallax_mobile_image = get_sub_field( 'parallax_mobile_image' ); ?>

            <?php if ( $parallax_desktop_image ) : ?>
            <img class="parallax-background__img d-none d-lg-block"
                src=" <?php echo esc_url( $parallax_desktop_image['url'] ); ?>"
                alt="<?php echo esc_attr( $parallax_desktop_image['alt'] ); ?>" />
            <?php endif; ?>

            <?php if ( $parallax_mobile_image ) : ?>
            <img class="parallax-background__img d-lg-none"
                src=" <?php echo esc_url( $parallax_mobile_image['url'] ); ?>"
                alt="<?php echo esc_attr( $parallax_mobile_image['alt'] ); ?>"  width="500"/>
            <?php endif; ?>
        </div>
    </div>
</div>