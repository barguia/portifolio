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
        Schema::create('acl_profiles_routes', function (Blueprint $table) {
            $table->foreignId('acl_profile_id')->constrained('acl_profiles')->cascadeOnDelete();
            $table->foreignId('acl_route_id')->constrained('acl_routes')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('acl_profiles_routes');
    }
};
