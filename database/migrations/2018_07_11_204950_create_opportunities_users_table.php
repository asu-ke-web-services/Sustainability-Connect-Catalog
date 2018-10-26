<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOpportunitiesUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('opportunity_user', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('opportunity_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('relationship_type_id')->unsigned();
            $table->tinyInteger('approved')->default(0)->unsigned();
            $table->text('comments')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->integer('created_by')->unsigned()->nullable();
            $table->integer('updated_by')->unsigned()->nullable();
            $table->integer('deleted_by')->unsigned()->nullable();

            $table->foreign('relationship_type_id')
                ->references('id')->on('relationship_types');

            $table->foreign('opportunity_id')
                ->references('id')->on('opportunities')
                ->onDelete('cascade');

            $table->foreign('user_id')
                ->references('id')->on('users')
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
        Schema::dropIfExists('opportunity_user');
    }
}
