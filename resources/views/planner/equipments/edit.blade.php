<x-app-layout>
    <div class="container my-4">
        <form action="{{ route('equipments.update', $equipment->id) }}" method="POST"
            class="max-w-2xl mx-auto rounded-lg shadow-lg">
            @csrf
            @method('PUT')
            <div class="card">
                <div class="card-body">
                    <img src="{{ asset('form/form2.jpg') }}" alt="agregar sistema"
                        class="max-h-16 w-full object-cover object-center">
                    <h1
                        class="text-gray-500 font-bold text-2xl px-3 py-2 w-full bg-slate-100 font-mono text-center uppercase">
                        {{ __($title) }}</h1>
                    <div class="grid grid-cols-1 gap-3 p-4 border shadow-sm my-2 bg-slate-50">
                        <div class="">
                            <x-jet-label class="italic my-2 capitalize" value="{{ __('prototipo') }}" for="name" />
                            <select name="prototype_id" class="w-full rounded-lg text-xs" id="prototype_id">
                                @foreach ($prototypes as $prototype)
                                    <option value="{{ $prototype->id }}"
                                        @if ($prototype->id == $equipment->prototype_id) selected @endif>{{ $prototype->fullName() }}
                                    </option>
                                @endforeach
                            </select>
                            <x-jet-input-error for="prototype_id" />
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                            <div class="">
                                <x-jet-label class="italic my-2 capitalize" value="{{ __('locacion') }}"
                                    for="name" />
                                <select name="location" class="w-full rounded-lg">
                                    @foreach ($zones as $zone)
                                        <option value="{{ $zone->name }}"
                                            @if ($zone->name == $equipment->location) selected @endif
                                            >{{ $zone->name }}</option>
                                    @endforeach
                                </select>
                                <x-jet-input-error for="location" />
                            </div>

                            <div>
                                <x-jet-label class="italic my-2 capitalize" value="{{ __('servicio') }}"
                                    for="service" />
                                <select name="service" class="w-full rounded-lg">
                                    @for ($i = 1; $i <= 24; $i++)
                                        <option value="{{ $i }}"
                                            @if ($i == $equipment->service) selected @endif>
                                            {{ $i . ' horas al día' }}</option>
                                    @endfor
                                </select>
                                <x-jet-input-error for="service" />
                            </div>
                        </div>

                        <div class="w-full">
                            <x-jet-label class="italic my-2 capitalize" value="{{ __('equipo') }}" for="name" />
                            <x-jet-input type="text" name="name" class="w-full "
                                placeholder="{{ __('nombre') }}" value="{{ old('name', $equipment->name) }}" />
                            <x-jet-input-error for="name" />

                            <x-jet-label class="italic my-2 capitalize" value="{{ __('descripcion') }}"
                                for="description" />
                            <textarea name="description" class="w-full rounded">{{ old('description', $equipment->description) }}</textarea>
                            <x-jet-input-error for="description" />
                            <hr class="mb-4">
                            <a type="button" href="{{ route('equipments.index') }}"
                                class="bg-yellow-500 text-white hover:bg-yellow-400 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                {{ __('cancel') }}
                            </a>

                            <button type="submit"
                                class="bg-blue-700 text-white hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                {{ __('update') }}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>