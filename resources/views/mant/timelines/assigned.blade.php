<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow-xl sm:rounded-lg p-6 my-8 max-w-5xl mx-auto">
            <h1 class="text-2xl text-center text-gray-500 uppercase font-bold">{{ __('lista de tiempo de linea') }}</h1>

            <table id="timeline">
                <thead>
                    <tr>
                        <th class="capitalize">{{ __("equipos") }}</th>
                        <th class="capitalize">{{ __("tareas") }}</th>
                        <th class="capitalize">{{ __("inicio") }}</th>
                        <th class="capitalize">{{ __("fin") }}</th>
                        <th class="capitalize">{{ __("detalle") }}</th>
                        <th class="capitalize text-center">{{ __("action") }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($timelines as $timeline)
                        <tr class="odd:bg-slate-100">
                            <td width="20%">
                                <p class="text-gray-400 font-bold text-sm">{{ $timeline->equipment() }}</p>
                                <p class="text-gray-400 font-bold text-xs">{{ $timeline->location() }}</p>

                            </td>
                            <td width="20%">
                                <p class="text-red-400 font-bold text-xs">{{ $timeline->specialty() }}</p>
                                <p class="text-gray-400 font-bold text-sm">{{ $timeline->task }}</p>

                            </td>
                            <td width="12%" class="text-justify text-xs text-gray-400">

                                <p class="text-red-400 font-bold text-xs">{{ $timeline->start->format('d-m-Y') }}</p>
                                <p class="text-red-400 font-bold text-xs">{{ $timeline->start->format('h:i A') }}</p>
                                <p class="text-red-400 font-bold text-xs">{{ DIA[$timeline->start->dayOfWeek] }}</p>
                            </td>
                            <td width="12%" class="text-justify text-xs text-gray-400">


                                <p class="text-red-400 font-bold text-xs">{{ $timeline->end->format('d-m-Y') }}</p>
                                <p class="text-red-400 font-bold text-xs">{{ $timeline->end->format('h:i A') }}</p>
                                <p class="text-red-400 font-bold text-xs">{{ DIA[$timeline->end->dayOfWeek] }}</p>
                            </td>

                            <td width="26%" class="text-justify text-xs text-gray-400">
                                <p>{{ $timeline->detail }}</p>
                                <hr>
                                <strong>{{ __("repuestos") }}:</strong>
                                @foreach($timeline->fnReplacements() as $r)
                                <p>{{ $r->quantity.' : '.$r->name }}</p>
                                @endforeach
                                <hr>
                                <strong>{{ __("suministros") }}:</strong>
                                @foreach($timeline->fnSupplies() as $r)
                                <p>{{ $r->quantity.' : '.$r->name }}</p>
                                @endforeach
                                <hr>
                                <strong>{{ __("servicios") }}:</strong>
                                @foreach($timeline->fnServices() as $r)
                                <p>{{ $r->quantity.' : '.$r->name }}</p>
                                @endforeach

                            </td>

                            <td class="text-center">
                                <a href="{{ route('timelines.work',$timeline->id) }}" title="{{ __('
                                    trabajar en linea de tiempo') . $timeline->name }}">
                                        <i class="icono text-blue-500 fa-solid fa-screwdriver-wrench"></i>
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
                $('#timeline').DataTable({
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
                        "targets": [5],
                        "orderable": false
                    }]
                });
            });

            $('.form-delete').submit(function(e) {
                e.preventDefault();

                Swal.fire({
                    title: 'Está seguro de querer eliminar timeline?',
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