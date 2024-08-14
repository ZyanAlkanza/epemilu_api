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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->char('nik', 16)->unique();
            $table->string('username');
            $table->string('place_of_birth');
            $table->date('date_of_birth');
            $table->string('religion');
            $table->text('address');
            $table->char('rt', 3);
            $table->char('rw', 3);
            $table->string('village');
            $table->string('subdistrict');
            $table->string('city');
            $table->string('province');
            $table->string('job');
            $table->char('gender', 1);
            $table->char('blood_type', 2);
            $table->char('role', 1);
            $table->string('password');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
