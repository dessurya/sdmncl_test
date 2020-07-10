<?php

namespace App\Http\Livewire\AdminPage;

use Livewire\Component;
use App\Models\Role;
use Auth;

class Navigasi extends Component
{
    public function render()
    {
    	$roll = Role::find(auth()->guard('users')->user()->role_id);
    	$access = json_decode($roll->access,true);
    	$access = $access['menu'];
        return view('livewire.admin-page.navigasi', ['access' => $access]);
    }
}
