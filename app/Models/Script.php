<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Script extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'image',
        'category_id',
        'price',
        'user_id',
        'source_code_path',
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }
}
