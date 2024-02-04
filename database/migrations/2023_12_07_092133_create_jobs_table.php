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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('hrd_id');
            $table->foreign('hrd_id')->references('id')->on('hrd_data')->onDelete('cascade');
            $table->foreignId('jobcompany_id');
            $table->foreign('jobcompany_id')->references('id')->on('job_companies')->onDelete('cascade');
            $table->foreignId('jobeducation_id');
            $table->foreign('jobeducation_id')->references('id')->on('job_educations')->onDelete('cascade');
            $table->string('position');
            $table->string('jobdesk');
            $table->text('description');
            $table->string('image')->nullable();
            $table->boolean('status')->default(-1);
            $table->boolean('confirm')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
