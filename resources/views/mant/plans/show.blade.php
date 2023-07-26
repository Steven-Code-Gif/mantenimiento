<x-app-layout>
    <div class="card">
        <div class="card-body">
            <img src="{{ asset('form/form2.jpg') }}" alt="agregar sistema"
                class="max-h-16 w-full object-cover object-center">
            <h1 class="text-gray-500 font-bold text-2xl px-3 py-2 w-full bg-slate-100 font-mono text-center uppercase">
                {{ $plan->name }}
            </h1>
            <div class="grid grid-cols-3 gap-3 my-3 border rounded p-3">
                <div class="bg-slate-50 p-2">
                    <p class="text-gray-700 font-bold text-base">{{ $plan->name }}</p>
                    <p class="text-gray-600 font-semibold text-sm">{{ __('fecha de inicio') }}:
                        <strong>{{ $plan->start->format('d-m-Y') }}</strong>
                    </p>
                    <p class="text-gray-600 font-semibold text-sm">{{ __('tiempo de inicio') }}:
                        <strong>{{ $plan->start_time->format('h:i A') }}</strong>
                    </p>
                    <p class="text-gray-600 font-semibold text-sm">{{ __('turnos de trabajo') }}:
                        <strong>{{ $plan->work_shift }}</strong>
                    </p>
                    <p class="text-gray-600 font-semibold text-sm">{{ __('horas de trabajo semanales') }}:
                        <strong>{{ $plan->weekly_shift }} horas</strong>
                    </p>
                    <p class="text-gray-600 font-semibold text-sm">{{ __('tiempo de trabajo') }}:
                        <strong>{{ $plan->work_time->format('h:i A') }}</strong>
                    </p>
                    <p class="text-gray-600 font-semibold text-sm">
                        {{ __('
                                                horas de trabajo diarias') }}:
                        <strong>{{ $plan->daily_shift }} {{ __('horas') }}</strong>
                    </p>
                    <p class="text-gray-600 font-semibold text-sm">{{ __('hora de descanso') }}:
                        <strong>{{ $plan->work_time->addhours($plan->rest_time_hours)->format('h:i A') }}-{{ $plan->work_time->addhours($plan->rest_hours + $plan->rest_time_hours)->format('h:i A') }}</strong>
                        {{ __('hours total') }} :
                        <strong>{{ $plan->rest_hours }} {{ __('horas') }}</strong>
                    </p>
                    <p class="text-gray-600 font-semibold text-sm">
                        {{ __('
                                                trabajar en vacaciones') }}:
                        <strong>{{ $plan->work_holiday ? 'si' : 'no' }}</strong>
                    </p>
                    <p class="text-gray-600 font-semibold text-sm">{{ __('trabajar horas extra') }}:
                        <strong>{{ $plan->work_overtime ? 'si' : 'no' }}</strong>
                    </p>
                </div>
                <div class="bg-slate-50 p-2">
                    <p class="text-gray-600 font-semibold text-sm">{{ __('equipos') }}:
                        <strong>{{ $plan->equipments->count() }}</strong>
                    </p>
                    @foreach ($plan->equipments as $e)
                        <p class="text-gray-600 font-semibold text-xs"">
                            {{ $e->location() . '  : ' . $e->name }}</p>
                    @endforeach
                </div>
                <div class="bg-slate-50 p-2">
                    <p class="text-gray-600 font-semibold text-sm">{{ __('tareas') }}:
                        {{ $plan->goals->count() }}
                    </p>
                    <p class="text-gray-600 font-semibold text-sm">{{ __('tiempo estimado') }}:
                        {{ price($plan->goals->sum('duration')) }} {{ __('hrs.') }}.
                    </p>

                    <p class="text-gray-600 font-semibold text-sm">{{ __('repuestos') }}:
                        {{ price($plan->goals->sum('total_replacement')) }}
                    </p>
                    <p class="text-gray-600 font-semibold text-sm">{{ __('
                                            suministros') }}:
                        {{ price($plan->goals->sum('total_supply')) }}
                    </p>
                    <p class="text-gray-600 font-semibold text-sm">{{ __('servicios') }}:
                        {{ price($plan->goals->sum('total_service')) }}
                    </p>
                    <p class="text-gray-600 font-semibold text-sm">{{ __('trabajadores') }}:
                        {{ $tecnicos->count() }}
                    </p>

                    <p class="text-gray-600 font-semibold text-sm">
                        {{ __('trabajadores') }}-{{ __('horas') }}:
                        {{ $tecnicos->count() * 8 }} {{ __('hrs.') }}
                    </p>
                    <p class="text-gray-600 font-semibold text-sm">
                        {{ __('tiempo probable') }}-{{ __('horas') }}:
                        {{ ($plan->goals->sum('duration') / $tecnicos->count()) * 8 }} {{ __('hrs.') }}
                    </p>

                </div>
            </div>
            <div class="grid grid-cols-6 gap-3">
                <div>
                    <p class="font-bold text-center text-mono">{{ __('paso 1') }}</p>
                    <a class="w-full" href="{{ route('plans.equipments', $plan->id) }}"
                        title="{{ __('añadir equipo al plan de mantenimiento') . ' : ' . $plan->name }}">
                        <i class="w-full text-xs icono text-green-500 hover:text-red-500 fab fa-phabricator">
                            <span class="text-xs ml-3">{{ __('agregar equipo') }}</span> </i>
                    </a>
                </div>
                <div>
                    <p class="font-bold text-center text-mono">{{ __('paso 2') }}</p>
                    <a class="w-full" href="{{ route('plans.protocols', $plan->id) }}"
                        title="{{ __('agregar protocolos de mantenimiento al plan') . ' : ' . $plan->name }}"><i
                            class="icono w-full text-green-500 hover:text-red-500 fa fa-file-invoice">
                            <span class="text-xs ml-3">{{ __('agregar protocolos') }}</span></i>
                    </a>
                </div>
                <div>
                    <p class="font-bold text-center text-mono">{{ __('paso 3') }}</p>
                    <a class="w-full" href="{{ route('plans.sequence', $plan->id) }}"
                        title="{{ __('secuencia de desarrollo del plan') . ' : ' . $plan->name }}"><i
                            class="w-full icono text-green-500 hover:text-red-500 fa-solid fa-arrow-up-1-9">
                            <span class="text-xs p-2">{{ __('agregar secuencia') }}</span></i></a>
                    <hr class="my-3">
                </div>
                <div>
                    <p class="font-bold text-center text-mono">{{ __('paso 4') }}</p>
                    <a class="w-full" href="{{ route('plans.resources', $plan->id) }}"
                        title="{{ __('añadir recursos al plan de mantenimiento') . ' : ' . $plan->name }}">
                        <i class="icono w-full text-green-500 hover:text-red-500 fa-solid fa-dumpster">
                            <span class="text-xs ml-3">{{ __('agregar recursos') }}</span>
                        </i>
                    </a>
                </div>
                <div>
                    <p class="font-bold text-center text-mono">{{ __('paso 5') }}</p>
                    <a class="w-full" href="{{ route('plans.teams', $plan->id) }}"
                        title="{{ __('agregar equipos al plan de mantenimiento') . ' : ' . $plan->name }}">
                        <i class="icono w-full text-green-500 hover:text-red-500 fa-solid fa-users">
                            <span class="text-xs ml-3">{{ __('agregar miembros') }}</span>
                        </i>
                    </a>
                </div>
                <div>
                    <p class="font-bold text-center text-mono">{{ __('paso 6') }}</p>
                    <a class="w-full" href="{{ route('plans.timeline', $plan->id) }}"
                        title="{{ __('Generar un cronograma del plan de mantenimiento de acuerdo a los protocolos de mantenimiento de cada equipo') }}">
                        <i class="w-full text-xs icono text-green-500 hover:text-red-500 fa-solid fa-clock-rotate-left">
                            <span class="ml-3">{{ __('generar plan') }}</span> </i>
                    </a>
                </div>
            </div>
            <div class="grid grid-cols-5 gap-3">
                <div>
                    <a class="w-full" href="{{ route('plans.calendar', $plan->id) }}"
                        title="{{ __('calendario generado para desarrollar el plan') . ' : ' . $plan->name }}">
                        <i class="w-full text-xs icono text-blue-600 hover:text-red-600 fa-solid fa-calendar">
                            <span class="text-xs ml-3">{{ __('calendario') }}</span> </i>
                    </a>
                </div>

                <div>
                    <a class="col-span-3 w-full" href="{{ route('plans.timeline', $plan->id) }}"
                        title="{{ __('calendario generado para desarrollar el plan') . ' : ' . $plan->name }}">
                        <i class="w-full text-xs icono text-blue-600 hover:text-red-600 fa-solid fa-calendar">
                            <span class="text-xs ml-3">{{ __('línea de tiempo') }}</span> </i>
                    </a>
                </div>
                <div></div>
                <div>
                    <a class="col-span-3 w-full" href="{{ route('plans.edit', $plan->id) }}"
                        title="{{ __('calendario generado para desarrollar el plan') . ' : ' . $plan->name }}">
                        <i class="w-full text-xs icono text-blue-600 fa-solid fa-edit">
                            <span class="text-xs ml-3">{{ __('editar plan') }}</span> </i>
                    </a>
                </div>
                <div>
                    <form class="col-span-3 w-full" action="{{ route('plans.destroy', $plan->id) }}" method="POST"
                        class="form-delete">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="col-span-3 w-full">
                            <i title="{{ __('eliminar plan') . ' : ' . $plan->name }}"
                                class="icono w-full text-red-500 fa-solid fa-trash-can"></i></button>
                    </form>
                </div>
            </div>

        </div>
    </div>
    </div>
</x-app-layout>
