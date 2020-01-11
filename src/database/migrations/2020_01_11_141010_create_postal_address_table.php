<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostalAddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('postal_address', function (Blueprint $table) {
            $table->bigIncrements('id')->unique()->index();
            $table->char('address_country', 2)->nullable()->unique()->index();
            $table->string('address_locality');
            $table->string('address_region')->nullable();
            $table->string('post_office_box_number')->nullable();
            $table->string('postal_code');
            $table->string('street_address')->nullable();
            $table->bigInteger('contact_point_id')->nullable()->index()->unsigned();
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
        Schema::dropIfExists('postal_address');
    }
}
