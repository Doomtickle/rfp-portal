<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProposalRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proposalRequests', function (Blueprint $table) {
            $table->increments('id');
            $table->string('clientName', 40);
            $table->string('clientIndustry', 40);
            $table->string('campaignName', 80);
            $table->text('basicDescription', 500);
            $table->date('flightDateStart');
            $table->date('flightDateEnd');
            $table->boolean('staggered');
            $table->integer('budget');
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
        Schema::dropIfExists('proposalRequests');
    }
}
