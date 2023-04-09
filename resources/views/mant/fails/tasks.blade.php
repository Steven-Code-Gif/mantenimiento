<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow-xl sm:rounded-lg p-6 my-8 max-w-3xl mx-auto">
            <h1 class="text-2xl text-center text-gray-500 uppercase font-bold">{{ __('Lista de Tareas') }}</h1>
            <table id="fails" class="">
                <thead>
                    <tr>
                        <th>Equipo</th>
                        <th>Reportado</th>
                        <th>Asignado</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($fails as $fail)
                        <tr>
                            <td width="">
                                <p class="text-gray-400 font-bold text-sm">{{ $fail->equipment->name }}</p>
                                <p class="text-gray-400 font-bold text-sm">{{ $fail->equipment->location() }}</p>
                            </td>
                            <td width="" class="text-xs text-gray-400">
                                <p class="text-blue-400 font-bold text-xs">{{ $fail->reported_at->format('d-m-Y') }}</p>
                                <p class="text-blue-400 font-bold text-xs">{{ $fail->reported_at->diffForHumans() }}</p>
                            </td>

                            <td width="" class="text-xs text-gray-400">
                                @if ($fail->teams->count()>0)
                                <p class="text-blue-400 font-bold text-xs">{{ $fail->repareid_at->format('d-m-Y') }}</p>
                                <p class="text-blue-400 font-bold text-xs">{{ $fail->repareid_at->diffForHumans() }}</p>
                                @endif
                            </td>

                            <td class="text-center flex items-center justify-between">
                                <a href="{{ route('fails.repair', $fail->id) }}"
                                    title="{{ __('reparar falla ') . $fail->name }}"><i 
                                    class="icono text-green-600 fa-solid fa-person-digging"></i></a>
                                <a href="{{ route('fails.edit', $fail->id) }}"
                                    title="{{ __('editar falla') . $fail->name }}"><i
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
