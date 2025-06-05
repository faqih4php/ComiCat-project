<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class Page extends Model
{
    use HasFactory;

    protected $fillable = [
        'chapter_id',
        'image',
        'page_number'
    ];

    /**
     * The "booted" method of the model.
     */
    protected static function booted(): void
    {
        static::deleting(function (Page $page) {
            // Hapus file gambar saat page dihapus
            if (Storage::disk('public')->exists($page->image)) {
                Storage::disk('public')->delete($page->image);
            }
        });
    }

    /**
     * Get the chapter that owns the page.
     */
    public function chapter(): BelongsTo
    {
        return $this->belongsTo(Chapter::class);
    }
} 