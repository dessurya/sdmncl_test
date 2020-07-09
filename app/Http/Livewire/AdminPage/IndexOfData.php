<?php

namespace App\Http\Livewire\AdminPage;

use Livewire\Component;

class IndexOfData extends Component
{
	public $config;
	public function mount($config)
    {
        $this->config = $config;
    }

    public function render()
    {
        return view('livewire.admin-page.index-of-data', [
        	'config' => $this->config
        ]);
    }
}
