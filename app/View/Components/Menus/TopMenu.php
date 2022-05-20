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
            $this->menuItem('Addresses', 'addresses.index', auth()->user()->isAdmin()),
            $this->menuItem('Orders', 'orders.index', auth()->user()->isAdmin()),
            $this->menuItem('Ticket Booth', 'ticket-booth.index', true),
            $this->menuItem('Inventory', 'inventory.index', auth()->user()->isAdmin()),
            $this->menuItem('Seasons', 'seasons.index', auth()->user()->isAdmin()),
            $this->menuItem('Statistics', 'statistics.orders', auth()->user()->isAdmin()),
        ];
    }

    /**
     * @param string $name
     * @param string $route
     *
     * @return object
     */
    protected function menuItem(string $name, string $route, bool $showItem)
    {
        return (object) [
            'route' => route($route),
            'name' => $name,
            'active' => $this->isActive($route),
            'showItem' => $showItem,
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
