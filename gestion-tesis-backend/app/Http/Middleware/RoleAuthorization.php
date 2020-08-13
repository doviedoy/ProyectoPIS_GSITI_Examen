<?php

namespace App\Http\Middleware;

use Closure;
use App\Http\Requests\RegisterAuthRequest;
use App\User;
use Illuminate\Http\Request;
use  JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
class RoleAuthorization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, ...$roles)
    {
        try {
        //Access token from the request
        $token = JWTAuth::parseToken();
        //Try authenticating user
        $user = $token->authenticate();
    } catch (TokenExpiredException $e) {
        //Thrown if token has expired
        return $this->unauthorized('Tu sesion ha expirado, por favor realiza el loguin nuevamente.');
    } catch (TokenInvalidException $e) {
        //Thrown if token invalid
        return $this->unauthorized('Tu credenciales son invalidad, por favor vuelve a loguearte.');
    }catch (JWTException $e) {
        //Thrown if token was not found in the request.
        return $this->unauthorized('Por favor, inicia sesion para continuar.');
    }
    //If user was authenticated successfully and user is in one of the acceptable roles, send to next request.
    if ($user && in_array($user->role, $roles)) {
        return $next($request);
    }

    return $this->unauthorized();
    }

    private function unauthorized($message = null){
    return response()->json([
        'message' => $message ? $message : 'No estas autorizado para acceder a este recurso',
        'success' => false
    ], 401);
 }
}
