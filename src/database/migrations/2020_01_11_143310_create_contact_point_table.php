<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactPointTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_point', function (Blueprint $table) {
            $table->bigIncrements('id')->unique()->index();
            $table->string('contact_type');
            $table->string('email');
            $table->string('telephone');
            $table->bigInteger('owner_id');
            $table->string('owner_type');
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
        Schema::dropIfExists('contact_point');
    }
}
