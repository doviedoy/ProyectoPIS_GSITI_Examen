<?php

namespace App\Http\Middleware;

use Closure;
use App\EstudianteProceso;
use App\Http\Requests\RegisterAuthRequest;
use App\User;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use JWTAuth;

class PermissionAuthorization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $authorization)
    {
        try {
        //Verficia la existencia del token
        $token = JWTAuth::parseToken();
        //Autoriza al usuario al ser autenticado el token
        $user = $token->authenticate();
    } catch (TokenExpiredException $e) {
        //Si el token expira
        return $this->unauthorized('Tu sesion ha expirado, por favor realiza el loguin nuevamente.');
    } catch (TokenInvalidException $e) {
        //Si el token no es valido
        return $this->unauthorized('Tu credenciales son invalidad, por favor vuelve a loguearte.');
    }catch (JWTException $e) {
        //Si el token expira
        return $this->unauthorized('Por favor, inicia sesion para continuar.');
    }
    //If user was authenticated successfully and user is in one of the acceptable roles, send to next request.
/*
    $data = EstudianteProceso::distinct()->select('ProcesoActividad.Nombre')->join('ProcesoActividad','ProcesoActividad.IdProcesoActividad' ,'=','EstudianteProceso.IdProcesoActividad')->where('EstudianteProceso.IdEstudiante','=',$user->id)->get();

    foreach ($data as $dat) {
         if ($user &&  strcmp($dat->Nombre, $authorization) === 0) {
            return $next($request);
         }
    }

*/
    //consulta los permisos del token enviado, si el permiso se encuentra en su tabla de la BD
    //permite continuar con el request
     $data = EstudianteProceso::distinct()->select('ProcesoActividad.Nombre')->join('ProcesoActividad','ProcesoActividad.IdProcesoActividad' ,'=','EstudianteProceso.IdProcesoActividad')->where([['EstudianteProceso.IdEstudiante',$user->id],['EstudianteProceso.Permiso','1'],['ProcesoActividad.Nombre',$authorization]])->first();


     if ($data) {
            return $next($request);
         }

    return $this->unauthorized();
    }
//Si no tiene permiso no se permitira proseguir con el request
    private function unauthorized($message = null){
    return response()->json([
        'message' => $message ? $message : 'No estas autorizado para acceder a este recurso',
        'success' => false
    ], 401);
 }


}
