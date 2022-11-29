<?php

namespace App\Traits;

use App\Observers\HasUuidObserver;
use Illuminate\Database\Eloquent\Builder;

trait HasUuid
{
    protected static function bootHasUuid()
    {
        static::observe(HasUuidObserver::class);
    }
}