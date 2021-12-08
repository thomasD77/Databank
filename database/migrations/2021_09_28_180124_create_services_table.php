<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->boolean('archived')->default(0);
            $table->timestamps();
        });

        DB::table('services')->insert([
           'name' => 'FTP'
        ]);
        DB::table('services')->insert([
            'name' => 'Database'
        ]);
        DB::table('services')->insert([
            'name' => 'Email'
        ]);
        DB::table('services')->insert([
            'name' => 'BackOffice'
        ]);
        DB::table('services')->insert([
            'name' => 'Extra'
        ]);
        DB::table('services')->insert([
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
        Schema::dropIfExists('services');
    }
}
