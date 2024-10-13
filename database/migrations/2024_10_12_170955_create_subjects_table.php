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
        Schema::create('subjects', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('semester_id')->comment('Semester to which a subject belongs to.');
            $table->string('subject_code')->unique()->index('sub-code')->comment('Unique code allocated to a subject.');
            $table->string('subject')->comment('Unique code allocated to a subject.');
            $table->real('credit')->comment('Maximum credit marks of a subject.');
            $table->real('external')->comment('Maximum external marks of a subject.');
            $table->real('internal')->comment('Maximum internal marks of a subject.');
            $table->timestamps();
            $table->foreign('semester_id')->references('id')->on('semesters');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subjects');
    }
};
