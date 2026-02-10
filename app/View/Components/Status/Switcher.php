<?php

namespace App\View\Components\Status;

use Illuminate\Support\Arr;
use Illuminate\View\Component;

class Switcher extends Component
{
    public int $id;

    public string $name;

    public bool $value;

    public string $model;

    public string $url;

    public bool $disabled;

    public function __construct(int $id, string $model, string $url, string $name = 'status', bool $value = false, bool $disabled = false)
    {
        $this->id = $id;
        $this->name = $name;
        $this->value = $value;
        $this->model = $model;
        $this->url = $url;
        $this->disabled = $disabled;
    }

    public function render()
    {
        return view('components.status.switcher');
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
