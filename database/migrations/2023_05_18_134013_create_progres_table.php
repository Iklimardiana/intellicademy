<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('progres', function (Blueprint $table) {
            $table->id();
            $table->enum('status', [0, 1])->default(0);
            $table->float('score')->nullable();
            $table->unsignedBigInteger('idAttachment')->nullable();
            $table->unsignedBigInteger('idUser');
            $table->unsignedBigInteger('idModule');
            $table->unsignedBigInteger('idCourse');
            $table->foreign('idAttachment')->references('id')->on('attachments')->onDelete('cascade');
            $table->foreign('idUser')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('idModule')->references('id')->on('modules')->onDelete('cascade');
            $table->foreign('idCourse')->references('id')->on('courses')->onDelete('cascade');
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
        Schema::dropIfExists('progres');
    }
}
