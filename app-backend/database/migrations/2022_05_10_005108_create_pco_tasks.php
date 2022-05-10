<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pco_tasks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ctl_task_id')->constrained('ctl_tasks');
            $table->foreignId('pco_process_id')->constrained('pco_process');
            $table->unsignedInteger('aging_in_days')->nullable();
            $table->foreignId('user_id')->constrained('users');
            $table->timestamps();
            $table->timestamp('finalized_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pco_tasks');
    }
};
