<?php
//Career post template
get_header(); ?>

<main class="global-main">
    <div class="container single-career-title">
        <div class="row">
            <div class="col-12">
                <h1>
                    <?php the_title(); ?>
                </h1>
            </div>
        </div>
    </div>
        <?php if (have_rows('modular_content')) : ?>
            <div class="container post__container">
                <div class="row">
                    <div class="col-12 col-md-8">
                        <?php include get_theme_file_path('flex/modular-content.php'); ?>
                    </div>
                </div>
            </div>
        <? endif; ?>
        <?php include get_theme_file_path('flex/modules/careers-grid.php'); ?>
        <div class="cta career__cta">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <p class="cta__p">Don't see the position you're interested in? <br>We're always looking for new creative talent.</p>

                        <a class="btn btn--fancy" href="/contact">let's chat!</a>
                    </div>
                </div>
            </div>
        </div>
</main>

<?php get_footer(); ?>