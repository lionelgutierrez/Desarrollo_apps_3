<?php

namespace App\Http\Controllers;

use App\Dispositivo;
use Illuminate\Http\Request;
use Validator;

class DispositivoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dispositivos = Dispositivo::orderBy('nombre','asc')->paginate(3);
        return view('Dispositivo.index',compact('dispositivos')); 
    }

    public function indexComnados()
    {
        $dispositivos = Dispositivo::orderBy('nombre','asc')->paginate(3);
        return view('Comandos.index',compact('dispositivos')); 
    }


    
    public function showComnados($id)
    {
        //
        $dispositivo=Dispositivo::find($id);
        return view('Comandos.show',compact('dispositivo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Dispositivo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
   
        $validator = Validator::make($input, [
            'nombre' => 'required',
            'descripcion' => 'required',
            'ubicacion' => 'required'
            
        ]);
   
        if($validator->fails()){
            //return $this->sendError('Error en validacion de datos. Hay datos requeridos.', $validator->errors());       
            return redirect()->route('Dispositivo.create')->withErrors($validator);            
        }
        
        $dispositivos = Dispositivo::create($input);
        return redirect()->route('Dispositivo.index')->with('success','Dispositivo creado satisfactoriamente');        
        


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Dispositivo  $dispositivo
     * @return \Illuminate\Http\Response
     */
    public function show(Dispositivo $dispositivo)
    {
        //
        return  view('Dispositivo.show',compact('dispositivo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Dispositivo  $dispositivo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $dispositivo=Dispositivo::find($id);
        return view('Dispositivo.edit',compact('dispositivo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Dispositivo  $dispositivo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $input = $request->all();

        $validator = Validator::make($input, [
            'nombre' => 'required',
            'descripcion' => 'required',
            'ubicacion' => 'required'
            
        ]);
   
        if($validator->fails()){
            return redirect()->route('Dispositivo.edit',$id)->withErrors($validator);
        }
        
        Dispositivo::find($id)->update($request->all());
   
        return redirect()->route('Dispositivo.index')->with('success','Dispositivo modificado satisfactoriamente');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Dispositivo  $dispositivo
     * @return \Illuminate\Http\Response
     */
    //public function destroy(Dispositivo $dispositivo)
    public function destroy($id)
    {
        Dispositivo::find($id)->delete();
        return redirect()->route('Dispositivo.index')->with('success','Dispositivo eliminado satisfactoriamente');

    }
}
