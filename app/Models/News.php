<?php
// app/Models/News.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str; // Import Str facade for slug generation

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'content',
        'type',
        'image',
        'is_published',
        'published_at',
        'user_id',
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'published_at' => 'datetime',
    ];

    /**
     * Generate a slug from the title.
     */
    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = Str::slug($value);
    }

    /**
     * Get the user who created the news item.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}