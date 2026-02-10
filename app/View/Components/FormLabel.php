<?php

namespace App\View\Components;

use Illuminate\Support\Str;
use Illuminate\View\Component;

class FormLabel extends Component
{
    public string $for;

    public function __construct(string $for = '')
    {
        $this->for = $for;
    }

    public function render()
    {
        return view('components.form-label');
    }

    public function fallback(): string
    {
        return Str::ucfirst(str_replace('_', ' ', $this->for));
    }
}
