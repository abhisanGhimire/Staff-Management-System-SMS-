<?php

namespace App\Http\Middleware;

use App\Traits\permissionTrait;

use Closure;



class HasPermission
{
    use permissionTrait;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $this->hasPermission();

        return $next($request);
    }
}
