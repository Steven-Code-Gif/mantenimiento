<x-app-layout>
    <div class="container my-4">
        <form action="{{ route('prototypes.update',$prototype->id) }}" method="POST"
            class="max-w-2xl
         mx-auto rounded-lg shadow-lg" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title"> {{ __($title) }} </h1>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3 p-3">
                        <div class="mb-4">
                            <x-jet-label class="italic my-2 capitalize" value="{{ __('imagen') }}" for="name" />
                            <input type="file" name="url" id="fichero" class="text-center text-xs">
                            <img id="img" class="w-full object-cover">
                            <p id="texto" class="text-xs text-center text-red-500"></p>
                        </div>
                        <div class="mb-4">
                            <x-jet-label class="italic my-2 capitalize font-bold" value="{{ __('Nombre del Prototipo') }}"
                                for="name" />
                            <x-jet-input type="text" name="name" class="w-full "
                                placeholder="{{ __('input name') }}"
                                value="{{ old('name', $prototype->name) }}" />
                            <x-jet-input-error for="name" />
                            <x-jet-label class="italic my-2 capitalize font-bold" value="{{ __('Caracteristicas') }}"
                                for="name" />
                            <x-jet-input type="text" name="cha_1" class="w-full mb-1"
                                placeholder="{{ __('input feature') }}"
                                value="{{ old('cha_1', $prototype->cha_1) }}" />
                            <x-jet-input type="text" name="cha_2" class="w-full mb-1"
                                placeholder="{{ __('input feature') }}"
                                value="{{ old('cha_2', $prototype->cha_2) }}" />
                            <x-jet-input type="text" name="cha_3" class="w-full mb-1"
                                placeholder="{{ __('input feature') }}"
                                value="{{ old('cha_3', $prototype->cha_3) }}" />
                            <x-jet-input type="text" name="cha_4" class="w-full mb-1"
                                placeholder="{{ __('input feature') }}"
                                value="{{ old('cha_4', $prototype->cha_4) }}" />
                            <x-jet-label class="italic capitalize font-bold"
                                value="{{ __('descripci??n del Prototipo') }}" for="name" />
                            <textarea class="w-full mt-2 rounded-lg" name="description"></textarea>
                        </div>
                        <div class="mb-4">
                            <a type="button" href="{{ route('prototypes.index') }}"
                                class="bg-yellow-500 text-white hover:bg-yellow-400 focus:ring-4 focus-ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                {{ __('cancel') }}
                            </a>
                            <button type="submit"
                                class="bg-blue-700 text-white hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                {{ __('submit') }}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    @push('script')
        <script>
            $(document).ready(function() {
                var extensionesValidas = ".png, .gif, .jpeg, .jpg";
                var pesoPermitido = 2048;
                // Cuando cambie #fichero
                $("#fichero").change(function() {
                    $('#texto').text('');
                    $('#img').attr('src', '');

                    if (validarExtension(this)) {
                        if (validarPeso(this)) {
                            verImagen(this);
                        }
                    }
                });

                // Validacion de extensiones permitidas
                function validarExtension(datos) {
                    var ruta = datos.value;
                    var extension = ruta.substring(ruta.lastIndexOf('.') + 1).toLowerCase();
                    var extensionValida = extensionesValidas.indexOf(extension);
                    if (extensionValida < 0) {
                        $('#texto').text('La extensi??n no es v??lida Su fichero tiene de extensi??n: .' + extension);
                        return false;
                    } else {
                        return true;
                    }
                }
                // Validacion de peso del fichero en kbs
                function validarPeso(datos) {
                    if (datos.files && datos.files[0]) {

                        var pesoFichero = datos.files[0].size / 1024;

                        if (pesoFichero > pesoPermitido) {
                            $('#texto').text('El peso maximo permitido del fichero es: ' + pesoPermitido +
                                ' KBs Su fichero tiene: ' + pesoFichero + ' KBs');
                            return false;
                        } else {
                            return true;
                        }
                    }
                }
                // Vista preliminar de la imagen.
                function verImagen(datos) {

                    if (datos.files && datos.files[0]) {

                        var reader = new FileReader();
                        reader.onload = function(e) {
                            $('#img').attr('src', e.target.result);
                        };
                        reader.readAsDataURL(datos.files[0]);
                    }
                }
            });
        </script>
    @endpush
</x-app-layout>
