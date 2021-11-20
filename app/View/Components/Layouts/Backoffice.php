<?php

namespace App\View\Components\Layouts;

use Illuminate\View\Component;

class Backoffice extends Component
{
    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('layouts.backoffice');
    }
}
