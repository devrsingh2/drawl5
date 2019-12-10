<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeedbacksTable extends Migration
{
    
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		
        Schema::create('feedbacks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('name')->nullable();
            $table->text('message')->nullable();
            $table->timestamps();
        });	
    }
	
  public function down()
    {
        Schema::drop('feedbacks');
    }
}