<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContentExtracurricularsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('content_extracurriculars', function (Blueprint $table) {
            
            $table->id();
            $table->string('title')->nullable();
            $table->string('slug')->nullable();
            $table->text('desc')->nullable();
            $table->string('page_title')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('meta_desc')->nullable();
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
        Schema::dropIfExists('content_extracurriculars');
    }
}
