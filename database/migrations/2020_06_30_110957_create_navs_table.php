<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNavsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('navs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nav_title')->default('')->comment('导航名称');
            $table->string('nav_open')->default('1')->comment('导航是否启用【1启用0关闭】');
            $table->integer('nav_sort')->default('100')->comment('排序');
            $table->integer('nav_pid')->default('0')->comment('导航上级id');
            $table->string('nav_route')->default('')->comment('导航前端路由');
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
        Schema::dropIfExists('navs');
    }
}
