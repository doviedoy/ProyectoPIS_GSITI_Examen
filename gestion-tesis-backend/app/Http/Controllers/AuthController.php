<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use App\Mail\MessageReceived;
use App\Http\Requests\RegisterAuthRequest;
use App\User;
use App\Operador;
use App\Docente;
use App\Estudiante;
use Illuminate\Http\Request;
use App\EstudianteProceso;
use  JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthController extends Controller
{
    public  $loginAfterSignUp = true;
//Registra a un estudainte, verifica si el correo y DNI no existan en la BD
    public  function  register(Request  $request) {
    	request()->validate([
            'Nombre' => 'required|min:6|max:40',
            'DNI' => 'required|numeric',
            'Correo' => 'required|email:rfc,dns',
            'Telefono' => 'required|numeric|digits:9',
            'Direccion' => 'required|min:10|max:50'
        ]);

    	if(($this->consultar("DNI",$request->DNI)) ){
    		return  response()->json([
			'Campo' => 'DNI',
			'Existe' => 'true'
			], 200);
    	}

    	if(($this->consultar("Correo", $request->Correo)) ){
    		return  response()->json([
			'Campo' => 'Correo',
			'Existe' => 'true'
			], 200);
    	}

    	$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $ClaveAutomatica = substr(str_shuffle($permitted_chars), 0, 10);
        $Hash = password_hash($ClaveAutomatica,PASSWORD_DEFAULT);

		$user = new User;
        $user->Nombre = $request->Nombre;
        $user->idDNITipo = $request->idDNITipo;
        $user->DNI = $request->DNI;
        $user->Correo = $request->Correo;
        $user->Telefono = $request->Telefono;
        $user->Direccion = $request->Direccion;
        $user->password = $Hash;
        $user->Operador = "0";
        $user->Estudiante = "1";
        $user->Docente = "0";
        $user->save();
        $this->sendEmail($request->DNI,$ClaveAutomatica,$request->Correo);

        $EstudianteProceso = new EstudianteProceso();
        $EstudianteProceso->IdEstudiante = $user->id;
        $EstudianteProceso->IdProcesoActividad = "5";
        $EstudianteProceso->Permiso = "1";
        $EstudianteProceso->save();

		return response()->json($user, 200);
	}

	public function sendEmail($Estudiante,$ClaveAutomatica,$Correo){
        Mail::to($Correo)->send(new MessageReceived($Estudiante, $ClaveAutomatica));
    }

//Se encarga de consultar los registros distintos al id enviado
	public function consultar($comparar, $dato){
       return User::where($comparar, $dato)->exists();;
    }

	public  function  login(Request  $request) {

		$input = $request->only('DNI', 'password');
		$jwt_token = null;
		if (!$jwt_token = JWTAuth::attempt($input)) {
			return  response()->json([
				'status' => 'FALSE',
				'message' => 'Correo o contraseña no válidos.',
			], 401);
		}

		return  response()->json([
			'status' => 'TRUE',
			'token' => $jwt_token

		]);
	}
//Se encarga de finalizar la sesion, eliminando el token existente
	public  function  logout(Request  $request) {
		$this->validate($request, [
			'token' => 'required'
		]);

		try {
			JWTAuth::invalidate($request->token);
			return  response()->json([
				'status' => 'ok',
				'message' => 'Cierre de sesión exitoso.'
			]);
		} catch (JWTException  $exception) {
			return  response()->json([
				'status' => 'unknown_error',
				'message' => 'Al usuario no se le pudo cerrar la sesión.'
			], 500);
		}
	}
//Devuelve los datos del usuario que inicio sesion, esto lo ahce mediante el token
	public  function  getAuthUser(Request  $request) {
		$this->validate($request, [
			'token' => 'required'
		]);

		$user = JWTAuth::authenticate($request->token);

		$data = User::distinct()->select('Estudiante.id','Estudiante.Nombre','Estudiante.idDNITipo','Estudiante.DNI','Estudiante.Correo','Estudiante.Telefono','Estudiante.Direccion','Estudiante.password','Estudiante.Operador','Estudiante.Estudiante','Estudiante.Docente')->where('Estudiante.id','=',$user->id)->get();

   	return response()->json($data,200);

	}
//Devuelve la lsita de permisos hacia las actividades que puede acceder el estudiante(operador, docente, estudiante)
	public  function  getPermission(Request  $request) {
		$this->validate($request, [
			'token' => 'required'
		]);

		$user = JWTAuth::authenticate($request->token);

		$data = EstudianteProceso::distinct()->select('ProcesoActividad.Nombre','EstudianteProceso.Permiso')->join('ProcesoActividad','ProcesoActividad.IdProcesoActividad' ,'=','EstudianteProceso.IdProcesoActividad')->where([['EstudianteProceso.IdEstudiante',$user->id]])->get();

   	return response()->json($data,200);

	}


}
