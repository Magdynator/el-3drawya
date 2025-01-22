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
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->id('profile_id');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('personal_id', 50)->unique();
            $table->string('first_name', 50);
            $table->string('last_name', 50);
            $table->enum('gender', ['male', 'female']);
            $table->string('barcode', 50)->nullable();
            $table->string('qrcode', 50)->nullable();
            $table->integer('point')->default(0);
            $table->enum('check_box', ['0', '1'])->default('0');
            $table->date('date_of_birth')->nullable();
            $table->text('bio')->nullable();
            $table->string('profile_picture', 255)->nullable();
            $table->string('phone_number', 20)->nullable();
            $table->string('address', 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_profiles');
    }
};
