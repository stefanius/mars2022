<?php

namespace App\View\Components\Menus;

use Illuminate\Support\Str;
use Illuminate\View\Component;

class TopMenu extends Component
{
    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('components.menus.top-menu', ['items' => $this->menuItems()]);
    }

    /**
     * Menu items.
     *
     * @return array
     */
    protected function menuItems()
    {
        return [
            $this->menuItem('Addresses', 'addresses.index'),
            $this->menuItem('Orders', 'orders.index'),
            $this->menuItem('Ticket Booth', 'ticket-booth.index'),
            $this->menuItem('Inventory', 'inventory.index'),
        ];
    }

    /**
     * @param string $name
     * @param string $route
     *
     * @return object
     */
    protected function menuItem(string $name, string $route)
    {
        return (object) [
            'route' => route($route),
            'name' => $name,
            'active' => $this->isActive($route),
        ];
    }

    /**
     * @param string $route
     *
     * @return boolean
     */
    protected function isActive(string $route)
    {
        return request()->routeIs($route) || Str::startsWith(request()->url(), route($route));
    }
}
