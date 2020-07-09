<?php

namespace App\Http\Livewire\AdminPage;

use Livewire\Component;
use App\Models\Role;

class Navigasi extends Component
{
    public function render()
    {
    	$roll = Role::find(1);
    	$access = json_decode($roll->access,true);
    	$access = $access['menu'];
        return view('livewire.admin-page.navigasi', ['access' => $access]);
    }
}
