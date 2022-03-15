<?php

namespace App\View\Components;

use Illuminate\View\Component;

class MenuItem extends Component
{
    public $link, $class, $name, $count ;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $link="#", $class="feather-list",  $count="")
    {
        $this->link = $link ;
        $this->class = $class ;
        $this->name = $name ;
        $this->count = $count ;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.menu-item');
    }
}
