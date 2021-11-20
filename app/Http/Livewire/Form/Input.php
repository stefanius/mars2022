<?php

namespace App\Http\Livewire\Form;

use Livewire\Component;

class Input extends Component
{
    public $name;

    public $label;

    public function mount()
    {
    }

    public function render()
    {
        return view('livewire.form.input');
    }
}
