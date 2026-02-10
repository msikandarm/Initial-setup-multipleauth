<?php

namespace App\Models;

use App\Events\ClearCache;
use Spatie\Permission\Models\Role as SpatieRole;

class Role extends SpatieRole
{
    protected $casts = [
        'is_primary' => 'bool',
    ];

    protected $attributes = [
        'is_primary' => false,
    ];

    protected $dispatchesEvents = [
        'saved' => ClearCache::class,
        'deleted' => ClearCache::class,
    ];
}
