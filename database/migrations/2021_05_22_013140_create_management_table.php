<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateManagementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('management', function (Blueprint $table) {
            $table->string('management_matrix_card')->unique()->primary();
            $table->string('management_year');
            $table->unsignedBigInteger('management_role_id');
            $table->string('division_name');
            $table->index('management_role_id');

            $table->foreign('management_matrix_card')
            ->references('matrix_card')
            ->on('member')
            ->onUpdate('cascade')
            ->onDelete('restrict');
            $table->foreign('management_role_id')
            ->references('role_id')
            ->on('role')
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
        Schema::dropIfExists('management');
    }
}
