<?php

namespace App\Traits;

trait HasCreatorAndUpdater
{
    protected static function bootHasCreatorAndUpdater()
    {
        static::creating(function ($model) {
            $model->created_by_user = auth()->user()->id;
            $model->updated_by_user = auth()->user()->id;
        });

        static::updating(function ($model) {
            $model->updated_by_user = auth()->user()->id;
        });
    }
}
