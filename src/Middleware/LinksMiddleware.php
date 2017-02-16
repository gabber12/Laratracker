<?php

namespace Laratracker\Links\Middleware;

use Crypt;
use Closure;

class LinksMiddleware
{
    protected $track = array();
    /**
     * Determines wether to request should be tracked
     *
     * @param \Illuminate\Http\Request $request Request Object
     *
     * @return boolean
     */
    private function shouldTrack($request) 
    {
        foreach ($this->track as $track) {
            if ($track !== '/') {
                $track = trim($track, '/');
            }

            if ($request->is($track)) {
                return true;
            }
        }

        return false;
    } 

    /**
     * Run the request filter.
     *
     * @param \Illuminate\Http\Request $request 
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(
            $this->shouldTrack()
        ) {
            //TODO: Do something
        }

        return $next($request);
    }
}
