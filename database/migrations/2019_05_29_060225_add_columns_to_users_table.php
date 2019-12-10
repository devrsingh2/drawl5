<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('website_id')
                ->after('name')
                ->nullable();
            $table->string('hostname')
                ->after('website_id')
                ->nullable();
            $table->string('verification_code')
                ->after('password')
                ->nullable();
            $table->enum('user_role', ['admin', 'user'])
                ->after('verification_code')
                ->default('user');
            $table->boolean('email_verified')
                ->after('user_role')
                ->default(0)
                ->comment('0=> No, 1=> Yes');
            $table->enum('account_status', ['pending', 'active', 'blocked'])
                ->after('email_verified')
                ->default('pending');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('website_id');
            $table->dropColumn('hostname');
            $table->dropColumn('verification_code');
            $table->dropColumn('user_role');
            $table->dropColumn('email_verified');
            $table->dropColumn('account_status');
        });
    }
}
