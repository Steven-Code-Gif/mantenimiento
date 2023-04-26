<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow-xl sm:rounded-lg p-6 my-8 max-w-7xl mx-auto">
            <h1 class="text-2xl text-center text-gray-500 uppercase font-bold">{{ __('plan list') }}</h1>
            <div class="flex items-center justify-end mb-3">
                <a href="{{ route('plans.create') }}"
                    class="px-3 py-2 bg-green-500 text-white rounded-lg hover:bg-green-400">
                    <i class="fa-sharp fa-solid fa-list-check"></i>
                    {{ __('add plan') }}
                </a>
            </div>
            <table id="plan" class="">
                <thead>
                    <tr>
                        <th>Planes</th>
                        <th>Equipos</th>
                        <th>Recursos</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($plans as $plan)
                        <tr>
                            <td width="40%">
                                <div>
                                    <p class="text-gray-700 font-bold text-base">{{ $plan->name }}</p>
                                    <p class="text-gray-600 font-semibold text-sm">Fecha de Inicio: <strong>{{ $plan->start->format('d-m-Y') }}</strong>
                                    </p>
                                    <p class="text-gray-600 font-semibold text-sm">Hora de Inicio: <strong>{{ $plan->start_time->format('h:i A') }}</strong>
                                    </p>
                                    <p class="text-gray-600 font-semibold text-sm">Turnos laborables: <strong>{{ $plan->work_shift }} turnos</strong>
                                    </p>
                                    <p class="text-gray-600 font-semibold text-sm">Horas laborables semanales: <strong>{{ $plan->weekly_shift }} horas</strong>
                                    </p>
                                    <p class="text-gray-600 font-semibold text-sm">Horas laborables diarias: <strong>{{ $plan->daily_shift }} horas</strong>
                                    </p>
                                    <p class="text-gray-600 font-semibold text-sm">Hora de descanso: <strong>{{ $plan->rest_time->format('h:i A') }}-{{ $plan->rest_time->addhours($plan->rest_hours)->format('h:i A') }}</strong>
                                     Total horas :
                                     <strong>{{ $plan->rest_hours }} horas</strong>
                                    </p>
                                    <p class="text-gray-600 font-semibold text-sm">trabajo en feriado: <strong>{{ $plan->work_holiday? 'si':'no' }}</strong>
                                       </p>
                                       <p class="text-gray-600 font-semibold text-sm">Trabajo de sobretiempo: <strong>{{ $plan->work_overtime? 'si':'no' }}</strong>
                                       </p>
                                </div>
                            </td>
                            <td width="20%">
                                <p class="text-gray-600 font-semibold text-sm">Equipos:
                                    <strong>{{$plan->equipments->count()}}</strong> 
                                </p>
                                @foreach ($plan->equipments as $e )
                                <p class="text-gray-600 font-semibold text-xs">{{
                                 $e->location().' : '.$e->name }}</p>
                           @endforeach 
                            </td>

                            <td width="25%">
                                <p class="text-gray-600 font-semibold text-sm">Equipos: 
                            </td>


                            <td class="grid grid-cols-3 gap-4 items-center justify-between">
                                <a href="{{ route('plans.show', $plan->id) }}"
                                    title="{{ __('Agregar equipo al plan ') . $plan->task }}"><i
                                        class="icono text-blue-500 fa-solid fa-eye"></i></a>
                                <a href="{{ route('plans.edit', $plan->id) }}"
                                    title="{{ __('edit plan ') . $plan->task }}"><i
                                        class="icono text-green-500 fa-solid fa-pen-to-square"></i></a>

                                <form action="{{ route('plans.destroy', $plan->id) }}" method="POST"
                                    class="form-delete">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"><i
                                            class="icono text-red-500 fa-solid fa-trash-can"></i></button>
                                </form>
                                <a href="{{ route('plans.protocols', $plan->id) }}"
                                    title="{{ __('Protocolos de plan ') . $plan->task }}"><i
                                        class="icono text-green-500 fa fa-file-invoice"></i></a>

                                        <a href="{{ route('plans.resources', $plan->id) }}"
                                            title="{{ __('recursos de plan ') . $plan->task }}">
                                            <i class="icono text-blue-500 fa-solid fa-dumpster"></i>
                                            </a>
                                     </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


    @push('script')
        <script>
            $(document).ready(function() {
                $('#plan').DataTable({
                    "pagingType": "full_numbers",
                    "language": {
                        "info": "Mostrando pag  _PAGE_ de _PAGES_  páginas,  Total de Registros: _TOTAL_ ",
                        "search": "Buscar  ",
                        "paginate": {
                            "next": "Siguiente",
                            "previous": "Anterior",
                            "last": "Último",
                            "first": "Primero",
                        },
                        "lengthMenu": "Mostrar  <select class='custom-select custom-select-sm'>" +
                            "<option value='5'>5</option>" +
                            "<option value='10'>10</option>" +
                            "<option value='15'>15</option>" +
                            "<option value='20'>20</option>" +
                            "<option value='25'>25</option>" +
                            "<option value='50'>50</option>" +
                            "<option value='100'>100</option>" +
                            "<option value='-1'>Todos</option>" +
                            "</select> Registros",
                        "loadingRecord": "Cargando....",
                        "processing": "Procesando...",
                        "emptyTable": "No hay Registros",
                        "zeroRecords": "No hay coincidencias",
                        "infoEmpty": "",
                        "infoFiltered": ""
                    },
                    "columnDefs": [{
                        "targets": [2],
                        "orderable": false
                    }]
                });
            });

            $('.form-delete').submit(function(e) {
                e.preventDefault();

                Swal.fire({
                    title: 'Está seguro de querer eliminar plan?',
                    text: "Esta operación es irreversible",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, Eliminar!'
                }).then((result) => {
                    if (result.isConfirmed) {

                        this.submit();
                        // Swal.fire(
                        //   'Deleted!',
                        //   'Your file has been deleted.',
                        //   'success'
                        // )
                    }
                })


            })
        </script>
    @endpush
</x-app-layout>