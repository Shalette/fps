<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePublicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publications', function (Blueprint $table) {
            $table->bigIncrements('pub_id');
            $table->bigInteger('id')->unsigned()->index();
            $table->foreign('id')->references('id')->on('users')->onDelete('cascade');
            $table->bigInteger('dept_id')->unsigned()->index();
            $table->foreign('dept_id')->references('dept_id')->on('departments')->onDelete('cascade');
            $table->string('title');
            $table->text('description');
            $table->string('pdf_link');
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
        Schema::dropIfExists('publications');
    }
}
