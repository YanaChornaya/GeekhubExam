<?php
function services_post_type() {
    register_post_type('services', array(
            'labels' => array(
                'name' => __('Services', ''),
                'add_new' => __('Add new', ''),
                'all_items' => __('All', ''),
            ),
            'public' => true,
            'has_archive'   => true,
            'supports' => array('title', 'editor', 'thumbnail', 'custom-fields'),
        )
    );
}

add_action( 'init', 'services_post_type' );

function clients_post_type() {
    register_post_type('clients', array(
            'labels' => array(
                'name' => __('Clients', ''),
                'add_new' => __('Add new', ''),
                'all_items' => __('All', ''),
            ),
            'public' => true,
            'has_archive'   => true,
            'supports' => array('title', 'editor', 'thumbnail', 'custom-fields'),
        )
    );
}

add_action( 'init', 'clients_post_type' );


function partners_post_type() {
    register_post_type('partners', array(
            'labels' => array(
                'name' => __('Partners', ''),
                'add_new' => __('Add new', ''),
                'all_items' => __('All', ''),
            ),
            'public' => true,
            'has_archive'   => true,
            'supports' => array('title', 'editor', 'thumbnail', 'custom-fields'),
        )
    );
}

add_action( 'init', 'partners_post_type' );

function news_post_type() {
    register_post_type('news', array(
            'labels' => array(
                'name' => __('News', ''),
                'add_new' => __('Add new', ''),
                'all_items' => __('All', ''),
            ),
            'public' => true,
            'has_archive'   => true,
            'supports' => array('title', 'editor', 'thumbnail', 'custom-fields'),
        )
    );
}

add_action( 'init', 'news_post_type' );

//function hero_slider_post_type() {
//    register_post_type('hero-slider', array(
//            'labels' => array(
//                'name' => __('Hero slider', ''),
//                'add_new' => __('Add new', ''),
//                'all_items' => __('All', ''),
//            ),
//            'public' => true,
//            'has_archive'   => true,
//            'supports' => array('title', 'editor', 'thumbnail', 'custom-fields'),
//        )
//    );
//}
//
//add_action( 'init', 'hero_slider_post_type' );