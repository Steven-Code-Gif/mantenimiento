<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow-xl sm:rounded-lg p-6 my-8 max-w-2xl mx-auto">
            <h1 class="text-2xl text-center text-gray-500 uppercase font-bold">{{ __('Lista de Permisos') }}</h1>
            <div class="flex items-center justify-end mb-3">
                {{-- <a href="{{route('permission.create') }}" class="px-3 py-2 bg-green-500 text-white rounded-lg hover:bg-green-400">
                    <i class="fa-sharp fa-solid fa-address-card"></i>
                    {{__('add permission')}}
                </a> --}}
            </div>
            <table id="permission" class="">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Privilegio</th>
                </tr>
            </thead>
            <tbody>
                @foreach ( $permissions as $permission )
                <tr class="odd:bg-slate-100">
                    <td width="50%">{{$permission->name}}</td>
                    <td width="50%">{{$permission->permission}}</td>
                    {{-- <td class="flex items-center justify-between">
                        <a href="{{ route('permissions.show',$permission->id)}}" title="{{ __('view daitl of permission ').$permission->name }}" ><i class="text-blue-500 fa-solid fa-eye"></i></a>
                        <a href="{{ route('permissions.edit',$permission->id)}}" title="{{ __('edit permission ').$permission->name }}" ><i class="text-green-500 fa-solid fa-pen-to-square"></i></a>
                        <form action="{{ route('permissions.destroy',$permission->id)}}" method="POST" class="form-delete">
                        @csrf
                        @method('DELETE')
                        <button type="submit"><i class="text-red-500 fa-solid fa-trash-can"></i></button>
                        </form>
                    </td> --}}
                </tr> 
                @endforeach
            </tbody>
            </table>
        </div>
    </div>

    @push('script')
    <script>
      $(document).ready( function () {
        $('#permission').DataTable({
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
  title: 'Esta seguro de querer eliminar permission?',
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