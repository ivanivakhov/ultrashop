<?php

namespace App\View\Components\Forms;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TextInput extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render(): View
    {
        return view('components.forms.text-input');
    }
}
