<?php

namespace App\Http\Middleware;

use App\Helper\JWTToken;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TokenverifyMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $token = $request->cookie('token');
        $result = JWTToken::verifytoken($token);

        if ($result =='unauthorized') {
            return redirect('/login');
            // return response()->json([
            //     "status" => "Verification Failed",
            //     "message" => "unathorized"
            // ],401);
        }else {

            $request->headers->set('email', $result);
            // $request->headers->set('id', $result);
            return $next($request);
        }

    }
}