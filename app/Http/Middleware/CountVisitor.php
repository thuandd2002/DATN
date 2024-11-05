<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Modules\Admin\Models\Visitor\Visitor;
use Closure;
use Illuminate\Http\Request;

class CountVisitor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
   
    public function handle(Request $request, Closure $next)
    {
        $ip = $request->ip();
        if (Visitor::where('date', today())->where('ip', $ip)->count() < 1)
        {
            Visitor::create([
                'date' => Carbon::now('Asia/Ho_Chi_Minh')->toDateString(),
                'ip' => $ip,
            ]);
        }
        return $next($request);
    }

    
}
