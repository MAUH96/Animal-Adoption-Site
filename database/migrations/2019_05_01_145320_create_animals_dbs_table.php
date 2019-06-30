<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnimalsDbsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animals_dbs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned();
            $table->string('name', 15)->unique();
            $table->date('date_of_birth');
            $table->string('description', 256)->nullable();
            $table->string('type', 256)->default('Mammal');
            $table->bigInteger('picture_count')->default(0);
            $table->string('availability', 256)->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users_dbs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('animals_dbs');
    }
}
