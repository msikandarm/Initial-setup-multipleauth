<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Str;

trait HasSlug
{
    public function slugField(): string
    {
        return 'slug';
    }

    public function generateSlug(?string $title = null)
    {
        if (! $title) {
            $title = $this->title;
        }

        $slugField = $this->slugField();

        $this->$slugField = $this->createSlugFromString($title);

        $this->save();

        return $this;
    }

    public function updateSlug(?string $slug = null)
    {
        if (! $slug) {
            $slug = $this->slug;
        }

        $slugField = $this->slugField();

        $this->$slugField = $this->createSlugFromString($slug);

        $this->save();

        return $this;
    }

    private function createSlugFromString(string $value)
    {
        $slug = Str::slug($value, '-');

        $length = Str::length($slug);

        if ($length > 145) {
            $slug = Str::substr($slug, 0, 145);
        }

        return $this->makeItUnique($slug);
    }

    private function makeItUnique(string $slug): string
    {
        $allSlugs = $this->otherRecordExistsWithSlug($slug);

        if (! $allSlugs->contains($this->slugField(), $slug)) {
            return $slug;
        }

        for ($i = 2; $i <= 20; $i++) {
            $newSlug = $slug.'-'.$i;

            if (! $allSlugs->contains($this->slugField(), $newSlug)) {
                return $newSlug;
            }
        }
    }

    private function otherRecordExistsWithSlug(string $slug): Collection
    {
        return static::query()
            ->select($this->slugField())
            ->where($this->slugField(), 'like', $slug.'%')
            ->where('id', '!=', $this->id)
            ->get();
    }
}
