<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_details', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->unsignedBigInteger('project_category_id');
            $table->index('project_category_id');
            $table->foreign('project_category_id')->references('id')->on('project_categories');
            $table->date('deadline')->nullable();
            $table->unsignedBigInteger('budget');
            $table->unsignedBigInteger('client_user_id');
            $table->index('client_user_id');
            $table->foreign('client_user_id')->references('id')->on('users');
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
        Schema::dropIfExists('project_details');
    }
}
