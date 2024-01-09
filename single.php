<?php
//The default post template
get_header();
$author_id = $post->post_author;
$author_title = get_field('title', 'user_'. $author_id );
?>

<main class="global-main">
    <div class="hero hero--single">
        <div class="container">
        <?php if(get_field('title')): ?>
            <?= the_field('title') ?>
        <?php else: ?>
            <h1><?php the_title(); ?></h1>
        <?php endif; ?>
            <div class="post__author">
                <?= get_avatar($author_id, 79); ?>
                <div class="post__author-info">
                    <div class="post__author-name"><?= get_the_author_meta('display_name', $author_id); ?></div>
                    <span><?= $author_title; ?></span>
                </div>
            </div>
        </div>
    </div>
    <!--div class="hero__banner" style="background-image:url('<?php echo the_post_thumbnail_url(); ?>');"></div-->

    <?php if (get_the_content()) : ?>
        <div class="post-content">
            <div class="container">
                <?php the_content(); ?>
            </div>
        </div>
    <?php endif; ?>

    <?php if (have_rows('modular_content')) : ?>
        <div class="container post__container">
            <?php if ( get_field( 'split_columns' ) == 1 ) : ?>
                <div class="row">
                    <div class="col-12 col-md-7">
                        <?php include get_theme_file_path('flex/modular-content.php'); ?>
                    </div>
                    <div class="col-12 col-md-4 offset-md-1">
                        <div class="image-stack">
                            <?php
                                //Note that the following calls the modular-content.php loop on the right_side_content group.
                                //Blog pages with 2 columns have 2 separate modular content flex groups, one for each column.
                            ?>
                            <?php if ( have_rows( 'right_side_content' ) ) : ?>
	                            <?php while ( have_rows( 'right_side_content' ) ) : the_row(); ?>
                                    <?php include get_theme_file_path('flex/modular-content.php'); ?>
                                <?php endwhile; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php else : ?>
                <?php include get_theme_file_path('flex/modular-content.php'); ?>
            <?php endif; ?>
            <div class="row">
                <div class="col-12">
                    <?php include get_theme_file_path('flex/modules/latest-insights.php'); ?>
                </div>
            </div>
        </div>
    <? endif; ?>

    <?php get_template_part('includes/footer-cta'); ?>
</main>

<?php get_footer(); ?>