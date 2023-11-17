<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('client', function (Blueprint $table) {
            $table->id();
            $table->string('pemberi_tugas');

            $table->unsignedBigInteger('id_jasa')->nullable();
            $table->foreign('id_jasa')->references('id')->on('jasa')->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->string('logo_client')->nullable();


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('client');
    }
};