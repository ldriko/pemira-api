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
        Schema::create('candidates', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('event_id');
            $table->foreign('event_id')->references('id')->on('events');
            $table->unsignedBigInteger('division_type_id');
            $table->foreign('division_type_id')->references('id')->on('divisions');
            $table->string('first');
            $table->string('second')->nullable();
            $table->text('vision')->nullable();
            $table->text('mission')->nullable();
            $table->string('picture')->nullable();
            $table->string('created_by');
            $table->foreign('created_by')->references('npm')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidates');
    }
};
