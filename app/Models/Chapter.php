<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;

class Chapter extends Model
{
    use HasFactory;

    protected $fillable = [
        'comic_id',
        'title',
        'chapter_number',
        'content'
    ];

    /**
     * The "booted" method of the model.
     */
    protected static function booted(): void
    {
        static::deleting(function (Chapter $chapter) {
            // Hapus semua file gambar dari pages
            foreach ($chapter->pages as $page) {
                if (Storage::disk('public')->exists($page->image)) {
                    Storage::disk('public')->delete($page->image);
                }
            }

            // Hapus folder chapter jika ada
            $chapterPath = 'chapters/' . $chapter->comic_id . '/' . $chapter->id;
            if (Storage::disk('public')->exists($chapterPath)) {
                Storage::disk('public')->deleteDirectory($chapterPath);
            }
        });
    }

    /**
     * Get the comic that owns the chapter.
     */
    public function comic(): BelongsTo
    {
        return $this->belongsTo(Comic::class);
    }

    /**
     * Get the pages for the chapter.
     */
    public function pages(): HasMany
    {
        return $this->hasMany(Page::class)->orderBy('page_number');
    }
}
