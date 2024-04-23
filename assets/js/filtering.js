// filtering.js
//
// filtering for work page
//

// 2023-03-23 - SL - first version for SJI

jQuery(document).ready(function ($) {
    // handle post filtering...

    // when a filter button is picked...
    $( '.js-post-filter' ).on( 'click', function( e ) {
        var selectedCategory = $(this).attr( 'data-category' );
        console.log(selectedCategory);
        if(selectedCategory == 0) {
            filter_CategoryReset( selectedCategory, onLoad );
        } else {
            filter_CategoryReset( selectedCategory, onMore );
        }
       
    });
    var onLoad = $( ".js-item-container" ).attr( 'data-count-onLoad' );
    var onMore = $( ".js-item-container" ).attr( 'data-count-onMore' );

    filter_CategoryReset( 0, onLoad, true ); // initial kickoff

    // on show-more click
    $( '#cs_view_more_projects' ).on( 'click', function( e ) {
        e.preventDefault();
        filter_ShowMore( onMore );
    });

});

// reset the filtering
function filter_CategoryReset( cat, quantity, skipAnimation = false )
{
    $=jQuery;
    // adjust all cards
    const doFilter = () => {
        const allCards = $( ".js_filter_item" );
            allCards.removeClass( 'js_filter_candidate' )
            .removeClass( 'js_filter_show' )
            .addClass( 'js_filter_hide' );
            if( cat == undefined || cat == 'all' || cat == 0) {
                // all are capable of showing
                
                allCards.addClass( 'js_filter_candidate' );
            } else {
                $( ".js_filter_item-" + cat ).addClass( 'js_filter_candidate' );
            }
            setTimeout(() => $( ".js-item-container" ).animate( { opacity : 1 }, 500), 100);
            filter_ShowMore( quantity, cat ); // show the initial 7
    }
    //We need to skip the animation on the initial load, otherwise there's a fade in animation
    //when you open the page.
    if(!skipAnimation) {
        $('.js-item-container')
        .animate({ opacity: 0}, 500, 'swing', () => {
            doFilter();
        });
    }
    else {
        doFilter();
    }
}

// show more
function filter_ShowMore( quantity, cat )
{
    $=jQuery;

    var candidates = $( ".js_filter_candidate.js_filter_hide" );

    if( candidates.length == 0 ) {
    
        $('#cs_view_more_projects').removeClass('view-more-yes').fadeOut();
        $( '#js_filter_zero' ).fadeIn();
    } else {
        $( '#js_filter_zero' ).hide();
        $('#cs_view_more_projects').addClass('view-more-yes');
        $('#cs_view_more_projects').fadeIn();    
    }

    // show the next chunk
    candidates.slice( 0, quantity )
        .removeClass( 'js_filter_hide' )
        .addClass( 'js_filter_show' )
        .fadeIn( 300 );

    // okay.  now re-check the candidates and if there are none, hide more
    candidates = $( ".js_filter_hide.js_filter_candidate" );
    if( candidates.length > 0 ) {
        $( "#cs_view_more_projects" ).show().removeClass("d-none");
    } else {
        $( "#cs_view_more_projects" ).hide().addClass("d-none");
    }
    // for the new designs we only show the see more card if the category
    // is key-art
    if ( cat === "key-art" ) {
        $( "#cs_view_more_key_art" ).removeClass("d-none");
    } else {
        $( "#cs_view_more_key_art" ).addClass("d-none");
    }
}