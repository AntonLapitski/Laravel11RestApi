<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reply extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'content', 'review_id'];

//    protected $hidden = ['created_at', 'updated_at'];

    public function review(): BelongsTo
    {
        return $this->belongsTo(Review::class);
    }

}
