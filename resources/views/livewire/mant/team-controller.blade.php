<div class="card max-w-2xl mx-auto my-6">
    <div class="card-body text-xs">
        <h1 class="text-gray-500 text-center text-2xl text-bold">{{ __("Asignacion de personal a equipo") }} : {{$team->name }}</h1>
    <div class="grid grid-cols-2 gap-3 border p-4">
        <div class=" border border-r-3 p-3">
            <h1 class="text-gray-600 text-center text-xl font-bold">{{ __("Personal disponible") }}</h1>
            <input type="text" placeholder="buscar caracteristicas" class="w-full rounded my-2" wire:model="search">

            <ul>
               @foreach ($users as $key=>$f )
                <li class="px-4 py-1 mx-4 my-1 bg-gradient-to-r from-cyan-700 to-blue-500 rounded text-white">
                    <a class="cursor-pointer" wire:click="addPersonal({{ $key }})">{{ $f }}</a>
                </li>
            @endforeach
            </ul>
        </div>

        <div class=" border border-r-3 p-3">
            <h1  class="text-gray-500 text-center text-xl font-bold mb-12">Personal Asignado</h1>
            <h2 class="text-gray-500 text-center text-xl mb-12">costo: {{ number_format($cost,2)}}</h2>
            <ul>
               @foreach ($teamUsers as $f )
                <li class="px-4 py-1 mx-4 my-1 bg-gradient-to-r from-blue-700 to-blue-500 rounded text-white">
                    <a class="cursor-pointer" wire:click="delPersonal({{ $f->id }})">{{ $f->name}}
                </li>
            @endforeach
            </ul>
        </div>
    </div>
    </div>
</div>