<div class="grey-columns">
    <div class="container">
        <?php if ( have_rows( 'column' ) ) : ?>
        <div class="grey-columns__grid">
            <?php while ( have_rows( 'column' ) ) : the_row(); ?>
            <div class="grey-columns__item">
                <strong><?php the_sub_field( 'heading' ); ?></strong>
                <p><?php the_sub_field( 'content' ); ?></p>
            </div>
            <?php endwhile;?>
        </div>
        <?php endif;?>
    </div>
</div>