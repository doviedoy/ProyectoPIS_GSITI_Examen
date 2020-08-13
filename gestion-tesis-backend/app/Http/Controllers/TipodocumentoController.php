<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tipodocumento;
class TipodocumentoController extends Controller
{
    public function index(){
    	$Documentos = Tipodocumento::select('IdDNITipo','TipoDNI')->get();
        return response()->json($Documentos, 200);
    }
}
