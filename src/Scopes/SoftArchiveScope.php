<?php

namespace Goldoni\LaravelSoftarchive\Scopes;

use Illuminate\Database\Eloquent\{Builder, Model, Scope};

class SoftArchiveScope implements Scope
{
    public function apply(Builder $builder, Model $model): void
    {
        $builder->whereNull('archived_at');
    }
}
