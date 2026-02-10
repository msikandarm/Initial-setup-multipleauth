<?php

namespace App\View\Components\Status;

use Illuminate\View\Component;

class Status extends Component
{
    public bool $status;

    public function __construct(bool $status = false)
    {
        $this->status = $status;
    }

    public function render()
    {
        return view('components.status.status');
    }
}
