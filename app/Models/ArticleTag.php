<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ArticleTag
 *
 * @property int $article_id 文章id
 * @property int $tag_id 标签id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ArticleTag newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ArticleTag newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ArticleTag query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ArticleTag whereArticleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ArticleTag whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ArticleTag whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ArticleTag whereTagId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ArticleTag whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ArticleTag extends Base
{
    //
    public function addArticleTags(int $article_id, array $tag_ids)
    {
        $data = array_map(function ($tag) use ($article_id) {
            return [
                'article_id' => $article_id,
                'tag_id'     => $tag,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];
        }, $tag_ids);
        $this->insert($data);
    }
}
