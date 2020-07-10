<?php

namespace App\Http\Livewire\AccPublic;

use Livewire\Component;
use App\Models\Page;

class Navigasi extends Component
{
    public function render()
    {
    	$page = Page::where('status','SHOW')->orderBy('id','asc')->get();
        return view('livewire.acc-public.navigasi',compact('page'));
    }
}
