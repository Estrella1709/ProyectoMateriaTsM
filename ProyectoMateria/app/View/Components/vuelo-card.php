<?php

namespace App\View\Components;

use Illuminate\View\Component;

class VueloCard extends Component
{
    public $name;
    public $origen;
    public $destiny;
    public $image;
    

    public function __construct($name, $origen, $destiny, $image)
    {
        $this->name = $name;
        $this->origen = $origen;
        $this->destiny = $destiny;
        $this->image = $image;
    }

    public function render()
    {
        return view('components.vuelo-card');
    }
}
