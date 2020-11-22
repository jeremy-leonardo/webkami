<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('project_detail_id');
            $table->index('project_detail_id');
            $table->foreign('project_detail_id')->references('id')->on('project_details');
            $table->unsignedBigInteger('project_status_id');
            $table->index('project_status_id');
            $table->foreign('project_status_id')->references('id')->on('project_statuses');
            $table->unsignedBigInteger('developer_user_id');
            $table->index('developer_user_id');
            $table->foreign('developer_user_id')->references('id')->on('users');
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
        Schema::dropIfExists('projects');
    }
}
