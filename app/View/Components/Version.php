<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Version extends Component
{
    protected function version()
    {
        $underDevelopment = config('backoffice.under_development', true);

        $year = config('backoffice.version.year', '0000');
        $release = config('backoffice.version.release', '0');

        if ($underDevelopment) {
            return "v{$year}.{$release}-DEV";
        }

        return "v{$year}.{$release}";
    }
    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('components.version', ['version' => $this->version()]);
    }
}
