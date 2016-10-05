<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('title');
            $table->string('body');
            $table->timestamps();
        });

        if(!Schema::hasTable('family_post'))
        {
            Schema::create('family_post', function(Blueprint $table)
            {
               $table->primary('family_id', 'post_id');

                $table->integer('family_id')->unsigned()->index();
                $table->foreign('family_id')->references('id')->on('families')->onDelete('cascade');

                $table->integer('post_id')->unsigned()->index();
                $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');

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
        //
    }
}
