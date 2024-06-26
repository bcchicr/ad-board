<?php

namespace App\View\Components\Advertisements;

use App\Models\Advertisement;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Controls extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public Advertisement $advertisement
    ) {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.advertisements.controls');
    }
}
