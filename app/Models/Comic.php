<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Comic extends Model
{
    protected $fillable = ['title', 'author', 'type_id', 'image', 'description'];

    protected $appends = ['short_title'];

    /**
     * Get the short version of the title.
     */
    protected function shortTitle(): Attribute
    {
        return Attribute::make(
            get: function () {
                if (strlen($this->title) <= 30) {
                    return $this->title;
                }
                return substr($this->title, 0, 27) . '...';
            }
        );
    }

    public function type(): BelongsTo
    {
        return $this->belongsTo(Type::class);
    }

    public function genres(): BelongsToMany
    {
        return $this->belongsToMany(Genre::class, 'comic_genre', 'comic_id', 'genre_id');
    }

    public function chapters(): HasMany
    {
        return $this->hasMany(Chapter::class);
    }
}
