<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
{
    Schema::create('daily_works', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('employee_id');
        $table->date('date');
        $table->string('project_name');
        $table->date('assign_date');
        $table->date('deadline');
        $table->text('today_task');
        $table->string('file')->nullable();
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daily_works');
    }
};
