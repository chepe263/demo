<?php

namespace App\Http\Middleware;

use Closure;

class ResponseJSON
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
        $pre_response = $next($request);
        if($request->wantsJson()){
            try
            {
                //return response($pre_response->getOriginalContent());
                //\Log::info($pre_response->getOriginalContent());
                if($pre_response->getOriginalContent() && $pre_response->getOriginalContent()->getData() ){

                    return response($pre_response->getOriginalContent()->getData());
                } else {
                    return response([]);
                }

            } catch(\Exception $e) {
                return response($e);

            }

        }
        return $pre_response;
    }
}
