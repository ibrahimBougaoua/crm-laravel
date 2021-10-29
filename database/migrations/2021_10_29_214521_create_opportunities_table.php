<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOpportunitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('opportunities', function (Blueprint $table) {
            $table->id();
            $table->string('amount');
            $table->string('name');
            $table->string('CloseDate');
            $table->bigInteger('contactId')->unsigned()->nullable();
            $table->foreign('contactId')->references('id')->on('contacts')->onDelete('cascade');
            $table->bigInteger('statusId')->unsigned()->nullable();
            $table->foreign('statusId')->references('id')->on('opportunity_statuses')->onDelete('cascade');
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
        Schema::dropIfExists('opportunities');
    }
}
