<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFamilyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('families', function (Blueprint $table)
        {
            $table->increments('id');
            $table->string('name');
            $table->string('country');
            $table->string('city');
            $table->integer('parents');
            $table->integer('children');
            $table->string('about');
            $table->boolean('supported');
            $table->timestamps();
        });

        if (!Schema::hasTable('family_user'))
        {
            Schema::create('family_user', function (Blueprint $table)
            {
                $table->primary(['family_id', 'user_id']);

                // when dealing with a auto increment field of the primary key
                // always use unsigned()
                $table->integer('family_id')->unsigned()->index();
                $table->foreign('family_id')->references('id')->on('families')->onDelete('cascade');

                $table->integer('user_id')->unsigned()->index();
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

                $table->timestamps();
            });
        }

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('families');
        Schema::dropIfExists('family_user');
    }
}
