<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttachmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attachments', function (Blueprint $table) {
            $table->id();
            $table->string('link');
            $table->integer('score')->nullable();
            $table->enum('category', [0, 1])->default(0);
            $table->enum('type', [0, 1])->default(0);
            $table->unsignedBigInteger('idModule');
            $table->unsignedBigInteger('idCourse');
            $table->unsignedBigInteger('idUser');
            $table->foreign('idModule')->references('id')->on('modules')->onDelete('cascade');
            $table->foreign('idCourse')->references('id')->on('courses')->onDelete('cascade');
            $table->foreign('idUser')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('attachments');
    }
}
