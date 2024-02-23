<div class="animated-banner bg-color__<?php the_sub_field('background_color') ?>">
    <div class="container">
        <div class="row">
            <div class="col-lg-10">
                <?php the_sub_field( 'banner_content' ); ?>
            </div>
        </div>
        <?php if(is_front_page( ) ): ?>
            <img class='wbe-logo' src="<?php echo get_template_directory_uri();?>/assets/img/WBE_Seal_RGB.png" alt="WBENC logo" width="90" height="50">
        <?php endif; ?>
    </div>
</div>