<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subjects', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->boolean('archived')->default(0);
            $table->timestamps();
        });

        DB::table('subjects')->insert([
            'name' => 'FTP'
        ]);
        DB::table('subjects')->insert([
            'name' => 'Database'
        ]);
        DB::table('subjects')->insert([
            'name' => 'Email'
        ]);
        DB::table('subjects')->insert([
            'name' => 'BackOffice'
        ]);
        DB::table('subjects')->insert([
            'name' => 'Extra'
        ]);
        DB::table('subjects')->insert([
            'name' => 'Combell'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subjects');
    }
}
