<?php

namespace App\Http\Controllers;

use App;
use Gate;
use Illuminate\Http\Request;

class VdiagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vdiag = App\Vdiag::orderby('fecha','asc')->get();
        return view('vdiag.index', compact('vdiag'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Gate::denies('crear')) {
            return redirect()->route('vdiag.index');
        }

        $pacientes = App\Paciente::orderby('nombre','asc')->get();
        $diagnosticos = App\Diagnostico::orderby('codigo','asc')->get();
        return view('vdiag.insert', compact('pacientes','diagnosticos'));
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
            'fecha' => 'required',
            'idpaciente' => 'required',
            'iddiagnostico' => 'required'
            ]);

       App\Vdiag::create($request->all());

       return redirect()->route('vdiag.index')
                        ->with('exito','Se ha Creado Resultado Correctamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Vdiag  $vdiag
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vdiag = App\Vdiag::join('pacientes','vdiags.idpaciente','pacientes.id')
                            ->join('diagnosticos','vdiags.iddiagnostico','diagnosticos.id')
                            ->select('vdiags.*','pacientes.nombre as paciente','diagnosticos.codigo as diagnostico')
                            ->where('vdiags.id',$id)
                            ->first();


        return view('vdiag.view', compact('vdiag'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Vdiag  $vdiag
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Gate::denies('editar')) {
            return redirect()->route('vdiag.index');
        }

        $pacientes = App\Paciente::orderby('nombre','asc')->get();
        $diagnosticos = App\Diagnostico::orderby('codigo','asc')->get();
        $consulta = App\Consulta::findorfail($id);

        return view('consulta.edit', compact('consulta','medicos','diagnosticos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vdiag  $vdiag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vdiag $vdiag)
    {
        $request->validate([
            'fecha' => 'required',
            'idpaciente' => 'required',
            'iddiagnostico' => 'required'
        ]);


       $vdiag = App\Vdiag::findorfail($id);
       
       $vdiag->update($request->all());

       return redirect()->route('vdiag.index')
                        ->with('exito','Resultado modificado con exito!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vdiag  $vdiag
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        if (Gate::denies('eliminar')) {
            return redirect()->route('vdiag.index');
        }

        $vdiag = App\Vdiag::findorfail($id);

        $vdiag->delete();

        return redirect()->route('vdiag.index')
                        -> with('exito','Resultado eliminado correctamente!');
    }
    
}
