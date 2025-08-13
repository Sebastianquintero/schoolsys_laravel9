<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('anuncios', function (Blueprint $table) {
            $table->string('media_type', 20)->nullable();      // image | video_url | video_file
            $table->string('video_url', 255)->nullable();      // YouTube/Vimeo
            $table->string('video_path', 255)->nullable();     // MP4 en disk 'public'
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('anuncios', function (Blueprint $table) {
            $table->dropColumn(['media_type','video_url','video_path','deleted_at']);
        });
    }
};
