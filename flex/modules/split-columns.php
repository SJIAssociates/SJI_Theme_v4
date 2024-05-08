<?php
$left_image = get_sub_field( 'left_image' );
$right_image = get_sub_field( 'right_image' );
$classes = get_sub_field('padding'); 
$color = get_sub_field('background_color');
$left_align = get_sub_field('left_align_to_bottom');
$right_align = get_sub_field('right_align_to_bottom');
$columnWidth = get_sub_field('column_split') ?: 'col-lg';
?>


<section class="split-columns post-content <?php the_sub_field('padding'); ?>" <?php if( !empty($color) ){ 
    echo "style='background-color: $color;'";
    } ?>  data-module="2-columns">
    <div class="container">
        <div class='row'>
            <div class="<?php echo $columnWidth; ?> <?php if($left_align): echo 'copy-bottom';  endif; ?>">
                <?php if ( $left_image ) : ?>
                    <img class="w-full" src="<?php echo esc_url( $left_image['url'] ); ?>" alt="<?php echo esc_attr( $left_image['alt'] ); ?>" />
                <?php endif; ?>
                <?php if(get_sub_field('left_content')):
                    the_sub_field('left_content');
                endif; ?>
            </div>
            <div class='col-lg <?php if($right_align): echo 'copy-bottom';  endif;?>'>
                <?php if ( $right_image ) : ?>
                    <img class="w-full" src="<?php echo esc_url( $right_image['url'] ); ?>" alt="<?php echo esc_attr( $right_image['alt'] ); ?>" />
                <?php endif; ?>
                <?php if(get_sub_field('right_content')):
                    the_sub_field('right_content');
                endif; ?>
            </div>
        </div>
    </div>
</section>