<?php

namespace App\Http\Middleware;

use App\Models\Menu;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;

use Symfony\Component\HttpFoundation\Response;

class UserPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $routeName = Route::currentRouteName();
        $modul=explode('.',$routeName)[0];
        $user = User::find(Auth::id());
        $menus = $user->menus->where('name',$modul);
        if(count($menus)==0){
            abort(403,'Yetkiniz Yok');
        }
   
        
        
        return $next($request);
    }
}
