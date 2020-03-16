<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Base
 *
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Base onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Base withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Base withoutTrashed()
 * @mixin \Eloquent
 */
class Base extends Model
{
    //支持软删除
    use SoftDeletes;
    /**
     * $fillable 和 $guarded 只能定义其中的一个；
     * fillable 属性定义允许赋值的字段；
     * $guarded 属性是用来定义不允许复制的字段的；
     **/
    protected $guarded = [];
}
