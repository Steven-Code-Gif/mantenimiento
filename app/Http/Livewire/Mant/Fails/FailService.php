<?php

namespace App\Http\Livewire\Mant\Fails;

use App\Models\Fail;
use App\Models\Replacement;
use App\Models\Service;
use Livewire\Component;

class FailService extends Component
{

    public $fail, $failService, $service, $services, $replacement;
    public $serviceId, $quantity;

    protected $rules=[
        'serviceId'=>'required',
        'quantity'=>'required|numeric|regex:/^[\d]{0,11}(\.[\d]{1,2})?$/',
    ];
    
    public function mount(Fail $fail){
        $this->fail=$fail;
        $this->failService = $fail->service;
    }

    public function saveReplacement(){
       $this->validate();

       $this->service = Service::find($this->serviceId);
       $price=$this->service->price;
       $total=$this->quantity;
       $quantity = $this->quantity;
       $this->service->fails()->attach($this->fail->id,[
        'price'=>$price,
        'quantity'=>$quantity,
        'total'=>$total
       ]);

       $this->reset('quantity','serviceId');
       $this->failService = $this->fail->service;

       $this->dispatchBrowserEvent('swal',[
        'title'=>'Accion ejecutada',
        'timer'=>3000,
        'icon'=>'success',
        'toast'=>true,
        'position'=>'top-right'
       ]);
    }
    public function render()
    {
        $this->services = Service::orderBy('name')->get();
        return view('livewire.mant.fails.fail-service');
    }
}
