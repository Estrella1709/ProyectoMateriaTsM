<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class textarea extends Component
{
    
    public $placeholder;

    public function __construct($placeholder = 'Escribe aquí')
    {
        $this->placeholder = $placeholder;
    }

    public function render()
    {
        return view('components.textarea');
    }

}
