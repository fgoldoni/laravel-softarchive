<?php

namespace Goldoni\LaravelSoftarchive\Tests\Feature;

use Goldoni\LaravelSoftarchive\Tests\TestCase;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

it('can archive a model', function () {
    Schema::create('test_models', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->softArchive();
        $table->timestamps();
    });

    $model = app('TestModel')::create(['name' => 'Archived Model']);
    $model->archive();

    expect($model->archived_at)->not()->toBeNull();
    expect($model->isArchived())->toBeTrue();
});
