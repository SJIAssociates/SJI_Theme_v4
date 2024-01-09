<section class="horizontal-scroll desktop">
    <div class="panel-container">
        <?php $images_images = get_sub_field( 'images' ); ?>
        <?php if ( $images_images ) :  ?>
        <?php foreach ( $images_images as $images_image ): ?>
        <div class="panel">
            <img src="<?php echo esc_url( $images_image['sizes']['large'] ); ?>"
                alt="<?php echo esc_attr( $images_image['alt'] ); ?>" />
        </div>
        <?php endforeach; ?>
        <?php endif; ?>
    </div>
</section>