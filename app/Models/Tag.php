<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Base
{
    //
    public function articles()
    {
        return $this->belongsToMany(Article::class, 'article_tags');
    }
}
