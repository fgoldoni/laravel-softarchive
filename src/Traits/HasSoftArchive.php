<?php

namespace Goldoni\LaravelSoftarchive\Traits;

use Goldoni\LaravelSoftarchive\Scopes\SoftArchiveScope;
use Illuminate\Database\Eloquent\Builder;

trait HasSoftArchive
{
    protected static function bootHasSoftArchive(): void
    {
        static::addGlobalScope(new SoftArchiveScope());
    }

    protected $casts = [
        'archived_at' => 'datetime',
    ];

    public function archive(): bool
    {
        return $this->update(['archived_at' => now()]);
    }

    public function restoreFromArchive(): bool
    {
        return $this->update(['archived_at' => null]);
    }

    public function isArchived(): bool
    {
        return isset($this->archived_at);
    }

    public static function withoutArchived(): Builder
    {
        return static::withoutGlobalScope(SoftArchiveScope::class);
    }
}
