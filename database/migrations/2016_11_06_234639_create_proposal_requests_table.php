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
            $table->integer('user_id')->unsigned()->index();
            $table->string('clientIndustry', 40);
            $table->string('campaignName', 80);
            $table->text('basicDescription', 500);
            $table->date('flightDateStart');
            $table->date('flightDateEnd');
            $table->boolean('staggered');
            $table->float('budget');
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
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::drop('proposalRequests');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
