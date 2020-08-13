<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Estado;
class EstadoController extends Controller
{
    //
    public function index(){
    	$Estado = Estado::select('IdEstado','Estado')->get();
        return response()->json($Estado, 200);
    }
}
