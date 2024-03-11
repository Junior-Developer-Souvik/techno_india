<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContentAcademicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('content_academics', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->text('desc');
            $table->string('sub_title');
            $table->string('page_title');
            $table->string('meta_title');
            $table->string('meta_desc');
            $table->string('meta_keyword');
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
        Schema::dropIfExists('content_academics');
    }
}
