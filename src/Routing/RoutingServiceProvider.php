<?php
	
namespace WPKit\Routing;

use Illuminate\Support\ServiceProvider;

class RoutingServiceProvider extends ServiceProvider {
	
	/**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
	    
	    $this->app->instance('themosis_headers', []);
	        
        add_filter( 'wp_headers', function($headers) {
	        
	        $this->app['themosis_headers'] = array_merge($this->app['themosis_headers'], $headers);
	        
	        return [];
	        
        });
        
        $this->app->singleton('router', function ($container) {
            return new Router($container['events'], $container);
        });
        
	}
	
}