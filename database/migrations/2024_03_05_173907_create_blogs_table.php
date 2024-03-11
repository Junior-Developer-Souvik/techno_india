<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('slug')->nullable();
            $table->text('short_desc')->nullable();
            $table->text('long_desc')->nullable();

            $table->string('image');
            $table->string('blog_categories')->nullable();
            $table->string('uploaded_by');
            $table->string('page_title')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('mea_desc')->nullable();
            $table->string('meta_keyword')->nullable();
            $table->string('deleted_at')->default(1);
            $table->string('status')->default(1);
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
        Schema::dropIfExists('blogs');
    }
}
