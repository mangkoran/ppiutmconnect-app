<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemberTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member', function (Blueprint $table) {
            $table->string('matrix_card')->unique()->primary();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('name');
            $table->year('batch');
            $table->string('program_code');
            $table->string('degree');
            $table->string('address');
            $table->unsignedBigInteger('access_grant');
            $table->index(['program_code', 'access_grant']);
            $table->timestamp('email_verified_at')->nullable();

            //foreign keys
            $table->foreign('program_code')
                ->references('program_code')
                ->on('program')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('access_grant')
                ->references('grant_id')
                ->on('grant_access')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->rememberToken();
            $table->timestamps();

            //drop foreign keys
            $table->dropForeign(['program_code']);
            $table->dropForeign(['access_grant']);

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
        Schema::dropIfExists('member');
    }
}
