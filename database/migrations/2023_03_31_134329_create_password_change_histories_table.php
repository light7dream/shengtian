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
        Schema::create('password_change_histories', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('member_id')->unsigned();
            $table->foreign('member_id')->references('id')->on('members')->onDelete('cascade');
            $table->string('last_password');
            $table->string('current_password');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('password_change_histories');
    }
};
