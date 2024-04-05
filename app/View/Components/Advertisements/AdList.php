<?php

namespace App\View\Components\Advertisements;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;

class AdList extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public $advertisements
    ) {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.advertisements.ad-list');
    }
}
