<?php


Route::group(['prefix' => '', 'namespace' => 'YC\Main\Http\Controllers'], function () {

    global $posts, $post, $wp_did_header, $wp_query, $wp_rewrite, $wpdb, $wp_version, $wp, $id, $comment, $user_ID;


    if (PHP_SAPI != 'cli' && WP_ONLY == false) {
        /** Loads the WordPress Environment and Template */
        require(ROOT . '/app/article/wp-blog-header.php');
        require_once WP_CORE_DIR.'/init.php';
    }

    Route::get('/', 'MainController@index');
    Route::any('{all?}', 'MainController@index')->where('all', '.+');
});

//YCMS::makeFunc('to_url', function () {
//    function to_url($url = '') {
//
//    }
//});



