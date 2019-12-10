<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBidAdditionalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bid_additionals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('bid_id');
            $table->index('bid_id');
            $table->foreign('bid_id')->references('id')->on('bids')->onDelete('cascade');
            $table->string('attachment')->nullable();
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
        Schema::dropIfExists('bid_additionals');
    }
}
