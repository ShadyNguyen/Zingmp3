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
        Schema::create('songs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('artist');
            $table->string('url')->nullable();
            $table->string('thumbnail');
            $table->string('lyrics')->nullable();
            $table->string('source');
            $table->integer('duration');
            $table->integer('views')->default(0);
            $table->integer('id_album');
            $table->integer('id_playlist')->nullable();
            $table->integer('id_artist');
            $table->integer('id_user');
            $table->integer('is_favorite')->default(0);
            $table->integer('total_like')->default(0);
            $table->integer('total_listen')->default(0);
            $table->string('slug');
            $table->integer('key_source');
            $table->integer('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('songs');
    }
};
