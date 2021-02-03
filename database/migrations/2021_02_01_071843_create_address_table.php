<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('address', function (Blueprint $table) {
            $table->id();
            $table->string('name', '60');
            $table->foreignId('person_id')->constrained('person', 'id')->onDelete('cascade')->onUpdate('cascade');
            $table->longText('address');
            $table->string('post_code', 20);
            $table->smallInteger('city_name');
            $table->smallInteger('country_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('address');
    }
}
