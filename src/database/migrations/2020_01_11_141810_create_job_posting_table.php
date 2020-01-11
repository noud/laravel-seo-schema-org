<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobPostingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_posting', function (Blueprint $table) {
            $table->bigIncrements('id')->index();
            $table->bigInteger('base_salary_id')->nullable()->index()->unsigned();
            $table->date('date_posted');
            $table->integer('employment_type')->nullable()->unsigned();
            $table->bigInteger('hiring_organization_id')->index()->unsigned();
            $table->bigInteger('job_location')->nullable()->index()->unsigned();
            $table->integer('job_location_type')->unsigned();
            $table->string('title');
            $table->dateTime('valid_through')->nullable();
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
        Schema::dropIfExists('job_posting');
    }
}
