<?php
function nevada_my_search_form( $form ) {
    $form = '<form role="search" method="post" id="searchform" class="search_input" action="' . home_url( '/' ) . '" >
    <input type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="Search..." />
    </form>';
    return $form;
}
add_filter( 'get_search_form', 'nevada_my_search_form' );
?>
