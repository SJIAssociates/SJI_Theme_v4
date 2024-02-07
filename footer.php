<?php
//global-footer template file
?>

<footer class="global-footer" role="contentinfo">
    <div class="container global-footer__main">
        <div class="row">
            <div class="col-12 col-md-4">
                <img src="<?php echo get_template_directory_uri();?>/assets/img/sji-logo-footer.svg" alt="">
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-5">
                <p>SJI Associates is a woman-owned, award-winning creative branding agency with over three decades of experience elevating the world’s most beloved brands and vital non-profit organizations.</p>
            </div>
            <div class="col-12 col-md-3 offset-md-1">
                <nav>
                    <?php wp_nav_menu(array(
                        'menu'              => "Popout Menu",
                        'menu_class'        => "global-footer__nav",
                        'container'         => "",
                    )); ?>
                </nav>
            </div>
            <div class="col-12 col-md-3">
                <address>
                    SJI Associates <br>
                    <span style="padding-right: 5px;">127 W 24th Street,</span><span style="word-break: keep-all; display: inline-block"> 2nd Floor</span><br>
					New York, NY 10011
                </address>
                <a tabindex="0" href="tel:212.391.7770">212.391.7770</a> <br>
                <a tabindex="0" class="a--email" href="mailto:hello@sjiassociates.com">hello@sjiassociates.com</a> <br>
                <a tabindex="0" href="/contact" class="btn btn--asterisk">Get In Touch</a>
            </div>
        </div>
    </div>
    <div class="container global-footer__bottom">
        <ul class="global-footer__social">
            <li><a href="https://www.facebook.com/sjiassociates" target="_blank" aria-label="facebook"><i class="fa-brands fa-square-facebook"></i></a></li>
            <li><a href="https://www.instagram.com/sjiassociates/" target="_blank" aria-label="instagram"><i class="fa-brands fa-square-instagram"></i></a></li>
            <li><a href="https://www.behance.net/sjiassociates" target="_blank" aria-label="behance"><i class="fa-brands fa-square-behance"></i></a></li>
            <li><a href="https://www.linkedin.com/company/sji-associates/" target="_blank" aria-label="linkedin"><i class="fa-brands fa-linkedin"></i></a></li>
        </ul>
        <div class="global-footer__copyright">
            <p>Women Owned Enterprise</p>
            <img src="<?php echo get_template_directory_uri();?>/assets/img/WBENC-logo.svg" alt="WBENC logo">
            <p>© <?php echo date("Y");?> SJI Associates</p>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>

</body>

</html>