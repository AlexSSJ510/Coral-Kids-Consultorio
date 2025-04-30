<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paciente;
use App\Models\HistorialMedico;

class HistorialMedicoController extends Controller
{
    public function index($pacienteId)
    {
        $paciente = Paciente::findOrFail($pacienteId);
        $historiales = $paciente->historiales()->orderBy('fecha', 'desc')->get();

        return view('historiales.index', compact('paciente', 'historiales'));
    }

    public function create($pacienteId)
    {
        $paciente = Paciente::findOrFail($pacienteId);
        return view('historiales.create', compact('paciente'));
    }

    public function store(Request $request, $pacienteId)
    {
        $request->validate([
            'fecha' => 'required|date',
            'diagnostico' => 'required',
            'tratamiento' => 'required',
        ]);

        HistorialMedico::create([
            'paciente_id' => $pacienteId,
            'fecha' => $request->fecha,
            'diagnostico' => $request->diagnostico,
            'tratamiento' => $request->tratamiento,
        ]);

        return redirect()->route('pacientes.historial', $pacienteId)->with('success', 'Historial médico agregado.');
    }
}
