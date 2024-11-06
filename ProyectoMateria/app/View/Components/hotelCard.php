<?php

namespace App\View\Components;

use Illuminate\View\Component;

class HotelCard extends Component
{
    public $name;
    public $category;
    public $rooms;
    public $image;
    public $amenities;

    public function __construct($name, $category, $rooms, $image, $amenities)
    {
        $this->name = $name;
        $this->category = $category;
        $this->rooms = $rooms;
        $this->image = $image;
        $this->amenities = $amenities;
    }

    public function render()
    {
        return view('components.hotel-card');
    }
}
