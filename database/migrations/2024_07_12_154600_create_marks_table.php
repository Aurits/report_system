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
        Schema::create('marks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained()->onDelete('cascade');
            $table->foreignId('subject_id')->constrained()->onDelete('cascade');
            $table->foreignId('exam_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('activity_id')->nullable()->constrained()->onDelete('cascade');
            $table->integer('marks_obtained');
            $table->foreignId('term_id')->constrained()->onDelete('cascade');
            $table->enum('assessment_type', ['Exam', 'Activity']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('marks');
    }
};
