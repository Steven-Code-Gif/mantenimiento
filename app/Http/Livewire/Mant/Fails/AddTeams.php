<?php

namespace App\Http\Livewire\Mant\Fails;

use App\Models\Fail;
use App\Models\Team;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class AddTeams extends Component
{
    public $fail,$search,$teams,$failTeams,$failTeamsId;

    public function mount(Fail $fail)
    {
        $this->fail=$fail;
        $this->failTeamsId=$fail->teams()->pluck('teams.id')->toarray(); 
    }

    public function addPersonal($teamId)
    {
        $this->fail->teams()->attach($teamId);
        $this->fail=Fail::find($this->fail->id);
        $this->failTeams=$this->fail->teams;
        $this->failTeamsId = DB::table('fail_team')->pluck('user_id');
    }

    public function delPersonal($teamId)
    {
        $this->fail->teams()->detach($teamId);
        $this->fail=Fail::find($this->fail->id);
        $this->failTeams=$this->fail->teams;
        $this->failTeamsId = DB::table('fail_team')->pluck('user_id');
    }

    public function render()
    {
        $this->failTeams = $this->fail->teams;
        $search = '%'.$this->search.'%';
        $this->teams = Team::where('name','like',$search)->whereNotIn('id',$this->failTeamsId)->pluck('name','id');
        return view('livewire.mant.fails.add-teams');
    }
}
