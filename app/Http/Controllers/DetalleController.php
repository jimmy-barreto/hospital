<?php

namespace App\Http\Controllers;

use App;
use Gate;
use Illuminate\Http\Request;

class DetalleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $detalle = App\Detalle::orderby('descripcion','asc')->get();
        return view('detalle.index', compact('detalle'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Gate::denies('crear')) {
            return redirect()->route('detalle.index');
        }
        $hospitals = App\Hospital::orderby('nombre','asc')->get();
        $laboratorios = App\Laboratorio::orderby('nombre','asc')->get();
        return view('detalle.insert', compact('hospitals','laboratorios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'descripcion' => 'required',
            'fecha' => 'required',
            'idhospital' => 'required',
            'idlaboratorio' => 'required'
            ]);

       App\Detalle::create($request->all());

       return redirect()->route('detalle.index')
                        ->with('exito','Se ha Creado Detalle Correctamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Detalle  $detalle
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $detalle = App\Detalle::join('hospitals','detalles.idhospital','hospitals.id')
                                ->join('laboratorios','detalles.idlaboratorio','laboratorios.id')
                                ->select('detalles.*','hospitals.nombre as hospital','laboratorios.nombre as laboratorio')
                                ->where('detalles.id',$id)
                                ->first();
        

        return view('detalle.view', compact('detalle'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Detalle  $detalle
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        if (Gate::denies('editar')) {
            return redirect()->route('detalle.index');
        }
        $hospitals = App\Hospital::orderby('nombre','asc')->get();
        $laboratorios = App\Laboratorio::orderby('nombre','asc')->get();
        $detalle = App\Detalle::findorfail($id);

        return view('detalle.edit', compact('detalle','hospitals','laboratorios'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Detalle  $detalle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'descripcion' => 'required',
            'fecha' => 'required',
            'idhospital' => 'required',
            'idlaboratorio' => 'required'
        ]);

       $detalle = App\Detalle::findorfail($id);
       
       $detalle->update($request->all());

       return redirect()->route('detalle.index')
                        ->with('exito','Detalle modificado con exito!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Detalle  $detalle
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Gate::denies('eliminar')) {
            return redirect()->route('detalle.index');
        }

        $detalle = App\Detalle::findorfail($id);

        $detalle->delete();

        return redirect()->route('detalle.index')
                        -> with('exito','Detalle eliminado correctamente!');
    }
}
