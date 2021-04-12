<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateADSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*Title
o	Description
o	Load Image
o	Date from
o	Date to
o	Duration
o	Frequency of appearance every xxx minutes or every xxxx hours
-	Customer page to view the adds as per the specified time duration and frequency*/

        Schema::create('ads', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->text('url');
            $table->string('image');
             $table->integer('duration');
            $table->integer('views');
            $table->tinyInteger('status')->nullable();
             $table->dateTime('date_from');
            $table->dateTime('date_to');


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
        Schema::dropIfExists('ads');
    }
}
