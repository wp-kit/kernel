<?php
	
namespace WPKit\Kernel;

use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Request;

class KernelServiceProvider extends ServiceProvider {
	
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
	    
	    $this->app->singleton(Request::class, function() {
		
		    return $this->app->request;
		    
	    });
        
	}
	
}
