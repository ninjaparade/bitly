<?php namespace Ninjaparade\Bitly\Laravel;

use Illuminate\Support\ServiceProvider;
use Ninjaparade\Bitly\Bitly;

class BitlyServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;


	public function boot()
	{
		// $this->package('ninjaparade/bitly', 'ninjaparade/bitly', __DIR__.'/..');
	}
	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{

		$this->app['np_bitly'] = $this->app->share(function($app)
		{
			$config = $app['config']->get('ninjaparade/bitly::config');

			$bitly = new Bitly($config);

			return $bitly;
		});

		$loader = \Illuminate\Foundation\AliasLoader::getInstance();
		$loader->alias('Bitly', 'Ninjaparade\Bitly\Laravel\Facades\Bitly');
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
