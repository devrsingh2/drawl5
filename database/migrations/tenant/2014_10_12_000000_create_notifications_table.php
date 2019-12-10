<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotificationsTable extends Migration
{
    
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		
        Schema::create('notifications', function (Blueprint $table) {
            $table->increments('id');
            $table->string('subject')->nullable();
            $table->text('message')->nullable();
            $table->integer('category_id');
            $table->integer('from_user_id');
            $table->integer('to_user_id');
            $table->integer('requirement_id');
            $table->enum('status',array('unread','read'))->default('unread')->comment("unread=> Unread,read=> Read");
            $table->timestamps();
        });	
    }
	
  public function down()
    {
        Schema::drop('notifications');
    }
}