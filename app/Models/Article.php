<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class Article extends Model
{
    use Translatable;
    use HasFactory;
    public $translatable = ['cover_name', 'cover_content', 'content'];

    public function article_category()
    {
        return $this->belongsTo(ArticleCategory::class);
    }
    public function article_videos()
    {
        return $this->hasMany(ArticleVideo::class);
    }
}
