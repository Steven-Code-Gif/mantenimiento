<x-app-layout>
    <div class="container mx-auto p-6 my-8">
        <div class="grid grid-cols-2 gap-6">
            <div class="card">
                <div class="flexslider card-body">
                    <ul class="slides">
                        @foreach($prototype->images as $image )
                      <li data-thumb="{{ asset ($image->url)}}">
                        <img src="{{ asset ($image->url)}}" />
                      </li>
                      </li>
                      @endforeach
                    </ul>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h1 class="font-bold text-gray-500 uppercase">{{ $prototype->name}}</h1>
                    <h2 class="text-gray-500 uppercase">{{ $prototype->cha_1}}</h2>
                    <h2 class="text-gray-500 uppercase">{{ $prototype->cha_2}}</h2>
                    <h2 class="text-gray-500 uppercase">{{ $prototype->cha_3}}</h2>
                    <h2 class="text-gray-500 uppercase">{{ $prototype->cha_4}}</h2>
                    <p class="text-gray-500 italic">{{ $prototype->description}}</p>
                </div>
                 <div class="grid grid-cols-2">
                    <div>
                        <div x-data="{ open: false }">
                            <button x-on:click="open = ! open" class="w-full text-center
                            text-gray-500 text-xl">{{ __('protocols')}}</button>
                         
                            <div x-show="open" class="bg-white p-3">
                                <ul class="w-full rounded">
                                    @foreach ($prototype->protocols as $protocol)
                                    <li class="text-xs text-gray-400">{{ $protocol->task}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </div>
    @push('script')
    <script>
$(window).ready(function() {
  $('.flexslider').flexslider({
    animation: "slide",
    controlNav: "thumbnails"
  });
});
    </script>
    @endpush
</x-app-layout>    