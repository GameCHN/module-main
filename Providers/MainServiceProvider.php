<?php namespace YC\Main\Providers;

use Illuminate\Support\ServiceProvider;

use \Modules;

class MainServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Boot the application events.
	 * 
	 * @return void
	 */
	public function boot()
	{
		$this->registerConfig();
		$this->registerTranslations();
		$this->registerViews();
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{		
		//


		global $wpdb, $current_site, $wp_did_header;


		if (!defined('ABSPATH') && PHP_SAPI != 'cli') {

			if (!isset($wp_did_header)) {


				$wp_did_header = true;

				require_once(ROOT_PATH . 'app/article/wp-load.php');

				wp();

				require(WP_CORE_DIR . '/includes/template-loader.php');



			}
			//require_once dirname(base_path()) . '/app/article/index.php';
		}

        if(defined('ABSPATH')){

        }
	}

	/**
	 * Register config.
	 * 
	 * @return void
	 */
	protected function registerConfig()
	{
		$this->publishes([
		    __DIR__.'/../Config/config.php' => config_path('main.php'),
		]);
		$this->mergeConfigFrom(
		    __DIR__.'/../Config/config.php', 'main'
		);
	}

	/**
	 * Register views.
	 * 
	 * @return void
	 */
	public function registerViews()
	{
		$viewPath = base_path('resources/views/modules/main');

		$sourcePath = __DIR__.'/../Resources/views';

		$this->publishes([
			$sourcePath => $viewPath
		]);

		$this->loadViewsFrom([$viewPath, $sourcePath], 'main');
	}

	/**
	 * Register translations.
	 * 
	 * @return void
	 */
	public function registerTranslations()
	{
		$langPath = base_path('resources/lang/modules/main');

		if (is_dir($langPath)) {
			$this->loadTranslationsFrom($langPath, 'main');
		} else {
			$this->loadTranslationsFrom(__DIR__ .'/../Resources/lang', 'main');
		}
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	}

}
