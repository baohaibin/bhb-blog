<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
