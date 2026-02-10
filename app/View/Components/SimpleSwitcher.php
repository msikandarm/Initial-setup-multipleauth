<?php

namespace App\View\Components;

use Illuminate\Support\Arr;
use Illuminate\View\Component;

class SimpleSwitcher extends Component
{
    public string $name;

    public ?string $value;

    public string $type;

    public bool $pills;

    public string $checked;

    public string $unchecked;

    public function __construct(string $name, ?string $value = null, string $type = 'success', bool $pills = false, string $checked = '✓', string $unchecked = '✕')
    {
        $this->name = $name;
        $this->value = old($this->name, $value);
        $this->type = $type;
        $this->pills = $pills;
        $this->checked = $checked;
        $this->unchecked = $unchecked;
    }

    public function render()
    {
        return view('components.simple-switcher');
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
