<div class="image-stack">
  <?php $images_images = get_sub_field( 'images' ); ?>
    <?php if ( $images_images ) :  ?>
      <?php foreach ( $images_images as $images_image ): ?>
        <img src="<?php echo esc_url( $images_image['url'] ); ?>" alt="<?php echo esc_attr( $images_image['alt'] ); ?>" />
      <?php endforeach; ?>
    <?php endif; ?>
</div>