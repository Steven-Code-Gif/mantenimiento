<?php

namespace App\Http\Livewire\Mant\Fails;

use App\Models\Fail;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class FailImages extends Component
{
    public $fail,$image_id;

    public function mount(Fail $fail){
        $this->fail=$fail;
    }

    public function delete($imageId){
        $image = Image::find($imageId);
        $file = $image->url;
                $url= str_replace('storage','public',$file);
                Storage::delete($url);
        $image->delete();
    }

    public function render()
    {
        return view('livewire.mant.fails.fail-images');
    }
}
