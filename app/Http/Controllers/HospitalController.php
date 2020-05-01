<?php

namespace App\Http\Controllers;

use App;
use Gate;
use Illuminate\Http\Request;

class HospitalController extends Controller
{

    // public function listar(){
    //     $hospitals = App\Hospital::orderBy('nombre','asc')->get();

    //     return response()->json([
    //         $hospitals
    //     ]);
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request){
            $consulta = $request->buscar;
            $hospitals = App\Hospital::where('nombre', 'LIKE', '%' . $consulta . '%')
                                        ->orderby('nombre','asc')
                                        ->paginate(5);
            return view('hospital.index', compact('hospitals','consulta'));
        }

        $hospitals = App\Hospital::orderby('nombre','asc')->paginate(5);
        return view('hospital.index',compact('hospitals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Gate::denies('crear')) {
            return redirect()->route('hospital.index');
        }
        //return view('hospital.create');
        return view('hospital.insert');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // if($request->ajax())
        // {
        //     App\Hospital::create($request->all());
        //     return response()->json([
        //         'mensaje' => 'Creado'
        //     ]);
        // }

        $request->validate([
            'codigo' => 'required',
            'nombre' => 'required',
            'direccion' => 'required',
            'telefono' => 'required',
            'cantidadCamas' => 'required' 
        ]);

       App\Hospital::create($request->all());

       return redirect()->route('hospital.index')
                        ->with('exito','Se ha creado el hospital correctamente!');
    }
    

    /**
     * Display the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $hospital = App\Hospital::findorfail($id);

        return view('hospital.view', compact('hospital'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Gate::denies('editar')) {
            return redirect()->route('hospital.index');
        }

        $hospital = App\Hospital::findorfail($id);

        // return response()->json([
        //     $hospital
        // ]);

        return view('hospital.edit', compact('hospital'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Hospital  $hospital
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'codigo' => 'required',
            'nombre' => 'required',
            'direccion' => 'required',
            'telefono' => 'required',
            'cantidadCamas' => 'required' 
        ]);

       $hospital = App\Hospital::findorfail($id);

       $hospital->update($request->all());

    //    return response()->json(
    //     ["mensaje" => "modificado"]
    // );
       return redirect()->route('hospital.index')
                        ->with('exito','Hospital modificado con exito!');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Hospital  $hospital
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        if (Gate::denies('eliminar')) {
            return redirect()->route('hospital.index');
        }

        $hospital = App\Hospital::findorfail($id);

        $hospital->delete();

        return redirect()->route('hospital.index')
                        -> with('exito','Hospital eliminado correctamente!');
    
    }
}
