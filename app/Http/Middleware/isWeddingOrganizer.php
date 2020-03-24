<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class isWeddingOrganizer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (!Auth::guard('wedding_organizer')->check()) {
            $notif = [
                'message' => "Silahkan melakukan login untuk memasuki sistem!",
                'alert-type' => 'error'
            ];
            return redirect('/login')->with($notif);
        }

        return $next($request);
    }
}
