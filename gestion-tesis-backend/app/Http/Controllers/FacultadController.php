<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Facultad;

class FacultadController extends Controller
{
      public function index()
    {
        $Facultad = Facultad::select('fac_id','fac_nombre','fac_siglas')->where('fac_est_reg','=','A')->get();
        return response()->json($Facultad, 200);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    //funcion encargada de crear un docente
    public function store(Request $request){

        request()->validate([
            'fac_nombre' => 'required|max:40',
            'fac_siglas' => ['required','max:5','regex:/^[A-Z]+$/']
        ]);

    	$Facultad = new Facultad;
        $Facultad->fac_nombre = $request->fac_nombre;
    	$Facultad->fac_siglas = $request->fac_siglas;
    	$Facultad->save();

    	return response()->json($Facultad, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //Esta funcion se encarga de mostrar el docente
    public function show($id)
    {

        $Facultad = Facultad::select('fac_id','fac_nombre','fac_siglas')->find($id);
    	return response()->json($Facultad,200);

    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {


    }

    public function getFacultadPerFilter(Request $request){

        if ($request->input('fac_nombre')) {
            $campoBusqueda = 'fac_nombre';
            $datoEnviado = $request->input('fac_nombre');
        }else if ($request->input('fac_siglas')) {
            $campoBusqueda = 'fac_siglas';
            $datoEnviado = $request->input('fac_siglas');
        }else
            return response()->json(['message' => 'Debe Llena el Campo']);

        $Facultad = Facultad::where($campoBusqueda,'like','%'.$datoEnviado.'%')->select('fac_id','fac_nombre','fac_siglas')->where('fac_est_reg','=','A')->get();
            return response()->json($Facultad,200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //Funcion para actualizar los datos del docente, en caso de recibir una contrasena nueva, se encarga de aplicar
    //el hash respectivo y enviar el correo.
    public function update(Request $request, $id)
    {
         request()->validate([
            'fac_nombre' => 'required|max:40',
            'fac_siglas' => ['required','max:5','regex:/^[A-Z]+$/']
        ]);

    	$Facultad = Facultad::find($id);
        $Facultad->fac_nombre = $request->fac_nombre;
        $Facultad->fac_siglas = $request->fac_siglas;
        $Facultad->save();
    	return $this->show($id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //Realiza la eliminacion real del usuario(para que ya no tenga acceso) pero al docente se aplica
    //una eliminacion logica
    public function destroy($id)
    {
    	 $Facultad = Facultad::find($id);
         $Facultad->update(['fac_est_reg' => 'I']);
    	 return response()->json(['Eliminacion' => true]);
    }
}
