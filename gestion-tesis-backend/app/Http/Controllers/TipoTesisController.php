<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\TipoTesis;
class TipoTesisController extends Controller
{
    //
    public function index(){
    	$TipoTesis = TipoTesis::select('IdTipoTesis','TipoTesis')->get();
        return response()->json($TipoTesis, 200);
    }

    public function store(Request $request){
    	request()->validate([
            'TipoTesis' => 'required|max:100',
          ]);
    	$TipoTesis = new TipoTesis;
        $TipoTesis->TipoTesis = $request->TipoTesis;
  		$TipoTesis->save();
  		return response()->json($TipoTesis, 200);
    }


	public function destroy($id){
    	$TipoTesis = TipoTesis::find($id);
        $TipoTesis->delete();

        return response()->json(['Eliminacion' => true]);
    }

    public function update(Request $request, $id)
    {
         request()->validate([
            'TipoTesis' => 'required|max:100',
        ]);

    	$TipoTesis = Dictamen::find($id);
        $TipoTesis->TipoTesis = $request->TipoTesis;
        $TipoTesis->save();
    	return $this->show($id);
    }

    public function show($id)
    {

        $TipoTesis = TipoTesis::select('IdTipoTesis','TipoTesis')->find($id);
    	return response()->json($TipoTesis,200);

    }

     public function getTipoTesisPerName(Request $request){

        request()->validate([
            'TipoTesis' => 'required|max:100',
        ]);
        $datoEnviado=$request->TipoTesis;
        $campoBusqueda='TipoTesis';
        $TipoTesis = TipoTesis::where($campoBusqueda,'like','%'.$datoEnviado.'%')->select('IdTipoTesis','TipoTesis')->get();
                return response()->json($TipoTesis,200);
    }


}
