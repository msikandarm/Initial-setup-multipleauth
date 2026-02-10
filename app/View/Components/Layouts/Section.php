<?php

namespace App\View\Components\Layouts;

use Illuminate\View\Component;

class Section extends Component
{
    public string $column;

    public function __construct(?string $column = null)
    {
        $this->column = $column ?? 'col-lg-12';
    }

    public function render()
    {
        return view('components.layouts.section');
    }
}
