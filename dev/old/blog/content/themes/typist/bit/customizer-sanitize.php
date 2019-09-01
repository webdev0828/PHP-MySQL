<?php

/**
 * Sanitize Checkbox
 */
function typist_sanitize_checkbox( $input ) {
    if ( $input ) {
    $output = '1';
    } else {
    $output = false;
    }
    return $output;
}
// -----------------------------------------------------------------------------

/**
* Sanitize layout options
*/
function typist_sanitize_layout( $layout ) {
    if ( ! in_array( $layout, array( 'left', 'full_width', 'right' ) ) ) {
        $layout = 'right';
    }
    return $layout;
}
// -----------------------------------------------------------------------------

/**
* Sanitize scheme options
*/
function typist_sanitize_scheme( $scheme ) {
    if ( ! in_array( $scheme, array( 'cherry', 'greyscale', 'dark', 'mono', 'terminal', 'gum', 'beige' ) ) ) {
        $scheme = 'cherry';
    }
    return $scheme;
}
// -----------------------------------------------------------------------------

/**
* Sanitize logo alignment options
*/
function typist_sanitize_align( $align ) {
    if ( ! in_array( $align, array( 'left', 'center', 'right' ) ) ) {
        $align = 'left';
    }
    return $align;
}
// -----------------------------------------------------------------------------

/**
* Sanitize site width
*/
function typist_sanitize_width( $width ) {
    if ( ! in_array( $width, array( '980px', '1280px', '1400px', '1600px', '1920px' ) ) ) {
        $width = '1400px';
    }
    return $width;
}
// -----------------------------------------------------------------------------

/**
* Sanitize site font
*/
function typist_sanitize_fontfamily( $font ) {
    if ( ! in_array( $font, array( 'Fjalla One', 'Oswald', 'Arial','Noto Serif','Noto Sans', 'Yanone Kaffeesatz', 'PT Sans', 'BenchNine', 'Passion One','Francois One','Verdana','Times New Roman','Monospace', 'Roboto Slab', 'Open Sans','Fira Sans', 'Impact'  ) ) ) {
        $font = 'Noto Sans';
    }
    return $font;
}
// -----------------------------------------------------------------------------

/**
* Sanitize blog content
*/
function typist_sanitize_content( $content ) {
    if ( ! in_array( $content, array( 'content', 'excerpt' ) ) ) {
        $content = 'excerpt';
    }
    return $content;
}
// -----------------------------------------------------------------------------

/**
* Sanitize font weight
*/
function typist_sanitize_weight( $weight ) {
    if ( ! in_array( $weight, array( '400', '800' ) ) ) {
        $weight = '400';
    }
    return $weight;
}
// -----------------------------------------------------------------------------