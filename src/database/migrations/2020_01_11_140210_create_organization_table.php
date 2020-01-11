<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrganizationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organization', function (Blueprint $table) {
            $table->bigIncrements('id')->unique()->index();
            $table->bigInteger('address_id')->index()->unsigned();
            $table->string('email')->nullable();
            $table->string('legal_name');
            $table->bigInteger('location_id')->index()->unsigned();
            $table->string('logo');
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
        Schema::dropIfExists('organization');
    }
}
