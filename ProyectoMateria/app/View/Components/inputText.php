<?php

namespace App\View\Components;

use Illuminate\View\Component;

class inputText extends Component
{
    public $placeholder;
    public $nombre;

    public function __construct($placeholder = 'Escribe aquí', $nombre="nadota")
    {
        $this->placeholder = $placeholder;
        $this->nombre=$nombre;
    }

    public function render()
    {
        return view('components.input-text');
    }
}
