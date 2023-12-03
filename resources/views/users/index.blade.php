{{-- resources/views/users/index.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Bienvenido de vuelta admin.
        </h2>
    </x-slot>

    <!--puede hacer un crud de los usr-->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    
                    <h1>Lista de Usuarios</h1>

                <ul>
                    @foreach ($users as $user)
                        <li>{{ $user->name }} - {{ $user->email }}</li>
                    @endforeach
                </ul>

                </div>
            </div>
        </div>
    </div>

    
</x-app-layout>
