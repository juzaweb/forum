<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('threads', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('forum_category_id')->index();
            $table->string('status', 20)->default('open')->index();
            $table->string('title', 250);
            $table->string('slug', 190)->index();
            $table->string('description')->nullable();
            $table->string('language', 10)->index();
            $table->creator();
            $table->datetimes();

            $table->unique(['slug']);
            $table->foreign('forum_category_id')
                ->references('id')
                ->on('forum_categories')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('threads');
    }
};
