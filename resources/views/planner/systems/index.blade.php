<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow-xl sm:rounded-lg p-6 my-8 max-w-xl mx-auto">
            <h1 class="text-2xl text-center text-gray-500 uppercase font-bold">{{ __('lista de sistemas') }}</h1>
            <div class="flex items-center justify-end mb-3 place-content-center">
                <a href="{{ route('systems.create') }}" class="flex items-center px-3 py-2 bg-green-500 text-white rounded-lg hover:bg-green-400">
                    <i class="text-white fab fa-creative-commons-sampling-plus fa-2x"></i>
                   <span class="ml-2">{{ __('agregar sistema') }}</span>
                </a>
            </div>
            <table id="system" class="">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($systems as $system)
                        <tr class="odd:bg-slate-100">
                            <td width="80%">{{ $system->name }}</td>
                            <td class="flex items-center justify-between">
                                <a href="{{ route('systems.edit',$system->id) }}" title="{{ __('editar sistema').$system->name }}"><i class="icono text-green-500 fa-solid fa-pen-to-square"></i></a>
                                <form action="{{ route('systems.destroy',$system->id) }}" method="POST" class="form-delete">
                                @csrf
                                @method('DELETE')
                                <button type="submit"><i class="icono text-red-500 fa-solid fa-trash-can"></i></button>
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
           $(document).ready( function () {
        $('#system').DataTable({
            "pagingType":"full_numbers",
           "language":{
             "info": "Mostrando pag  _PAGE_ de _PAGES_  páginas,  Total de Registros: _TOTAL_ ",
               "search":"Buscar  ",
               "paginate":{
                   "next":"Siguiente",
                   "previous":"Anterior",
                   "last":"Último",
                   "first":"Primero",
               },
               "lengthMenu":"Mostrar  <select class='custom-select custom-select-sm'>"+
                             "<option value='5'>5</option>"+
                             "<option value='10'>10</option>"+
                             "<option value='15'>15</option>"+
                             "<option value='20'>20</option>"+
                             "<option value='25'>25</option>"+
                             "<option value='50'>50</option>"+
                             "<option value='100'>100</option>"+
                             "<option value='-1'>Todos</option>"+
                             "</select> Registros",
               "loadingRecord":"Cargando....",
               "processing":"Procesando...",
               "emptyTable":"No hay Registros",
               "zeroRecords":"No hay coincidencias",
               "infoEmpty":"",
               "infoFiltered":""
           },
           "columnDefs": [{ "targets": [1], "orderable": false }]
        });
    } );

            $('.form-delete').submit(function(e){
                e.preventDefault();

                Swal.fire({
  title: 'Está seguro de querer eliminar system?',
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