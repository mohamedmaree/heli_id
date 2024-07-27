<?php

namespace App\View\Components\Admin;

use Illuminate\View\Component;

class ImportFile extends Component
{
    public $type;

    /**
     * Create a new component instance.
     * @param $type
     */
    public $route ;

    public function __construct($route)
    {
        $this->route      = $route ;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.admin.import-file');
    }
}
