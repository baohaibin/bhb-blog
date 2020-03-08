<?php

namespace App\Observers;

use League\CommonMark\CommonMarkConverter;

class ArticleObserver extends BaseObserver
{
    //
    public function saving($article)
    {

        //保存文章内容是把markdown转成html
        $converter = new CommonMarkConverter([
            'html_input' => 'strip',
            'allow_unsafe_links' => false,
        ]);
        $article->html = $converter->convertToHtml($article->markdown);
    }
}
