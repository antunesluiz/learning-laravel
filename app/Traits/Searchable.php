<?php

namespace App\Traits;

use Exception;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Support\Str;


Trait Searchable {
    /**
     * Scope model by search
     */
    public function scopeSearch(Builder $builder, String $term = '') 
    {
        if (!$this->searchable) {
            throw new Exception("Please define the searchable property.");
        }
        
        if (empty($this->searchable)) {
            throw new Exception("Please define the attributes that are searchable.");
        } 
        
        foreach ($this->searchable as $searchable) {
            if (str_contains($searchable, '.')) {
                $relation = Str::beforeLast($searchable, '.');
                $column = Str::afterLast($searchable, '.');

                $builder->orWhereRelation($relation, $column, 'like', "%$term%");

                continue;
            }

            $builder->orWhere($searchable, 'like', "%$term%");
        }

        return $builder;
    }
}