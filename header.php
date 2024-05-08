<?php
//SJI Theme Header
$bg_color = get_field( 'background_color' );
?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>

    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-WLCWLXT');</script>
    <!-- End Google Tag Manager -->

    <script>
        document.documentElement.className = document.documentElement.className.replace( 'no-js', 'js' );
    </script>
    <style>
        .no-js img.lazyload { display: none; }
        figure.wp-block-image img.lazyloading { min-width: 150px; }
        .lazyload, .lazyloading { opacity: 0; }
        .lazyloaded {opacity: 1;transition: opacity 400ms;transition-delay: 0ms;}
    </style>
</head>

<body <?php body_class();?>>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WLCWLXT"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <header class="global-header <?php if($bg_color === "grey"):?>global-header--grey <?php endif; ?>">
        <div class="container">
            <nav id="navigation" class="navbar">
                <a class="navbar-brand" href="/" aria-label="SJI logo - Home">
                    <img src="<?php echo get_template_directory_uri();?>/assets/img/sji-logo.svg" alt="SJI logo" width="64" height="80">
                </a>
                <div class="navbar-controls">
                    <?php wp_nav_menu(array(
                        'menu'              => "Main Menu",
                        'menu_class'        => "navbar-nav",
                        'container'         => "",
                    )); ?>
                    <button class="navbar-toggler hamburger hamburger--3dxy" type="button" aria-controls="popoutNav"
                        aria-label="Toggle navigation">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
                <div id="popoutNav" class="popout-nav">
                    <span class='popout-nav__asterisk'></span>
                    <?php wp_nav_menu(array(
                        'menu'              => "Popout Menu",
                        'menu_class'        => "popout-nav__nav",
                        'container'         => "",
                    )); ?>
                    <div class="popout-nav__feature">
                        <?php
                        $featured_post = get_field('popout_nav_featured_post', 'options');
                        if( $featured_post ):
                        $id = $featured_post->ID;
                        ?>
                        <a href="<?php echo get_permalink($id);?>" class="popout-nav__feature__post">
                            <figure>
                                <?php echo get_the_post_thumbnail($id);?>
                            </figure>
                            <h3><?php echo get_the_title($id); ?></h3>
                            <div class="btn btn--swipe">Read The Story <i class="fas fa-plus"></i></div>
                        </a>
                        <?php endif; ?>
                        <ul class="popout-nav__social">
                            <li><a href="https://www.facebook.com/sjiassociates" target="_blank" aria-label="facebook"><i class="fa-brands fa-square-facebook"></i></a></li>
                            <li><a href="https://www.instagram.com/sjiassociates/" target="_blank" aria-label="instagram"><i class="fa-brands fa-square-instagram"></i></a></li>
                            <li><a href="https://www.behance.net/sjiassociates" target="_blank" aria-label="behance"><i class="fa-brands fa-square-behance"></i></a></li>
                            <li><a href="https://www.linkedin.com/company/sji-associates/" target="_blank" aria-label="linkedin"><i class="fa-brands fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                    <button class="navbar-toggler hamburger hamburger--3dxy" type="button" aria-controls="popoutNav"
                        aria-label="Toggle navigation">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
            </nav>
        </div>
    </header>