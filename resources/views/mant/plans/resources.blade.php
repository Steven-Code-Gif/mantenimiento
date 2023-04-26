<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow-xl sm:rounded-lg p-6 my-8 max-w-7xl mx-auto">
            <h1 class="text-2xl text-center text-gray-500 uppercase font-bold">{{ __('Lista de Sistemas') }}</h1>
            <div class="flex items-center justify-end mb-3">
            </div>
            <table id="goal" class="">
            <thead>
                <tr>
                    <th>Locacion</th>
                    <th>Equipo</th>
                    <th>Tareas</th>
                    <th>Repuesto</th>
                    <th>Suministro</th>
                    <th>Servicio</th>
                    <th>Trabajadores</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ( $goals as $goal )
                <tr>
                    <td width="">{{$goal->location()}}</td>
                    <td width="">
                        <p>{{$goal->equipment()}}</p>
                        <p>{{$goal->specialty()}}</p>
                    </td>
                    <td width="">
                        <p>{{$goal->task}}</p>
                        <p>{{$goal->detail}}</p>
                    </td>
                    <td width="">{{$goal->location()}}</td>
                    <td width="">{{$goal->location()}}</td>
                    <td width="">{{$goal->location()}}</td>
                    <td width="">{{$goal->location()}}</td>
                    <td class="flex items-center justify-between">
                        <a href="" title="{{ __('agregar repuesto a meta').$goal->name }}">
                            <i class="text-blue-500 fa-solid fa-eye"></i>
                        </a>
                        <a href="{{ route('goals.replacements',$goal->id)}}" title="" ><i class="icono text-green-500 fa-solid fa-toolbox"></i></a>
                        <form action="" method="POST" class="form-delete">
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
        $('#goal').DataTable({
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
  title: 'Esta seguro de querer eliminar Sistema?',
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