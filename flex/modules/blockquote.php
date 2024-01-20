<?php $image = get_sub_field( 'image' ); 
$class = (empty($image) ? 'col-sm-10 mx-auto' : 'col-lg' );
$sectionClass = get_sub_field('padding');
if( get_sub_field( 'flip_orientation' ) == 1 ): 
    $sectionClass .= ' blockquote--flipped';
endif;
?>

<section class="bg-color__<?php the_sub_field('background_color') ?> blockquote <?php echo $sectionClass; ?>">
    <div class="container">
        <div class="row">
            <div class="<?php echo $class; ?>">
                <blockquote>
                    <?php the_sub_field( 'quote' ); ?>
                    <cite><strong><?php the_sub_field( 'name' ); ?></strong> <?php the_sub_field( 'title' ); ?></cite>
                </blockquote>
            </div>
            <?php if ( $image ) : ?>
            <div class="col-lg">
                <img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>