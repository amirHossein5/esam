<?php

namespace App\Traits;

use App\Services\Morph;
use Cesargb\Database\Support\CascadeDelete;

trait CascadeDeleteMorph
{
    use CascadeDelete;

    /**
     * Boot the trait.
     *
     * Listen for the deleted event of a model, and run
     * the delete operation for morphs configured relationship methods.
     */
    protected static function bootCascadeDeleteMorph()
    {
        static::deleting(function ($model) {
            if ($model->isForceDeleting()) {
                $morph = new Morph();

                $morph->forceDelete($model);
            }
        });
    }
}
