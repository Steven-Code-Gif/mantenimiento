<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow-xl sm:rounded-lg p-6 my-8 max-w-6xl mx-auto">
            <h1 class="text-2xl text-center text-gray-500 uppercase font-bold">{{ __('Lista de Fallas') }}</h1>
           
            <table id="timelines" class="">
                <thead>
                    <tr>
                        <th>Equipo</th>
                        <th>Tareas</th>
                        <th>Inicio</th>
                        <th>Fin</th>
                        <th>Detalle</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($timelines as $timeline)
                        <tr>
                            <td width="20%">
                                <p class="text-gray-400 font-bold text-sm">{{ $timeline->equipment()}}</p>
                                <p class="text-gray-400 font-bold text-xs">{{ $timeline->location()}}</p>
                            </td>

                            <td width="20%">
                                <p class="text-blue-400 font-bold text-xs">{{ $timeline->specialty() }}</p>
                                <p class="text-gray-400 font-bold text-sm">{{ $timeline->task}}</p>
                            </td>

                            <td width="12%" class="text-xs text-gray-400">
                                <p class="text-blue-400 font-bold text-xs">{{ $timeline->start->format('d-m-Y') }}</p>
                                <p class="text-blue-400 font-bold text-xs">{{ $timeline->start->format('h:i A') }}</p>
                            </td>

                            <td width="12%" class="text-xs text-gray-400">
                                <p class="text-blue-400 font-bold text-xs">{{ $timeline->end->format('d-m-Y') }}</p>
                                <p class="text-blue-400 font-bold text-xs">{{ $timeline->end->format('h:i A') }}</p>
                            </td>

                            <td width="26%" class="text-justify text-xs text-gray-400">
                               <p>{{ $timeline->detail}}</p>
                               <hr>
                               @foreach ($timeline->replacements() as $r )
                               <p>{{ $r->quantity.' : '.$r->name}}</p>
                               @endforeach
                               <hr>
                               @foreach ($timeline->supplies() as $r )
                               <p>{{ $r->quantity.' : '.$r->name}}</p>
                               @endforeach
                               <hr>
                               @foreach ($timeline->services() as $r )
                               <p>{{ $r->quantity.' : '.$r->name}}</p>
                               @endforeach
                            </td>

                            <td class="text-center flex items-center justify-between">
                                <a href="{{ route('timelines.boss',$timeline->id)}}"
                                    title="{{ __('Asignar jefe ') . $timeline->name }}"><i
                                        class="icono text-blue-600 fa-solid fa-people-group"></i></a>
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
                $('#timelines').DataTable({
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
                    title: 'Esta seguro de querer eliminar Falla?',
                    text: "Esta operacion es irreversible",
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
