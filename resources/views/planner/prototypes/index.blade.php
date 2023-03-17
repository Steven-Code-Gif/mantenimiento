<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow-xl sm:rounded-lg p-6 my-8 max-w-7xl mx-auto">
            <h1 class="text-2xl text-center text-gray-500 uppercase font-bold">{{ __('Lista de Prototipos') }}</h1>
            <div class="flex items-center justify-end mb-3">
                <a href="{{ route('prototypes.create') }}"
                    class="px-3 py-2 bg-green-500 text-white rounded-lg hover:bg-green-400">
                    <i class="fa-brands fa-codepen"></i>
                    {{ __('Agregar Prototipo') }}
                </a>
            </div>
            <table id="prototype" class="">
                <thead>
                    <tr>
                        <th>Imagen</th>
                        <th>Prototipo</th>
                        <th>Descripcion</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($prototypes as $prototype)
                        <tr>
                            <td width="20%" class="text-center">
                                @if ($prototype->images()->count() > 0)
                                    <img src="{{ $prototype->images()->first()->url }}" 
                                    class="w-full h-48 object-cover" alt="">
                                @else
                                    <div>
                                        <h1>Sin Imagen</h1>
                                    </div>
                                @endif
                            </td>
                            <td width="30%">
                                <h1 class="text-gray-500 font-bold uppercase">
                                    {{ $prototype->name }} </h1>
                                <p class="text-sm text-gray-400"> {{ $prototype->cha_1 }}</p>
                                <p class="text-sm text-gray-400"> {{ $prototype->cha_2 }}</p>
                                <p class="text-sm text-gray-400"> {{ $prototype->cha_3 }}</p>
                                <p class="text-sm text-gray-400"> {{ $prototype->cha_4 }}</p>
                            </td>
                            <td width="30%">{{ $prototype->description }}</td>
                            <td class="grid grid-cols-3 gap-3 items-center justify-between">
                                <a href="{{ route('prototypes.show', $prototype->id) }}"
                                    title="{{ __('view daitl of prototype ') . $prototype->name }}"><i
                                        class="icono text-blue-500 fa-solid fa-eye"></i></a>

                                <a href="{{ route('prototypes.edit', $prototype->id) }}"
                                    title="{{ __('edit prototype ') . $prototype->name }}"><i
                                        class="icono text-green-500 
                        fa-solid fa-pen-to-square"></i></a>

                                <form action="{{ route('prototypes.destroy', $prototype->id) }}" method="POST"
                                    class="form-delete">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"><i
                                        class="icono text-red-500 fa-solid fa-trash-can"></i></button>
                                </form>

                                <a href="{{ route('prototypes.protocols.create',$prototype->id) }}"
                                    title="{{ __('add protocol of prototype ') .$prototype->name }}">
                                <i class="icono fa-solid fa-screwdriver-wrench text-green-600"></i></a>
                                
                                <a href="{{ route('features-prototype',$prototype->id) }}"
                                    title="{{ __('add features of prototype ') .$prototype->name }}">
                               <i class="icono text-blue-500 fa-solid fa-file-contract"></i></a>

                                <a href="{{ route('images-prototype',$prototype->id) }}"
                                    title="{{ __('add images of prototype ') .$prototype->name }}">
                                <i class="icono text-yellow-500 fa-solid fa-camera"></i></a>
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
                $('#prototype').DataTable({
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
                        "targets": [2, 3],
                        "orderable": false
                    }]
                });
            });

            $('.form-delete').submit(function(e) {
                e.preventDefault();
                Swal.fire({
                    title: 'Esta seguro de querer eliminar Prototipo?',
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
