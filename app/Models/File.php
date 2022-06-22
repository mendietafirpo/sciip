<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class File extends Model
{
    use HasFactory;

    protected $fillable = [
        'post_id',
        'item',
        'design_id',
        'filename',
    ];

    public function posts(): BelongsTo
    {
        return $this->belongsTo(Post::class, 'post_id');
    }

    public function design(): BelongsTo
    {
        return $this->belongsTo(Design::class, 'design_id');
    }
}
