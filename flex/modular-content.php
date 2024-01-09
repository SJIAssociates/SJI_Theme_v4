<!-- BEGIN LAYOUTS LOOP -->
<?php 

// 2022-03-01 - SL - added post heading override for block copier.

global $override_post_heading;


if ( have_rows( 'modular_content' ) ): ?>
	<?php while ( have_rows( 'modular_content' ) ) : 
    the_row();
    
    // for overrides for the block copier, we need to clear out some globals.
    $override_post_heading = false;
    
    // get the layout name, and convert it to an includeable pathname
    $layout_name = str_replace( '_', '-', get_row_layout() );
    $layout_file = 'modules/' . $layout_name . '.php';

    // check to see if it actually exists
    if( file_exists( get_template_directory() . '/flex/' . $layout_file )) {
        // yep! Include it!
        include $layout_file;
    } else {  
        // Nope! warn the developer.
        ?>
            <div style="background: pink; margin:3em; padding:3em; text-align:center; border-radius:2em;">
                <h4>FLEX MODULE NOT FOUND</h4>
                <h4><?=$layout_file; ?></h4>
            </div>

    <? } ?>
    <?php endwhile; ?>
<?php endif;?>
<!-- END LAYOUTS LOOP -->