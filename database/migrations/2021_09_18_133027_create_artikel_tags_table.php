<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArtikelTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artikel_tags', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tag_id')
            ->references('id')
            ->on('tags');
            $table->foreignId('content_id')
            ->references('id')->on('contents');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('artikel_tags');
    }
}
