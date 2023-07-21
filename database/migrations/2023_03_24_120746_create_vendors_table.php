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
        Schema::create('vendors', function (Blueprint $table) {
            $table->id();
            $table->string('business_name');
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->string('code');
            $table->string('telephone')->nullable();
            $table->string('phone');
            $table->text('address')->nullable();
            $table->string('email')->nullable();
            $table->string('cr')->nullable();
            $table->string('tax_number')->nullable();
            $table->string('city');
            $table->foreignIdFor(\App\Models\System\State::class);
            $table->boolean('active')->default(true);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendors');
    }
};
