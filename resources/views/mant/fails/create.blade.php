<x-app-layout>
    <div class="container mx-auto py-6 my-8">
        <form action="{{ route('fails.store') }}" method="POST" class="card max-w-xl mx-auto">
            @csrf
            @method('post')
            <div class="card max-w-xl">
                <div class="card-body">
                    <img src="{{ asset('form/form2.jpg') }}" alt="agregar sistema"
                        class="max-h-16 w-full object-cover object-center">
                    <h1
                        class="text-gray-500 font-bold text-2xl px-3 py-2 w-full bg-slate-100 font-mono text-center uppercase">
                        {{ __($title) }}</h1>

                    <div class="grid grid-cols-2 gap-2 text-xs">
                        <div class="">
                            <x-jet-label class="italic my-2 capitalize" value="{{ __('location') }}" for="zone_id" />
                            <select name="zone_id" class="w-full rounded-lg" id="select">
                                <option value="">{{ __('select zone') }}</option>
                                @foreach ($zones as $zone)
                                    <option value="{{ $zone->id }}"
                                        @if ($zone->id == old('zone_id')) selected @endif>
                                        {{ $zone->name }}</option>
                                @endforeach
                            </select>
                            <x-jet-input-error for="zone_id" />
                        </div>
                        <div class="">
                            <x-jet-label class="italic my-2 capitalize" value="{{ __('zone equipments ') }}"
                                for="name" />
                            @if (old('zone_id'))
                                <select name="equipment_id" class="select w-full rounded-lg" id="equipments">
                                    @foreach ($equipments as $equipment)
                                        <option value="{{ $equipment->id }}">{{ $equipment->name }}</option>
                                    @endforeach
                                </select>
                            @else
                                <select name="equipment_id" class="select w-full rounded-lg" id="equipments">
                                </select>
                            @endif
                            <x-jet-input-error for="equipment_id" />
                        </div>
                        <div class="mb-4">
                            <x-jet-label class="italic my-2 capitalize" value="{{ __('fail') }}" for="fail" />
                            <select name="type" class="w-full rounded-lg" id="select">
                                @foreach (FALLA as $key => $falla)
                                    <option value="{{ $falla }}">
                                        {{ $falla }}</option>
                                @endforeach
                            </select>
                            <x-jet-input-error for="type" />
                        </div>
                        <div class="my-8">
                            <a type="button" href="{{ route('teams.index') }}"
                                class="bg-yellow-500 text-white hover:bg-yellow-400 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                {{ __('cancel') }}
                            </a>

                            <button type="submit"
                                class="bg-blue-700 text-white hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                {{ __('create') }}
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
                $("#select").on("change", function(e) {
                    id = $(this).val()
                    $.get('/api/zone/' + id + '/equipments', function(data) {
                        html_select = '<option value=""></option>'
                        for (var i = 0; i < data.length; i++) {
                            html_select += '<option value="' + data[i].id + '">' + data[i].name +
                                '</option>'
                        }
                        $("#equipments").html(html_select)
                    })
                })
            })
        </script>
    @endpush
</x-app-layout>
