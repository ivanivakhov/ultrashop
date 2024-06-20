<?php

declare(strict_types=1);

namespace App\Traits\Models;

use Illuminate\Database\Eloquent\Model;

trait HasSlug
{
    private static array $slugs = [];

    protected static function bootHasSlug(): void
    {
        static::creating(function (Model $model) {
            $slug = str($model->{self::slugFrom()})->slug();

            if (isset(static::$slugs[$slug->value()])) {
                static::$slugs[$slug->value()]++;
            } else {
                static::$slugs[$slug->value()] = 0;
            }

            $suffix = static::$slugs[$slug->value()] === 0 ? "" : "-".static::$slugs[$slug->value()];
            $model->slug = $model->slug ?? $slug . $suffix;
        });
    }

    public static function slugFrom(): string
    {
        return 'title';
    }
}
