<?php

namespace App\Traits;

use App\Models\SeoSetting;
use Illuminate\Database\Eloquent\Model;

trait HasSeo
{
    public static function bootHasSeo()
    {
        static::deleting(function (Model $model) {
            $model->seoSettings()->delete();
        });
    }

    public function seo()
    {
        return $this->morphOne(SeoSetting::class, 'seoable')->whereLocale(app()->getLocale());
    }

    public function seoSettings()
    {
        return $this->morphMany(SeoSetting::class, 'seoable');
    }

    public function saveSeo(array $request = [])
    {
        if (empty($request)) {
            $request = request()->toArray();
        }

        if (empty($request)) {
            return;
        }

        $locale = $this->getLocale($request);
        $meta_title = $request['meta_title'];

        if (empty($meta_title)) {
            $meta_title = $request['title'];
        }

        $this->seoSettings()->updateOrCreate(
            ['locale' => $locale],
            ['meta_title' => $meta_title, 'meta_description' => $request['meta_description']]
        );

        return $this;
    }

    private function getLocale(array $request): string
    {
        if (isset($request['locale'])) {
            return $request['locale'];
        }

        return app()->getLocale();
    }
}
