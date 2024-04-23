<?php
// 2023-03-23 - SL - initial filterable version
// 2024-04-12 - CB- SJI version with Ajax load more 
?>
<section class="post-grid bg-color__<?php the_sub_field('background_color') ?> <?php if ( get_sub_field( 'small_margins' ) == 1 ) : ?>post-grid--small-margins<?php endif; ?>">
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
        $filter_array = array(
            "id" => "categoryfilter",
            "style" => "change",
            "reset_button" => false,
            "reset_button_label" => "Show All",
            "date_created" => 1712762917,
            "date_modified" => 1712834159,
            "filters_debug" => true,
            "filters" => array(
                array(
                    "key" => "taxonomy",
                    "field_type" => "radio",
                    "taxonomy" => "case_study_category",
                    "taxonomy_operator" => "IN",
                    "title" => "Categories",
                    "show_count" => false,
                    "section_toggle" => true,
                    "section_toggle_status" => "collapsed"
                )
            )
        );
        echo alm_filters( $filter_array, 'alm-work' );
        echo do_shortcode('[ajax_load_more id="alm-work" preloaded="true" preloaded_amount="8" loading_style="infinite fading-circles" container_type="div" css_classes="post-grid__grid" post_type="work" posts_per_page="8" orderby="menu_order" order="asc" target="categoryfilter" filters="true"]');
        
        ?>
    </div>

    <div class="container">

        <a id="cs_view_more_key_art"
            href="/key-art"
            class="d-none">
            <div class="view-more__overlay"></div>
            <span class="btn btn--asterisk">View All Key Art</span>
        </a>
    </div>   
    <div id="js_filter_zero"  style="display: none;">
        <p class='text-center pt-10'>Interested in seeing more work? <a href="/contact" title="contact">Get in touch</a>.</p>
    </div>
</section>

<?php wp_reset_query(); ?>