<?php

namespace App\Http\Livewire\Mant\Fails;

use App\Models\Fail;
use App\Models\Replacement;
use Livewire\Component;

class FailReplacement extends Component
{
    public $fail, $failReplacements, $replacements ,$replacement;
    public $replacementId, $quantity;

    protected $rules=[
        'replacementId'=>'required',
        'quantity'=>'required|numeric|regex:/^[\d]{0,11}(\.[\d]{1,2})?$/',
    ];
    
    public function mount(Fail $fail){
        $this->fail=$fail;
        $this->failReplacements = $fail->replacements;
    }

    public function saveReplacement(){
       $this->validate();
       $this->replacement = Replacement::find($this->replacementId);
       $price=$this->replacement->price;
       $total=$this->replacement->price * $this->quantity;
       $quantity = $this->quantity;
       $this->replacement->fails()->attach($this->fail->id,[
        'price'=>$price,
        'quantity'=>$quantity,
        'total'=>$total
       ]);

       $this->reset('quantity','replacementId');
       $this->failReplacements = $this->fail->replacements;

       $this->dispatchBrowserEvent('swal',[
        'title'=>'Accion ejecutada',
        'timer'=>1000,
        'icon'=>'success',
        'toast'=>true,
        'position'=>'top-right'
       ]);

       $this->emitTo('mant.fails.fail-replacement-list','replacementadded');
    }

    public function render()
    {
        $this->replacements = Replacement::orderBy('name')->get();
        return view('livewire.mant.fails.fail-replacement');
    }
}
