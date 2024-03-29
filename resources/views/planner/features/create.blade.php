<x-app-layout>
    <div class="container my-4">
        <form action="{{ route('features.store') }}" method="POST" class="max-w-2xl mx-auto rounded-lg shadow-lg">
            @csrf
            <div class="card">
                <div class="card-body">
                    <img src="{{ asset('form/form2.jpg') }}" alt="agregar sistema"
                        class="max-h-16 w-full object-cover object-center">
                    <h1
                        class="text-gray-500 font-bold text-2xl px-3 py-2 w-full bg-slate-100 font-mono text-center uppercase">
                        {{ __($title) }}</h1>

                    <div class="grid  md:grid-cols-2 gap-3 p-4 border shadow-sm my-2 bg-slate-50">
                        <div class="mb-2 md:mb-4">
                            <x-jet-label class="italic my-2 capitalize" value="{{ __('temperatura') }}" for="measure" />
                            <x-jet-input type="text" name="measure" class="w-full "
                                placeholder="{{ __('input measure') }}"
                                value="{{ old('measure', $feature->measure) }}" />
                            <x-jet-input-error for="measure" />
                        </div>
                        <div class="mb-2 md:mb-4">
                            <x-jet-label class="italic my-2 capitalize" value="{{ __('unidad') }}" for="unit" />
                            <x-jet-input type="text" name="unit" class="w-full "
                                placeholder="{{ __('input unit') }}" value="{{ old('unit', $feature->unit) }}" />
                            <x-jet-input-error for="unit" />
                        </div>
                    </div>
                    <div class="grid md:grid-cols-2 gap-3 p-4 border shadow-sm my-2 bg-slate-50">
                        <div class="w-full">
                            <x-jet-label class="italic my-2 capitalize" value="{{ __('simbolo') }}" for="symbol" />
                            <x-jet-input type="text" name="symbol" class="w-full "
                                placeholder="{{ __('input symbol') }}" value="{{ old('symbol', $feature->symbol) }}" />
                            <x-jet-input-error for="symbol" />
                        </div>
                        <div class="w-full text-xs">
                            <x-jet-label class="italic my-2 capitalize" value="{{ __('tipo de característica') }}" for="isNumeric" />
                            <select name="isNumeric" class="w-full rounded-lg">
                                <option value="1">Número</option>
                                <option value="0">Texto</option>
                            </select>
                            <x-jet-input-error for="isNumeric" />
                        </div>
                    </div>
                    <textarea name="description" class="w-full my-2 rounded p-4 border shadow-sm my-2 bg-slate-50" placeholder="{{ __('description') }}">{{ old('description', $feature->description) }}</textarea>
                    <div class="my-2">
                        <div>
                            <a type="button" href="{{ route('features.index') }}"
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