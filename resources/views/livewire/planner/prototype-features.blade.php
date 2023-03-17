<div class="card">
    <div class="card-body">
    <h1 class="text-gray-500 text-center text-2xl text-bold">Asignacion de Caracteristica a Prototipo {{ ' '.$prototype->fullName()}}</h1>
        <div class="grid grid-cols-2 gap-3 border p-4">
            <div class="border border-r-3 p-3">
                <h1 class="text-gray-500 text-center text-xl">Caracteristica disponibles</h1>
                <input type="text" placeholder="buscar caracteristicas" class="w-full rounded my-2" wire:model="search">
                <ul>
                    @foreach ($features as $key=>$f )
                    <li>
                        <a class="cursor-pointer" wire:click="addFeature({{ $key }})">{{$f}}</a>
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="border border-r-3 p-3">
                <h1 class="text-gray-500 text-center text-xl">Caracteristica Asignada</h1>
                <ul>
                    @foreach ($prototype->features as $f )
                    <li>
                        <a class="cursor-pointer" wire:click="delFeature({{ $f->id }})">{{$f->measure}}</a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>

