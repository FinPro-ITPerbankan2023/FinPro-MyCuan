<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\View\Component;

class InputError extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $for;

    public function __construct($for)
    {
        $this->for = $for;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\Foundation\Application|Factory|Application|View
     */
    public function render(): View
    {
        return view('components.input-error');
    }
}
