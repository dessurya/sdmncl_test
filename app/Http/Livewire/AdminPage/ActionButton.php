<?php

namespace App\Http\Livewire\AdminPage;

use Livewire\Component;

class ActionButton extends Component
{
	public $button;
	public function mount($button)
    {
        $this->button = $button;
    }
    public function render()
    {
        return view('livewire.admin-page.action-button', ['button'=>$this->button]);
    }
}
