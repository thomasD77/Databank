<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCredentialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('credentials', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->index();
            $table->integer('client_id')->index();
            $table->integer('subject_id')->index();

            $table->string('host')->nullable();
            $table->string('password')->nullable();
            $table->string('login')->nullable();
            $table->text('remarks')->nullable();

            $table->boolean('archived')->default(0);
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
        Schema::dropIfExists('credentials');
    }
}
