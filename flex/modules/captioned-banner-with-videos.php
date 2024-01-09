<?php $videos = get_sub_field('videos'); ?>

<div class="captioned-banner bg-color__<?php the_sub_field('background_color') ?>">
    <div class="container">
        <?php if (get_sub_field('heading') || get_sub_field('caption')) : ?>
            <div class="row">
                <div class="col-lg-6 <?php if (get_sub_field('right_align_text') == 1) : echo 'offset-lg-6';
                                        else : endif; ?>">
                    <h3><?php the_sub_field('heading'); ?></h3>
                    <p><?php the_sub_field('caption'); ?></p>
                </div>
            </div>
        <?php endif; ?>

        <?php if (have_rows('videos')) : ?>
            <div class="captioned-banner__videos">
                <?php
                while (have_rows('videos')) : the_row();
                    $video = get_sub_field('video');
                ?>
                    <video playsinline autoplay muted loop>
                        <source src="<?= $video['url'] ?>" type="video/mp4">
                    </video>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </div>
</div>