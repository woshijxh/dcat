<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('article_title')->default('')->comment('文章标题');
            $table->string('article_tag')->default('')->comment('文章标签');
            $table->text('article_content')->comment('文章内容');
            $table->text('article_describe')->comment('文章描述');
            $table->integer('article_click')->default('0')->comment('点击量');
            $table->tinyInteger('article_show')->default('1')->comment('是否显示【1是0否】');
            $table->integer('article_sort')->default('100')->comment('文章排序');
            $table->integer('nav_id')->default('0')->comment('所属导航id');
            $table->timestamps();
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
