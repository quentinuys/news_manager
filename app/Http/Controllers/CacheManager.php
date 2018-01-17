<?php

namespace App\Http\Controllers;

 
use IlluminateRoutingRoute;
use IlluminateHttpRequest;
use IlluminateHttpResponse;
 
use Str;
use Cache;
 
class CacheManager {
	
	public function grab( Route $route, Request $request )
	{
		$key = $this->keygen($request->url());
		
		if( Cache::has( $key ) ) return Cache::get( $key );
	}
	
	public function set( Route $route, Request $request, Response $response )
	{
		$key = $this->keygen($request->url());
		
		if( ! Cache::has( $key ) ) Cache::put( $key, $response->getContent(), 1 );
	}
	
	protected function keygen( $url )
	{
		return 'route_' . Str::slug( $url );
	}
	
}