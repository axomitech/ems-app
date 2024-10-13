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
            $table->unsignedBigInteger('institute_id')->index('ins-cand')->comment('Institute to which a candidate belongs to.');
            $table->unsignedBigInteger('session_id')->index('cand-sess')->comment('Session to which a candidate got admitted to.');
            $table->unsignedBigInteger('stage_id')->index('cand-stage')->comment('Session to which a candidate got admitted to.');
            $table->unsignedBigInteger('gender_id')->index('cand-gen')->comment('Gender of a candidate.');
            $table->string('name')->comment('Name of the candidate.');
            $table->string('father_name')->comment('Name of the candidate\'s father.');
            $table->string('mother_name')->comment('Name of the candidate\'s mother.');
            $table->string('registration_no')->unique()->index('regd-cand')->comment('Registration no. of a canididate alloted by SCERT.');
            $table->string('roll')->comment('Roll. of a canididate indicates the code of an institute.');
            $table->string('no')->comment('No. of a canididate as per registered.');
            $table->date('birth_date')->comment('Date of birth of a canididate.');
            $table->text('remarks')->nullable('Remarks on a candidate.');
            $table->timestamps();
            $table->foreign('institute_id')->references('id')->on('institutes');
            $table->foreign('session_id')->references('id')->on('sessions');
            $table->foreign('stage_id')->references('id')->on('stages');
            $table->foreign('gender_id')->references('id')->on('genders');
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
