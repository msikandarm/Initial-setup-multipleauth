<?php

namespace App\View\Components\FormInputs;

use Illuminate\View\Component;

class Checkbox extends Component
{
    public string $name;

    public string $id;

    public mixed $value;

    public bool $checked;

    public mixed $label;

    public mixed $checkedvalue = null;

    public function __construct(string $name, ?string $id = null, string $value = 'yes', bool $checked = false, mixed $label = null, $checkedvalue = null)
    {
        $this->name = $name;
        $this->id = $id ?: $name;
        $this->value = $value;
        $this->checked = $checked;
        $this->label = $label;

        if (old($name, $checkedvalue) == $value) {
            $this->checked = true;
        }
    }

    public function render()
    {
        return view('components.form-inputs.checkbox');
    }
}
