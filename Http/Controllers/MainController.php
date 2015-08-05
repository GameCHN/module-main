<?php namespace YC\Main\Http\Controllers;

use YCMS\Modules\Routing\Controller;

class MainController extends Controller
{

    public function index()
    {
        //if (!defined('ABSPATH')) {

        if($lang = \Input::get('lang')){
            return \Redirect::to('/'.$lang);
        }

        global $wpdb, $current_site, $wp_did_header;
        define('WP_ONLY', true);
        define('WP_USE_THEMES', true);
        require(WP_CORE_DIR . '/includes/template-loader.php');

        //}
        return view('main::index');
    }

}