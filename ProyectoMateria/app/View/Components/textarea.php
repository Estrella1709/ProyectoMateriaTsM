<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class textarea extends Component
{
    
    public $placeholder;

    public $nombre;

    public function __construct($placeholder = 'Escribe aquí', $nombre="mada")
    {
        $this->placeholder = $placeholder;
        $this->nombre=$nombre;
    }

    public function render()
    {
        return view('components.textarea');
    }

}
