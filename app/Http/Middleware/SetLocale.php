<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SetLocale
{
    protected $locales = ['en', 'nl'];

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
        if ($this->invalidLocale($request)) {
//            dd(url($request->path(), ['locale' => 'en']));
            return redirect()->away(url($request->url() . '?locale=en'));
        }

        app()->setLocale($request->get('locale'));
        $request->setLocale($request->get('locale'));

        return $next($request);
    }

    /**
     * @param Request $request
     * @return bool
     */
    protected function validLocale(Request $request)
    {
        return $request->has('locale') && collect($this->locales)->contains($request->get('locale'));
    }

    /**
     * @param Request $request
     * @return bool
     */
    protected function invalidLocale(Request $request)
    {
        return !$this->validLocale($request);
    }
}
