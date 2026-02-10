<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HasSeo;
use App\Traits\HasSlug;
use App\Traits\FileUpload;

class Category extends Model
{
    use HasFactory, HasSeo, HasSlug, FileUpload;

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
