<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HasSeo;
use App\Traits\HasSlug;
use App\Traits\FileUpload;

class Product extends Model
{
    use HasFactory, HasSeo, HasSlug, FileUpload;

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
