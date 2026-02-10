<?php

namespace App\View\Components;

use Illuminate\Database\Eloquent\Model;
use Illuminate\View\Component;

class FormSeo extends Component
{
    public $meta_title;

    public $meta_description;

    public function __construct(?Model $data = null, ?string $locale = null)
    {
        $locale = $locale ?? app()->getLocale();

        if ($data) {
            $seo_settings = $data->seoSettings;

            if ($seo_settings) {
                $seo_data = $seo_settings->where('locale', $locale)->first();

                $this->meta_title = optional($seo_data)->meta_title;
                $this->meta_description = optional($seo_data)->meta_description;
            }
        }
    }

    public function render()
    {
        return view('components.form-seo');
    }
}
