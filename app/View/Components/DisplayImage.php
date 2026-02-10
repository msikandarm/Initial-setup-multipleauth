<?php

namespace App\View\Components;

use Illuminate\View\Component;

class DisplayImage extends Component
{
    public mixed $url;

    public bool $hasMedia;

    public mixed $title;

    public function __construct(mixed $url, bool $hasMedia = true, mixed $title = null)
    {
        $this->url = $url;
        $this->hasMedia = $hasMedia;
        $this->title = $title;
    }

    public function render()
    {
        return view('components.display-image');
    }
}
