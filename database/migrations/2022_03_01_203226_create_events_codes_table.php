<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events_codes', function (Blueprint $table) {
            $table->id();
            $table->string('code_event');
            $table->string('code_id');
            $table->string('description');
            $table->timestamp('date_create');
            $table->string('type');
            $table->string('unity');
            $table->string('unity_type');
            $table->json('address')->nullable();
            $table->string('unity_coutry')->nullable();
            $table->string('unity_codSro')->nullable();
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
        Schema::dropIfExists('events_codes');
    }
}
