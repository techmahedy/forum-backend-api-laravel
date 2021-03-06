<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'category_id',
        'question_title',
        'question_slug',
        'question_body'
    ];

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function replies() : HasMany
    {
        return $this->hasMany(Reply::class);
    }

    public function category() : BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
    
}
