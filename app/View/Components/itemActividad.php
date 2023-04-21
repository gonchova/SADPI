<?php

namespace App\View\Components;

use Illuminate\View\Component;

class itemActividad extends Component
{   
    public $iditem;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($iditem = 0)
    {
        $this->iditem = $iditem;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.item-actividad');
    }
}
