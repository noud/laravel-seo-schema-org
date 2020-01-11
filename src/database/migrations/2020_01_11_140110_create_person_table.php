<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('person', function (Blueprint $table) {
            $table->bigIncrements('id')->unique()->index();
            $table->string('additional_name');
            $table->bigInteger('address_id')->index()->unsigned();
            $table->dateTime('birth_date')->nullable();
            $table->string('email')->unique();
            $table->string('family_name');
            $table->string('given_name');
            $table->string('telephone', 9);
            $table->bigInteger('thing_id')->nullable()->index()->unsigned();
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
        Schema::dropIfExists('person');
    }
}
