<?php $banner = get_sub_field( 'banner' ); ?>
<?php $alt_mobile_banner = get_sub_field( 'alt_mobile_banner' ); ?>

<div class="captioned-banner bg-color__<?php the_sub_field('background_color') ?> <?php echo get_sub_field('padding'); ?>">
    <div class="container">
        <?php if(get_sub_field('heading') || get_sub_field('caption')) : ?>
        <div class="row">
            <div class="col-lg-6 <?php if ( get_sub_field( 'right_align_text' ) == 1 ) : echo 'offset-lg-6'; else : endif; ?>">
                <h3><?php the_sub_field( 'heading' ); ?></h3>
                <?php if(get_sub_field( 'caption' ) ): ?>
                    <p><?php the_sub_field( 'caption' ); ?></p>
                <?php endif; ?>
            </div>
        </div>
        <?php endif;?>

        <?php if ( $banner ) : ?>
        <img <?php if ( $alt_mobile_banner ) : ?>class="d-none d-lg-block" <?php endif;?>
            src="<?php echo esc_url( $banner['url'] ); ?>" alt="<?php echo esc_attr( $banner['alt'] ); ?>" />
        <?php endif; ?>
        <?php if ( $alt_mobile_banner ) : ?>
        <img class="d-block d-lg-none" src="<?php echo esc_url( $alt_mobile_banner['url'] ); ?>"
            alt="<?php echo esc_attr( $alt_mobile_banner['alt'] ); ?>" />
        <?php endif; ?>
    </div>
</div>