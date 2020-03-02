<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App{
/**
 * App\User
 *
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User query()
 */
	class User extends \Eloquent {}
}

namespace App\Models{
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
 */
	class Base extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Article
 *
 * @property int $id
 * @package App\Models
 * @property string $title 标题
 * @property int $type_id 分类id
 * @property string $author 作者
 * @property string $markdown markdown文章内容
 * @property string $html html文章内容
 * @property string $description 描述
 * @property string $keywords 关键词
 * @property string $cover 封面图
 * @property int $is_top 是否置顶 0否 1是
 * @property int $click 点击数
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article whereAuthor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article whereClick($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article whereCover($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article whereHtml($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article whereIsTop($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article whereKeywords($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article whereMarkdown($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article whereTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article whereUpdatedAt($value)
 */
	class Article extends \Eloquent {}
}

