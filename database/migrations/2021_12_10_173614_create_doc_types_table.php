<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateDocTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doc_types', function (Blueprint $table) {
            $table->id();
            $table->string('type')->nullable();
            $table->timestamps();
        });

        DB::table('doc_types')->insert([
            'type' => 'PDF',
        ]);
        DB::table('doc_types')->insert([
             'type' => 'WORD',
        ]);
        DB::table('doc_types')->insert([
              'type' => 'EXCEL',
        ]);
        DB::table('doc_types')->insert([
              'type' => 'OFFICE',
        ]);
        DB::table('doc_types')->insert([
               'type' => 'IMG',
        ]);
        DB::table('doc_types')->insert([
               'type' => 'OTHER',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('doc_types');
    }
}
