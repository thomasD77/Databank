<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        DB::table('types')->insert([
            'name' => 'PDF',
        ]);
        DB::table('types')->insert([
            'name' => 'WORD',
        ]);
        DB::table('types')->insert([
            'name' => 'EXCEL',
        ]);
        DB::table('types')->insert([
            'name' => 'OFFICE',
        ]);
        DB::table('types')->insert([
            'name' => 'IMG',
        ]);
        DB::table('types')->insert([
            'name' => 'OTHER',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('types');
    }
}
