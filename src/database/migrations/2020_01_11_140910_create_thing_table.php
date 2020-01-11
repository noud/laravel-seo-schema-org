<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thing', function (Blueprint $table) {
            $table->bigIncrements('id')->unique()->index();
            $table->string('alternate_name');
            $table->text('description');
            $table->string('name');
            $table->string('url')->nullable();
            $table->bigInteger('identifier_id')->nullable()->index()->unsigned();
            $table->string('main_entity_of_page');
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
        Schema::dropIfExists('thing');
    }
}
