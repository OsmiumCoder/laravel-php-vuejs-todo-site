<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;


class Todo extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

//    public function category()
//    {
//        return $this->hasOne(Category::class, 'category_id', 'category');
//    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
