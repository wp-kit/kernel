<?php

namespace WPKit\Routing;

use Themosis\Route\Router;
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
        return $response;
    }
    
}