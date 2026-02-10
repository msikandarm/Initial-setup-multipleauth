<?php

namespace App\View\Components;

use Illuminate\View\Component;

class FormError extends Component
{
    public string $name;

    public string $tag;

    public function __construct(string $name, string $tag = 'span')
    {
        $this->name = $name;
        $this->tag = $tag;
    }

    public function render()
    {
        return view('components.form-error');
    }
}
