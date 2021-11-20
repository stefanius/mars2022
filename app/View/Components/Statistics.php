<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Statistics extends Component
{
    public $title;

    public $value;

    public function __construct($title, $value)
    {
        $this->title = $title;
        $this->value = $value;
    }

    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('components.statistics');
    }
}
