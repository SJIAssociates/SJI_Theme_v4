<?php
$left_image = get_sub_field( 'left_image' );
$right_image = get_sub_field( 'right_image' );
$classes = get_sub_field('padding'); 
$color = get_sub_field('background_color');
?>


<section class="post-content <?php the_sub_field('padding'); ?>" <?php if( !empty($color) ){ 
    echo "style='background-color: $color;'";
    } ?>  data-module="2-columns">
    <div class="container">
        <div class='row'>
            <div class="col-sm-6">

            <?php if ( $left_image ) : ?>
                <img class="w-full" src="<?php echo esc_url( $left_image['url'] ); ?>" alt="<?php echo esc_attr( $left_image['alt'] ); ?>" />
            <?php endif;
            if(get_sub_field('left_content')):
                    the_sub_field('left_content');
                endif; ?>
            </div>
            <div class='col-sm-6'>
                <?php if ( $right_image ) : ?>
                    <img class="w-full" src="<?php echo esc_url( $right_image['url'] ); ?>" alt="<?php echo esc_attr( $right_image['alt'] ); ?>" />
                <?php endif;
                if(get_sub_field('right_content')):
                    the_sub_field('right_content');
                endif; ?>
            </div>
        </div>
    </div>
</section>