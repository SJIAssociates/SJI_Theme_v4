<?php 

$bullet_columns = get_field('bullet_points');
$styleType = get_sub_field('style_type');

?>

<div class="alternating-content <?php echo get_sub_field('style_type'); if ( get_sub_field( 'orange_background' ) == 1 ) : echo 'alternating-content--orange'; endif; ?> <?php if ( get_sub_field( 'swap_orientation' ) == 1 ) : echo 'alternating-content--swap'; endif; ?>">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 alternating-content__content">
                <?php the_sub_field( 'content' ); ?>
                <?php if ( have_rows('bullet_points') ) :  ?>
                    <div class="bullets-container">
                        <?php while ( have_rows('bullet_points') ): the_row() ?>
                            <div>
                                <?php echo get_sub_field('bullet_points_column'); ?>
                            </div>
                        <?php endwhile;?>
                    </div>
                <?php endif;?>
            </div>
            <div class="col-lg-6 alternating-content__image">
                <?php
                    $file = get_sub_field( 'image'); 
                    $file_name = $file['filename']; 
                    $filetype = wp_check_filetype($file_name)['ext']; 
                    ?>
                <?php if ($filetype !== "mp4") { ?>
                    <img src="<?php echo esc_url( $file['url'] ); ?>" alt="<?php echo esc_attr( $file['alt'] ); ?>" />
                <?php }else{ ?>     
                    <video playsinline autoplay muted <?php if (get_sub_field('style_type') == 'standard') : echo 'loop'; endif; ?>>
                        <source src="<?php echo $file['url']; ?>" type="video/mp4">
                    </video>
                <?php } ?> 
            </div>
        </div>
    </div>
</div>