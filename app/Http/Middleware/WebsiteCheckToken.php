<?php

namespace App\Http\Middleware;

use Closure;

class WebsiteCheckToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $header = $request->header('Authorization');
        if($header === encryptData('websiteToken#1#15555$' , env('WEBSITE_SHARED_KEY'))){
            return $next($request);
        }
        return  response()->json(['error' => encryptData('websiteToken#1#15555$' , env('WEBSITE_SHARED_KEY'))]);
    }
}
