<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAspirationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aspiration', function (Blueprint $table) {
            $table->string('matrix_no')->unique()->primary();
            $table->string('division_name')->unique();
            $table->string('posted_on');
            $table->string('aspiration_subject');
            $table->string('aspiration_content');

            $table->foreign('matrix_no')
                ->references('matrix_card')
                ->on('member')
                ->onUpdate('cascade')
                ->onDelete('restrict');

            $table->foreign('division_name')
                ->references('division_name')
                ->on('division')
                ->onUpdate('cascade')
                ->onDelete('restrict');
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
        Schema::dropIfExists('aspiration');
    }
}
