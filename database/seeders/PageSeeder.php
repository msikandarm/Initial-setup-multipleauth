<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    public function run(): void
    {
        $pages = [
            ['title' => 'Home', 'slug' => 'home', 'template' => 'home'],
            ['title' => 'About Us', 'slug' => 'about-us', 'template' => 'page'],
            ['title' => 'Contact', 'slug' => 'contact', 'template' => 'contact'],
        ];

        foreach ($pages as $item) {
            $page = Page::updateOrCreate(
                ['slug' => $item['slug']],
                ['title' => $item['title'], 'is_default' => true, 'template' => $item['template']]
            );

            $page->seoSettings()->updateOrCreate(
                ['locale' => app()->getLocale()],
                ['meta_title' => $item['title']]
            );
        }
    }
}
