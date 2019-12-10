<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImsMessagesTable extends Migration
{
    
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		
        Schema::create('ims_messages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('thread_id');
            $table->integer('user_id');
            $table->text('body')->nullable();
            $table->text('file_name')->nullable();
            $table->timestamps();
        });	
    }
	
  public function down()
    {
        Schema::drop('ims_messages');
    }
}