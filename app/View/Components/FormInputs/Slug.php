<?php

namespace App\View\Components\FormInputs;

use Illuminate\View\Component;

class Slug extends Component
{
    public string $name;

    public string $id;

    public string $value;

    public ?string $prefix;

    public function __construct(string $name, ?string $id = null, ?string $value = null, ?string $prefix = null)
    {
        $this->name = $name;
        $this->id = $id ?: $name;
        $this->value = old($this->name, $value);
        $this->prefix = $prefix;
    }

    public function render()
    {
        return view('components.form-inputs.slug');
    }
}
