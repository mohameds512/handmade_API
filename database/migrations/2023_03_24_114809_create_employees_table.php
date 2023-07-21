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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone')->nullable();
            $table->text('address')->nullable();
            $table->mediumInteger('salary')->nullable();
            $table->mediumInteger('overtime')->nullable();
            $table->date('joined_at')->nullable();
            $table->date('terminated_at')->nullable();
            $table->boolean('active')->default(true);
            $table->unsignedBigInteger('joptitle_id')->nullable();
            $table->foreign('joptitle_id')->references('id')->on('jop_titles');
            $table->foreignIdFor(\App\Models\Hr\Department::class)->nullable();
//            $table->foreignIdFor(\App\Models\Hr\JopTitle::class)->nullable();
            $table->foreignIdFor(\App\Models\System\Status::class)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
