<?php

namespace App\View\Components\FormInputs;

use Illuminate\View\Component;

class Radio extends Component
{
    public string $name;

    public string $id;

    public mixed $value;

    public bool $checked;

    public string $label;

    public mixed $checkedvalue = null;

    public function __construct(string $name, $value, ?string $id = null, ?string $label = null, bool $checked = false, $checkedvalue = null)
    {
        $this->name = $name;
        $this->id = $id ?: $name;
        $this->value = $value;
        $this->label = $label;
        $this->checked = $checked;

        if (old($name, $checkedvalue) == $value) {
            $this->checked = true;
        }
    }

    public function render()
    {
        return view('components.form-inputs.radio');
    }
}
