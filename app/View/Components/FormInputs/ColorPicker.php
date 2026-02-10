<?php

namespace App\View\Components\FormInputs;

use Illuminate\View\Component;

class ColorPicker extends Component
{
    public string $name;

    public string $id;

    public mixed $value;

    public mixed $groupClass;

    public function __construct(string $name, ?string $id = null, $value = null, ?string $groupClass = null)
    {
        $this->name = $name;
        $this->id = $id ?: $name;
        $this->value = old($this->name, $value);
        $this->groupClass = $groupClass;
    }

    public function render()
    {
        return view('components.form-inputs.color-picker');
    }
}
