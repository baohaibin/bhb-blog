<?php

namespace App\Models;


/**
 * Class Article
 *
 * @property int $id
 * @package App\Models
 */
class Article extends Base
{
    //
    public function type()
    {
        return $this->belongsTo(Type::class);
    }
}
