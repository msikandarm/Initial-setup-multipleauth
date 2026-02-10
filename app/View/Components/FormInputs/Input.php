<?php

namespace App\View\Components\FormInputs;

use Illuminate\View\Component;

class Input extends Component
{
    public string $type;

    public string $name;

    public string $id;

    public mixed $value;

    public mixed $groupClass;

    public function __construct(string $name, string $type = 'text', ?string $id = null, ?string $value = null, ?string $groupClass = null)
    {
        $this->type = $type;
        $this->name = $name;
        $this->id = $id ?: $name;
        $this->value = old($name, $value);
        $this->groupClass = $groupClass;
    }

    public function render()
    {
        return view('components.form-inputs.input');
    }
}
