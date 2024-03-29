<x-app-layout>
    <div class="container my-4">
        <form action="{{ route('systems.store') }}" method="POST" class="max-w-lg mx-auto rounded-lg shadow-lg">
            @csrf
            <div class="card">
                <div class="card-body">
                    <img src="{{ asset('form/form2.jpg') }}" alt="agregar sistema" class="max-h-16 w-full object-cover object-center">
                    <h1 class="text-gray-500 font-bold text-2xl px-3 py-2 w-full bg-slate-100 font-mono text-center uppercase">{{ __($title) }}</h1>
                    <div class="grid grid-cols-1 gap-3">
                        <div class="mb-4">
                            <x-jet-label class="italic my-2 capitalize" value="{{ __('nombre') }}" for="name" />
                            <x-jet-input type="text" name="name" class="w-full "
                                placeholder="{{ __('nombre') }}" value="{{ old('name', $system->name) }}" />
                            <x-jet-input-error for="name" />
                            <hr class="mb-4">
                            <a type="button" href="{{ route('systems.index') }}"
                                class="bg-yellow-500 text-white hover:bg-yellow-400 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                {{ __('cancel') }}
                            </a>

                            <button type="submit"
                                class="bg-blue-700 text-white hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                {{ __('create') }}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>