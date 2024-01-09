<div class="split-expand bg-color__<?php the_sub_field('background_color') ?>">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <h2><?php the_sub_field( 'split_heading' ); ?></h2>
            </div>
            <div class="col-lg-7">
                <div class="split-expand__content <?php if ( get_sub_field( 'truncate' ) == 1 ) : ?>split-expand__content--truncated<?php else : endif; ?>">
                    <?php the_sub_field( 'split_content' ); ?>
                </div>
                <div class="split-expand__content__continued d-none">
                    <?php the_sub_field( 'split_content_hidden' ); ?>
                </div>
                <?php if ( get_sub_field( 'truncate' ) == 1 ) : ?>
                <button class="btn btn--swipe js-expand"><span>Read The Story</span> <i class="fas fa-plus"></i></button>
                <?php else : endif; ?>
            </div>
        </div>
    </div>
</div>