<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeliverableInluencerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deliverable_influencer', function (Blueprint $table) {
            $table->unsignedBigInteger('deliverable_id');
            $table->foreign('deliverable_id')->references('id')->on('deliverables');
            $table->unsignedBigInteger('influencer_id');
            $table->foreign('influencer_id')->references('id')->on('influencers');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('deliverable_content_inluencer');
    }
}
