<?php

namespace App\View\Components;

use Illuminate\View\Component;

class InputText extends Component
{
    public $placeholder;

    public function __construct($placeholder = 'Escribe aquí')
    {
        $this->placeholder = $placeholder;
    }

    public function render()
    {
        return view('components.input-text');
    }
}
