<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\MessageReceived;
use App\Estudiante;
use App\User;
use App\Rol;
use App\RolActividad;
use App\EstudianteEscuela;
use Tymon\JWTAuth\Exceptions\JWTException;
use JWTAuth;
use App\EstudianteProceso;
class EstudianteController extends Controller
{

// funcion encargada de listar a todos los estudiantes en la base de datos
// Primero verifica si la sesion fue iniciada
//Obtiene el token del estudiante para obtener sus permisos
//realiza el filtrado de acuerdoa  sus permisos, si tiene operador solo filtrara a los operadores
//Si tiene operador docente filtrara a operadores y docentes
    public function index(){

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

    $data = EstudianteProceso::distinct()->select('ProcesoActividad.Nombre','EstudianteProceso.Permiso')->join('ProcesoActividad','ProcesoActividad.IdProcesoActividad' ,'=','EstudianteProceso.IdProcesoActividad')->where([['EstudianteProceso.IdEstudiante',$user->id],['EstudianteProceso.Permiso','1']])->get();
    $Resultado = array();

    foreach ($data as $dat) {

         if (strcmp($dat->Nombre, "Operador") === 0) {
            $Operador = User::select('id','Nombre','idDNITipo','DNI','Correo','Telefono','Direccion','password','Operador','Estudiante','Docente')->where([['Operador',"1"]])->get()->toArray();
            $Resultado = array_merge($Resultado, $Operador);

         }
         if (strcmp($dat->Nombre, "Estudiante") === 0) {
            $Estudiante = User::select('id','Nombre','idDNITipo','DNI','Correo','Telefono','Direccion','password','Operador','Estudiante','Docente')->where([['Estudiante',"1"]])->get()->toArray();
            $Resultado = array_merge($Resultado, $Estudiante);

         }

         if (strcmp($dat->Nombre, "Docente") === 0) {
            $Docente = User::select('id','Nombre','idDNITipo','DNI','Correo','Telefono','Direccion','password','Operador','Estudiante','Docente')->where([['Docente',"1"]])->get()->toArray();
            $Resultado = array_merge($Resultado, $Docente);

         }

    }
         //$Operador->union($Estudiante)->get();
        /*$User = User::select('id','Nombre','idDNITipo','DNI','Correo','password','Operador','Estudiante','Docente')->get();
            return response()->json($User,200);*/

    $MisDatos = User::select('id','Nombre','idDNITipo','DNI','Correo','Telefono','Direccion','password','Operador','Estudiante','Docente')->where([['id',$user->id]])->get()->toArray();
    $Resultado = array_merge($Resultado, $MisDatos);
        return response()->json(array_unique($Resultado, SORT_REGULAR));
    }

    public function show($id){
        $User = User::select('id','Nombre','idDNITipo','DNI','Correo','Telefono','Direccion','password','Operador','Estudiante','Docente')->find($id);
        return response()->json($User,200);

    }

    public function sendEmail($Estudiante,$ClaveAutomatica,$Correo){
        Mail::to($Correo)->send(new MessageReceived($Estudiante, $ClaveAutomatica));
    }

    public function consultarCrear($comparar, $dato){
       return User::where($comparar, $dato)->exists();;
    }

