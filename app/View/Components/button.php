<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Str;
class button extends Component
{
    /**
     * Create a new component instance.
     */


    public function __construct(
        public string $color,
        public string $value,
    ) {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.button');
    }
    // public function shouldRender(): bool
    // {
    //     return Str::length($this->value) > 5;
    // }
}
