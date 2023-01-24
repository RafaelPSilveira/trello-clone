<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        if(!Schema::hasTable('boards')) {

            Schema::create('boards', function (Blueprint $table) {
                $table->id();
                $table->string('ref');
                $table->longText('title')->nulllable();
                $table->string('class')->nulllable();
                $table->string('drag_to')->nulllable();
                $table->integer('board_order')->nulllable();
                $table->timestamps();
            });

        } else {

            if(Schema::hasColumn("boards" , "created_at")) {
                Schema::table("boards", function(Blueprint $table){
                    $table->timestamps();
                });
            }
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('boards');
    }
};
