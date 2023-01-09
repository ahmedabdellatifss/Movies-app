<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'rate',
        'image_path',
        'category_id',
        'created_at'
    ];
    
    public function category(){
        return $this->belongsTo(category::class);
    }
}
