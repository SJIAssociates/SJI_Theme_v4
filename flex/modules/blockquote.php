<?php $image = get_sub_field( 'image' ); ?>

<div class="bg-color__<?php the_sub_field('background_color') ?> blockquote <?php echo get_sub_field('padding'); ?> <?php if ( get_sub_field( 'flip_orientation' ) == 1 ) : echo 'blockquote--flipped'; else : endif; ?>">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <blockquote>
                    <?php the_sub_field( 'quote' ); ?>
                    <cite><strong><?php the_sub_field( 'name' ); ?></strong> <?php the_sub_field( 'title' ); ?></cite>
                </blockquote>
            </div>
            <div class="col-lg-6">
                <?php if ( $image ) : ?>
                <img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>