<?php $background_image = get_sub_field( 'background_image' ); ?>

<div class="infinite-slider bg-color__<?php the_sub_field('background_color') ?>" style="background-image:url('<?php echo esc_url( $background_image['url'] ); ?>');">
    <?php if ( have_rows( 'sliders' ) ) : while ( have_rows( 'sliders' ) ) : the_row(); ?>
    <?php $images_images = get_sub_field( 'images' ); ?>

    <div class="infinite-slider__slider js-slick-infinite">
        <?php if ( $images_images ) : foreach ( $images_images as $images_image ): ?>
        <div>
            <img src="<?php echo esc_url( $images_image['sizes']['large'] ); ?>"
                alt="<?php echo esc_attr( $images_image['alt'] ); ?>" />
        </div>
        <?php endforeach; endif; ?>
    </div>
    <?php endwhile; endif; ?>
</div>