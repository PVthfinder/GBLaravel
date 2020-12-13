<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\News;
//use App\Http\Requests\StoreNewsRequest;
use Barryvdh\Debugbar\Controllers\BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;

class Validation extends BaseController
{
    use ValidatesRequests;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->method() == 'POST') {
            $this->validate($request, News::rules());
        }

        return $next($request);
    }
}
