<?php

namespace App\Http\Livewire\AccPublic;

use Livewire\Component;
use App\Models\Page;

class Footer extends Component
{
    public function render()
    {
    	$page = Page::where('status','SHOW')->orderBy('id','asc')->get();
        return view('livewire.acc-public.footer', compact('page'));
    }
}
