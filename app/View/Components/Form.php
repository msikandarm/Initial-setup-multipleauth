<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Form extends Component
{
    public string $method;

    public bool $hasFiles;

    public string $spoofMethod;

    public bool $novalidate;

    public bool $customrules;

    public string $id;

    public function __construct(string $method = 'POST', bool $hasFiles = false, bool $novalidate = false, bool $customrules = false, ?string $id = null)
    {
        $this->method = strtoupper($method);
        $this->hasFiles = $hasFiles;
        $this->spoofMethod = in_array($this->method, ['PUT', 'PATCH', 'DELETE'], true);
        $this->novalidate = $novalidate;
        $this->customrules = $customrules;
        $this->id = $id ?? 'section_form';
    }

    public function render()
    {
        return view('components.form');
    }
}
