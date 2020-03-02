<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->default('')->comment('标题');
            $table->boolean('type_id')->default(0)->comment('分类id');
            $table->string('author')->default(0)->comment('作者');
            $table->mediumText('markdown')->comment('markdown文章内容');
            $table->mediumText('html')->comment('html文章内容');
            $table->string('description')->default('')->comment('描述');
            $table->string('keywords')->default('')->comment('关键词');
            $table->string('cover')->default('')->comment('封面图');
            $table->boolean('is_top')->default(0)->comment('是否置顶 0否 1是');
            $table->integer('click')->default(0)->comment('点击数');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
