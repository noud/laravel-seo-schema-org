<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCreativeWorkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('creative_work', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('author_id')->index()->unsigned();
            $table->dateTime('date_modified');
            $table->dateTime('date_published');
            $table->string('headline');
            $table->bigInteger('publisher_id')->index()->unsigned();
            $table->bigInteger('thing_id')->index()->unsigned();
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
        Schema::dropIfExists('creative_work');
    }
}
