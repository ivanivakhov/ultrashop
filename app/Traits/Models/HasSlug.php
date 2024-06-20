<?php

declare(strict_types=1);

namespace App\Traits\Models;

use Illuminate\Database\Eloquent\Model;

trait HasSlug
{
    protected static function bootHasSlug(): void
    {
        static::creating(function (Model $model) {
            $model->slug = $model->slug ?? str($model->{self::slugFrom()})
                ->append(time()) //TODO check if slug exists and iterate suffix
                ->slug();
        });
    }

    public static function slugFrom(): string
    {
        return 'title';
    }
}
