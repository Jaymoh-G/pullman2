<?php

namespace App\Http\Middleware;
use App\Models\Visitor;


use Closure;
use Illuminate\Http\Request;

class TrackVisitors
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $ip = $request->ip();
        $ua = $request->header('User-Agent');
        $visitor = Visitor::firstOrCreate(['ip_address' => $ip, 'user_agent' => $ua]);
        $visitor->save();

        return $next($request);
    }
}
