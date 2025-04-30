<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cita;
use App\Models\Paciente;
use App\Models\Doctor;


class CitaController extends Controller
{
    public function index()
    {
        $citas = Cita::with('paciente', 'doctor')->orderBy('fecha', 'desc')->get();
        return view('citas.index', compact('citas'));
    }

    public function create($pacienteId = null)
    {
        $pacientes = Paciente::all();
        $doctores = Doctor::all();
        return view('citas.create', compact('pacientes', 'doctores', 'pacienteId'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'paciente_id' => 'required|exists:pacientes,id',
            'doctor_id' => 'required|exists:doctors,id',
            'fecha' => 'required|date',
            'hora' => 'required',
            'motivo' => 'nullable|string'
        ]);

        Cita::create($request->all());

        return redirect()->route('citas.index')->with('success', 'Cita agendada correctamente.');
    }

    public function cambiarEstado(Request $request, Cita $cita)
    {
        $request->validate([
            'estado' => 'required|in:Pendiente,Realizada,Cancelada'
        ]);

        $cita->estado = $request->estado;
        $cita->save();

        return back()->with('success', 'Estado de la cita actualizado.');
    }
}
