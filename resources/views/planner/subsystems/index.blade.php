<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow-xl sm:rounded-lg p-6 my-8 max-w-3xl mx-auto">
            <h1 class="text-2xl text-center text-gray-500 uppercase font-bold">{{ __('Lista de Subsistemas') }}</h1>
            <div class="flex items-center justify-end mb-3">
                <a href="{{route('subsystems.create') }}" class="px-3 py-2 bg-green-500 text-white rounded-lg hover:bg-green-400">
                    <i class="fa-sharp fa-solid fa-address-card"></i>
                    {{__('Agregar Subsistema')}}
                </a>
            </div>
            <table id="system" class="">
            <thead>
                <tr>
                    <th>Sistemas</th>
                    <th>Subsistema</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ( $subsystems as $subsystem )
                <tr>
                    <td width="40%">{{$subsystem->system->name}}</td>
                    <td width="40%">{{$subsystem->name}}</td>
                    <td class="flex items-center justify-between">
                        {{-- <a href="{{ route('subsystems.show',$system->id)}}" title="{{ __('view daitl of system ').$system->name }}" ><i class="text-blue-500 fa-solid fa-eye"></i></a> --}}
                        <a href="{{ route('subsystems.edit',$subsystem->id)}}" title="{{ __('Editar Sistema').$subsystem->name }}" ><i class="text-green-500 fa-solid fa-pen-to-square"></i></a>
                        <form action="{{ route('subsystems.destroy',$subsystem->id)}}" method="POST" class="form-delete">
                        @csrf
                        @method('DELETE')
                        <button type="submit"><i class="text-red-500 fa-solid fa-trash-can"></i></button>
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
             "info": "Mostrando pag  _PAGE_ de _PAGES_  p??ginas,  Total de Registros: _TOTAL_ ",
               "search":"Buscar  ",
               "paginate":{
                   "next":"Siguiente",
                   "previous":"Anterior",
                   "last":"??ltimo",
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
           "columnDefs": [{ "targets": [2], "orderable": false }]
        });
    } );

    $('.form-delete').submit(function(e){
        e.preventDefault();
        Swal.fire({
  title: 'Esta seguro de querer eliminar system?',
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