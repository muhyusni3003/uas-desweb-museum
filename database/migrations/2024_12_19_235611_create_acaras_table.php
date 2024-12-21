<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAcarasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('acaras', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Name of the acara
            $table->text('description')->nullable(); // Description of the acara
            $table->date('date'); // Date of the acara
            $table->string('location'); // Location of the acara
            $table->enum('status', ['Scheduled', 'Ongoing', 'Completed'])->default('Scheduled'); // Status of the acara
            $table->timestamps(); // Created and updated timestamp
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('acaras');
    }
}
