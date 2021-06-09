<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id', 'name_vi', 'name_en', 'slug_vi', 'slug_en', 'description_vi', 'description_en', 'content_vi',
        'content_en', 'image_vi', 'image_en', 'status_vi', 'status_en', 'type'
    ];
    public function getImageAttribute()
    {
        return !empty($this->attributes['image_vi']) ? Storage::url($this->attributes['image_vi']) : Storage::url('image/no-image.png');
    }
    public function getPostPaginate($type) {
        return $this->where('type', $type)->paginate(20);
    }
}