    public function store(Request $request)
    {

         request()->validate([
            'Nombre' => 'required|min:6|max:40',
            'DNI' => 'required|numeric',
            'Correo' => 'required|email:rfc,dns',
            'Telefono' => 'required|numeric|digits:9',
            'Direccion' => 'required|min:10|max:50',
            'Operador' => 'required',
            'Estudiante' => 'required',
            'Docente' => 'required'
        ]);

        if(($this->consultarCrear("DNI",$request->DNI)) ){
            return  response()->json([
            'Campo' => 'DNI',
            'Existe' => 'true'
            ], 200);
        }

        if(($this->consultarCrear("Correo", $request->Correo)) ){
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
        $user->Operador = $request->Operador;
        $user->Estudiante = $request->Estudiante;
        $user->Docente = $request->Docente;
        $user->save();
        $this->sendEmail($request->DNI,$ClaveAutomatica,$request->Correo);

       // $ListaRoles = $request->ListaRoles;

        /*$ListaRoles = Rol::select('IdRol','NombreRol')->whereIn('IdRol', $request->ListaRoles)->get();
        foreach ($ListaRoles as $rol) {

            $UsuarioAutomatico = substr(str_shuffle($permitted_chars), 0, 8);
            $ClaveAutomatica = substr(str_shuffle($permitted_chars), 0, 8);
            $Jugador = Jugador::find($dat);
            $Jugador->update(['Notificado' => 1, 'Usuario' => $UsuarioAutomatico, 'password' => $ClaveAutomatica]);
            $this->sendEmail($Jugador,$UsuarioAutomatico,$ClaveAutomatica);
        }*/
        $returnList = [];
        if(!(is_array($request->ListaRoles))){
            array_push($returnList, $request->ListaRoles);
        }else{
            $returnList = $request->ListaRoles;
        }
        $shares = RolActividad::distinct()->select('IdProcesoActividad','Permiso')->join('RolProceso', 'RolProceso.IdRolProceso', '=', 'RolActividad.IdRolProceso')->join('Rol', 'RolProceso.IdRol', '=', 'Rol.IdRol')->whereIn('Rol.IdRol', $returnList)->where('Permiso','1')->get();

        foreach ($shares as $nuevo)
        {
            $EstudianteProceso = new EstudianteProceso();
            $EstudianteProceso->IdEstudiante = $user->id;
            $EstudianteProceso->IdProcesoActividad = $nuevo->IdProcesoActividad;
            $EstudianteProceso->Permiso = $nuevo->Permiso;
            $EstudianteProceso->save();
        }

        //$ListaRoles = Rol::select('IdRol','NombreRol')->whereIn('IdRol', $request->ListaRoles)->get();
        //return response()->json($shares, 200);

        return response()->json($user, 200);
    }
    public function prueba(Request $request){

    }
//permite actualizas a un estudiante
//si el correo actualizado existe no dejara que el registro se actualice
//si el DNI ya fue registrado, no dejara que el registro de actualice
    public function update(Request $request, $id)
    {

         request()->validate([
            'Nombre' => 'required|min:6|max:40',
            'DNI' => 'required|numeric',
            'Correo' => 'required|email:rfc,dns',
            'Telefono' => 'required|numeric|digits:9',
            'Direccion' => 'required|min:10|max:50'
        ]);

        $User = User::find($id);
        if(($this->consultar("DNI",$request->DNI,$User->id)) ){
            return  response()->json([
            'Campo' => 'DNI',
            'Existe' => 'true'
            ], 200);
        }

        if(($this->consultar("Correo", $request->Correo,$User->id)) ){
            return  response()->json([
            'Campo' => 'Correo',
            'Existe' => 'true'
            ], 200);
        }


        $User->Nombre = $request->Nombre;
        $User->idDNITipo = $request->idDNITipo;
        $User->DNI = $request->DNI;
        $User->Correo = $request->Correo;
        $User->Telefono = $request->Telefono;
        $User->Direccion = $request->Direccion;
        $User->Operador = $request->Operador;
        $User->Estudiante = $request->Estudiante;
        $User->Docente = $request->Docente;
        $User->save();

        $returnList = [];
        if(!(is_array($request->ListaRoles))){
            array_push($returnList, $request->ListaRoles);
        }else{
            $returnList = $request->ListaRoles;
        }

        $shares = RolActividad::distinct()->select('IdProcesoActividad','Permiso')->join('RolProceso', 'RolProceso.IdRolProceso', '=', 'RolActividad.IdRolProceso')->join('Rol', 'RolProceso.IdRol', '=', 'Rol.IdRol')->whereIn('Rol.IdRol', $returnList)->where('Permiso','1')->get();

        EstudianteProceso::where('IdEstudiante', $User->id)->delete();

        foreach ($shares as $nuevo)
        {
            $EstudianteProceso = new EstudianteProceso();
            $EstudianteProceso->IdEstudiante = $User->id;
            $EstudianteProceso->IdProcesoActividad = $nuevo->IdProcesoActividad;
            $EstudianteProceso->Permiso = $nuevo->Permiso;
            $EstudianteProceso->save();
        }


        return $this->show($id);
    }

//Permite verificar un registro, es utilizado apra actualizar, buscara todos los registros distintos
//al id enviado
    public function consultar($comparar, $dato, $id){
       return User::where($comparar, $dato)->where("id","!=",$id)->exists();;
    }

    public function getStudentPerName(Request $request){

        if ($request->input('Nombre')) {
            $campoBusqueda = 'Nombre';
            $datoEnviado = $request->input('Nombre');
        }else if ($request->input('DNI')) {
            $campoBusqueda = 'DNI';
            $datoEnviado = $request->input('DNI');
        }else if ($request->input('Correo')) {
            $campoBusqueda = 'Correo';
            $datoEnviado = $request->input('Correo');
        }else
            return response()->json(['message' => 'Debe Llena el Campo']);

        $User = User::where($campoBusqueda,'like','%'.$datoEnviado.'%')->select('id','Nombre','idDNITipo','DNI','Correo','Telefono','Direccion','password','Operador','Estudiante','Docente')->get();
                return response()->json($User,200);
    }

    public function forwardingPass(Request $request)
    {
        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $ClaveAutomatica = substr(str_shuffle($permitted_chars), 0, 10);
        $Hash = password_hash($ClaveAutomatica,PASSWORD_DEFAULT);
        try {
        $Estudiante = Estudiante::where([['DNI',$request->DNI],['Correo',$request->Correo]])->update([
           'password' => $Hash
        ]);
        if($Estudiante==0){
            return response()->json(['Actualizacion de clave' => false]);
        }
        $this->sendEmail($request->DNI,$ClaveAutomatica,$request->Correo);
        } catch(\Illuminate\Database\QueryException $ex){
            return response()->json(['Actualizacion de clave' => false]);
         // Note any method of class PDOException can be called on $ex.
        }
        return response()->json(['Actualizacion de clave' => true]);
    }

//Elimina un estudiante, la eliminacion se hara en cascada si no se tiene un registro asociado en las tesis.
    public function destroy($id)
    {
        $User = User::find($id);
        $User->delete();

        return response()->json(['Eliminacion' => true]);
    }
}
