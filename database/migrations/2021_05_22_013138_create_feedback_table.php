<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeedbackTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feedback', function (Blueprint $table) {
            $table->string('matrix_card_feedback')->unique()->primary();
            $table->date('comment_on');
            $table->unsignedBigInteger('event_id');
            $table->string('feedback');
            $table->integer('rate_event');
            $table->index(['event_id']);

            //foreign keys
            $table->foreign('matrix_card_feedback')
                ->references('matrix_card')
                ->on('member')
                ->onUpdate('cascade')
                ->onDelete('restrict');
            $table->foreign('event_id')
                ->references('event_id')
                ->on('event')
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
        Schema::dropIfExists('feedback');
    }
}
