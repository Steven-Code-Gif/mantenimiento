<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow-xl sm:rounded-lg p-6 my-8 max-w-6xl mx-auto">
            <h1 class="text-2xl text-center text-gray-500 uppercase font-bold">{{ __('Lista de Fallas') }}</h1>
            <div class="flex items-center justify-end mb-3">
                <a href="{{ route('fails.create') }}"
                    class="px-3 py-2 bg-green-500 text-white rounded-lg hover:bg-green-400">
                    <i class="fa-sharp fa-solid fa-address-card"></i>
                    {{ __('Agregar Falla') }}
                </a>
            </div>
            <table id="fails" class="">
                <thead>
                    <tr>
                        <th>Equipo</th>
                        <th>Reportado</th>
                        <th>Asignado</th>
                        <th>Reparado</th>
                        <th>Estado</th>
                        <th>Teams</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($fails as $fail)
                        <tr>
                            <td width="20%">
                                <p class="text-gray-400 font-bold text-sm">{{ $fail->equipment->name }}</p>
                            </td>
                            <td width="12%" class="text-xs text-gray-400">
                                <p class="text-blue-400 font-bold text-xs">{{ $fail->reported_at->format('d-m-Y') }}</p>
                                <p class="text-blue-400 font-bold text-xs">{{ $fail->reported_at->diffForHumans() }}</p>
                            </td>

                            <td width="12%" class="text-xs text-gray-400">
                                @if ($fail->teams->count()>0)
                                <p class="text-blue-400 font-bold text-xs">{{ $fail->repareid_at->format('d-m-Y') }}</p>
                                <p class="text-blue-400 font-bold text-xs">{{ $fail->repareid_at->diffForHumans() }}</p>
                                @endif
                            </td>

                            <td width="12%" class="text-xs text-gray-400">
                                @if ($fail->status==1)
                                <p class="text-blue-400 font-bold text-xs">{{ $fail->repareid_at->format('d-m-Y') }}</p>
                                <p class="text-blue-400 font-bold text-xs">{{ $fail->repareid_at->diffForHumans() }}</p>
                                @endif  
                            </td>

                            <td width="10%" class="text-xs text-gray-400">
                                <p class="text-gray-400 font-bold text-xs">
                                    @if ($fail->status == 0)
                                        Activa
                                    @else
                                        Reparada
                                    @endif
                                </p>
                            </td>

                            <td width="19%" class="text-justify text-xs text-gray-400">
                                <p class="text-gray-400 font-bold text-xs">
                                    @foreach ($fail->teams as $team )
                                    <p class="text-gray-400 font-bold text-xs">{{ $team->name }}</p>
                                    @endforeach
                                </p>
                            </td>

                            <td class="text-center flex items-center justify-between">
                                <a href="{{ route('fails.teams-add', $fail->id) }}"
                                    title="{{ __('ver detalles del ') . $fail->name }}"><i
                                        class="icono text-blue-600 fa-solid fa-people-group"></i></a>
                                <a href="{{ route('fails.edit', $fail->id) }}"
                                    title="{{ __('editar ') . $fail->name }}"><i
                                        class="icono text-green-500 fa-solid fa-pen-to-square"></i></a>
                                <form action="{{ route('fails.destroy', $fail->id) }}" method="POST"
                                    class="form-delete">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"><i
                                        class="icono text-red-500 fa-solid fa-trash-can"></i></button>
                                </form>
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
                $('#fails').DataTable({
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
                        "targets": [6],
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
