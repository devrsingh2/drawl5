<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmsTable extends Migration
{
    
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		
        Schema::create('cms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('slug')->nullable();
            $table->text('description')->nullable();
            $table->longText('content')->nullable();
            $table->enum('status',array('inactive','active'))
                ->default('inactive')
                ->comment("inactive=> Inactive,active=> Active");
            $table->timestamps();
        });	
    }
	
  public function down()
    {
        Schema::drop('cms');
    }
}