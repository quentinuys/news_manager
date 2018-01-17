<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Cache;

class ManageCacheAfter
{
    /**
     * Handle an incoming request After the view is rendered.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);
        
        //Gets a key based on the URL
        $key = $this->keygen($request->url());
		
        //Checks if this object exists in the Cache
		if(!Cache::has( $key ) ){
            //create the key value pair in Cache
            Cache::put( $key, $response->getContent(), 1 );
        } 
        return $next($request);
    }

    //formats URL into readable format
    protected function keygen( $url )
	{
		return 'route_' . str_slug( $url ,'-');
	}
}
