<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event', function (Blueprint $table) {
            $table->id('event_id')->nullable(false);
            $table->string('event_title');
            $table->enum('event_category', ['Sport', 'Academic', 'Arts or Music', 'Strategic Studies', 'Human Dev']);
            $table->string('event_venue');
            $table->date('posted_on');
            $table->enum('open_for', ['Participants', 'Committee']);
            $table->date('closed_on');
            $table->string('event_details');
            $table->string('event_url');
            $table->date('event_date');
            $table->string('event_pic1');
            $table->string('event_pic2')->nullable();
            $table->string('event_pic3')->nullable();

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
        Schema::dropIfExists('event');
    }
}
