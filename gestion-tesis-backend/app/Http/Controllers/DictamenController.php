<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Dictamen;
class DictamenController extends Controller
{
    //
    public function index(){
    	$Dictamen = Dictamen::select('IdDictamen','Dictamen')->get();
        return response()->json($Dictamen, 200);
    }

    public function store(Request $request){
    	request()->validate([
            'Dictamen' => 'required|max:100',
          ]);
    	$Dictamen = new Dictamen;
        $Dictamen->Dictamen = $request->Dictamen;
  		$Dictamen->save();
  		return response()->json($Dictamen, 200);
    }


	public function destroy($id){
    	$Dictamen = Dictamen::find($id);
        $Dictamen->delete();

        return response()->json(['Eliminacion' => true]);
    }

    public function update(Request $request, $id)
    {
         request()->validate([
            'Dictamen' => 'required|max:100',
        ]);

    	$Dictamen = Dictamen::find($id);
        $Dictamen->Dictamen = $request->Dictamen;
        $Dictamen->save();
    	return $this->show($id);
    }

    public function show($id)
    {

        $Dictamen = Dictamen::select('IdDictamen','Dictamen')->find($id);
    	return response()->json($Dictamen,200);

    }

       public function getDictamenPerName(Request $request){

        request()->validate([
            'Dictamen' => 'required|max:100',
        ]);
        $campoBusqueda='Dictamen';
        $datoEnviado=$request->Dictamen;
        $Dictamen = Dictamen::where($campoBusqueda,'like','%'.$datoEnviado.'%')->select('IdDictamen','Dictamen')->get();
                return response()->json($Dictamen,200);
    }

}
