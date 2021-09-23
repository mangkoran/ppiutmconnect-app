<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin', function (Blueprint $table) {
            $table->string('matrix_card')->nullable(false)->unique()->primary();
            $table->string('admin_year')->nullable(false);
            $table->foreign('matrix_card')
                ->references('matrix_card')
                ->on('member')
                ->onUpdate('cascade')
                ->onDelete('restrict');
            $table->timestamps();


            $table->dropForeign(['matrix_card']);

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
        Schema::dropIfExists('admin');
    }
}
