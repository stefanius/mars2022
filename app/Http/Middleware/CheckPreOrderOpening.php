<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Season;
use Illuminate\Http\Request;

class CheckPreOrderOpening
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        if (Season::activeSeason()->isPreOrderClosed()) {
            return redirect()->route('pre-order.closed');
        }

        return $next($request);
    }
}
