<?php
// 2023-03-23 - SL - initial filterable version


// load this number initially
$num_onLoad = 7;

// load this number when 'show more' clicked
$num_onMore = 4;


// $gridTerms = get_terms( array(
//     'taxonomy' => 'case_study_category',
//     'hide_empty' => false,
// ) );

$category = get_sub_field('category_exceptions');
$term_id = $category->term_id;

$gridArgs = array(
    'post_type' => 'work',
    'posts_per_page' => -1, // get them all
    'tax_query' => array(
        array(
            'taxonomy' => 'case_study_category',
            'field'    => 'term_id',
            'terms'    => $category,
            'operator' => 'NOT IN'
        ),
    ),
    // 'post_status' => 'publish' /// default
    // 'orderby' => 'menu_order title'  /// 'date' is default
);
$gridQuery = new \WP_Query( $gridArgs );


// pre/post pends content to
// the passed in array of strings
function array_pend( $arr =[], $pre = '', $post = '' )
{
    foreach( $arr as $idx => $str ) {
        $arr[ $idx ] = $pre . $str . $post;
    }
    return $arr;
}

?>
<style>
    .js_filter_hide {
        display: none !important;
    }
    /*
    .js_filter_show {}
    .js_filter_item {}
    .js_filter_show {}
    .js_filter_candidate {}
    */

</style>

<div class="post-grid bg-color__<?php the_sub_field('background_color') ?> <?php if ( get_sub_field( 'small_margins' ) == 1 ) : ?>post-grid--small-margins<?php endif; ?>">
    <div class="container">
        <a id="cs_see_more_work"
            data-quantity="3"
            href="/work"
            class="d-<?php echo get_sub_field('see_more_work_button');?>">
            <span class="btn btn--asterisk">See More Work</span>
        </a>
    </div>
    <div class="container">
        <?php
        $gridHeadline = get_sub_field( 'grid_headline' );
        $gridIntro = get_sub_field( 'grid_intro' );

        // heading
        if( !empty($gridHeadline) || !empty($gridIntro)) : ?>
        <div class="post-grid__intro">
            <h2 class="post-grid__intro__h2"><?php echo $gridHeadline; ?></h2>
            <p class="post-grid__intro__p"><?php echo $gridIntro; ?></p>
        </div>
        <?php endif; ?>

        <?php
        // category filters
        if ( get_sub_field( 'show_category_filters' ) == 1 ) : ?>
        <ul class="post-grid__filters">
            <li class="mobile-menu-toggle"><button class="js-post-filter js-active" data-category="0">All</button><i class="fas fa-plus" aria-hidden="true"></i></li>
            <?php $included_categories = get_sub_field( 'included_categories' ); ?>
			<?php if ( $included_categories ) : ?>
				<?php foreach ( $included_categories as $term ) :
                    echo '<li class="mobile-menu-closed sub-menu-items"><button class="js-post-filter" data-category="' . $term->slug . '">' . $term->name . '</button></li>';
				endforeach; ?>
			<?php endif; ?>
        </ul>
        <?php else : endif; ?>

        <?php
        // all of the posts
        if ( $gridQuery->have_posts() ) : ?>
            <div class="post-grid__grid js-item-container"
                data-count-onLoad="<?=$num_onLoad;?>"
                data-count-onMore="<?=$num_onMore;?>"
                >
                <?php while ( $gridQuery->have_posts() ) :
                    $gridQuery->the_post();
                    // get the list of filterable terms for this post
                    $gridTerm_list = wp_get_post_terms( $post->ID, 'case_study_category', array( 'fields' => 'names' ) );
                    ?>

                    <div class="post-grid__post js_filter_item <?
                    echo get_field('case_study_grid_orientation');
                    echo " ";
                    echo implode( ' ', array_pend( wp_get_post_terms( $post->ID, 'case_study_category', array( 'fields' => 'slugs' ) ), 'js_filter_item-', '' ));
                    ?>">
                    <a href="<?php the_permalink();?>" aria-label="<?php the_title();?>">
                        <?php $case_study_grid_asset = get_field( 'case_study_grid_asset' );
                        $asset_url = esc_url( $case_study_grid_asset['url'] );
                        $asset_name = esc_url( $case_study_grid_asset['filename'] );
                        $filetype = wp_check_filetype($asset_name)['ext'];
                        $mobile_asset = get_field( 'mobile_asset' );
                        $mobile_url = esc_url( $mobile_asset['url']);
                        ?>
                        <?php if ( $case_study_grid_asset ) : ?>
                            <?php if (($filetype == "mp4") || ($filetype == "webm")) { ?>
                                <div class="hero__banner grid-image-desktop">
                                    <video playsinline autoplay muted loop>
                                        <source src="<?php echo $asset_url;?>" type="video/mp4">
                                    </video>
                            <?php }else{ ?>
                                <div class="hero__banner grid-image-desktop" style="background-image:url('<?php echo $asset_url; ?>')">
                            <?php } ?>
                                </div>
                                <div class="hero__banner grid-image-mobile" style="background-image:url('<?php echo $mobile_url; ?>')"></div>
                        <?php endif; ?>
                            <?php if ( have_rows( 'animated_hero_text' ) ) : while ( have_rows( 'animated_hero_text' ) ) : the_row(); ?>
                            <!--<div class="container js-gsap-hero">
                                <p class="js-gsap-line1"><?php the_sub_field( 'line_1' ); ?></p>
                                <p class="js-gsap-line2"><?php the_sub_field( 'line_2' ); ?></p>
                                <p class="js-gsap-line3"><?php the_sub_field( 'line_3' ); ?></p>
                            </div>-->
                            <?php endwhile; endif; ?>

                        <div class="post-grid__post__overlay">
                            <div class="post-grid__post__info">
                                <h3><?php the_field( 'client' ); ?>
                                    <span><?php the_title();?></span></h3>
                                    <p> <?php echo implode(' | ', $gridTerm_list); ?> </p>
                            </div>
                        </div>
                        </a>
                    </div>
                <?php endwhile;
                wp_reset_postdata(); ?>
                <a id="cs_view_more_projects"
                        data-quantity="3"
                        href="#"
                        class="<?php echo get_sub_field('view_more_button');?>">
                        <span class="btn btn--asterisk">View More Projects</span>
                    </a>

            </div>
            <?php endif;
        wp_reset_postdata(); ?>
    </div>
    <a id="cs_view_more_key_art"
                        data-quantity="3"
                        href="/key-art"
                        class="d-none">
                        <div class="view-more__overlay"></div>
                        <span class="btn btn--asterisk">View All Key Art</span>
                    </a>
                    <div id="js_filter_zero">
                        There are no matching items.
                    </div>
</div>

<?php wp_reset_query(); ?>