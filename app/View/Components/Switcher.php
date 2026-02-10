<?php

namespace App\View\Components;

use Illuminate\Support\Arr;
use Illuminate\View\Component;

class Switcher extends Component
{
    public string $name;

    public mixed $value;

    public string $type;

    public string $target;

    public bool $pills;

    public string $checked;

    public string $unchecked;

    public function __construct(string $name, string $target, ?string $value = null, string $type = 'success', bool $pills = false, string $checked = '✓', string $unchecked = '✕')
    {
        $this->name = $name;
        $this->value = $value;
        $this->type = $type;
        $this->target = $target;
        $this->pills = $pills;
        $this->checked = $checked;
        $this->unchecked = $unchecked;
    }

    public function render()
    {
        return view('components.switcher');
    }

    public function switchClasses(): string
    {
        return Arr::toCssClasses([
            'custom_switch',
            'icon_switch',
            'success_switch',
        ]);
    }
}
