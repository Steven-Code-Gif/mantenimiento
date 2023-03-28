<x-app-layout>
    <div class="container my-4">
        <form action="{{route('employes.update',$employes->id)}}" method="POST" class="max-w-2xl
         mx-auto rounded-lg shadow-lg">
            @csrf
            @method('PUT')
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title"> {{ __($title) }} </h1> 
                    <div class="grid grid-cols-2 gap-3">
                        <div class="mb-4">
                            <x-jet-label class="italic my-2 capitalize" value="{{ __('Nombre') }}"
                            for="name"/>
                            <x-jet-input type="text" name="name" class="w-full " placeholder="{{ __
                            ('input name')}}"
                            value="{{ old('name' ,$employes->name) }}"/>
                            <x-jet-input-error for="name"/> 
                        </div>
                        <div class="mb-4">
                            <x-jet-label class="italic my-2 capitalize" value="{{ __('Salario') }}"
                            for="salary"/>
                            <x-jet-input type="text" name="salary" class="w-full " placeholder="{{ __
                            ('salario')}}"
                            value="{{ old('salary' ,$employes->profile->salary) }}"/>
                            <x-jet-input-error for="salary"/> 
                        </div>
                        <input type="hidden" name="user_id" value="{{$employes->id}}">
                            <a type="button" href="{{route('employes.index')}}"
                            class="bg-yellow-500 text-white hover:bg-yellow-400 focus:ring-4 focus-ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                            {{ __('cancel')}}
                            </a>
                            <button type="submit"
                            class="bg-blue-700 text-white hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                            {{ __('submit')}}
                            </button> 
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>
