<?php
$left_image = get_sub_field( 'left_image' );
$classes = get_sub_field('padding'); 
$color = get_sub_field('background_color');
?>


<section class="post-content" data-module="2-columns">
        <div class="container">
            <div class="col-sm-6">

            <?php if ( $left_image ) : ?>
                <img class="w-full" src="<?php echo esc_url( $left_image['url'] ); ?>" alt="<?php echo esc_attr( $left_image['alt'] ); ?>" />
            <?php endif; ?>

                <?php the_sub_field( 'left_content' ); ?>
            </div>
            <div class='col-sm-6'>
                <?php the_sub_field( 'right_content' ); ?>
            </div>
        </div>
</section>