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
        Schema::create('forum_categories', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->boolean('active')->default(true);
            $table->integer('display_order')->default(1);
            $table->datetimes();
        });

        Schema::create('forum_category_translations', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('forum_category_id');
            $table->string('name', 190);
            $table->string('slug', 190)->unique();
            $table->text('description')->nullable();
            $table->string('locale', 10);
            $table->websiteId(false);
            $table->datetimes();

            $table->unique(['slug']);
            $table->unique(['forum_category_id', 'locale']);
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
        Schema::dropIfExists('forum_category_translations');
        Schema::dropIfExists('forum_categories');
    }
};
