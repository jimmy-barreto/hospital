<?php

namespace App\Http\Controllers;

use App;
use Illuminate\Http\Request;
use Gate;

class ConsultaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $consulta = App\Consulta::orderby('fechaConsulta','asc')->get();
        return view('consulta.index', compact('consulta'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Gate::denies('crear')) {
            return redirect()->route('consulta.index');
        }

        $medicos = App\Medico::orderby('nombre','asc')->get();
        $pacientes = App\Paciente::orderby('nombre','asc')->get();
        return view('consulta.insert', compact('medicos','pacientes'));
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
            'fechaConsulta' => 'required',
            'idmedico' => 'required',
            'idpaciente' => 'required'
            ]);

       App\Consulta::create($request->all());

       return redirect()->route('consulta.index')
                        ->with('exito','Se ha Creado Consulta Correctamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Consulta  $consulta
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         
        $consulta = App\Consulta::join('medicos','consultas.idmedico','medicos.id')
                            ->join('pacientes','consultas.idpaciente','pacientes.id')
                            ->select('consultas.*','medicos.nombre as medico','pacientes.nombre as paciente')
                            ->where('consultas.id',$id)
                            ->first();


        return view('consulta.view', compact('consulta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Consulta  $consulta
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Gate::denies('editar')) {
            return redirect()->route('consulta.index');
        }

        $medicos = App\Medico::orderby('nombre','asc')->get();
        $pacientes = App\Paciente::orderby('nombre','asc')->get();
        $consulta = App\Consulta::findorfail($id);

        return view('consulta.edit', compact('consulta','medicos','pacientes'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Consulta  $consulta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'fechaConsulta' => 'required',
            'idmedico' => 'required',
            'idpaciente' => 'required'
        ]);


       $consulta = App\Consulta::findorfail($id);
       
       $consulta->update($request->all());

       return redirect()->route('consulta.index')
                        ->with('exito','Consulta modificado con exito!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Consulta  $consulta
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Gate::denies('eliminar')) {
            return redirect()->route('consulta.index');
        }

        $consulta = App\Consulta::findorfail($id);

        $consulta->delete();

        return redirect()->route('consulta.index')
                        -> with('exito','Consulta eliminado correctamente!');
    }
}
