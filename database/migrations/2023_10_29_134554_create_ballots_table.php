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
        Schema::create('ballots', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('event_id');
            $table->foreign('event_id')->references('id')->on('events');
            $table->string('npm');
            $table->foreign('npm')->references('npm')->on('users');
            $table->string('ktm_picture');
            $table->string('verification_picture');
            // $table->unsignedBigInteger('candidate1');
            // $table->foreign('candidate1')->references('id')->on('candidates');
            // $table->unsignedBigInteger('candidate2');
            // $table->foreign('candidate2')->references('id')->on('candidates');
            // $table->unsignedBigInteger('candidate3');
            // $table->foreign('candidate3')->references('id')->on('candidates');
            // $table->unsignedBigInteger('candidate4');
            // $table->foreign('candidate4')->references('id')->on('candidates');
            $table->tinyInteger('accepted')->nullable();
            $table->timestamp('accepted_at')->nullable();
            $table->string('accepted_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ballots');
    }
};
