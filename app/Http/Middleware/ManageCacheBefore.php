<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Cache;

class ManageCacheBefore
{
    /**
     * Handle an incoming request Before the view is rendered.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
		//Gets a key based on the URL
		$key = $this->keygen($request->url());
		
		//gets current request headers
		$content_type = $request->headers->get('Content-Type');

		//Checks if the query exists in the Cache
		if( Cache::has( $key ) ) {
			//assigns the Cached object to response;
			$response_html = Cache::get( $key );
			$response = response($response_html)->header('Content-Type', 'text/html');

			//returns the Cached query Object
			return $response;
		}
		//returns the normal query Object
		return $next($request);
    }
	
	//formats URL into readable format
	protected function keygen( $url )
	{
		return 'route_' . str_slug( $url ,'-');
	}
}
