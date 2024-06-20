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
        Schema::create('images', static function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->morphs('imageable');
            $table->longText('media_file')->nullable();
            $table->integer('media_size')->nullable();
            $table->string('media_type')->nullable()->comment('video / image / pdf / ...');
            $table->text('media_name')->nullable();
            $table->string('media_extension')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('images');
    }
};
