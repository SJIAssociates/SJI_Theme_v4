
<?php $link = get_sub_field( 'link' ); ?>

<div class="linked-feature">
    <div class="container">
            <?php $image = get_sub_field( 'image' );
                    $asset_url = esc_url( $image['url'] );
                    $asset_name = esc_url( $image['filename'] );
                    $filetype = wp_check_filetype($asset_name)['ext'];
                        ?>
                        <?php if ( $image ) : ?>
                            <?php if ($filetype !== "mp4") { ?>
                                <img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
                            <?php }else{ ?>
                                    <video playsinline autoplay muted loop>
                                        <source src="<?php echo $asset_url;?>" type="video/mp4">
                                    </video>
                            <?php } ?>
                        <?php endif; ?>
        <?php if ( $link ) : ?>
        <a class="btn btn--asterisk" href="<?php echo esc_url( $link['url'] ); ?>"
            target="<?php echo esc_attr( $link['target'] ); ?>"><?php echo esc_html( $link['title'] ); ?></a>
        <?php endif; ?>
    </div>
</div>