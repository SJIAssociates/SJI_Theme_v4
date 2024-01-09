<div class="cta">
    <div class="container">
        <h3><?php the_sub_field( 'cta_content' ); ?></h3>
        <?php $cta_link = get_sub_field( 'cta_link' ); ?>
        <?php if ( $cta_link ) : ?>
        <a class="cta__btn" href="<?php echo esc_url( $cta_link['url'] ); ?>"
            target="<?php echo esc_attr( $cta_link['target'] ); ?>"><?php echo esc_html( $cta_link['title'] ); ?></a>
        <?php endif; ?>
    </div>
</div>