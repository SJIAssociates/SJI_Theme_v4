<?php
$classes = get_sub_field('width'); 
$color = get_sub_field('background_color');

if( str_contains( $classes, "col-" ) ){
    $classes .= ' mx-auto';
}

?>
<section class="image-stack <?php the_sub_field('padding'); ?>" <?php if( !empty($color) ){ 
    echo "style='background-color: $color;'";
    } ?> 
    data-module="Image Stack">

    <?php if(get_sub_field('width') == "col-sm-10"|| "col-sm-9"): ?>
        <div class='container'>
            <div class='row'>
                <div class="<?php echo $classes; ?> ">
    <?php else: ?>
        <!-- Container Width or Window Width -->
        <div class="<?php echo $classes; ?>">
    <?php endif; 
    
    $images_images = get_sub_field( 'images' );
    if ( $images_images ) :  ?>
      <?php foreach ( $images_images as $images_image ): ?>
        <img src="<?php echo esc_url( $images_image['url'] ); ?>" alt="<?php echo esc_attr( $images_image['alt'] ); ?>" />
      <?php endforeach;
    endif; ?>


    <?php if(get_sub_field('width') == "col-sm-10"|| "col-sm-9"): ?>
                </div> <!-- row -->
            </div> <!-- col-sm-10 -->
        <?php endif; ?>
    </div>
</section>