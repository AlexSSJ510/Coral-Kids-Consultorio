<x-app-layout>
    <div class="flex flex-col">
        <!-- Encabezado -->
        <div class="bg-white dark:bg-gray-800 p-4 flex items-center justify-between shadow-md">
            <div class="flex items-center space-x-4">
                <img src="{{ asset('img/LogoCK - copia.jpg') }}" alt="Logo Clinica" class="w-16 h-16" />
                <h1 class="text-4xl font-extrabold text-blue-700 tracking-tight">
                    Consultorio Pediátrico Coral Kids
                </h1>
            </div>
            <div class="text-gray-600 dark:text-gray-300 text-lg">
                {{ now()->format('d/m/Y') }}
            </div>
        </div>

        <div class="flex">
            <!-- Barra lateral -->
            <div class="w-60 h-screen bg-blue-900 text-white p-5">
                <div class="text-2xl font-bold mb-8">CORAL KIDS</div>
                <nav class="space-y-4">
                    <a href="{{ route('dashboard') }}" class="block hover:bg-blue-700 rounded p-2">Inicio</a>
                    <a href="{{ route('pacientes.index') }}" class="block hover:bg-blue-700 rounded p-2">Pacientes</a>
                    <a href="{{ route('citas.index') }}" class="block hover:bg-blue-700 rounded p-2">Crear cita</a>
                    <a href="#" class="block hover:bg-blue-700 rounded p-2">Mis citas</a>
                    <a href="{{ route('profile.edit') }}" class="block hover:bg-blue-700 rounded p-2">Editar perfil</a>
                </nav>
            </div>

            <!-- Contenido principal -->
            <div class="flex-1 p-10 bg-gray-100 min-h-screen">
                <div class="text-gray-700 dark:text-black-300 text-lg mb-6">
                    ¡Hola! <span class="font-bold">{{ Auth::user()->name }}</span>, desde aquí podrás administrar tus citas y realizarles un seguimiento.
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="bg-white shadow rounded-2xl p-6 hover:shadow-lg transition">
                        <h2 class="text-xl font-semibold mb-4">Gestionar horario</h2>
                        <a href="#" class="text-blue-600 hover:underline">Ir al panel</a>
                    </div>

                    <div class="bg-white shadow rounded-2xl p-6 hover:shadow-lg transition">
                        <h2 class="text-xl font-semibold mb-4">Crear cita</h2>
                        <a href="#" class="text-blue-600 hover:underline">Ir al panel</a>
                    </div>

                    <div class="bg-white shadow rounded-2xl p-6 hover:shadow-lg transition">
                        <h2 class="text-xl font-semibold mb-4">Mis citas</h2>
                        <a href="#" class="text-blue-600 hover:underline">Ir al panel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>