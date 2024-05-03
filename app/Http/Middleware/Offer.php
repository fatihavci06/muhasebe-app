<?php

namespace App\Http\Middleware;

use App\Models\Offer as ModelsOffer;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Offer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $offerId = request()->segment(3);
        if (!Auth::user()->is_admin) {
            if (Auth::check()) {
                $offerCount = ModelsOffer::where('id', $offerId)
                    ->where('user_id', Auth::id())
                    ->count();
            } else {
                // Kullanıcı oturum açmamışsa, isterseniz bir hata mesajı verebilirsiniz.
                $offerCount = 0; // Veya başka bir değer
            }
            if ($offerCount < 1) {
                abort(403, 'Yetkiniz Yok!!!');
            }
        }
        return $next($request);
    }
}
