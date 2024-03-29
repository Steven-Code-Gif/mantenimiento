<x-app-layout>
    <div class="container mx-auto py-6 my-8">
        <form action="{{ route('prototypes.protocols.store',$prototype) }}" method="POST">
            @csrf
            <div class="card">
                <div class="card-body">
                    <img src="{{ asset('form/form2.jpg') }}" alt="agregar protocolo"
                        class="max-h-16 w-full object-cover object-center">
                    <h1
                        class="text-gray-500 font-bold text-2xl px-3 py-2 w-full bg-slate-100 font-mono text-center uppercase">
                        {{ __($title) }}</h1>
                    <div class="grid grid-cols-3 gap-2 text-xs my-2 bg-slate-200 p-2 rounded">
                        <div class="mb-4">
                            <x-jet-label class="italic my-2 capitalize" value="{{ __('specialidad') }}" for="name" />
                            <select name="specialty_id" class="w-full rounded-lg">
                                @foreach ($specialties as $specialty)
                                    <option value="{{ $specialty->id }}">{{ $specialty->name }}</option>
                                @endforeach
                            </select>
                            <x-jet-input-error for="specialty_id" />
                        </div>

                        <div class="mb-4">
                            <x-jet-label class="italic my-2 capitalize" value="{{ __('tipo de tarea') }}" for="name" />
                            <select name="task_id" class="w-full rounded-lg">
                                @foreach ($tasks as $task)
                                    <option value="{{ $task->id }}">{{ $task->name }}</option>
                                @endforeach
                            </select>
                            <x-jet-input-error for="specialty_id" />
                        </div>

                        <div class="mb-4">
                            <x-jet-label class="italic my-2 capitalize" value="{{ __('tarea') }}" for="task" />
                            <x-jet-input type="text" name="task" class="w-full "
                                placeholder="{{ __('input task') }}" value="{{ old('name', $protocol->task) }}" />
                            <x-jet-input-error for="task" />
                        </div>

                        <div class="mb-4 col-span-3 md:col-span-2">
                            <x-jet-label class="italic my-2 capitalize" value="{{ __('detalle') }}" for="detail" />
                            <textarea name="detail" class="w-full rounded " placeholder="{{ __('input detail') }}">{{ old('detail', $protocol->detail) }}</textarea>
                            <x-jet-input-error for="detail" />
                        </div>

                        <div class="mb-4 grid grid-cols-3 gap-2">
                            <div>
                                <x-jet-label class="italic my-2 capitalize" value="{{ __('frecuencia') }}"
                                    for="frecuency" />
                                <select name="frecuency" class="w-full rounded-lg">
                                    @for ($i = 1; $i <= 12; $i++)
                                        <option value="{{ $i }}">{{ $i . ' veces al año' }}</option>
                                    @endfor
                                </select>
                                <x-jet-input-error for="frecuency" />

                            </div>
                            <div>
                                <x-jet-label class="italic my-2 capitalize" value="{{ __('duracion') }}"
                                    for="duration" />
                                <select name="duration" class="w-full rounded-lg">
                                    @for ($i = 1; $i <= 480; $i++)
                                        <option value="{{ $i }}">{{ $i . ' horas' }}</option>
                                    @endfor
                                </select>
                                 <x-jet-input-error for="duration" />
                            </div>

                            <div>
                                <x-jet-label class="italic my-2 capitalize" value="{{ __('posicion') }}"
                                    for="position" />
                                <select name="position" class="w-full rounded-lg">
                                    @for ($i = 1; $i <= 25; $i++)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>
                                 <x-jet-input-error for="position" />
                            </div>

                        </div>
                        <div class="col-span-3 grid grid-cols-4 gap-2">


                        <div class="mb-4">
                            <x-jet-label class="italic my-2 capitalize" value="{{ __('permiso') }}" for="name" />
                            <select name="permissions" class="w-full rounded-lg">
                                    <option value="N/A">N/A</option>
                                    <option value="permiso general">permiso general</option>
                                    <option value="permiso de administración">permiso de administración</option>
                                    <option value="permiso de gerencia">permiso de gerencia</option>
                                    <option value="permiso externo">permiso externo</option>
                                    <option value="permiso especial">permiso especial</option>
                            </select>
                            <x-jet-input-error for="permission" />
                        </div>

                        <div class="mb-4">
                            <x-jet-label class="italic my-2 capitalize" value="{{ __('seguridad') }}" for="name" />
                            <select name="security" class="w-full rounded-lg">
                                    <option value="cero o bajo riesgo">cero o bajo riesgo</option>
                                    <option value="bajo o medio riesgo">bajo o medio riesgo</option>
                                    <option value="medio o alto riesgo">medio o alto riesgo</option>
                                    <option value="alto riesgo">alto riesgo</option>
                                    <option value="riesgo extremo">riesgo extremo</option>
                            </select>
                            <x-jet-input-error for="security" />
                        </div>

                        <div class="mb-4">
                            <x-jet-label class="italic my-2 capitalize" value="{{ __('condicion') }}" for="conditions" />
                            <select name="conditions" class="w-full rounded-lg">
                                    <option value="maquinaria detenida">maquinaria detenida</option>
                                    <option value="maquinaria semi-detenida">maquinaria semi-detenida</option>
                                    <option value="maquinaria en funcionamiento">maquinaria en funcionamiento</option>
                            </select>
                            <x-jet-input-error for="conditions" />
                        </div>
                        <div class="mb-4">
                            <x-jet-label class="italic my-2 capitalize" value="{{ __('trabajadores') }}"
                                for="workers" />
                            <select name="workers" class="w-full rounded-lg">
                                @for ($i = 1; $i <= 12; $i++)
                                    <option value="{{ $i }}">{{ $i . ' trabajadores' }}</option>
                                @endfor
                            </select>
                            <x-jet-input-error for="workers" />
                        </div>
                        </div>
                        <div class="mb-4">
                            <a type="button" href="{{ route('prototypes.index') }}"
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