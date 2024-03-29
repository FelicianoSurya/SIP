<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlaceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('place', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("address");
            $table->string("phoneNumber");
            $table->double("longitude")->default(0);
            $table->double("latitude")->default(0);
            $table->string("route")->nullable();
            $table->string("kecamatan")->nullable();
            $table->string("city")->nullable();
            $table->string("provinsi")->nullable();
            $table->string("createdBy");
            $table->integer("typeId");
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
        Schema::dropIfExists('place');
    }
}
