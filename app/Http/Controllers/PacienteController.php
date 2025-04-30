<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pacientes = Paciente::paginate(10); // Ahora paginamos de 10 en 10
        return view('pacientes.index', compact('pacientes'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pacientes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'dni' => 'required|string|max:20|unique:pacientes',
            'nombre' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'fecha_nacimiento' => 'required|date',
            'direccion' => 'nullable|string|max:255',
            'email' => 'required|email|unique:pacientes',
            'telefono' => 'required|string|max:20',
        ]);
        
        Paciente::create($request->all());
    
        return redirect()->route('pacientes.index')->with('success', 'Paciente creado exitosamente.');
    }
    
    /**
     * Display the specified resource.
     */
    public function show(Paciente $paciente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Paciente $paciente)
    {
        return view('pacientes.edit', compact('paciente'));
    }
    

    /**
     * Update the specified resource in storage.
     */
     public function update(Request $request, Paciente $paciente)
     {
         $request->validate([
             'dni' => 'required|string|max:20|unique:pacientes,dni,' . $paciente->id,
             'nombre' => 'required|string|max:255',
             'apellidos' => 'required|string|max:255',
             'fecha_nacimiento' => 'required|date',
             'direccion' => 'nullable|string|max:255',
             'email' => 'required|email|unique:pacientes,email,' . $paciente->id,
             'telefono' => 'required|string|max:20',
         ]);
     
         $paciente->update($request->all());
     
         return redirect()->route('pacientes.index')->with('success', 'Paciente actualizado exitosamente.');
     }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Paciente $paciente)
    {
        //
    }
}
