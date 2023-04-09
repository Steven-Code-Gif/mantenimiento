<x-app-layout>
    <div class="container mx-auto my-6">
        <div class="card">
            <div class="card-body">
                <div class="grid grid-cols-4 gap-4">
                    <div class="col-span-1">
                        @livewire('mant.fails.fail-observation', ['fail' => $fail])
                    </div>
                    <div class="col-span-1">
                        @livewire('mant.fails.fail-replacement', ['fail' => $fail])
                    </div>
                    <div class="col-span-1">
                        @livewire('mant.fails.fail-supply', ['fail' => $fail])
                    </div>
                    <div class="col-span-1">
                        @livewire('mant.fails.fail-service', ['fail' => $fail])
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mx-auto my-1">
        <div class="card">
            <div class="card-body">
                <div class="grid grid-cols-5 gap-4">
                    <div class="col-span-3">
                        @livewire('mant.fails.fail-image', ['fail' => $fail])
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
