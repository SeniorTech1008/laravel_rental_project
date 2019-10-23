<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChecklistItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checklist_item', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('checklist_id')->unsigned();  
            $table->integer('item_id')->unsigned();  
            
            $table->foreign('checklist_id')
              ->references('id')->on('checklists')
              ->onDelete('cascade');
            $table->foreign('item_id')
              ->references('id')->on('items')
              ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('checklist_item');
    }
}
