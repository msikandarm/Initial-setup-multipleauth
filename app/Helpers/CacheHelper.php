<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Cache;

class CacheHelper
{
    public bool $remember = false;

    public ?string $locale = null;

    public string $prefix;

    public function get(string $key)
    {
        $key = $this->getKey($key);

        return Cache::get($key);
    }

    public function put(string $key, $value, int $seconds = 3600)
    {
        $key = $this->getKey($key);
        $value = ['data' => $value];

        $this->forget($key);

        if ($this->remember) {
            Cache::forever($key, $value);

            return;
        }

        Cache::put($key, $value, $seconds);
    }

    public function forget(string $key)
    {
        $key = $this->getKey($key);

        Cache::forget($key);
    }

    public function remember(): CacheHelper
    {
        $this->remember = true;

        return $this;
    }

    public function locale(string $locale): CacheHelper
    {
        $this->locale = "{$locale}_";

        return $this;
    }

    public function prefix(string $prefix): CacheHelper
    {
        $this->prefix = "{$prefix}_";

        return $this;
    }

    private function getKey(string $key): string
    {
        return $this->locale.$key;
    }
}
