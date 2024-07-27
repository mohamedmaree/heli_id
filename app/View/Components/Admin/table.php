<?php

namespace App\View\Components\Admin;

use Illuminate\View\Component;

class table extends Component
{
    public $addbutton ; 
    public $deletebutton ; 
    public $extrabuttons ; 
    public $datefilter ; 
    public $searchArray ; 
    public $order ; 
    public $pdf ; 
    public $excel ; 

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($addbutton = null , $extrabuttons = null , $deletebutton = null , $datefilter = null , $searchArray = null , $order = null, $pdf = null , $excel = null) 
    {
        $this->addbutton    = $addbutton    ;
        $this->extrabuttons = $extrabuttons ;
        $this->deletebutton = $deletebutton ;
        $this->datefilter   = $datefilter   ;
        $this->searchArray  = $searchArray  ;
        $this->order        = $order        ;
        $this->pdf          = $pdf          ;
        $this->excel        = $excel        ;
    }

    public function render()
    {
        return view('components.admin.table');
    }
}
