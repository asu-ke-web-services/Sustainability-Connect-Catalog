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
            $table->integer('organization_type_id')->unsigned();
            $table->integer('organization_status_id')->unsigned();
            $table->string('name');
            $table->timestamps();
            $table->softDeletes();
            $table->integer('created_by')->unsigned()->nullable();
            $table->integer('updated_by')->unsigned()->nullable();
            $table->integer('deleted_by')->unsigned()->nullable();

            $table->foreign('organization_type_id')
                ->references('id')
                ->on('organization_types');

            $table->foreign('organization_status_id')
                ->references('id')
                ->on('organization_statuses');

            $table->foreign('created_by')
                ->references('id')->on('users');

            $table->foreign('updated_by')
                ->references('id')->on('users');

            $table->foreign('deleted_by')
                ->references('id')->on('users');
        });

        Schema::create('address_organization', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('address_id')->unsigned()->index();
            $table->integer('organization_id')->unsigned()->index();
            $table->integer('order')->default(1);
            $table->timestamps();
            $table->softDeletes();
            $table->integer('created_by')->unsigned()->nullable();
            $table->integer('updated_by')->unsigned()->nullable();
            $table->integer('deleted_by')->unsigned()->nullable();

            $table->foreign('address_id')
                 ->references('id')->on('addresses')
                ->onDelete('cascade');

            $table->foreign('organization_id')
                ->references('id')->on('organizations')
                ->onDelete('cascade');

            $table->foreign('created_by')
                ->references('id')->on('users');

            $table->foreign('updated_by')
                ->references('id')->on('users');

            $table->foreign('deleted_by')
                ->references('id')->on('users');
        });

        Schema::create('note_organization', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('note_id')->unsigned()->index();
            $table->integer('organization_id')->unsigned()->index();
            $table->integer('order')->default(1);
            $table->timestamps();
            $table->softDeletes();
            $table->integer('created_by')->unsigned()->nullable();
            $table->integer('updated_by')->unsigned()->nullable();
            $table->integer('deleted_by')->unsigned()->nullable();

            $table->foreign('note_id')
                 ->references('id')->on('notes')
                ->onDelete('cascade');

            $table->foreign('organization_id')
                ->references('id')->on('organizations')
                ->onDelete('cascade');

            $table->foreign('created_by')
                ->references('id')->on('users');

            $table->foreign('updated_by')
                ->references('id')->on('users');

            $table->foreign('deleted_by')
                ->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('note_organization');
        Schema::dropIfExists('address_organization');
        Schema::dropIfExists('organizations');
    }
}
