<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rol;
class RolController extends Controller
{
    public function index(){
    	$Rol = Rol::select('IdRol','NombreRol')->get();
        return response()->json($Rol, 200);
    //
    }
    public function store(Request $request){

        request()->validate([
            'NombreRol' => 'required|max:50',
        ]);

    	$Rol = new Rol;
        $Rol->NombreRol = $request->NombreRol;
    	$Rol->save();

    	return response()->json($Rol, 201);

    }
    public function destroy($id){
        $Rol = Rol::find($id);
        $Rol->delete();

        return response()->json(['Eliminacion' => true]);
    }


}
