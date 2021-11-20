<?php

namespace App\Http\Livewire\Form;

use Livewire\Component;

class Checkbox extends Component
{
    public $name;

    public $label;

    public $trueValue = 1;

    public $falseValue = 0;

    public function mount()
    {
    }

    public function render()
    {
        return view('livewire.form.checkbox');
    }
}
