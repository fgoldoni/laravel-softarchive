<?php


namespace Goldoni\LaravelSoftarchive;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Schema\Blueprint;

class SoftArchiveServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $defaultArchivedColumn = config('softarchive.default_archived_column', 'archived_at');

        Blueprint::macro('softArchive', fn () => $this->timestamp($defaultArchivedColumn)->nullable()->index());

        $this->publishes([
            __DIR__ . '/../config/softarchive.php' => config_path('softarchive.php'),
        ], 'config');
    }

    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/softarchive.php', 'softarchive');
    }
}

