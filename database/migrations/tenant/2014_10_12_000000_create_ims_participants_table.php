<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImsParticipantsTable extends Migration
{
    
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		
        Schema::create('ims_participants', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('thread_id');
            $table->datetime('last_read')->nullable();
            $table->enum('window_open',array('yes','no'))->default('yes')->comment("yes=> Yes,no=> No");
            $table->enum('window_minimize',array('yes','no'))->default('yes')->comment("yes=> Yes,no=> No");
            $table->timestamps();
        });	
    }
	
  public function down()
    {
        Schema::drop('ims_participants');
    }
}