<?php
$image = get_sub_field( 'image' );
$alt_mobile_image = get_sub_field( 'alt_mobile_image' );
$classes = get_sub_field('width') . " " . get_sub_field('padding'); 
$color = get_sub_field('background_color');

if( str_contains( $classes, "col-" ) ){
    $classes .= ' mx-auto';
}
?>

<section class="simple-banner" <?php if( !empty($color) ){ 
    echo "style='background-color: $color;'";
    } ?> 
    data-module="Image">
    <div class="<?php echo $classes; ?>">
        <?php if ( $image ) : ?>
        <img class="simple-banner__img <?php if ( $alt_mobile_image ) : ?>d-none d-lg-block<?php endif;?>"
            src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
        <?php endif;
        if ( $alt_mobile_image ) : ?>
        <img class="simple-banner__img d-block d-lg-none" src="<?php echo esc_url( $alt_mobile_image['url'] ); ?>"
            alt="<?php echo esc_attr( $alt_mobile_image['alt'] ); ?>" />
        <?php endif; ?>
    </div>
</section>