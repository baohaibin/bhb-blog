<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Type
 *
 * @property int $id
 * @property string $name 类型名
 * @property string $keywords 关键词
 * @property string $description 描述
 * @property int $sort 排序
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Type newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Type newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Type query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Type whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Type whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Type whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Type whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Type whereKeywords($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Type whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Type whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Type whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Type extends Base
{
    //

    public function article()
    {
//        return $this->hasMany(Article::class);
    }
}
