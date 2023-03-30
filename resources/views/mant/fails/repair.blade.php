<x-app-layout>
    <div class="container mx-auto my-6">
        <div class="card">
            <div class="card-body">
                <div class="grid grid-cols-4 gap-4">
                    <article>
                        <div class="card">
                            <div class="card-body">
                                <h1 class="text-xl font-bold text-gray-500"> Agregar Repuesto</h1>
                                <hr class="mt-2 mb-3">
                                <form action="">
                                    <textarea class="rounded w-full"></textarea>
                                </form>
                            </div>
                        </div>
                    </article>

                    <div class="col-span-1 bg-gray-400">
                        @livewire('mant.fails.fail-replacement', ['fail' => $fail])
                    </div>
                    <div class="col-span-1 bg-gray-400">
                        
                    </div>
                    <div class="col-span-1 bg-gray-400">
                       
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
