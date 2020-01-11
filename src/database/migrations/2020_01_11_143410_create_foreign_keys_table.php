<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForeignKeysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('person', function (Blueprint $table) {
            $table->foreign('address_id')->references('id')->on('postal_address');
            $table->foreign('thing_id')->references('id')->on('thing');
        });

        Schema::table('organization', function (Blueprint $table) {
            $table->foreign('address_id')->references('id')->on('postal_address');
            $table->foreign('location_id')->references('id')->on('place');
            $table->foreign('thing_id')->references('id')->on('thing');
        });

        Schema::table('role', function (Blueprint $table) {
            $table->foreign('person_id')->references('id')->on('person');
        });

        Schema::table('employees', function (Blueprint $table) {
            $table->foreign('organization_id')->references('id')->on('organization');
            $table->foreign('employee_id')->references('id')->on('employee');
        });

        Schema::table('founders', function (Blueprint $table) {
            $table->foreign('organization_id')->references('id')->on('organization');
            $table->foreign('founder_id')->references('id')->on('founder');
        });

        Schema::table('same_as', function (Blueprint $table) {
            $table->foreign('thing_id')->references('id')->on('thing');
        });

        Schema::table('thing', function (Blueprint $table) {
            $table->foreign('identifier_id')->references('id')->on('property_value');
        });

        Schema::table('postal_address', function (Blueprint $table) {
            $table->foreign('contact_point_id')->references('id')->on('contact_point');
        });

        Schema::table('place', function (Blueprint $table) {
            $table->foreign('address_id')->references('id')->on('postal_address');
            $table->foreign('geo_id')->references('id')->on('geo_coordinates');
        });

        Schema::table('web_site', function (Blueprint $table) {
            $table->foreign('thing_id')->references('id')->on('thing');
        });

        Schema::table('search_action', function (Blueprint $table) {
            $table->foreign('target')->references('id')->on('entry_point');
            $table->foreign('action_id')->references('id')->on('action');
        });

        Schema::table('actions', function (Blueprint $table) {
            $table->foreign('web_site_id')->references('id')->on('web_site');
            $table->foreign('action_id')->references('id')->on('action');
        });

        Schema::table('job_posting', function (Blueprint $table) {
            $table->foreign('base_salary_id')->references('id')->on('monetary_amount');
            $table->foreign('hiring_organization_id')->references('id')->on('organization');
            $table->foreign('job_location')->references('id')->on('place');
            $table->foreign('thing_id')->references('id')->on('thing');
        });

        Schema::table('monetary_amount', function (Blueprint $table) {
            $table->foreign('value_id')->references('id')->on('quantitative_value');
        });

        Schema::table('education_requirements', function (Blueprint $table) {
            $table->foreign('job_posting_id')->references('id')->on('job_posting');
            $table->foreign('education_requirement_id')->references('id')->on('education_requirement');
        });

        Schema::table('property_value', function (Blueprint $table) {
            $table->foreign('thing_id')->references('id')->on('thing');
        });

        Schema::table('blog_posting', function (Blueprint $table) {
            $table->foreign('article_id')->references('id')->on('article');
        });

        Schema::table('article', function (Blueprint $table) {
            $table->foreign('creative_work_id')->references('id')->on('creative_work');
        });

        Schema::table('creative_work', function (Blueprint $table) {
            $table->foreign('author_id')->references('id')->on('person');
            $table->foreign('publisher_id')->references('id')->on('organization');
            $table->foreign('thing_id')->references('id')->on('thing');
        });

        Schema::table('image', function (Blueprint $table) {
            $table->foreign('thing_id')->references('id')->on('thing');
        });

        Schema::table('local_business', function (Blueprint $table) {
            $table->foreign('organization_id')->references('id')->on('organization');
        });

        Schema::table('opening_hours_specification', function (Blueprint $table) {
            $table->foreign('place_id')->references('id')->on('place');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('person', function (Blueprint $table) {
            $table->dropForeign('person_address_id_foreign');
            $table->dropForeign('person_thing_id_foreign');
        });

        Schema::table('organization', function (Blueprint $table) {
            $table->dropForeign('organization_address_id_foreign');
            $table->dropForeign('organization_location_id_foreign');
            $table->dropForeign('organization_thing_id_foreign');
        });

        Schema::table('role', function (Blueprint $table) {
            $table->dropForeign('role_person_id_foreign');
        });

        Schema::table('employees', function (Blueprint $table) {
            $table->dropForeign('employees_organization_id_foreign');
            $table->dropForeign('employees_employee_id_foreign');
        });

        Schema::table('founders', function (Blueprint $table) {
            $table->dropForeign('founders_organization_id_foreign');
            $table->dropForeign('founders_founder_id_foreign');
        });

        Schema::table('same_as', function (Blueprint $table) {
            $table->dropForeign('same_as_thing_id_foreign');
        });

        Schema::table('thing', function (Blueprint $table) {
            $table->dropForeign('thing_identifier_id_foreign');
        });

        Schema::table('postal_address', function (Blueprint $table) {
            $table->dropForeign('postal_address_contact_point_id_foreign');
        });

        Schema::table('place', function (Blueprint $table) {
            $table->dropForeign('place_address_id_foreign');
            $table->dropForeign('place_geo_id_foreign');
        });

        Schema::table('web_site', function (Blueprint $table) {
            $table->dropForeign('web_site_thing_id_foreign');
        });

        Schema::table('search_action', function (Blueprint $table) {
            $table->dropForeign('search_action_target_foreign');
            $table->dropForeign('search_action_action_id_foreign');
        });

        Schema::table('actions', function (Blueprint $table) {
            $table->dropForeign('actions_web_site_id_foreign');
            $table->dropForeign('actions_action_id_foreign');
        });

        Schema::table('job_posting', function (Blueprint $table) {
            $table->dropForeign('job_posting_base_salary_id_foreign');
            $table->dropForeign('job_posting_hiring_organization_id_foreign');
            $table->dropForeign('job_posting_job_location_foreign');
            $table->dropForeign('job_posting_thing_id_foreign');
        });

        Schema::table('monetary_amount', function (Blueprint $table) {
            $table->dropForeign('monetary_amount_value_id_foreign');
        });

        Schema::table('education_requirements', function (Blueprint $table) {
            $table->dropForeign('education_requirements_job_posting_id_foreign');
            $table->dropForeign('education_requirements_education_requirement_id_foreign');
        });

        Schema::table('property_value', function (Blueprint $table) {
            $table->dropForeign('property_value_thing_id_foreign');
        });

        Schema::table('blog_posting', function (Blueprint $table) {
            $table->dropForeign('blog_posting_article_id_foreign');
        });

        Schema::table('article', function (Blueprint $table) {
            $table->dropForeign('article_creative_work_id_foreign');
        });

        Schema::table('creative_work', function (Blueprint $table) {
            $table->dropForeign('creative_work_author_id_foreign');
            $table->dropForeign('creative_work_publisher_id_foreign');
            $table->dropForeign('creative_work_thing_id_foreign');
        });

        Schema::table('image', function (Blueprint $table) {
            $table->dropForeign('image_thing_id_foreign');
        });

        Schema::table('local_business', function (Blueprint $table) {
            $table->dropForeign('local_business_organization_id_foreign');
        });

        Schema::table('opening_hours_specification', function (Blueprint $table) {
            $table->dropForeign('opening_hours_specification_place_id_foreign');
        });
    }
}
