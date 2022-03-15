<?php

namespace App\Services;

use Cesargb\Database\Support\Morph as Base;
use Illuminate\Database\Eloquent\Relations\MorphOneOrMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Morph extends Base
{
    /**
     * Delete polymorphic relationships of the single records from Model.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @return void
     */
    public function forceDelete($model)
    {
        foreach ($this->getValidMorphRelationsFromModel($model) as $relationMorph) {
            if ($relationMorph instanceof MorphOneOrMany) {
                $relationMorph->forceDelete();
            } elseif ($relationMorph instanceof MorphToMany) {
                $relationMorph->detach();
            }
        }
    }
}
