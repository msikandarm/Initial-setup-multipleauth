<?php

namespace App\View\Components\FormInputs;

use Illuminate\View\Component;

class DatePicker extends Component
{
    public string $type;

    public string $name;

    public string $id;

    public mixed $value;

    public mixed $groupClass;

    public mixed $minDate;

    public string $format;

    public function __construct(string $name, string $type = 'text', ?string $id = null, $value = null, ?string $groupClass = null, ?string $minDate = 'today', string $format = 'Y-m-d')
    {
        $this->type = $type;
        $this->name = $name;
        $this->id = $id ?: $name;
        $this->value = $value;
        $this->groupClass = $groupClass;
        $this->minDate = $minDate;
        $this->format = $format;
    }

    public function render()
    {
        return view('components.form-inputs.date-picker');
    }
}
