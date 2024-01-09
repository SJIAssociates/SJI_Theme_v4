<?php $link = get_field( 'link', 'option' ); ?>

<div class="cta">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <p class="cta__p"><?php the_field( 'content', 'option' ); ?> </p>
                <?php if ( $link ) : ?>
                <a class="btn btn--fancy" href="<?php echo esc_url( $link['url'] ); ?>"
                    target="<?php echo esc_attr( $link['target'] ); ?>"><?php echo esc_html( $link['title'] ); ?></a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>