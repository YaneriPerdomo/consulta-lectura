<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class profileViewSelection extends Component
{
    /**
     * Create a new component instance.
     */

    public $selected;
    public $options = [
        'recent' => 'Recientes',
        'ratings' => 'Valoraciones',
        'favorites' => 'Favoritos'
    ];

    public function __construct($selected = 'error')
    {
        $this->selected = $selected;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {

        return view('components.profile-view-selection');
    }
}
