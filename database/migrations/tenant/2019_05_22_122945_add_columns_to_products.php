<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->double('min_price')
                ->after('price')
                ->nullable();
            $table->double('max_price')
                ->after('min_price')
                ->nullable();
            $table->integer('bid_limit')
                ->after('max_price')
                ->nullable();
            $table->boolean('start_bid')
                ->after('bid_limit')
                ->comment('0=> Inactive, 1=>Active')
                ->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('min_price');
            $table->dropColumn('max_price');
            $table->dropColumn('bid_limit');
            $table->dropColumn('start_bid');
        });
    }
}
