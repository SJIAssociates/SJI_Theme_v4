<?php $image = get_sub_field( 'image' ); ?>

<div class="parallax-background parallax-background--split js-gsap-parallax">
    <div class="parallax-background__wrap container">
        <div>
            <div class="row">
                <?php if ( $image ) : ?>
                <div class="col-lg-6">
                    <img class="parallax-background__img" src="<?php echo esc_url( $image['url'] ); ?>"
                        alt="<?php echo esc_attr( $image['alt'] ); ?>" />
                </div>
                <?php endif; ?>

                <div class="col-lg-6">
                    <?php the_sub_field( 'content' ); ?>
                </div>
            </div>
        </div>
    </div>
</div>