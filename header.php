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

    <!-- GA Google Analytics @ https://m0n.co/ga -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-8722603-1"></script>
		<script>
			window.dataLayer = window.dataLayer || [];
			function gtag(){dataLayer.push(arguments);}
			gtag('js', new Date());
			gtag('config', 'UA-8722603-1');
		</script>
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