<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Article extends Model
{
    use HasFactory;
    use Sluggable;


    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'description',
        'body',
        'image',
        'view_count'
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }


    public function User(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
