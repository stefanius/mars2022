<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Season;
use Illuminate\Http\Request;

class CheckOrderOpening
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
        if (Season::activeSeason()->isOrderClosed()) {
            return redirect()->route('order.closed');
        }

        return $next($request);
    }
}
