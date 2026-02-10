<?php

namespace App\View\Components\FormInputs;

use Illuminate\View\Component;

class Select extends Component
{
    public string $name;

    public string $id;

    public mixed $value;

    public array $options;

    public function __construct(string $name, ?string $id = null, $value = null, array $options = [])
    {
        $this->name = $name;
        $this->id = $id ?: $name;
        $this->value = old($this->name, $value);
        $this->options = $options;
    }

    public function render()
    {
        return view('components.form-inputs.select');
    }

    public function isSelected($key): bool
    {
        if ($this->value == $key) {
            return true;
        }

        return is_array($this->value) && in_array($key, $this->value, false);
    }
}
