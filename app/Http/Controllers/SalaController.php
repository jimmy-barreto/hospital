<?php

namespace App\Http\Controllers;

use App;
use Gate;
use Illuminate\Http\Request;

class SalaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if($request){
            $consulta = $request->buscar;
            $salas = App\Sala::where('nombre', 'LIKE', '%' . $consulta . '%')
                                        ->orderby('nombre','asc')
                                        ->paginate(5);
            return view('sala.index', compact('salas','consulta'));
        }

        $sala = App\Sala::orderby('nombre','asc')->paginate(5);
        return view('sala.index', compact('sala'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Gate::denies('crear')) {
            return redirect()->route('sala.index');
        }

        $hospitals = App\Hospital::orderby('nombre','asc')->get();
        return view('sala.insert', compact('hospitals'));
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
            'codigo' => 'required',
            'nombre' => 'required',
            'cantidadCamas' => 'required',
            'idhospital' => 'required'
            ]);

       App\Sala::create($request->all());

       return redirect()->route('sala.index')
                        ->with('exito','Se ha Creado Sala Correctamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sala  $sala
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sala = App\Sala::join('hospitals','salas.idhospital','hospitals.id')
                    ->select('salas.*','hospitals.nombre as hospital')
                    ->where('salas.id',$id)
                    ->first();

        return view('sala.view', compact('sala'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sala  $sala
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        if (Gate::denies('editar')) {
            return redirect()->route('sala.index');
        }

        $hospitals = App\Hospital::orderby('nombre','asc')->get();
        $sala = App\Sala::findorfail($id);

        return view('sala.edit', compact('sala','hospitals'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sala  $sala
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'codigo' => 'required',
            'nombre' => 'required',
            'cantidadCamas' => 'required',
            'idhospital' => 'required'
        ]);

       $sala = App\sala::findorfail($id);

       $sala->update($request->all());

       return redirect()->route('sala.index')
                        ->with('exito','Sala modificado con exito!');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sala  $sala
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        if (Gate::denies('eliminar')) {
            return redirect()->route('sala.index');
        }

        $sala = App\Sala::findorfail($id);

        $sala->delete();

        return redirect()->route('sala.index')
                        -> with('exito','Sala eliminado correctamente!');
    }
}
