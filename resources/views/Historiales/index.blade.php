<x-app-layout>
    <h2 class="text-2xl font-bold mb-4">Historial Médico de {{ $paciente->nombre }}</h2>

    <a href="{{ route('pacientes.historial.create', $paciente->id) }}" class="bg-blue-500 text-white px-4 py-2 rounded">Agregar Registro</a>

    <div class="mt-4">
        @foreach ($historiales as $historial)
            <div class="border p-4 mb-2">
                <p><strong>Fecha:</strong> {{ $historial->fecha }}</p>
                <p><strong>Diagnóstico:</strong> {{ $historial->diagnostico }}</p>
                <p><strong>Tratamiento:</strong> {{ $historial->tratamiento }}</p>
            </div>
        @endforeach
    </div>
</x-app-layout>