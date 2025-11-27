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
        Schema::create('class_teacher_subject', function (Blueprint $table) {
            $table->id();
            $table->foreignId('class_id')->constrained('classes')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('teacher_id')->constrained('teachers')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId("subject_id")->constrained('subjects')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('academic_year');
            $table->timestamps();

            $table->unique(['class_id','teacher_id','subject_id','academic_year'],'unique_assignment');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('class_teacher_subject');
    }
};
