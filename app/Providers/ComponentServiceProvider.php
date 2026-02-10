<?php

namespace App\Providers;

use App\View\Components\FormInputs\Checkbox;
use App\View\Components\FormInputs\ColorPicker;
use App\View\Components\FormInputs\DatePicker;
use App\View\Components\FormInputs\Editor;
use App\View\Components\FormInputs\Input;
use App\View\Components\FormInputs\Password;
use App\View\Components\FormInputs\Radio;
use App\View\Components\FormInputs\Select;
use App\View\Components\FormInputs\Slug;
use App\View\Components\FormInputs\Textarea;
use App\View\Components\Layouts\Section;
use App\View\Components\Status\Status;
use App\View\Components\Status\Switcher;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class ComponentServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Blade::component('input', Input::class);
        Blade::component('password', Password::class);
        Blade::component('textarea', Textarea::class);
        Blade::component('select', Select::class);
        Blade::component('checkbox', Checkbox::class);
        Blade::component('radio', Radio::class);
        Blade::component('editor', Editor::class);
        Blade::component('slug', Slug::class);
        Blade::component('color-picker', ColorPicker::class);
        Blade::component('date-picker', DatePicker::class);

        Blade::component('status', Status::class);
        Blade::component('status-switcher', Switcher::class);

        Blade::component('section-container', Section::class);
    }
}
