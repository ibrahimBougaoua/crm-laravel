<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('dueDate');

            $table->bigInteger('opportunityId')->unsigned()->nullable();
            $table->foreign('opportunityId')->references('id')->on('opportunities')->onDelete('cascade');

            $table->bigInteger('statusId')->unsigned()->nullable();
            $table->foreign('statusId')->references('id')->on('opportunity_statuses')->onDelete('cascade');

            $table->bigInteger('typeId')->unsigned()->nullable();
            $table->foreign('typeId')->references('id')->on('task_types')->onDelete('cascade');

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
        Schema::dropIfExists('tasks');
    }
}
