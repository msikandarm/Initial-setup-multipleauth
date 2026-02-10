<?php

namespace App\View\Components\FormInputs;

use Illuminate\View\Component;

class Editor extends Component
{
    public string $name;

    public string $id;

    public mixed $value;

    public function __construct(string $name, ?string $id = null, $value = null)
    {
        $this->name = $name;
        $this->id = $id ?: $name;
        $this->value = old($this->name, $value);
    }

    public function render()
    {
        return view('components.form-inputs.editor');
    }
}
