<?php $awards_images = get_sub_field( 'awards_images' ); ?>

<div class="awards bg-color__<?php the_sub_field('background_color') ?>">
    <div class="container">
        <?php if ( $awards_images ) :  ?>
        <div class="awards__grid row">
            <div class="col-6 col-lg d-flex"><h2>Awards</h2></div>
            <?php foreach ( $awards_images as $awards_images ): ?>
            <figure class="awards__item col-6 col-lg">
                <img src="<?php echo esc_url( $awards_images['sizes']['medium'] ); ?>"
                    alt="<?php echo esc_attr( $awards_images['alt'] ); ?>" />
            </figure>
            <?php endforeach; ?>
        </div>
        <?php endif;?>
    </div>
</div>