<?php

namespace App\View\Components\Advertisements;

use Closure;
use App\Models\Advertisement;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class ListItem extends Component
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
        return view('components.advertisements.list-item');
    }
}
