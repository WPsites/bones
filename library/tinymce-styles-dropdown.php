<?php

/*
 Add style select dropdown to tinymce
*/

add_filter( 'mce_buttons_2', 'my_mce_buttons_2' );

function my_mce_buttons_2( $buttons ) {
    array_unshift( $buttons, 'styleselect' );
    return $buttons;
}


/*
 Create some tinymce style definitions for the dropdown
*/

add_filter( 'tiny_mce_before_init', 'my_mce_before_init' );

function my_mce_before_init( $settings ) {

 $style_formats = array(
        array(
        	'title' => 'Black on white',
            'block' => 'span',
        	'classes' => 'black-on-white',
        	'wrapper' => true
    	),
        array(
        	'title' => 'White on black',
        	'block' => 'span',
        	'classes' => 'white-on-black',
        	'wrapper' => true
        )
    );

/* FURTHER EXAMPLES

    $style_formats = array(
        array(
    		'title' => 'Button',
    		'selector' => 'a',
    		'classes' => 'button'
    	),
        array(
        	'title' => 'Callout Box',
        	'block' => 'div',
        	'classes' => 'callout',
        	'wrapper' => true
        ),
        array(
        	'title' => 'Bold Red Text',
        	'inline' => 'span',
        	'styles' => array(
        		'color' => '#f00',
        		'fontWeight' => 'bold'
        	)
        )
    );
    
*/

    $settings['style_formats'] = json_encode( $style_formats );

    return $settings;

}

/*
 Add your editor stylesheet to tinymce so that they can be previewed.
 You'll still need to make sure these styles are represented in your client side less/css
*/

add_action( 'admin_init', 'add_my_editor_style' );

function add_my_editor_style() {
    add_editor_style( 'library/less/editor-style.less' );
}
