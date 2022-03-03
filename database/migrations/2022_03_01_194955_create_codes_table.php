<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('codes', function (Blueprint $table) {
            $table->string('code')->primary();
            $table->string('status')->nullable();
            $table->json('postcard_type')->nullable();
            $table->char('modality',2)->nullable();
            $table->boolean('enable_self_declaration')->nullable();
            $table->boolean('allow_import_tax')->nullable();
            $table->boolean('enable_travel_postman')->nullable();
            $table->boolean('lock_object')->nullable();
            $table->boolean('has_locker')->nullable();
            $table->boolean('enable_locker')->nullable();
            $table->boolean('enable_crowdshipping')->nullable();
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
        Schema::dropIfExists('codes');
    }
}
