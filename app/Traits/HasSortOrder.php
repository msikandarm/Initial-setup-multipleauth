<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

trait HasSortOrder
{
    public static function bootHasSortOrder()
    {
        static::creating(function (Model $model) {
            $model->sort_order = $model->getNextSortOrder();
        });

        static::deleting(function (Model $model) {
            $model->decrementSortOrder();
        });
    }

    private function getNextSortOrder(): int
    {
        $sort_order = static::max('sort_order');

        if (! $sort_order) {
            return 1;
        }

        return $sort_order + 1;
    }

    private function decrementSortOrder()
    {
        static::query()
            ->where('sort_order', '>', $this->sort_order)
            ->decrement('sort_order');
    }

    public function scopeSort(Builder $query, string $order = 'asc')
    {
        return $query->orderBy('sort_order', $order);
    }
}
