<?php

namespace WPKit\Kernel;

use Themosis\Route\Router as BaseRouter;
use Illuminate\Http\Request;

class Router extends BaseRouter
{
    
    /**
     * Dispatch the request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     */
    public function dispatch(Request $request)
    {
        $this->currentRequest = $request;
        $response = $this->dispatchToRoute($request);
        foreach ($this->container['themosis_headers'] as $key => $values) {
            $response->headers->set($key, $values);
        }
        $response->sendHeaders();
        $this->terminateMiddleware($request, $response);
        return $response;
    }
    
    /**
     * Call the terminate method on any terminable middleware.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Http\Response  $response
     * @return void
     */
    protected function terminateMiddleware(Request $request, $response)
    {
	    $route = $this->findRoute($request);
        $middlewares = array_merge(
            $this->gatherRouteMiddleware($route),
            $this->middleware
        );
        foreach ($middlewares as $middleware) {
            if (! is_string($middleware)) {
                continue;
            }
            list($name, $parameters) = $this->parseMiddleware($middleware);
            $instance = $this->container->make($name);
            if (method_exists($instance, 'terminate')) {
                $instance->terminate($request, $response);
            }
        }
    }
    
    /**
     * Parse a middleware string to get the name and parameters.
     *
     * @param  string  $middleware
     * @return array
     */
    protected function parseMiddleware($middleware)
    {
        list($name, $parameters) = array_pad(explode(':', $middleware, 2), 2, []);
        if (is_string($parameters)) {
            $parameters = explode(',', $parameters);
        }
        return [$name, $parameters];
    }
    
}
