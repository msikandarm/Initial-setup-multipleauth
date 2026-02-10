<?php

namespace App\View\Components;

use Illuminate\View\Component;

class FormGroup extends Component
{
    public ?string $label;

    public string $inputId;

    public function __construct(?string $label = null, string $inputId = '')
    {
        $this->label = $label;
        $this->inputId = $inputId;
    }

    public function render()
    {
        return view('components.form-group');
    }
}
