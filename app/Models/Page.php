<?php

namespace App\Models;

use App\Traits\HasSeo;
use App\Traits\HasSlug;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory, HasSeo, HasSlug;

    protected $guarded = [];

    protected $casts = [
        'status' => 'bool',
        'is_default' => 'bool',
    ];

    protected $attributes = [
        'status' => true,
        'is_default' => false,
    ];
}
