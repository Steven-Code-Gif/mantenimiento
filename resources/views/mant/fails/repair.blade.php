<x-app-layout>
    <div class="container mx-auto my-6">
        <div class="card">
            <div class="card-body">
                <h1 class="w-full text-center text-mono font-bold bg-slate-400 mb-2 py-2 uppercase font-gray-500">
                    {{ __('reparacion de fallas') }}</h1>
                <div class="grid grid-cols-4 gap-4">
                    <div class="col-span-1">
                        @livewire('mant.fails.fail-observation', ['fail' => $fail])
                    </div>

                    <div class="col-span-1">
                        @livewire('mant.fails.fail-replacement', ['fail' => $fail])
                    </div>
                    <div class="col-span-1">
                        @livewire('mant.fails.fail-supply', ['fail' => $fail])

                    </div>
                    <div class="col-span-1">
                        @livewire('mant.fails.fail-service', ['fail' => $fail])
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mx-auto my-6">
        <div class="card">
            <div class="card-body">
                <h1 class="w-full text-center text-mono font-bold bg-slate-400 mb-2 py-2 uppercase font-gray-500">
                    {{ __('imagenes de fallas') }}</h1>
                <div class="grid grid-cols-5 gap-4">
                    <div class="col-span-3">
                        @livewire('mant.fails.fail-image', ['fail' => $fail])
                    </div>
                    <div class="col-span-2">
                        @livewire('mant.fails.fail-images', ['fail' => $fail])
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container mx-auto my-6">
        <div class="card">
            <div class="card-body">
                <h1 class="w-full text-center text-mono font-bold bg-slate-400 mb-2 py-2 uppercase font-gray-500">
                    {{ __('costo de fallas') }}</h1>
                <div class="grid grid-cols-3 gap-4">
                    <div class="">
                        @livewire('mant.fails.fail-replacement-list', ['fail' => $fail])
                    </div>
                    <div class="">
                        @livewire('mant.fails.fail-supply-list', ['fail' => $fail])
                    </div>
                    <div class="">
                        @livewire('mant.fails.fail-service-list', ['fail' => $fail])
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mx-auto my-6">
        <div class="card">
            <div class="card-body">
                <h1 class="w-full text-center text-mono font-bold bg-slate-400 mb-2 py-2 uppercase font-gray-500">
                    {{ __('fallas de equipo') }}</h1>
                <div class="grid grid-cols-2 gap-4">
                    <div class="">
                        @livewire('mant.fails.fail-comment-list', ['fail' => $fail])
                    </div>
                    <div class="bg-gray-100">
                        <h1 class="text-xl font-bold text-gray-500">Despeje de falla</h1>
                        <hr class="mt-2 mb-3">
                        <div class="">
                            <form method="POST" action="{{ route('fails.despeje', $fail->id) }}" class="p-2 text-sm">
                                @method('post')
                                @csrf
                                <div class=" ml-2 w-full">
                                    <x-jet-input-error for="users" />
                                    @foreach ($team->users as $t)
                                        <div class="flex justify-start items-center gap-3">
                                            <input type="checkbox" value="{{ $t->id }}" name="users[]">
                                            <label>{{ $t->name }}</label>
                                        </div>
                                    @endforeach
                                </div>
                                <button class="btn btn-blue mt-2 ml-2">Despejar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
