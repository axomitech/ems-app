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
        Schema::create('institutes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('district_id')->index('ins-dist')->comment('District in which an institute is located.');
            $table->unsignedBigInteger('institute_category_id')->index('ins-cat')->comment('Category to which an institute is belonged.');
            $table->unsignedBigInteger('institutionalization_id')->index('ins-tion')->comment('Institutionalization Category to which an institute is belonged.');
            $table->string('institute_code')->unique()->index('ins-code')->comment('Unique institue code for institutions.');
            $table->string('institute_name')->unique()->index('ins-code')->comment('Name of an institute.');
            $table->timestamps();
            $table->foreign('district_id')->references('id')->on('districts');
            $table->foreign('institute_category_id')->references('id')->on('institute_categories');
            $table->foreign('institutionalization_id')->references('id')->on('institutionalizations');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('institutes');
    }
};
