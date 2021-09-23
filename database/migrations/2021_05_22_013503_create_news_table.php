<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id('news_id');
            $table->enum('news_category', ['Sport', 'Academic', 'Arts or Music', 'Strategic Studies', 'Human Dev']);
            $table->string('news_title');
            $table->string('news_content');
            $table->string('posted_on');
            $table->string('news_pic1');
            $table->string('news_pic2')->nullable();
            $table->string('news_pic3')->nullable();
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
        Schema::dropIfExists('news');
    }
}
