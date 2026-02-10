<?php

use App\Helpers\CacheHelper;
use App\Helpers\ResponseHelper;
use App\Models\Category;
use App\Models\Country;
use App\Models\Role;

if (! function_exists('phone_format')) {
    function phone_format(?string $number = null)
    {
        $number = str_replace(' ', '', $number);
        $number = str_replace('(', '', $number);
        $number = str_replace(')', '', $number);
        $number = str_replace('-', '', $number);
        $number = str_replace('.', '', $number);

        return $number;
    }
}

if (! function_exists('ps_cache')) {
    function ps_cache(): CacheHelper
    {
        return app('ps_cache');
    }
}

if (! function_exists('ps_response')) {
    function ps_response(): ResponseHelper
    {
        return app('ps_response');
    }
}

if (! function_exists('user_roles')) {
    function user_roles()
    {
        $cache = ps_cache()->get('user_roles');

        if ($cache) {
            return $cache['data'];
        }

        $roles = Role::whereGuardName('web')->orderBy('name')->get();

        ps_cache()->remember()->put('user_roles', $roles);

        return $roles;
    }
}

if (! function_exists('countries')) {
    function countries()
    {
        $cache = ps_cache()->get('countries');

        if ($cache) {
            return $cache['data'];
        }

        $countries = Country::orderBy('name', 'asc')->get();

        ps_cache()->put('countries', $countries);

        return $countries;
    }
}

if (! function_exists('categories')) {
    function categories()
    {
        $categories = Category::get();

        return $categories;
    }
}

if (! function_exists('request_is_for_admin')) {
    function request_is_for_admin($request)
    {
        $host = $request->getHost();
        $requestUri = $request->getRequestUri();
        $requestUri = $host.$requestUri;

        return Str::contains($requestUri, $host.'/admin');
    }
}
