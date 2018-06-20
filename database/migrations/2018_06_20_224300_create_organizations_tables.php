<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrganizationsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organizations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('organization_type_id');
            // $table->foreign('organization_type_id')
            //     ->references('id')
            //     ->on('organization_types');
            $table->integer('organization_status_id');
            // $table->foreign('organization_status_id')
            //     ->references('id')
            //     ->on('organization_statuses');
            $table->string('name');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('organizations_addresses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('organization_id')->unsigned();
            // $table->foreign('organization_id')
            //     ->references('id')
            //     ->on('organizations');
            $table->integer('address_id')->unsigned();
            // $table->foreign('address_id')
            //     ->references('id')
            //     ->on('addresses');
            $table->boolean('primary');
            $table->integer('order')->default(1);
            $table->timestamps();
        });

        Schema::create('organizations_notes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('organization_id')->unsigned();
            // $table->foreign('organization_id')
            //     ->references('id')
            //     ->on('organizations');
            $table->integer('user_id')->unsigned();
            // $table->foreign('user_id')
            //     ->references('id')
            //     ->on('users');
            $table->text('note_body');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('organizations_notes');
        Schema::dropIfExists('organizations_addresses');
        Schema::dropIfExists('organizations');
    }
}
