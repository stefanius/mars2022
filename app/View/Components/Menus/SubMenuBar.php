<?php

namespace App\View\Components\Menus;

use Illuminate\View\Component;

class SubMenuBar extends Component
{
    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('components.menus.sub-menu-bar');
    }
}
